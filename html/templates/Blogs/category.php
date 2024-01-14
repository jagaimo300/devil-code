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

<section class="p-blogsCategory">
    <div class="l-container l-container__common">
        <div class="p-blogs__sectionTitle">
           <h3 class="c-headingSize__2xl">Computer Science</h3>
           <span>コンピューターサイエンス</span>
        </div>

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
    </div>

    <div class="l-container c-viewMore">
        <ul class="p-blogsCategory__categoryLinks">
            <?php foreach ($categories as $category) : ?>

                <?php
                // Get the current URL path
                $currentUrl = $this->request->getPath();

                // Check if the current URL matches the tag's slug
                $isActive = ($currentUrl === '/blogs/' . h($category->cat_label) . '/');
                ?>
                <li class="p-blogsCategory__categoryLinks-item">
                    <a class="p-blogsCategory__categoryLinks-link <?= $isActive ? 'active' : '' ?>" href="/blogs/<?= h($category->cat_label) ?>/"><?= h($category->cat_name) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <ul class="p-blogsCategory__tagLinks">
            <?php foreach ($tags as $tag) : ?>
                <?php
                // Get the current URL path
                $currentUrl = $this->request->getPath();
                // Check if the current URL matches the tag's slug
                $isActive = ($currentUrl === '/blogs/' . h($tag->slug) . '/');
                ?>
                <li class="p-blogsCategory__tagLinks-item">
                    <a class="p-blogsCategory__tagLinks-link <?= $isActive ? 'active' : '' ?>" href="/blogs/<?= h($tag->slug) ?>/"><?= h($tag->tag_name) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<div class="container my-5 breadcrumbs-wrapper">
    <?= $this->Breadcrumbs->render() ?>
</div>

