<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;

class SitemapCommand extends Command
{
    // デフォルトのテーブルを定義します。これにより、引数なしで  `fetchTable()` を使用できます。
    protected $defaultTable = 'Blogs';

    public function execute(Arguments $args, ConsoleIo $io): ?int
    {
        // sitemap.xml
        $query = $this->fetchTable()->find()->innerJoinWith('BlogsCategories');
        $blogs = $query->select(['cat_label' => 'BlogsCategories.category_label', 'slug'  => 'Blogs.slug', 'modified' => 'Blogs.modified'])->order(['created' => 'DESC'])->limit('1000');
        $xml_data = '<?xml version="1.0" encoding="UTF-8"?> <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">';
        foreach ($blogs as $blog){
            $url = BASE_URL . "/blogs/" . $blog->cat_label . "/" . $blog->slug . "/";

            $modify_date = new \DateTime("$blog->modified", new \DateTimeZone('Asia/Tokyo'));
            $modified_iso8601 = $modify_date->format('Y-m-d\TH:i:s') . '+09:00';
            $xml_data .= '<url><loc>' . $url . '</loc><lastmod>' . $modified_iso8601 . '</lastmod><changefreq>monthly</changefreq><priority>0.8</priority></url>';
            
        }
        $xml_data .= '</urlset>';

        file_put_contents(ROOT . "/webroot/sitemap.xml", $xml_data);
        $io->out(print_r($xml_data, true));

        return null;
    }
}