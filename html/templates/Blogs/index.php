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
            <div class="row my-5 align">
                <h2>NEWS</h2>
                <p>新着</p>
            </div>
            <div class="row mb-2 px-3">
                <div class="col-md-8 card-item pt-3">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($news as $index => $new) : ?>
                            <li class="list-group-item mb-3">
                                <a href="/blogs/view/<?= h($new->slug) ?>">
                                    <div class="d-md-flex">
                                        <div class="d-flex">
                                            <span class="catTag me-3" style="background-color:<?= h($new->blogs_category->category_color) ?>;"><?= h($new->blogs_category->category_label) ?></span>
                                            <span class="me-3 text-muted" style="font-size: 12px; line-height: 30px;"><?= h($new->created->i18nFormat('yyyy.MM.dd')) ?></span>
                                        </div>
                                        <p class="mt-3 mt-md-0 text-truncate flex-wrap-reverse"><?= h($new->title) ?></p>
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
            <p>人気記事</p>
        </div>
        <div class="row mb-2 px-3 d-flex justify-content-between align">
            <?php foreach ($features as $index => $feature) : ?>
                <a href="/blogs/view/<?= h($feature->slug) ?>" class="col-md-12 col-lg-4 mb-5 pe-lg-5 h-100">
                    <div class="row card-item overflow-hidden position-relative">
                        <div class="col-auto blog-img w-100" style="overflow:hidden; background-image:url('https://devil-code.com/files/blogs/1.jpg'); background-position: center; background-size: cover; height: 180px;">
                        </div>
                        <span class="mb-2 catTag position-absolute" style="top: 32px; right: 16px; background-color:<?= h($feature->blogs_category->category_color) ?>;"><?= h($feature->blogs_category->category_label) ?></span>

                        <div class="col pb-4 px-4 d-flex flex-column position-relative">
                            <h3 class="mt-3 mb-0 pb-5 fs-5 blog-ttl text-truncate"><?= h($feature->title) ?></h3>
                            <div class="mt-3 text-muted d-flex justify-content-between align-items-center"><span style="font-size: 12px;"><?= h($feature->created->i18nFormat('yyyy.MM.dd')) ?></span><span class="arrow"></span></div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container">
        <div class="row my-5 d-flex">
            <div class="col-md-8 me-md-1">
                <h2 >Posts</h2>
                <p class="mb-5">人気記事</p>
                <?php foreach ($blogs as $index => $blog) : ?>
                    <a href="/blogs/view/<?= h($blog->slug) ?>" class="pe-lg-5 h-100">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="fs-4 blog-ttl text-truncate"><?= h($blog->title) ?></h3><span class="catTag" style="background-color:<?= h($blog->blogs_category->category_color) ?>;"><?= h($blog->blogs_category->category_label) ?></span>
                        </div>
                        <div class="mb-4 text-muted"><span style="font-size: 12px;"><?= h($new->created->i18nFormat('yyyy.MM.dd')) ?></div>
                        <p class="mb-5 text-muted text-break" style="font-weight:100;"><?= mb_substr(strip_tags($blog->body),0,120) ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="mt-5 col-md-3 h-100 px-md-5 sticky-top">
                <div class="category my-5">
                    <a href="?cat=1" class="fs-5 d-inline-block">fooo<a>
                    <a href="?cat=1" class="fs-4 d-inline-block">fooo<a>
                    <a href="?cat=1" class="fs-3 d-inline-block">fooo<a>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->Html->script(['https://unpkg.com/swiper@8/swiper-bundle.min.js','swiper'], ['block' => 'scriptBottom']) ?>

<!-- <div class="blogs index content">
    <?= $this->Html->link(__('New Blog'), ['action' => 'add'], ['class' => 'button float-right']) ?>
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
</div> -->