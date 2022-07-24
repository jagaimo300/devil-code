<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Blogs seed.
 */
class BlogsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
        [
            'id'         => 1,
            'title'      => 'iphone',
            'body'       => 'foooooooooooooooooooooooooooo',
            'category_id'  => 1,
            'created' => '2022-03-07 12:00:00',
            'modified' => '2022-03-07 12:00:00',
        ],
        [
            'id'         => 2,
            'title'      => 'Mac',
            'body'       => 'foooooooooooooooooooooooooooo',
            'category_id'  => 1,
            'created' => '2022-03-07 13:00:00',
            'modified' => '2022-03-07 13:00:00',
        ],
        [
            'id'         => 3,
            'title'      => 'book',
            'body'       => 'foooooooooooooooooooooooooooo',
            'category_id'  => 2,
            'created' => '2022-03-07 14:00:00',
            'modified' => '2022-03-07 14:00:00',
        ],
    ];

        $table = $this->table('blogs');
        $table->insert($data)->save();
    }
}
