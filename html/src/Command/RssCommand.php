<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;

class RssCommand extends Command
{
    // デフォルトのテーブルを定義。
    protected $defaultTable = 'Blogs';

    public function execute(Arguments $args, ConsoleIo $io): ?int
    {
        $cur_date = date_create();
        $date = clone $cur_date;
        $date->modify("-14 days");

        $query = $this->fetchTable()->find()->innerJoinWith('BlogsCategories');
        $blogs = $query->select(['title' => 'Blogs.title', 'description' => 'Blogs.description', 'cat_label' => 'BlogsCategories.category_label', 'slug'  => 'Blogs.slug', 'modified' => 'Blogs.modified'])->order(['created' => 'DESC'])->where(['created >= ' => $date]);
        $xml_data = 
            '<rss version="2.0">
            <channel>
            <title>RSS</title>
            <link>https://devil-code.com/</link>
            <description>devil code(デビルコード)のRSSフィード</description>
            <language>ja</language>
            ';
        foreach ($blogs as $blog){
            $url = BASE_URL . "/blogs/" . $blog->cat_label . "/" . $blog->slug . "/";

            $modify_date = new \DateTime("$blog->modified", new \DateTimeZone('Asia/Tokyo'));
            $modified_iso8601 = $modify_date->format('Y-m-d\TH:i:s') . '+09:00';
            $xml_data .= "
            <item>
                <title>$blog->title</title>
                <link>$url</link>
                <pubDate>$modified_iso8601</pubDate>
                <description>$blog->description</description>
            </item>
            ";
        }
        $xml_data .= '</channel></rss>';

        file_put_contents(ROOT . "/webroot/rss.xml", $xml_data);
        $io->out(print_r($xml_data, true));

        return null;
    }
}