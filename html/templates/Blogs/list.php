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
$this->assign('canonical', '<link rel="canonical" href="https://devil-code.com/blogs/list/?page=' . $page . '" />');

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

<section class="p-blogs__lately">
    <div class="l-container l-container__common">
        <div class="p-blogs__sectionTitle">
           <h3 class="c-headingSize__2xl">Article list</h3>
           <span>記事一覧</span>
        </div>

        <div class="l-container__grid  l-container__grid-column3 p-blogs__articles">
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
                <article class="c-articleListCards">
                    <img itemprop="image" src="/files/blogs/thumbnails/<?= sprintf("%010d", $blog->id); ?>.webp" alt="ブログ <?= h($blog->title); ?>のサムネイル" width="1200" height="630">
                    <a href="/blogs/<?= h($blog->blogs_category->slug) ?>/<?= h($blog->slug) ?>/" tabindex="-1" class="c-articleListCards__link"></a>
                    <header class="c-articleListCards__header">
                        <a class="c-articleListCards__categoryLink" href="/blogs/<?= h($blog->blogs_category->category_name) ?>/" tabidnex="1">
                            <div class="c-articleListCards__categoryName"><?= h($blog->blogs_category->category_name) ?></div>
                        </a>
                        <span class="c-articleListCards__created"><time datetime="<?= $this->Time->format($blog->created, 'yyyy-MM-dd\'T\'HH:mm:ssXXX'); ?>"><?= h($blog->created->i18nFormat('yyyy-MM-dd')) ?></time></span>
                    </header>
                    <div class="c-articleListCards__titleContainer">
                        <h4 class="c-articleListCards__title"><a href="/blogs/<?= h($blog->blogs_category->slug) ?>/<?= h($blog->slug) ?>/"><?= h($blog->title) ?></a></h4>
                    </div>
                    <footer class="c-articleListCards__footer">
                        <ul class="c-articleListCards__tags">
                            <!-- テンプレート内のループ -->
                            <?php if(isset($blogTags[$blog->id])): ?>
                                <?php foreach ($blogTags[$blog->id] as $index => $blogTag) : ?>
                                <li>
                                    <a href="/blogs/<?= $blogTag["tag_slug"]; ?>/">
                                        <?= $blogTag["tag_name"]; ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </footer>
                </article>
            <?php endforeach; ?>
            <?php
                // 動的に生成した構造化データを格納
                $structuredData["itemListElement"] = $itemListElement;
            ?>
          </div>
    </div>

    <div class="l-container c-viewMore">
        <ul class="c-pagination">
            <?php
                if ($this->Paginator->hasPrev()) {
                    echo $this->Paginator->prev(__('Previous'), [
                        'templates' => [
                            'prevActive' => '<li class="c-pagination__item"><a class="c-pagination__link prev" rel="prev" href="{{url}}"></a></li>'
                    ]]);
                }

                echo $this->Paginator->numbers([
                    'templates' => [
                        'number' => '<li class="c-pagination__item"><a class="c-pagination__link number" href="{{url}}">{{text}}</a></li>',
                        'current' => '<li class="c-pagination__item"><a class="c-pagination__link number active" gref="{{url}}">{{text}}</a></li>',
                    ],
                ]);

                if ($this->Paginator->hasNext()) {
                    echo $this->Paginator->next(__('Next'), [
                        'templates' => [
                            'nextActive' => '<li class="c-paginationa__item"><a class="c-pagination__link next" rel="next" href="{{url}}"></a></li>'
                    ]]);
                }
            ?>
        </ul>
    </div>
</section>

<!--
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
-->
<div class="container my-5 breadcrumbs-wrapper">
    <?= $this->Breadcrumbs->render() ?>
</div>
<script type="application/ld+json">
    <?= json_encode($structuredData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
</script>
