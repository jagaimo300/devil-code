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
    '「' . $q . '」の検索結果',
    false
);

$this->Breadcrumbs->setTemplates([
    'wrapper' => '<nav class="c-breadcrumb l-container l-container__common" aria-label="breadcrumb"{{attrs}} ><ol class="c-breadcrumb__list" itemscope itemtype="https://schema.org/BreadcrumbList">{{content}}</ol></nav>',
    'item' => '<li class="c-breadcrumb__item"{{attrs}}  itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="{{url}}"{{innerAttrs}} class="{{active}}"><span itemprop="name">{{title}}</span></a><meta itemprop="position" content="{{num}}" />
               </li>',
    'itemWithoutLink' => '<li class="c-breadcrumb__item active"{{attrs}}>{{title}}</li>',
]);

$this->assign('title', 'devil-code(デビルコード) - ブログ - 「'. $q . '」の検索結果');

?>

<?= $this->Html->meta(["name"=>"description","content"=>"devil code(デビルコード)ではプログラミングの技術メモやコンピューターサイエンス学習ついてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:title","content"=>"【devil code】デビルコード プログラミングと情報技術"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:type","content"=>"article"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:description","content"=>"devil code(デビルコード)ではプログラミングの技術メモやコンピューターサイエンス学習ついてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:url","content"=>"https://devil-code.com"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:image","content"=>"https://devil-code.com/img/prof.webp"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:site_name","content"=>"devil code"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:locale","content"=>"ja_JP"],null,["block"=>'meta']); ?>

<style>
    header form {
        display: none;
    }
</style>
<section class="p-blogsSearch">
    <div class="l-container l-container__common">
        <div class="p-blogs__sectionTitle">
        <h3 class="c-headingSize__2xl">Blog Search</h3>
           <span>記事検索</span>
        </div>
        <form method="get" accept-charset="utf-8" id="searchFormSmart" class="c-searchFormSmart p-blogsSearch__form" role="search" aria-label="Search Articles" action="/blogs/search" style="display: block;">
                <label class="c-searchFormSmart__searchBox-label" for="input-search-form-desktop">
                    <svg class="c-searchFormSmart__searchBox-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><path fill="#8f9faa" stroke-miterlimit="10" d="M27 9C17.075 9 9 17.075 9 27s8.075 18 18 18c4.13 0 7.926-1.413 10.967-3.76l13.082 13.082a2.315 2.315 0 1 0 3.273-3.273L41.24 37.967C43.587 34.927 45 31.129 45 27c0-9.925-8.075-18-18-18zm0 4c7.719 0 14 6.281 14 14s-6.281 14-14 14-14-6.281-14-14 6.281-14 14-14z" font-family="none" font-size="none" font-weight="none" style="mix-blend-mode:normal" text-anchor="none" transform="scale(4)"></path></svg>
                </label>
                <input type="search" name="q" placeholder="Search" id="toggleSmartSearch" class="c-searchFormSmart__searchBox" value="<?= h($q); ?>">
        </form>

            <?php if($posts['blogCount']): ?>
                <div class="l-container__grid  l-container__grid-column3 p-blogs__articles">
                    <?php foreach ($posts['blogs'] as $index => $post) : ?>
                        <article class="c-articleListCards">
                            <img itemprop="image" src="/files/blogs/thumbnails/<?= sprintf("%010d", $post->id); ?>.webp" alt="ブログ <?= h($post->title); ?>のサムネイル" width="1200" height="630">
                            <a href="/blogs/<?= h($post->blogs_category->slug) ?>/<?= h($post->slug) ?>/" tabindex="-1" class="c-articleListCards__link"></a>
                            <header class="c-articleListCards__header">
                                <a class="c-articleListCards__categoryLink" href="/blogs/<?= h($post->blogs_category->category_name) ?>/" tabidnex="1">
                                    <div class="c-articleListCards__categoryName"><?= h($post->blogs_category->category_name) ?></div>
                                </a>
                                <span class="c-articleListCards__created"><time datetime="<?= $this->Time->format($post->created, 'yyyy-MM-dd\'T\'HH:mm:ssXXX'); ?>"><?= h($post->created->i18nFormat('yyyy-MM-dd')) ?></time></span>
                            </header>
                            <div class="c-articleListCards__titleContainer">
                                <h4 class="c-articleListCards__title"><a href="/blogs/<?= h($post->blogs_category->slug) ?>/<?= h($post->slug) ?>/"><?= h($post->title) ?></a></h4>
                            </div>
                            <footer class="c-articleListCards__footer">
                                <ul class="c-articleListCards__tags">
                                    <!-- テンプレート内のループ -->
                                    <?php if(isset($posts['blogTags'][$post->id])): ?>
                                        <?php foreach ($posts['blogTags'][$post->id] as $index => $blogTag) : ?>
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
                </div>
            <?php else: ?>
                <div class="p-blogsSearch__notFound">
                    <?= h($q); ?>に関する記事が見つかりませんでした。
                </div>
            <?php endif; ?>
    </div>
</section>

<?= $this->Breadcrumbs->render() ?>
