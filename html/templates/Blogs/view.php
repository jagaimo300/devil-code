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
    'ブログ',
    ['controller' => 'blogs', 'action' => 'index'],
    [
        'templateVars' => [
            'num' => '2'
        ]
    ]
);

$this->Breadcrumbs->add(
    'カテゴリー（' . $cat . ')',
    ['controller' => 'blogs', 'action' => $cat],
    [
        'templateVars' => [
            'num' => '3'
        ]
    ]
);

$this->Breadcrumbs->add(
    "${slug}",
    ['controller' => 'blogs', 'action' => 'index'],
    [
        'templateVars' => [
            'num' => '4',
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

?>

<?php foreach ($blogs as $index => $blog) : ?>
    <?php 
        $create_date = new \DateTime($blog->created, new \DateTimeZone('Asia/Tokyo'));
        $created_iso8601 = $create_date->format('Y-m-d\TH:i:s') . '+09:00';

        $modify_date = new \DateTime($blog->modified, new \DateTimeZone('Asia/Tokyo'));
        $modified_iso8601 = $modify_date->format('Y-m-d\TH:i:s') . '+09:00';
        $this->assign('title', $blog->title . '| devil code(デビルコード)');
        $this->assign('canonical', '<link rel="canonical" href="https://devil-code.com/blogs/' . $blog->blogs_category->category_label . '/' .$blog->slug . '/"' . ' />');
        // description
        $this->Html->meta(["name"=>"description","content"=>"$blog->description"],null,["block"=>'meta']);
        // ogp
        $this->Html->meta(["property"=>"og:title","content"=>"$blog->title | devil code(デビルコード)"],null,["block"=>'meta']);
        $this->Html->meta(["property"=>"og:type","content"=>"article"],null,["block"=>'meta']);
        $this->Html->meta(["property"=>"og:description","content"=>"$blog->description"],null,["block"=>'meta']);
        $this->Html->meta(["property"=>"og:url","content"=>"https://devil-code.com"],null,["block"=>'meta']);
        $this->Html->meta(["property"=>"og:image","content"=>"https://devil-code.com/files/blogs/thumbnails/" . sprintf('%010d', $blog->id) . ".webp"],null,["block"=>'meta']);
        $this->Html->meta(["property"=>"og:site_name","content"=>"devil code"],null,["block"=>'meta']);
        $this->Html->meta(["property"=>"og:locale","content"=>"ja_JP"],null,["block"=>'meta']);


    ?>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "BlogPosting",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://devil-code.com/blogs/<?= h($blog->blogs_category->category_label) ?>/<?= h($blog->slug) ?>/"
            },
            "headline": "<?= h($blog->title) ?>",
            "image": ["https://devil-code.com/files/blogs/thumbnails/<?= sprintf("%010d", $blog->id) ?>.webp"],
            "datePublished": "<?=  h($created_iso8601) ?>",
            "dateModified": "<?=  h($modified_iso8601) ?>",
            "author": {
                "@type": "Person",
                "name": "Takahiro Ueda",
                "url": "http://devil-code.com"
            },
            "publisher": {
                "@type": "Organization",
                "name": "devil code",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://devil-code.com/img/brand-icon.png"
                }
            },
            "description": "<?= h($blog->description) ?>"
        }
    </script>
<?php endforeach; ?>

