<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Controller\AppController;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        $blogs = TableRegistry::getTableLocator()->get('Blogs');
        $blogsTags = TableRegistry::getTableLocator()->get('BlogsTags');

        $news = $blogs->find('all', array(
            'contain' => ['BlogsCategories', 'BlogsTags', 'BlogsTags.Tags'],
            'limit' => 5,
            'order' => 'Blogs.created DESC',
            'recursive' => -1,
        ));

        $this->set('news', $news);

        // ブログのIDを抽出して配列に格納
        $blogIds = [];
        foreach ($news as $blog) {
            $blogIds[] = $blog->id;
        }
        // タグを取得するクエリを実行
        $blogsTags = $blogsTags->find('all', [
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
        $this->set('blogTags', $blogTags);

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function contact()
    {
    }

    public function policy()
    {
    }

    public function sitemaps()
    {
        $blogs = TableRegistry::getTableLocator()->get('Blogs');
        $this->set('blogs', $blogs->find('all', array(
			'contain' => ['BlogsCategories'],
            'limit' => 4900,
		    'order' => ['Blogs.category_id ASC','Blogs.created DESC'],
		    'recursive' => -1,
		)));
    }
}

