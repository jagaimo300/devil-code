<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Routing\Router;
use Cake\Http\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
/**
 * Blogs Controller
 *
 * @property \App\Model\Table\BlogsTable $Blogs
 * @method \App\Model\Entity\Blog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class BlogsController extends AppController
{
    /** @var \Cake\ORM\Table The Blogs table instance. */
    private $blogsTags;

    /**
     * Initialization method.
     *
     * This method is called before every controller action.
     * It initializes the $blogs property with the Blogs table instance.
     *
     * @return void
     */
    public function initialize(): void {
        // Call the parent class's initialize method to ensure proper initialization.
        parent::initialize();

        $this->blogsTags = TableRegistry::getTableLocator()->get('BlogsTags');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Lately posts
        $news = $this->Blogs->find('all', array(
			'contain' => ['BlogsCategories'],
            'limit' => 6,
		    'order' => 'Blogs.created DESC',
		    'recursive' => -1,
		));

        $this->set(compact('news'));

        // ブログのIDを抽出して配列に格納
        $blogIds = [];
        foreach ($news as $blog) {
            $blogIds[] = $blog->id;
        }
        // タグを取得するクエリを実行
        $blogsTags = $this->blogsTags->find('all', [
            'contain' => ['Tags'],
            'conditions' => ['BlogsTags.blog_id IN' => $blogIds]
        ]);

        $blogTags = [];
        foreach ($blogsTags as $blogsTag) {
            $blog_id = $blogsTag->blog_id;
            $tag_name = $blogsTag->tag->tag_name;
            $tag_slug = $blogsTag->tag->slug;

            // $blog_idをキーとした連想配列を作成
            if (!isset($blogTags[$blog_id])) {
                $blogTags[$blog_id] = [];
            }
            // タグ名とタグスラッグを追加
            $blogTags[$blog_id][] = [
                'tag_name' => $tag_name,
                'tag_slug' => $tag_slug
            ];
        }

        $this->set(compact('blogTags'));

        // cs posts
        $cs_posts = $this->Blogs->find('all', array(
			'contain' => ['BlogsCategories'],
            'limit' => 6,
            'order' => 'Blogs.created DESC',
        ));

        $cs_posts->leftJoinWith('BlogsTags')->leftJoinWith('Tags')->where(['OR'=> ['BlogsCategories.slug' => 'computer-science','Tags.slug' => 'computer-science']]);
        $this->set(compact('cs_posts'));

        // ブログのIDを抽出して配列に格納
        $blogIds = [];
        foreach ($cs_posts as $cs_post) {
            $blogIds[] = $cs_post->id;
        }
        // タグを取得するクエリを実行
        $csBlogsTags = $this->blogsTags->find('all', [
            'contain' => ['Tags'],
            'conditions' => ['BlogsTags.blog_id IN' => $blogIds]
        ]);

        $csBlogTags = [];
        foreach ($csBlogsTags as $blogsTag) {
            $blog_id = $blogsTag->blog_id;
            $tag_name = $blogsTag->tag->tag_name;
            $tag_slug = $blogsTag->tag->slug;

            // $blog_idをキーとした連想配列を作成
            if (!isset($csBlogTags[$blog_id])) {
                $csBlogTags[$blog_id] = [];
            }
            // タグ名とタグスラッグを追加
            $csBlogTags[$blog_id][] = [
                'tag_name' => $tag_name,
                'tag_slug' => $tag_slug
            ];
        }

        $this->set(compact('csBlogTags'));

        // life posts
        $life_posts = $this->Blogs->find('all', array(
			'contain' => ['BlogsCategories'],
            'limit' => 6,
            'order' => 'Blogs.created DESC',
        ));

        $life_posts->leftJoinWith('BlogsTags')->leftJoinWith('Tags')->where(['OR'=> ['BlogsCategories.slug' => 'java','Tags.slug' => 'java']]);
        $this->set(compact('life_posts'));

        // ブログのIDを抽出して配列に格納
        $blogIds = [];
        foreach ($life_posts as $life_post) {
            $blogIds[] = $life_post->id;
        }
        // タグを取得するクエリを実行
        $lifeBlogsTags = $this->blogsTags->find('all', [
            'contain' => ['Tags'],
            'conditions' => ['BlogsTags.blog_id IN' => $blogIds]
        ]);

        $lifeBlogTags = [];
        foreach ($lifeBlogsTags as $blogsTag) {
            $blog_id = $blogsTag->blog_id;
            $tag_name = $blogsTag->tag->tag_name;
            $tag_slug = $blogsTag->tag->slug;

            // $blog_idをキーとした連想配列を作成
            if (!isset($lifeBlogTags[$blog_id])) {
                $lifeBlogTags[$blog_id] = [];
            }
            // タグ名とタグスラッグを追加
            $lifeBlogTags[$blog_id][] = [
                'tag_name' => $tag_name,
                'tag_slug' => $tag_slug
            ];
        }

        $this->set(compact('lifeBlogTags'));
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

        // Change action name "view" to slug
        if($cat === "view"){
            throw new NotFoundException(__('404'));
        }

        $this->set('cat', $cat);
        $this->set('slug', $slug);


        $blogs = $this->Blogs->find('all', [
            'conditions' => ['BlogsCategories.slug' => $cat, 'Blogs.slug' => $slug],
            'contain' => ['BlogsCategories'],
            'limit' => 1,
            'order' => 'Blogs.id ASC',
            'recursive' => -1,
        ]);

        if ($blogs->all()->isEmpty()) {
                throw new NotFoundException(__('404'));
        }

        $this->set(compact('blogs'));

        $currentArticle = $blogs->first();

        // タグを取得するクエリを実行
        $blogsTags = $this->blogsTags->find('all', [
            'contain' => ['Tags'],
            'conditions' => ['BlogsTags.blog_id' => $currentArticle->id]
        ]);
        $this->set(compact('blogsTags'));

        $otherPosts = $this->Blogs->find('all', [
            'conditions' => ['Blogs.id <>' => $currentArticle->id],
            'contain' => ['BlogsCategories'],
            'limit' => '5',
            'order' => 'Blogs.created DESC',
            'recursive' => -1,
        ]);

        $this->set(compact('otherPosts'));

    }

    /**
     * List method.
     *
     * @return \Cake\Http\Response|null|void Renders list, or redirects to another action.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When the record is not found.
     */
    public function list()
    {
        $this->loadComponent('Paginator');

        // Get the page number from the query string
        $page = $this->request->getQuery('page', 1);
        $this->set('page', $page);

        // Fetch the blog list
        $query = $this->Blogs->find('all', [
            'contain' => ['BlogsCategories'],
            'order' => ['Blogs.created' => 'DESC'],
            'recursive' => -1
        ]);

        // Configure pagination
        $limit = 5;
        $blogs = $this->Paginator->paginate($query, [
            'limit' => $limit,
            'maxLimit' => $limit
        ]);
        $this->set(compact('blogs'));

        // Calculate the displayed range
        $totalCount = $query->count();
        $from = ($page - 1) * $limit + 1;
        $to = min($page * $limit, $totalCount);
        $this->set('totalCount', $totalCount);
        $this->set('from', $from);
        $this->set('to', $to);

        // Load category links
        $this->loadComponent('BlogLink');
        $categories = $this->BlogLink->getCategoryLink("");
        $this->set(compact('categories'));
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
			'conditions' => ['BlogsCategories.slug'=>"$cat"],
            'contain' => ['BlogsCategories'],
            'order' => 'Blogs.created DESC',
            'recursive' => -1,
        )));

        if($blogs->isEmpty()){
            throw new NotFoundException(__('404'));
        }
        $this->set(compact('blogs'));

        // Category links
        $this->loadComponent('BlogLink');

        $categories = $this->BlogLink->getCategoryLink($cat);
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

        // Category links
        $this->loadComponent('BlogLink');

        $categories = $this->BlogLink->getCategoryLink("dammy");
        $this->set(compact('categories'));
    }
}