<div class="blog ls-1" style="min-height: 150vh;">
    <div class="container">
        <div class="row">
            <?php foreach ($blogs as $index => $blog) : ?>
                <article class="col-12 col-md-9" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                    <section class="blog_meta mb-2">
                        <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                            <style type="text/css">
                                .st0{fill:#4B4B4B;}
                            </style>
                            <g>
                                <path class="st0" d="M149.193,103.525c15.994,0,28.964-12.97,28.964-28.973V28.964C178.157,12.97,165.187,0,149.193,0
                                    C133.19,0,120.22,12.97,120.22,28.964v45.589C120.22,90.555,133.19,103.525,149.193,103.525z" style="fill: rgb(75, 75, 75);"></path>
                                <path class="st0" d="M362.815,103.525c15.995,0,28.964-12.97,28.964-28.973V28.964C391.78,12.97,378.81,0,362.815,0
                                    c-16.002,0-28.972,12.97-28.972,28.964v45.589C333.843,90.555,346.813,103.525,362.815,103.525z" style="fill: rgb(75, 75, 75);"></path>
                                <path class="st0" d="M435.164,41.287h-17.925v33.265c0,30.017-24.415,54.432-54.423,54.432c-30.017,0-54.431-24.415-54.431-54.432
                                    V41.287H203.615v33.265c0,30.017-24.414,54.432-54.422,54.432c-30.016,0-54.432-24.415-54.432-54.432V41.287H76.836
                                    c-38.528,0-69.763,31.234-69.763,69.763v331.187C7.073,480.765,38.309,512,76.836,512h358.328
                                    c38.528,0,69.763-31.235,69.763-69.763V111.05C504.927,72.522,473.691,41.287,435.164,41.287z M450.023,429.988
                                    c0,17.826-14.503,32.329-32.329,32.329H94.306c-17.826,0-32.329-14.503-32.329-32.329V170.876h388.047V429.988z" style="fill: rgb(75, 75, 75);"></path>
                                <rect x="190.729" y="371.769" class="st0" width="51.191" height="51.192" style="fill: rgb(75, 75, 75);"></rect>
                                <rect x="190.729" y="292.419" class="st0" width="51.191" height="51.19" style="fill: rgb(75, 75, 75);"></rect>
                                <rect x="111.386" y="371.769" class="st0" width="51.19" height="51.192" style="fill: rgb(75, 75, 75);"></rect>
                                <rect x="111.386" y="292.419" class="st0" width="51.19" height="51.19" style="fill: rgb(75, 75, 75);"></rect>
                                <rect x="349.423" y="213.067" class="st0" width="51.19" height="51.191" style="fill: rgb(75, 75, 75);"></rect>
                                <rect x="270.08" y="213.067" class="st0" width="51.199" height="51.191" style="fill: rgb(75, 75, 75);"></rect>
                                <rect x="270.08" y="292.419" class="st0" width="51.199" height="51.19" style="fill: rgb(75, 75, 75);"></rect>
                                <rect x="349.423" y="371.769" class="st0" width="51.19" height="51.192" style="fill: rgb(75, 75, 75);"></rect>
                                <rect x="349.423" y="292.419" class="st0" width="51.19" height="51.19" style="fill: rgb(75, 75, 75);"></rect>
                                <rect x="270.08" y="371.769" class="st0" width="51.199" height="51.192" style="fill: rgb(75, 75, 75);"></rect>
                                <rect x="190.729" y="213.067" class="st0" width="51.191" height="51.191" style="fill: rgb(75, 75, 75);"></rect>
                                <rect x="111.386" y="213.067" class="st0" width="51.19" height="51.191" style="fill: rgb(75, 75, 75);"></rect>
                            </g>
                        </svg>
                        <time itemprop="datePublished" class="text-muted d-inline-block ms-1" style="font-size: 12px;"><?= h($blog->created->i18nFormat('yyyy/MM/dd')) ?></time>
    
                        <?php if($blog->created->i18nFormat('yyyy/MM/dd') !== $blog->modified->i18nFormat('yyyy/MM/dd')): ?>
                            <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="margin-left:8px; width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                            <style type="text/css">
                                .st0{fill:#4B4B4B;}
                            </style>
                            <g>
                                <path class="st0" d="M403.925,108.102c-27.595-27.595-62.899-47.558-102.459-56.29L304.182,0L201.946,53.867l-27.306,14.454
                                    l-5.066,2.654l8.076,4.331l38.16,20.542l81.029,43.602l2.277-42.859c28.265,7.546,53.438,22.53,73.623,42.638
                                    c29.94,29.939,48.358,71.119,48.358,116.776c0,23.407-4.843,45.58-13.575,65.687l40.37,17.532
                                    c11.076-25.463,17.242-53.637,17.242-83.219C465.212,198.306,441.727,145.904,403.925,108.102z" style="fill: rgb(75, 75, 75);"></path>
                                <path class="st0" d="M296.256,416.151l-81.101-43.612l-2.272,42.869c-28.26-7.555-53.51-22.53-73.618-42.636
                                    c-29.945-29.95-48.364-71.12-48.364-116.767c0-23.427,4.844-45.522,13.576-65.697l-40.37-17.531
                                    c-11.076,25.53-17.242,53.723-17.242,83.228c0,57.679,23.407,110.157,61.21,147.893c27.595,27.594,62.899,47.548,102.453,56.202
                                    l-2.716,51.9l102.169-53.878l27.455-14.454l4.988-2.643l-7.999-4.332L296.256,416.151z" style="fill: rgb(75, 75, 75);"></path>
                            </g>
                            </svg>
                            <time itemprop="dateModified" class="text-muted d-inline-block ms-1" style="font-size: 12px;"><?= h($blog->modified->i18nFormat('yyyy/MM/dd')) ?></time>
                        <?php endif; ?>
    
                        <a href="../../<?= h($blog->blogs_category->category_label) ?>/"><span class="catTag d-inline-block ms-0 ms-md-2 mt-1 mb-1 mt-md-0 mb-md-0 ps-2" style="background-color: <?= h($blog->blogs_category->category_color) ?>;"><?= h($blog->blogs_category->category_label) ?></span></a>
                    </section>
                    <section class="blog_title mt-0 mb-7 text-break">
                        <h1 itemprop="name headline" class="blog_title-heading text-wrap m-0"><?= h($blog->title) ?></h1>
                    </section>
                    <section class="blog_thumbnail mt-0 mb-7">
                        <figure class="blog_thumbnailWrapper">
                            <span>
                                <img itemprop="image" src="/files/blogs/thumbnails/<?= sprintf("%010d", $blog->id) ?>.webp" alt="ブログ <?= h($blog->title) ?>のサムネイル" width="1200" height="630" style="width: 100%; height: auto;">
                            </span>
                        </figure>
                    </section>
                    <section class="blogIndexWrapper text-break w-70">
                        <div class="accordion-item border pb-3" style="max-width: 720px;">
                            <h2 class="accordion-header border-0 border-bottom mx-auto" id="panelsStayOpen-headingOne" style="width:128px;">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                目次
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                            <ol id="blogIndexWrapper-list" class="blogIndexWrapper-list">
                                <!-- Cleate elements using JavaSctipt -->
                            </ol>
                            </div>
                            </div>
                        </div>
                    </section>
                    <section itemprop="articleBody" id="blogBody" class="blog_body my-7 pe-3 pe-md-0 text-break ls-1">
                        <?= $blog->body ?>
                    </section>
                </article>
                <?php endforeach; ?>

                <aside class="col-12 col-md-3">
                        <div class="sticky-top" style="z-index: 1;">
                            <div class="mt-5 category_tagWrapper">
                                <h5>他のカテゴリー</h5>
                                <span>Category</span>
                                <ul class="mt-3 mt-3 p-0 categories">
                                    <?php foreach ($categories as $category) : ?>
                                        <li class="categoryLink d-inline-block">
                                            <a class="d-inline-block" href="../../<?= h($category->cat_label) ?>/"><?= h($category->cat_label) ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php if (!empty($relations)) : ?>
                                <div class="mt-5 related_tagWrapper">
                                    <h5>関連記事</h5>
                                    <span>Related posts</span>
                                    <ul class="mt-1 p-0">
                                        <?php foreach ($relations as $relation) : ?>
                                            <li class="mt-3 d-flex flex-column">
                                                <div class="relatedLinks_image imgarea border">
                                                    <a class="d-inline-block" href="../../<?= h($relation->blogs_category->category_label) ?>/<?= h($relation->slug) ?>/"><img src="/files/blogs/thumbnails/<?= sprintf("%010d", $relation->id) ?>.webp" width="120" height="80" alt="<?= h($relation->title) ?>" style="display: inlne-blcok;"></a>
                                                </div>
                                                <div class="textarea">
                                                    <div class="created_date text-muted mt-1" style="font-size: 14px;"><?= h($relation->created->i18nFormat('yyyy.MM.dd')) ?></div>
                                                    <div class="categoryLinks_title mt-1"><a href="../../<?= h($relation->blogs_category->category_label) ?>/<?= h($relation->slug) ?>/"><?= h($relation->title) ?></a></div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    
                                    <div class="mt-2 text-end">
                                        <a href="../../<?= $cat ?>" class="view-all">もっと見る</a>
                                    </div>
                                </div>                            
                            <?php endif; ?>
                        </div>
                </aside>
        </div>
    </div>
</div>
<div class="container my-5 breadcrumbs-wrapper">
    <?= $this->Breadcrumbs->render() ?>
</div>
<script type="text/javascript">

    const bodyText = document.getElementById('blogBody');
    const targetTags = bodyText.querySelectorAll('h1, h2, h3, h4, h5, b, img');
    const blogIndexList = document.getElementById('blogIndexWrapper-list');

    let bigHeadingIndex = 0;
    let headingIndex = 0;
    let boldIndex = 0;
    for(let i = 0; i < targetTags.length; i++){

        if(targetTags[i].outerHTML.match(/h1|h2|h3|h4|h5/gi)) {
            bigHeadingIndex++;
            headingIndex++;
            targetTags[i].setAttribute('id',`targetHeading${headingIndex}`);
            targetTags[i].classList.add('tgt-elm');
            blogIndexList.insertAdjacentHTML('beforeend',`<li class="blogIndexWrapper-listItem list-large mb-3"><a class="blogIndexWrapper-listItem_heading" href="#targetHeading${headingIndex}">${bigHeadingIndex}. ${targetTags[i].innerText}</a></li>`);
        }else if(targetTags[i].outerHTML.match(/img/gi)) {
            targetTags[i].outerHTML = `<a href="${targetTags[i].src}">${targetTags[i].outerHTML}</a>`;
        }
    }
</script>
<?= $this->Html->script(['run_pretty'],['defer']) ?>
<?= $this->Html->script(['bootstrap.bundle.min'],['defer']) ?>