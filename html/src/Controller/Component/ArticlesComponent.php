<?php

// src/Controller/Component/ArticlesComponent.php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class ArticlesComponent extends Component
{
    /**
     * Fetches blog posts and associated tags based on category slug
     *
     * @param array $commonConditions Common conditions for fetching blog posts
     * @param array|null $categorySlug Category slug for filtering (optional)
     * @return array
     */
    public function fetchArticlesAndTags(array $commonConditions, $categorySlug = null)
    {
        $blogsTable = TableRegistry::getTableLocator()->get('Blogs');
        $blogsTagsTable = TableRegistry::getTableLocator()->get('BlogsTags');

        $blogs = $blogsTable->find('all', $commonConditions);
        if ($categorySlug) {
            $blogs->leftJoinWith('BlogsTags')->leftJoinWith('Tags')
                ->where(['OR' => ['BlogsCategories.slug' => $categorySlug['slug'], 'Tags.slug' => $categorySlug['slug']]]);
        }

        // Call all() before using extract()
        $blogIds = $blogs->all()->extract('id')->toList();

        // Fetch tags for the extracted blog IDs
        $blogsTags = $blogsTagsTable->find('all', [
            'contain' => ['Tags'],
            'conditions' => ['BlogsTags.blog_id IN' => $blogIds]
        ]);

        // Organize tags by blog ID
        $blogTags = [];
        foreach ($blogsTags as $blogsTag) {
            $blog_id = $blogsTag->blog_id;
            $tag_name = $blogsTag->tag->tag_name;
            $tag_slug = $blogsTag->tag->slug;

            if (!isset($blogTags[$blog_id])) {
                $blogTags[$blog_id] = [];
            }

            $blogTags[$blog_id][] = [
                'tag_name' => $tag_name,
                'tag_slug' => $tag_slug
            ];
        }
        return compact('blogs', 'blogTags');
    }
}

