<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

use Cake\ORM\TableRegistry;

class BlogLinkComponent extends Component
{
    public function getCategoryLink($category_label)
    {
        $registryBlogs = TableRegistry::getTableLocator()->get('Blogs');
        $query  = $registryBlogs->find()->innerJoinWith('BlogsCategories');
        $categories = $query->select(['cat_id'  => 'Blogs.category_id', 'cat_label' => 'BlogsCategories.category_label'])->where(['BlogsCategories.category_label !=' => $category_label])->group('Blogs.category_id');

        return $categories;
    }
}