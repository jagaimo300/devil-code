<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

use Cake\ORM\TableRegistry;

/**
 * Category link component
 *
 * @param string|null $category_slug Category_id.
 */
class BlogLinkComponent extends Component
{
    public function getCategoryLink($category_slug = null)
    {
        $registryBlogs = TableRegistry::getTableLocator()->get('Blogs');
        $query  = $registryBlogs->find()->innerJoinWith('BlogsCategories');
        $categories = $query->select(['cat_id'  => 'Blogs.category_id', 'cat_label' => 'BlogsCategories.slug', 'cat_count' => $query ->func()->count('Blogs.category_id')])->where(['BlogsCategories.slug !=' => $category_slug])->group('Blogs.category_id');

        return $categories;
    }
}
