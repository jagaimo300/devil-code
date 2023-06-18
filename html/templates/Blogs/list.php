<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blogs
 */

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
    '記事一覧',
    ['controller' => 'blogs', 'action' => 'list'],
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

$this->assign('title', 'devil-code(デビルコード) - ブログ - 記事一覧');
$this->assign('canonical', '<link rel="canonical" href="https://devil-code.com/blogs/list/?page=$page" />');

// 構造化データ
$structuredData = array(
    "@context" => "https://schema.org",
    "@type" => "ItemList"
);  

?>

<?= $this->Html->meta(["name"=>"description","content"=>"devil code(デビルコード) プログラミングやITの技術に関するブログの記事一覧です。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:title","content"=>"【devil code】ブログ記事一覧"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:type","content"=>"website"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:description","content"=>"devil code(デビルコード) プログラミングやITの技術に関するブログの記事一覧です。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:url","content"=>"https://devil-code.com"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:image","content"=>"https://devil-code.com/img/prof.webp"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:site_name","content"=>"devil code"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:locale","content"=>"ja_JP"],null,["block"=>'meta']); ?>

<section class="blog" style="min-height: 60vh;">
    <div class="container">
        <div class="row my-5 d-flex">
            <div class="col-md-8 me-md-1">
                <h2>記事一覧</h2>
                <p class="mb-5">Posts</p>
                <div class="d-flex align-items-center justify-content-between mb-5">
                    <p class="articleTotalCount mb-0"><?= $from; ?> 件から <?= $to; ?> 件を表示中（全 <?= $totalCount; ?> 件中）</p>
                    <ul class="page-links d-flex mb-0 ps-0">
                        <?php
                            if ($this->Paginator->hasPrev()){
                                echo $this->Paginator->prev(__('Previous'), [
                                    'templates' => [
                                        'prevActive' => '<li><a rel="prev" href="{{url}}">{{text}}</a></li>'
                                ]]);
                            }
                            echo $this->Paginator->numbers([
                                'templates' => [
                                    'number' => '<li class="ms-1"><a href="{{url}}">{{text}}</a></li>',
                                    'current' => '<li class="ms-1 active border-bottom border-dark"><a href="{{url}}">{{text}}</a></li>',
                                ],
                            ]);
                            if ($this->Paginator->hasNext()){
                                echo $this->Paginator->next(__('Next'), [
                                    'templates' => [
                                        'nextActive' => '<li class="ms-1"><a rel="next" href="{{url}}">{{text}}</a></li>'
                                ]]);
                            }
                        ?>
                    </ul>
                </div>

                <?php foreach ($blogs as $index => $blog) : ?>
                    <?php
                        // 動的に構造化データを生成
                        $index++;
                        $itemListElement[] = array(
                            "@type" => "ListItem",
                            "position" => $index,
                            "url" => BASE_URL . '/blogs/' . $blog->blogs_category->category_label . '/' . $blog->slug . '/',
                            "name"=> $blog->title
                        );
                    ?>
                    <a href="/blogs/<?= h($blog->blogs_category->category_label) ?>/<?= h($blog->slug) ?>/" class="pe-lg-5 h-100">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <h3 class="fs-5 fs-lg-4 blog-ttl lh-base"><?= h($blog->title) ?></h3>
                            <span class="catTag" style="background-color:<?= h($blog->blogs_category->category_color) ?>;"><?= h($blog->blogs_category->category_label) ?></span>
                        </div>
                        <div class="mb-4 text-muted"><span style="font-size: 12px;"><?= h($blog->created->i18nFormat('yyyy.MM.dd')) ?></div>
                        <p class="mb-5 text-muted text-break" style="font-weight:100;"><?= mb_substr(strip_tags($blog->body),0,120) ?></p>
                    </a>
                <?php endforeach; ?>
                <?php
                    // 動的に生成した構造化データを格納
                    $structuredData["itemListElement"] = $itemListElement;
                ?>
                <div class="paginator w-100 mb-5">
                    <ul class="pagination pagination-buttom d-flex justify-content-center mb-0 ps-0">
                        <?php
                            if ($this->Paginator->hasPrev()){
                                echo $this->Paginator->prev(__("«"), [
                                    'templates' => [
                                        'prevActive' => '<li><a rel="prev" href="{{url}}" aria-label="Previous"><span aria-hidden="true">{{text}}</span></a></li>'
                                ]]);
                            }
                            echo $this->Paginator->numbers([
                                'templates' => [
                                    'number' => '<li class="ms-3"><a href="{{url}}">{{text}}</a></li>',
                                    'current' => '<li class="ms-3 active current"><a href="{{url}}">{{text}}</a></li>',
                                ],
                            ]);
                            
                            if ($this->Paginator->hasNext()){
                                echo $this->Paginator->next(__("»"), [
                                    'templates' => [
                                        'nextActive' => '<li class="ms-3"><a rel="next" href="{{url}}" aria-label="Next"><span aria-hidden="true">{{text}}</span></a></li>'
                                ]]);
                            }
                        ?>
                    </ul>
                </div>
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
<script type="application/ld+json">
    <?= json_encode($structuredData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
</script>
