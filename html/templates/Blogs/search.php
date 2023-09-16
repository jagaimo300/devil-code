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
    '「' . $q . '」の検索結果',
    ['controller' => 'blogs', 'action' => 'search'],
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

$this->assign('title', 'devil-code(デビルコード) - ブログ - 「'. $q . '」の検索結果');

if(!$blog_count){
    echo $this->Html->meta(["name"=>"robots","content"=>"noindex"],null,["block"=>'meta']);
}else{
        // 構造化データ
    $structuredData = array(
        "@context" => "https://schema.org",
        "@type" => "ItemList"
    );  
}
?>

<?= $this->Html->meta(["name"=>"description","content"=>"devil code(デビルコード)ではプログラミングの技術メモや学習記録、ITのキャリアプランや就職などについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:title","content"=>"【devil code】デビルコード プログラミングと情報技術"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:type","content"=>"article"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:description","content"=>"devil code(デビルコード)ではプログラミングの技術メモや学習記録、ITのキャリアプランや就職などについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:url","content"=>"https://devil-code.com"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:image","content"=>"https://devil-code.com/img/prof.webp"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:site_name","content"=>"devil code"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:locale","content"=>"ja_JP"],null,["block"=>'meta']); ?>

<section class="blog" style="min-height: 60vh;">
    <div class="container">
        <div class="row my-5 d-flex">
            <div class="col-md-8 me-md-1">
                <?php if ($blog_count) :?>
                    <h2 class="mb-5">「<?= h($q) ?>」の検索結果 <?= h($blog_count) ?>件</h2>
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
                <?php else: ?>
                    <h2 class="mb-5">「<?= h($q) ?>」の検索結果 <?= h($blog_count) ?>件</h2>
                    <div class="d-flex justify-content-between align-items-center">
                        「<?= h($q) ?>」に一致する記事は見つかりませんでした。
                    </div>
                <?php endif;?>
            </div>
            <div class="mt-5 col-md-3 h-100 px-md-5 sticky-top category_tagWrapper">
                <h5>カテゴリー</h5>
                <span>Category</span>
                <ul class="mt-3 mt-3 p-0 categories">
                    <?php foreach ($categories as $category) : ?>
                        <li class="categoryLink d-inline-block">
                            <a class="d-inline-block" href="../../<?= h($category->cat_label) ?>/"><?= h($category->cat_label) ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container my-5 breadcrumbs-wrapper">
    <?= $this->Breadcrumbs->render() ?>
</div>
