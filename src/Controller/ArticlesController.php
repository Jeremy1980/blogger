<?php
namespace App\Controller;

class ArticlesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
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
        $this->loadComponent('Paginator');
        $articles = $this->Paginator->paginate($this->Articles->find());
        $this->set(compact('articles'));
    }

    public function view($slug = null)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEmptyEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            $article->user_id = 1;

            if ($this->Articles->save($article)) {
                $this->Articles->updateAll(
                    array('activated'=>$article->active ?1 :0 ,'modified'=>$article->created ) , array('slug' => $article->slug)
                );

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
            
            if ($this->Articles->save($article)) {
                $this->Articles->updateAll(
                    array('activated'=>$article->active ?1 :0 ,'modified'=>date("Y-m-d H:i:0") ) , array('slug' => $slug)
                );

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