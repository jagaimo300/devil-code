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
        $this->set('news', $this->Blogs->find('all', array(
			'contain' => ['BlogsCategories'],
            'limit' => 3,
		    'order' => 'Blogs.created DESC',
		    'recursive' => -1,
		)));

		$this->set('features', $this->Blogs->find('all', array(
			'contain' => ['BlogsCategories','BlogsFeatured'],
		    'order' => 'BlogsFeatured.id ASC',
		    'recursive' => -1,
		)));
		

        $query  = $this->Blogs->find()->innerJoinWith('BlogsCategories');
        $categories = $query->select(['cat_id'  => 'Blogs.category_id', 'cat_label' => 'BlogsCategories.category_label', 'cat_count' => $query ->func()->count('Blogs.category_id')])->group('Blogs.category_id');

		$this->set(compact('categories'));

        $this->loadComponent('Paginator');

        $blogs = $this->Paginator->paginate($this->Blogs->find('all', array(
            'contain' => ['BlogsCategories'],
            'order' => 'Blogs.created ASC',
            'recursive' => -1,
        )));

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

		list($dummy,$ctl, $cat, $slug) = explode("/", Router::url());
		
			if($cat === "view"){
		        throw new NotFoundException(__('404 Not Found'));
			}


			$this->set('cat', $cat);
			$this->set('slug', $slug);

	        $query  = $this->Blogs->find()->innerJoinWith('BlogsCategories');
	        $categories = $query->select(['cat_id'  => 'Blogs.category_id', 'cat_label' => 'BlogsCategories.category_label', 'cat_count' => $query ->func()->count('Blogs.category_id')])->group('Blogs.category_id');

			$this->set(compact('categories'));

	        $this->set('relations',  $this->Blogs->find('all', array(
				'conditions' => ['BlogsCategories.category_label'=>"$cat"],
	            'contain' => ['BlogsCategories'],
	            'order' => 'Blogs.created ASC',
	            'recursive' => -1,
	        )));

	        $blogs = $this->Blogs->find('all', array(
				'conditions' => ['Blogs.slug'=>"$slug"],
	            'contain' => ['BlogsCategories'],
	            'limit' => 1,
	            'order' => 'Blogs.id ASC',
	            'recursive' => -1,
			));
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
            'order' => 'Blogs.created ASC',
            'recursive' => -1,
        )));
        $this->set(compact('blogs'));
    }

}
