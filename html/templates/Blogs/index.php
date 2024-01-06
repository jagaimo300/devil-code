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

$this->assign('title', 'devil-code(デビルコード) - ブログ');
$this->assign('canonical', '<link rel="canonical" href="https://devil-code.com/blogs/" />');
?>
<?= $this->Html->css(['swiper-bundle.min.css'], ['block' => 'css']) ?>
<?= $this->Html->meta(["name"=>"description","content"=>"devil codeではプログラミングの技術メモや学習記録、ITのキャリアプランなどについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:title","content"=>"devil-code(デビルコード) - ブログ"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:type","content"=>"article"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:description","content"=>"devil codeではプログラミングの技術メモや学習記録、ITのキャリアプランなどについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:url","content"=>"https://devil-code.com/blogs/"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:site_name","content"=>"devil code"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:locale","content"=>"ja_JP"],null,["block"=>'meta']); ?>

<section class="p-blogs__lately">
    <div class="l-container l-container__common">
        <div class="p-blogs__sectionTitle">
           <h3 class="c-headingSize__2xl">Lately</h3>
           <span>最近の記事</span>
        </div>

        <div class="l-container__grid  l-container__grid-column3 p-blogs__articles">
            <?php foreach ($news as $index => $new) : ?>
                <article class="c-articleListCards">
                    <img itemprop="image" src="/files/blogs/thumbnails/<?= sprintf("%010d", $new->id); ?>.webp" alt="ブログ <?= h($new->title); ?>のサムネイル" width="1200" height="630">
                    <a href="/blogs/<?= h($new->blogs_category->slug) ?>/<?= h($new->slug) ?>/" tabindex="-1" class="c-articleListCards__link"></a>
                    <header class="c-articleListCards__header">
                        <a class="c-articleListCards__categoryLink" href="/blogs/<?= h($new->blogs_category->category_name) ?>/" tabidnex="1">
                            <div class="c-articleListCards__categoryName"><?= h($new->blogs_category->category_name) ?></div>
                        </a>
                        <span class="c-articleListCards__created"><time datetime="<?= $this->Time->format($new->created, 'yyyy-MM-dd\'T\'HH:mm:ssXXX'); ?>"><?= h($new->created->i18nFormat('yyyy-MM-dd')) ?></time></span>
                    </header>
                    <div class="c-articleListCards__titleContainer">
                        <h4 class="c-articleListCards__title"><a href="/blogs/<?= h($new->blogs_category->slug) ?>/<?= h($new->slug) ?>/"><?= h($new->title) ?></a></h4>
                    </div>
                    <footer class="c-articleListCards__footer">
                        <ul class="c-articleListCards__tags">
                            <!-- テンプレート内のループ -->
                            <?php if(isset($blogTags[$new->id])): ?>
                                <?php foreach ($blogTags[$new->id] as $index => $blogTag) : ?>
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
    </div>

    <div class="l-container c-viewMore">
        <a class=" c-viewMore__link" href="/blogs/list/">ブログをもっと見る</a>
    </div>
</section>

<section class="p-blogs__cs">
    <div class="l-container l-container__common">
        <div class="p-blogs__sectionTitle">
           <h3 class="c-headingSize__2xl">Computer Science</h3>
           <span>コンピューターサイエンス</span>
        </div>

        <div class="l-container__grid  l-container__grid-column3 p-blogs__articles">
            <?php foreach ($cs_posts as $index => $cs_post) : ?>
                <article class="c-articleListCards">
                    <img itemprop="image" src="/files/blogs/thumbnails/<?= sprintf("%010d", $cs_post->id); ?>.webp" alt="ブログ <?= h($cs_post->title); ?>のサムネイル" width="1200" height="630">
                    <a href="/blogs/<?= h($cs_post->blogs_category->slug) ?>/<?= h($cs_post->slug) ?>/" tabindex="-1" class="c-articleListCards__link"></a>
                    <header class="c-articleListCards__header">
                        <a class="c-articleListCards__categoryLink" href="/blogs/<?= h($cs_post->blogs_category->category_name) ?>/" tabidnex="1">
                            <div class="c-articleListCards__categoryName"><?= h($cs_post->blogs_category->category_name) ?></div>
                        </a>
                        <span class="c-articleListCards__created"><time datetime="<?= $this->Time->format($cs_post->created, 'yyyy-MM-dd\'T\'HH:mm:ssXXX'); ?>"><?= h($cs_post->created->i18nFormat('yyyy-MM-dd')) ?></time></span>
                    </header>
                    <div class="c-articleListCards__titleContainer">
                        <h4 class="c-articleListCards__title"><a href="/blogs/<?= h($cs_post->blogs_category->slug) ?>/<?= h($cs_post->slug) ?>/"><?= h($cs_post->title) ?></a></h4>
                    </div>
                    <footer class="c-articleListCards__footer">
                        <ul class="c-articleListCards__tags">
                            <!-- テンプレート内のループ -->
                            <?php if(isset($csBlogTags[$cs_post->id])): ?>
                                <?php foreach ($csBlogTags[$cs_post->id] as $index => $blogTag) : ?>
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
    </div>

    <div class="l-container c-viewMore">
        <a class=" c-viewMore__link" href="/blogs/computer-science/">CSに関する記事をもっと見る</a>
    </div>
</section>

<section class="p-blogs__life">
    <div class="l-container l-container__common">
        <div class="p-blogs__sectionTitle">
           <h3 class="c-headingSize__2xl">Everyday Life</h3>
           <span>日常</span>
        </div>

        <div class="l-container__grid  l-container__grid-column3 p-blogs__articles">
            <?php foreach ($life_posts as $index => $life_post) : ?>
                <article class="c-articleListCards">
                    <img itemprop="image" src="/files/blogs/thumbnails/<?= sprintf("%010d", $life_post->id); ?>.webp" alt="ブログ <?= h($life_post->title); ?>のサムネイル" width="1200" height="630">
                    <a href="/blogs/<?= h($life_post->blogs_category->slug) ?>/<?= h($life_post->slug) ?>/" tabindex="-1" class="c-articleListCards__link"></a>
                    <header class="c-articleListCards__header">
                        <a class="c-articleListCards__categoryLink" href="/blogs/<?= h($life_post->blogs_category->category_name) ?>/" tabidnex="1">
                            <div class="c-articleListCards__categoryName"><?= h($life_post->blogs_category->category_name) ?></div>
                        </a>
                        <span class="c-articleListCards__created"><time datetime="<?= $this->Time->format($life_post->created, 'yyyy-MM-dd\'T\'HH:mm:ssXXX'); ?>"><?= h($life_post->created->i18nFormat('yyyy-MM-dd')) ?></time></span>
                    </header>
                    <div class="c-articleListCards__titleContainer">
                        <h4 class="c-articleListCards__title"><a href="/blogs/<?= h($life_post->blogs_category->slug) ?>/<?= h($life_post->slug) ?>/"><?= h($life_post->title) ?></a></h4>
                    </div>
                    <footer class="c-articleListCards__footer">
                        <ul class="c-articleListCards__tags">
                            <!-- テンプレート内のループ -->
                            <?php if(isset($lifeBlogTags[$life_post->id])): ?>
                                <?php foreach ($lifeBlogTags[$life_post->id] as $index => $blogTag) : ?>
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
    </div>

    <div class="l-container c-viewMore">
        <a class=" c-viewMore__link" href="/blogs/everyday-life/">日常に関する記事をもっと見る</a>
    </div>
</section>

<div class="container my-5 breadcrumbs-wrapper">
    <?= $this->Breadcrumbs->render() ?>
</div>
