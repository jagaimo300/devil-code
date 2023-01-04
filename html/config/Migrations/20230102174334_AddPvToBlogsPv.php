<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddPvToBlogsPv extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('blogs_pv');
        $table->addColumn('pv', 'integer', [
            'default' => 0, // ユーザー定義のデフォルトの値
            'null'    => false, // null許可
            'comment' => 'pv数',
            'after' => 'id', // カラムの位置(idカラムの後にpvを追加)
        ]);
        $table->update();
    }
}
