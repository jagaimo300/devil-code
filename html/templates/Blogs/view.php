<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blogs
 */
?>
<?= $this->Html->css(['all.min'], ['block' => 'css']) ?>

<div class="blog my-3">
    <div class="container">
        <div class="row">
            <?php foreach ($blogs as $index => $blog) : ?>
                <aside class="col-2">
                    <a href="">foooo</a><a href="">foooo</a><a href="">foooo</a><a href="">foooo</a><a href="">foooo</a>
                </aside>
                <article class="col-7">
                    <section class="blog_meta mt-5 mb-2">
                        <i class="fa-sharp fa-solid fa-calendar-days text-muted d-inline-block mt-1"></i>
                        <span class="text-muted d-inline-block ms-1" style="font-size: 12px;"><?= h($blog->created->i18nFormat('yyyy.MM.dd')) ?>
                        <span class="catTag d-inline-block  ms-3" style="background-color: <?= h($blog->blogs_category->category_color) ?>;"><?= h($blog->blogs_category->category_label) ?></span>
                    </section>
                    <section class="blog_title mt-0 mb-7">
                        <h1 class="blog_title-heading"><?= h($blog->title) ?></h1>
                    </section>
                    <section class="blog_body my-7 text-break ls-1">
                        <p><?= $blog->body ?></p>
                    </section>
                </article>
                <aside class="col-3">
                    <h5>
                        目次
                    </h5>
                    <p></p>                
                </aside>
            <?php endforeach; ?>

        </div>
    </div>
</div>



<!-- <div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Blog'), ['action' => 'edit', $blog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Blog'), ['action' => 'delete', $blog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Blogs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Blog'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="blogs view content">
            <h3><?= h($blog->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($blog->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($blog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Id') ?></th>
                    <td><?= $this->Number->format($blog->category_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($blog->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($blog->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Body') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($blog->body)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div> -->
