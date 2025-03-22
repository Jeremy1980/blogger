<?php
namespace App\Controller;

use Cake\Event\EventInterface;

class ArticlesController extends AppController
{
    public $paginate = [
        'limit' => 10,
        'order' => [ 'Articles.title' => 'asc' ]
    ];

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        // Zezwól niezalogowanym użytkownikom na wyświetlenie zawartości
        $this->Authentication->addUnauthenticatedActions(['view']);
    }

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }
    
    public function publish($slug = null)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();

        $article->activated = 1;
        $article->published = date("Y-m-d H:i:0");

        $this->Articles->save($article);

        return $this->redirect(['action' => 'index']);
    }

    public function index()
    {
        $articles = $this->Paginator->paginate($this->Articles->find(),$this->paginate);
        $this->set(compact('articles'));
    }

    public function view($slug = null)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();

        $next_article = $this->Articles->find()->where(
            ['activated = 1' ,'published IS NOT NULL' ,'id > ' . $article->id]
        )->first();
        $article->next = is_object($next_article) ?array('title'=>$next_article->title, 'slug'=>$next_article->slug) :null;

        $previous_article = $this->Articles->find()->where(
            ['activated = 1' ,'published IS NOT NULL' ,'id < ' . $article->id]
        )->first();
        $article->previous = is_object($previous_article) ?array('title'=>$previous_article->title, 'slug'=>$previous_article->slug) :null;

        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEmptyEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            $article->activated = $article->active ?1 :0;

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('article', $article);
    }

    public function edit($slug)
    {
        $article = $this->Articles
            ->findBySlug($slug)
            ->firstOrFail();
    
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $json = $this->request->getData());
            
            $article->activated = $article->active ?1 :0;
            $article->modified = date("Y-m-d H:i:0");

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your article.'));
        }
    
        $this->set('article', $article);
    }    

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The {0} article has been deleted.', $article->title));
            return $this->redirect(['action' => 'index']);
        }
    }    
}

?>