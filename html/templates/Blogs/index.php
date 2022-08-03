<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blogs
 */
?>
<?= $this->Html->css('https://unpkg.com/swiper@8/swiper-bundle.min.css', ['block' => 'css']) ?>
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image: url('../img/sample_1.jpg')">
            <div class="text-wrapper ls-1">
                <h2 class="blog-ttl my-4">Blog</h2>
                <p class="blog-subTtl small">foooooooooooooooo</p>
            </div>
        </div>
    </div>
</div>
<section class="blog">
    <div class="album py-5 bg-white">
        <div class="container">
            <div class="row my-5">
                <h2>NEWS</h2>
            </div>
            <div class="row mb-2">
                <div class="col-md-8 card-item pt-3">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($news as $index => $new) : ?>
                            <li class="list-group-item mb-3">
                                <a href="">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-6 d-flex">
                                            <span class="catTag me-3"><?= h($new->blogs_category->category_label) ?></span>
                                            <p class="py-2 me-3"><?= h($new->created->i18nFormat('yyyy.MM.dd')) ?></p>
                                            <p class="py-2"><?= h($new->title) ?></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- <div class="col-md-4 card-item">
                    <ul class="row">
                        <li class="mb-3"><a href="https://blog.naver.com/devil_code">힌국어 브로그</a></li>
                        <li class="mb-3"><a href="https://medium.com/@devil-code">English blog</a></li>
                        <li class="mb-3"><a href="https://twitter.com/devil_code_com">@devil_code_com</a></li>
                        <li class="mb-3"><a href="https://www.instagram.com/devil_code_com/">@devil_code_com</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row my-5">
            <h2>Featured</h2>
        </div>
        <div class="row mb-2 d-flex justify-content-between align">
            <?php foreach ($blogs as $index => $blog) : ?>
                <a href="" class="col-md-12 col-lg-4 mb-5 pe-lg-5 h-100">
                    <div class="row card-item overflow-hidden">
                        <div class="col-auto blog-img w-100" style="background-image:url('https://devil-code.com/files/blogs/1.jpg'); background-position: center; background-size: cover; background-repeat: norepeat; height: 180px;"></div>
                        <div class="col mt-3 pb-4 px-4 d-flex flex-column position-relative">
                            <span class="mb-2 catTag"><?= h($blog->blogs_category->category_label) ?></span>
                            <h3 class="mt-3 mb-0 pb-5 fs-5 blog-ttl text-wrap"><?= h($blog->title) ?></h3>
                            <div class="mt-3 text-muted d-flex justify-content-between"><span><?= h($new->created->i18nFormat('yyyy.MM.dd')) ?></span><span class="arrow"></span></div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<div class="blogs index content">
    <!--
    <?= $this->Html->link(__('New Blog'), ['action' => 'add'], ['class' => 'button float-right']) ?>
	-->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($blogs as $blog) : ?>
                    <tr>
                        <td><?= $this->Number->format($blog->id) ?></td>
                        <td><?= h($blog->title) ?></td>
                        <td><?= h($blog->blogs_category->category_label) ?></td>
                        <td><?= h($blog->created) ?></td>
                        <td><?= h($blog->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $blog->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blog->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>