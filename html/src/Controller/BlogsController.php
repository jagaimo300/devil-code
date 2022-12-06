<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Routing\Router;
use Cake\Http\Exception\NotFoundException;

/**
 * Blogs Controller
 *
 * @property \App\Model\Table\BlogsTable $Blogs
 * @method \App\Model\Entity\Blog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class BlogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // deny query strings
        if($this->request->getQuery()){
            throw new NotFoundException(__('404'));
        }

        // top article
        $this->set('tops',  $this->Blogs->find('all', array(
            'conditions' => ['Blogs.is_top'=> "1"],
            'contain' => ['BlogsCategories'],
            'limit' => '1',
            'recursive' => -1,
        )));

        // Lately posts
        $this->set('news', $this->Blogs->find('all', array(
			'contain' => ['BlogsCategories'],
            'limit' => 3,
		    'order' => 'Blogs.created DESC',
		    'recursive' => -1,
		)));

        // Featured
		$this->set('features', $this->Blogs->find('all', array(
			'contain' => ['BlogsCategories','BlogsFeatured'],
		    'order' => 'BlogsFeatured.id ASC',
		    'order' => 'Blogs.created DESC',
            'recursive' => -1,
		)));

        // Categories
        $query  = $this->Blogs->find()->innerJoinWith('BlogsCategories');
        $categories = $query->select(['cat_id'  => 'Blogs.category_id', 'cat_label' => 'BlogsCategories.category_label', 'cat_count' => $query ->func()->count('Blogs.category_id')])->group('Blogs.category_id');
		$this->set(compact('categories'));

        $blogs = $this->Blogs->find('all', array(
            'contain' => ['BlogsCategories'],
            'offset' => 3,
            'limit' => 8,
		    'order' => 'Blogs.created DESC',
            'recursive' => -1,
        ));

        $this->set(compact('blogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        // deny query strings
        if($this->request->getQuery()){
            throw new NotFoundException(__('404'));
        }

        list($dummy,$ctl, $cat, $slug) = explode("/", Router::url());
        
        // アクション名をURLに使えなくする
        if($cat === "view"){
            throw new NotFoundException(__('404'));
        }

        $this->set('cat', $cat);
        $this->set('slug', $slug);

        $query  = $this->Blogs->find()->innerJoinWith('BlogsCategories');
        $categories = $query->select(['cat_id'  => 'Blogs.category_id', 'cat_label' => 'BlogsCategories.category_label', 'cat_count' => $query ->func()->count('Blogs.category_id')])->group('Blogs.category_id');

        $this->set(compact('categories'));

        $this->set('relations',  $this->Blogs->find('all', array(
            'conditions' => ['BlogsCategories.category_label'=>"$cat",'Blogs.slug'=>"<> $slug"],
            'contain' => ['BlogsCategories'],
            'limit' => '5',
            'order' => 'Blogs.created ASC',
            'recursive' => -1,
        )));

        $blogs = $this->Blogs->find('all', array(
            'conditions' => ['BlogsCategories.category_label'=>"$cat",'Blogs.slug'=>"$slug"],
            'contain' => ['BlogsCategories'],
            'limit' => 1,
            'order' => 'Blogs.id ASC',
            'recursive' => -1,
        ));

        if($blogs->isEmpty()){
            throw new NotFoundException(__('404'));
        }

        $this->set(compact('blogs'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blog = $this->Blogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $blog = $this->Blogs->patchEntity($blog, $this->request->getData());
            if ($this->Blogs->save($blog)) {
                $this->Flash->success(__('The blog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blog could not be saved. Please, try again.'));
        }
        $BlogsCategories = $this->Blogs->BlogsCategories->find('list', ['limit' => 200])->all();
        $this->set(compact('blog', 'BlogsCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blog = $this->Blogs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blog = $this->Blogs->patchEntity($blog, $this->request->getData());
            if ($this->Blogs->save($blog)) {
                $this->Flash->success(__('The blog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blog could not be saved. Please, try again.'));
        }
        $BlogsCategories = $this->Blogs->BlogsCategories->find('list', ['limit' => 200])->all();
        $this->set(compact('blog', 'BlogsCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blog = $this->Blogs->get($id);
        if ($this->Blogs->delete($blog)) {
            $this->Flash->success(__('The blog has been deleted.'));
        } else {
            $this->Flash->error(__('The blog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Category method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function category($cat = null)
    {
        // deny query strings
        if($this->request->getQuery()){
            throw new NotFoundException(__('404'));
        }

    	if(!$cat){
	        list($dummy, $ctl, $cat) = explode("/", Router::url());
    	}

		if($cat === "view"){
	        throw new NotFoundException(__('ページが見つかりません'));
		}

		$this->set('cat', $cat);

        $this->loadComponent('Paginator');

        $blogs = $this->Paginator->paginate($this->Blogs->find('all', array(
			'conditions' => ['BlogsCategories.category_label'=>"$cat"],
            'contain' => ['BlogsCategories'],
            'order' => 'Blogs.created DESC',
            'recursive' => -1,
        )));

        if($blogs->isEmpty()){
            throw new NotFoundException(__('404'));
        }
        $this->set(compact('blogs'));

        $query  = $this->Blogs->find()->innerJoinWith('BlogsCategories');
        $categories = $query->select(['cat_id'  => 'Blogs.category_id', 'cat_label' => 'BlogsCategories.category_label', 'cat_count' => $query ->func()->count('Blogs.category_id')])->group('Blogs.category_id')->where(['BlogsCategories.category_label IS NOT' => $cat]);

		$this->set(compact('categories'));
    }

    /**
     * Search method
     *
     * @param string|null $q Blog title body slug description.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function search($q = null)
    {
        // deny query strings
        $q = $this->request->getQuery('q');

        if(!$q){
            return $this->redirect(['action' => 'index']);
        }
        $this->loadComponent('Paginator');

        //テキストボックスの空白を半角スペースに置換し半角スペース区切りで配列に格納
        $textboxs = explode(" ",mb_convert_kana($q,'s'));
        
        //SQL文に追加する字句の生成
        foreach($textboxs as $textbox){
            $value = '"%'.preg_replace('/ /', '', $textbox) . '%"';
            $textboxCondition[] = "Blogs.title LIKE $value";            
        }

        //各Like条件を「OR」でつなぐ
        $textboxCondition = implode(' OR ', $textboxCondition);

        $blogs = $this->Paginator->paginate($this->Blogs->find('all', array(
			'conditions' => [
                $textboxCondition
            ],
            'contain' => ['BlogsCategories'],
            'order' => 'Blogs.created ASC',
            'recursive' => -1,
        )));
        $blog_count = $blogs->count();
		$this->set(['q' => $q, 'blog_count' => $blog_count]);

        $this->set(compact('blogs'));

        $query  = $this->Blogs->find()->innerJoinWith('BlogsCategories');
        $categories = $query->select(['cat_id'  => 'Blogs.category_id', 'cat_label' => 'BlogsCategories.category_label', 'cat_count' => $query ->func()->count('Blogs.category_id')])->group('Blogs.category_id');

		$this->set(compact('categories'));
    }
}
