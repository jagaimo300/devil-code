<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blogs
 */

// パンくず生成
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
            'num' => '2',
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

$this->assign('title', 'ブログ');
$this->assign('canonical', '<link rel="canonical" href="https://devil-code.com/blogs/" />');
?>
<?= $this->Html->css(['swiper-bundle.min.css'], ['block' => 'css']) ?>
<?= $this->Html->meta(["name"=>"description","content"=>"devil codeではプログラミングの技術メモや学習記録、ITのキャリアプランなどについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:title","content"=>"【devil code】Takahiro Ueda's Homepage - Blog"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:type","content"=>"article"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:description","content"=>"devil codeではプログラミングの技術メモや学習記録、ITのキャリアプランなどについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:url","content"=>"https://devil-code.com/blogs/"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:site_name","content"=>"devil code"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:locale","content"=>"ja_JP"],null,["block"=>'meta']); ?>

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php foreach ($tops as $index => $top) : ?>
            <div class="swiper-slide slide-mask " style="background-image: url('../files/blogs/thumbnails/<?= sprintf("%010d", $top->id) ?>.webp')">
                <div class="text-wrapper ls-1">
                    <h2 class="blog-ttl px-3 py-1 mx-3 mt-4 d-inline-block" style="margin-bottom: 120px;"><?= h($top->title) ?></h2>
                    <div class="text-wrapper ls-1 mt-5 pt-5">
                        <a href="/blogs/<?= h($top->blogs_category->category_label) ?>/<?= h($top->slug) ?>/" class="border-btn px-4 px-md-5 py-3 border border-3 border-white text-white text-nowrap">ブログを見る</a>
                    </div>
                </div>
            </div>
            <?= $this->Html->meta(["property"=>"og:image","content"=>"https://devil-code.com/files/blogs/thumbnails/<?= sprintf('%010d', $top->id) ?>.webp"],null,["block"=>'meta']); ?>
        <?php endforeach; ?>
    </div>
</div>

<section class="blog ls-1">
    <div class="album bg-white pb-5">
        <div class="container">
            <div class="row mb-5 align">
                <h2>最近の記事</h2>
                <p>Lately posts</p>
            </div>
            <div class="row mb-2 px-3">
                <div class="col-xl-8 card-item pt-3 pt-md-0">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($news as $index => $new) : ?>
                            <li class="list-group-item mb-3 mb-md-0 pt-md-4">
                                <a href="/blogs/<?= h($new->blogs_category->category_label) ?>/<?= h($new->slug) ?>/">
                                    <div class="d-md-flex"  style="line-height: 30px;">
                                        <div class="d-flex">
                                            <span class="catTag me-3" style="background-color:<?= h($new->blogs_category->category_color) ?>;"><?= h($new->blogs_category->category_label) ?></span>
                                            <span class="me-3 text-muted" style="font-size: 12px;"><?= h($new->created->i18nFormat('yyyy.MM.dd')) ?></span>
                                        </div>
                                        <p class="mt-3 mt-md-0 flex-wrap-reverse"><?= h($new->title) ?></p>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row my-5">
            <h2>人気記事</h2>
            <p>Featured</p>
        </div>
        <div class="row mb-2 px-3 d-flex justify-content-between align">
            <?php foreach ($features as $index => $feature) : ?>
                <a href="/blogs/<?= h($feature->blogs_category->category_label) ?>/<?= h($feature->slug) ?>/" class="col-md-12 col-lg-4 mb-5 pe-lg-5 h-100">
                    <div class="row card-item overflow-hidden position-relative">
                        <div class="col-auto blog-img w-100" style="overflow:hidden; background-image:url('https://devil-code.com/files/blogs/thumbnails/<?= sprintf("%010d", $feature->id) ?>.webp'); background-position: center; background-size: contain; background-repeat: no-repeat; height: 180px;">
                        </div>
                        <span class="mb-2 catTag position-absolute" style="top: 32px; right: 16px; background-color:<?= h($feature->blogs_category->category_color) ?>;"><?= h($feature->blogs_category->category_label) ?></span>

                        <div class="col pb-4 px-4 d-flex flex-column position-relative" style="height: 180px;">
                            <h3 class="mt-3 mb-0 pb-5 fs-5 blog-ttl lh-base"><?= h($feature->title) ?></h3>
                            <div class="mt-3 w-100 text-muted d-flex justify-content-between align-items-center position-absolute" style="bottom: 24px;">
                                <span style="font-size: 12px;"><?= h($feature->created->i18nFormat('yyyy.MM.dd')) ?></span>
                                <span class="arrow"></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container">
        <div class="row my-5 d-flex">
            <div class="col-md-8 me-md-1">
                <h2>記事一覧</h2>
                <p class="mb-5">Posts</p>
                <?php foreach ($blogs as $index => $blog) : ?>
                    <a href="/blogs/<?= h($blog->blogs_category->category_label) ?>/<?= h($blog->slug) ?>/" class="pe-lg-5 h-100">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <h3 class="fs-5 fs-lg-4 blog-ttl lh-base"><?= h($blog->title) ?></h3>
                            <span class="catTag" style="background-color:<?= h($blog->blogs_category->category_color) ?>;"><?= h($blog->blogs_category->category_label) ?></span>
                        </div>
                        <div class="mb-4 text-muted"><span style="font-size: 12px;"><?= h($blog->created->i18nFormat('yyyy.MM.dd')) ?></div>
                        <p class="mb-5 text-muted text-break" style="font-weight:100;"><?= mb_substr(strip_tags($blog->body),0,120) ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="mt-5 col-md-3 h-100 px-md-5 sticky-top">
                <h5>カテゴリー</h5>
                <p>Category</p>
                <div class="category  mt-3 mb-5">
	                <?php foreach ($categories as $category) : ?>
	                    <a href="../blogs/<?= h($category->cat_label) ?>/" class="d-inline-block" style="font-size:<?= h(($category->cat_count) * 10) ?>px; font-weight:<?= h(10 * ($category->cat_count)) ?>"><?= h($category->cat_label) ?></a>
	                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container my-5 breadcrumbs-wrapper">
    <?= $this->Breadcrumbs->render() ?>
</div>
