
<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blogs
 */

$this->Breadcrumbs->add(
    'Home',
    ['controller' => '/', 'action' => '/'],
    [
        'templateVars' => [
            'num' => '1'
        ]
    ]
);
$this->Breadcrumbs->add(
    'サイトマップ',
    false
);

$this->Breadcrumbs->setTemplates([
    'wrapper' => '<nav class="c-breadcrumb l-container l-container__common" aria-label="breadcrumb"{{attrs}} ><ol class="c-breadcrumb__list" itemscope itemtype="https://schema.org/BreadcrumbList">{{content}}</ol></nav>',
    'item' => '<li class="c-breadcrumb__item"{{attrs}}  itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="{{url}}"{{innerAttrs}} class="{{active}}"><span itemprop="name">{{title}}</span></a><meta itemprop="position" content="{{num}}" />
               </li>',
    'itemWithoutLink' => '<li class="c-breadcrumb__item active"{{attrs}}>{{title}}</li>',
]);


$this->assign('title', 'サイトマップ');
$this->assign('canonical', '<link rel="canonical" href="https://devil-code.com/sitemaps/" />');
$is_exits[] = ''
?>

<?= $this->Html->meta(["name"=>"description","content"=>"devil code(デビルコード)ではプログラミングの技術メモや学習記録、ITのキャリアプランや就職などについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:title","content"=>"【devil code】デビルコード プログラミングと情報技術"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:type","content"=>"article"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:description","content"=>"devil code(デビルコード)ではプログラミングの技術メモや学習記録、ITのキャリアプランや就職などについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:url","content"=>"https://devil-code.com"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:image","content"=>"https://devil-code.com/img/prof.jpg"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:site_name","content"=>"devil code"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:locale","content"=>"ja_JP"],null,["block"=>'meta']); ?>

<section class="p-sitemap">
    <div class="l-container l-container__common">
        <div class="p-blogs__sectionTitle">
        <h2 class="c-headingSize__2xl">Sitemap</h2>
           <span>サイトマップ</span>
        </div>
        <div class="c-articleView p-sitemap__view">
            <div class="c-articleView__content">
                <article class="c-articleView__main">
                    <div class="l-container l-container__common">


                        <h3 class="c-headingSize__md">Articles</h3>
                        <ul class="p-sitemap__list">
                            <?php foreach ($blogs as $index => $blog) : ?>
                                <li class="p-sitemap__list-item">
                                    <a href="/blogs/<?= h($blog->blogs_category->slug) ?>/<?= h($blog->slug) ?>/"><?= h($blog->title) ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <h3 class="c-headingSize__md">Pages</h3>

                        <ul class="p-sitemap__list">
                                <li class="p-sitemap__list-item">
                                    <a href="/">サイトTOP</a>
                                </li>
                                <li class="p-sitemap__list-item">
                                    <a href="/blogs/">ブログTOP</a>
                                </li>
                                <li class="p-sitemap__list-item">
                                    <a href="/blogs/list/">ブログ一覧</a>
                                </li>
                                <li class="p-sitemap__list-item">
                                    <a href="/blogs/site-policy/">サイトポリシー</a>
                                </li>
                                <li class="p-sitemap__list-item">
                                    <a href="/blogs/contact/">お問い合わせ</a>
                                </li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<?= $this->Breadcrumbs->render() ?>
