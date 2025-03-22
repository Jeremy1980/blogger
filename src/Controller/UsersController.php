<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Security;
use Cake\Mailer\Mailer;
use Cake\Event\EventInterface;
use Cake\I18n\FrozenTime;

class UsersController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        // Zezwól niezalogowanym użytkownikom na rejestrację i aktywację
        $this->Authentication->addUnauthenticatedActions(['register', 'login', 'logout', 'activate', 'forgotPassword', 'resetPassword']);
    }
    
    public function register()
    {
        $this->viewBuilder()->setLayout('default');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            // Generowanie tokenu aktywacyjnego
            $user->token = $this->generateToken();
            $user->active = false;
            
            if ($this->Users->save($user)) {
                // Wysyłanie e-maila z tokenem aktywacyjnym
                $this->sendActivationEmail($user);
                
                $this->Flash->success(__('Rejestracja przebiegła pomyślnie. Sprawdź swoją skrzynkę e-mail, aby aktywować konto.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Rejestracja nie powiodła się. Spróbuj ponownie.'));
        }
        $this->set(compact('user'));
    }
    
    public function activate($token = null)
    {
        if (!$token) {
            $this->Flash->error(__('Nieprawidłowy token aktywacyjny.'));
            return $this->redirect(['action' => 'login']);
        }
        
        $user = $this->Users->find()
            ->where(['token' => $token, 'active' => false])
            ->first();
            
        if (!$user) {
            $this->Flash->error(__('Nieprawidłowy token aktywacyjny lub konto zostało już aktywowane.'));
            return $this->redirect(['action' => 'login']);
        }
        
        $user->active = true;
        $user->token = null;
        
        if ($this->Users->save($user)) {
            $this->Flash->success(__('Twoje konto zostało aktywowane. Możesz się teraz zalogować.'));
            return $this->redirect(['action' => 'login']);
        }
        
        $this->Flash->error(__('Nie udało się aktywować konta. Spróbuj ponownie.'));
        return $this->redirect(['action' => 'login']);
    }
    
    public function login()
    {
        $this->viewBuilder()->setLayout('default');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        
        if ($result && $result->isValid()) {
            $user = $this->Authentication->getIdentity();
            if (!$user->active) {
                $this->Authentication->logout();
                $this->Flash->error(__('Konto nie zostało aktywowane. Sprawdź swoją skrzynkę e-mail.'));
                return $this->redirect(['action' => 'login']);
            }
            
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]);
            
            return $this->redirect($redirect);
        }
        
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Nieprawidłowy e-mail lub hasło'));
        }
    }
    
    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $this->Authentication->logout();
            $this->Flash->success(__('Wylogowano pomyślnie.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
        }
    }
    
    public function forgotPassword()
    {
        $this->viewBuilder()->setLayout('default');
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $user = $this->Users->findByEmail($email)->first();
            
            if ($user) {
                $user->reset_token = $this->generateToken();
                $user->reset_token_expires = new FrozenTime('+1 hour');
                
                if ($this->Users->save($user)) {
                    $this->sendResetPasswordEmail($user);
                    $this->Flash->success(__('Odnośnik do resetowania hasła został wysłany na Twój adres e-mail.'));
                    return $this->redirect(['action' => 'login']);
                }
            } else {
                // Dla bezpieczeństwa nie ujawniamy, czy taki e-mail istnieje
                $this->Flash->success(__('Odnośnik do resetowania hasła został wysłany na Twój adres e-mail (jeśli istnieje).'));
                return $this->redirect(['action' => 'login']);
            }
        }
    }
    
    public function resetPassword($token = null)
    {
        $this->viewBuilder()->setLayout('default');
        if (!$token) {
            $this->Flash->error(__('Nieprawidłowy token resetowania hasła.'));
            return $this->redirect(['action' => 'login']);
        }
        
        $user = $this->Users->find()
            ->where([
                'reset_token' => $token,
                'reset_token_expires >' => FrozenTime::now()
            ])
            ->first();
            
        if (!$user) {
            $this->Flash->error(__('Token resetowania hasła jest nieprawidłowy lub wygasł.'));
            return $this->redirect(['action' => 'login']);
        }
        
        if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->reset_token = null;
            $user->reset_token_expires = null;
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Hasło zostało zmienione. Możesz się teraz zalogować.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Nie udało się zmienić hasła. Spróbuj ponownie.'));
        }
        
        $this->set(compact('user'));
    }
    
    private function generateToken()
    {
        return Security::hash(Security::randomBytes(32) . time(), 'sha256', true);
    }
    
    private function sendActivationEmail($user)
    {
        $mailer = new Mailer('default');
        $mailer
            ->setEmailFormat('html')
            ->setTo($user->email)
            ->setSubject('Aktywacja konta')
            ->viewBuilder()
                ->setTemplate('activate_account')
                ->setLayout('default');
                
        $activationUrl = \Cake\Routing\Router::url([
                'controller' => 'Users',
                'action' => 'activate',
                $user->token
            ], true);

        file_put_contents('activationUrl.dump',$activationUrl);
        file_put_contents('activationToken.dump',$user->token);

        $mailer->setViewVars([
            'user' => $user,
            'activationUrl' => $activationUrl
        ]);
        
        $mailer->deliver();
    }
    
    private function sendResetPasswordEmail($user)
    {
        $mailer = new Mailer('default');
        $mailer
            ->setEmailFormat('html')
            ->setTo($user->email)
            ->setSubject('Reset hasła')
            ->viewBuilder()
                ->setTemplate('reset_password')
                ->setLayout('default');
                
        $mailer->setViewVars([
            'user' => $user,
            'resetUrl' => \Cake\Routing\Router::url([
                'controller' => 'Users',
                'action' => 'resetPassword',
                $user->reset_token
            ], true)
        ]);
        
        $mailer->deliver();
    }
}