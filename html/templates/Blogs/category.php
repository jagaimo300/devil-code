<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blogs
 */

$this->Html->meta(["name" => "robots", "content" => "noindex",], null, ["block" => 'meta']);
$this->Breadcrumbs->add(
    'Home',
    ['controller' => 'pages', 'action' => 'display'],
    [
        'templateVars' => [
            'num' => '1'
        ]
    ]
);
$this->Breadcrumbs->add(
    'ブログ',
    ['controller' => 'blogs', 'action' => 'index'],
    [
        'templateVars' => [
            'num' => '2'
        ]
    ]
);
$this->Breadcrumbs->add(
    'カテゴリー（' . $cat . '）',
    ['controller' => 'blogs', 'action' => $cat],
    [
        'templateVars' => [
            'num' => '3',
            'active' => 'active'
        ]
    ]
);

$this->Breadcrumbs->setTemplates([
    'wrapper' => '<nav aria-label="breadcrumb"{{attrs}} ><ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">{{content}}</ol></nav>',
    'item' => '<li class="breadcrumb-item active"{{attrs}}  itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="{{url}}"{{innerAttrs}} class="{{active}}"><span itemprop="name">{{title}}</span></a><meta itemprop="position" content="{{num}}" />
               </li>',
    'itemWithoutLink' => '<li class="breadcrumb-item"{{attrs}}>{{title}}</li>',
]);

$this->assign('title', 'devil-code(デビルコード) - ブログ - ' . $cat);

?>

<section class="blog" style="min-height: 60vh;">
    <div class="container">
        <div class="row my-5 d-flex">
            <div class="col-md-8 me-md-1">
                <h2>カテゴリー別 - <?= h($cat) ?></h2>
                <p class="mb-5">Category - <?= h($cat) ?></p>
                <?php foreach ($blogs as $index => $blog) : ?>
                    <a href="/blogs/<?= h($blog->blogs_category->category_label) ?>/<?= h($blog->slug) ?>/" class="pe-lg-5 h-100">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <h3 class="fs-5 fs-lg-4 blog-ttl lh-base"><?= h($blog->title) ?></h3>
                            <span class="catTag" style="background-color:<?= h($blog->blogs_category->category_color) ?>;"><?= h($blog->blogs_category->category_label) ?></span>
                        </div>
                        <div class="mb-4 mt-2 mt-lg-0 text-muted"><span style="font-size: 12px;"><?= h($blog->created->i18nFormat('yyyy.MM.dd')) ?></div>
                        <p class="mb-5 text-muted text-break" style="font-weight:100;"><?= mb_substr(strip_tags($blog->body), 0, 120) ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="mt-5 col-md-3 h-100 px-md-5 sticky-top">
                <div class="mt-5 category_tagWrapper">
                    <h5>他のカテゴリー</h5>
                    <span>Category</span>
                    <ul class="mt-3 mt-3 p-0 categories">
                        <?php foreach ($categories as $category) : ?>
                            <li class="categoryLink d-inline-block">
                                <a class="d-inline-block" href="/blogs/<?= h($category->cat_label) ?>/"><?= h($category->cat_label) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container my-5 breadcrumbs-wrapper">
    <?= $this->Breadcrumbs->render() ?>
</div>

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