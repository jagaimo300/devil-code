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
    'カテゴリー（' . $cat . '）',
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

$this->assign('title', ' - Blog - ' . $cat . '-' . $slug);
?>

<?php foreach ($blogs as $index => $blog) : ?>

    <?php 
        $create_date = new \DateTime($blog->created, new \DateTimeZone('Asia/Tokyo'));
        $create_date->setTimezone( new \DateTimeZone('UTC'));
        $created_iso8601 = $create_date->format('Y-m-d\TH:i:s') . 'Z';

        $modify_date = new \DateTime($blog->modified, new \DateTimeZone('Asia/Tokyo'));
        $modify_date->setTimezone( new \DateTimeZone('UTC'));
        $modified_iso8601 = $modify_date->format('Y-m-d\TH:i:s') . 'Z';
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
            "image": ["https://devil-code.com/files/blogs/thumbnails/<?= sprintf("%010d", $blog->id) ?>.jpg"],
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
                <article class="col-12 col-md-9">
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
                        <time class="text-muted d-inline-block ms-1" style="font-size: 12px;"><?= h($blog->created->i18nFormat('yyyy.MM.dd')) ?></time>
                        <span class="catTag d-inline-block ms-2 ps-2" style="background-color: <?= h($blog->blogs_category->category_color) ?>;"><?= h($blog->blogs_category->category_label) ?></span>
                    </section>
                    <section class="blog_title mt-0 mb-7 text-break">
                        <h1 class="blog_title-heading text-wrap m-0" style="font-size: 32px;"><?= h($blog->title) ?></h1>
                    </section>
                    <section class="blog_thumbnail mt-0 mb-7">
                        <figure class="blog_thumbnailWrapper">
                            <span itemprop="image">
                                <img src="/files/blogs/thumbnails/<?= sprintf("%010d", $blog->id) ?>.jpg" alt="ブログ <?= h($blog->title) ?>のサムネイル" width="100%" height="auto" style="max-width: 100%;">
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
                    <section id="blogBody" class="blog_body my-7 pe-3 pe-md-0 text-break ls-1">
                        <?= $blog->body ?>
                    </section>
                </article>
                <?php endforeach; ?>

                <aside class="col-12 col-md-3">
                        <div class="sticky-top" style="z-index: 1;">
                            <div class="mt-5 category_tagWrapper">
                                <h5>カテゴリー</h5>
                                <span>Category</span>
                                <div class="mt-1 categories">
                                    <?php foreach ($categories as $category) : ?>
                                        <a href="../../<?= h($category->cat_label) ?>/" class="d-inline-block" style="font-size:<?= h(($category->cat_count) * 10) ?>px; font-weight:<?= h(10 * ($category->cat_count)) ?>"><?= h($category->cat_label) ?><a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="mt-5 related_tagWrapper" >
                                <h5>関連記事</h5>
                                <span>Related posts</span>
                                <ul class="mt-1 p-0">
                                    <?php foreach ($relations as $relation) : ?>
                                        <li class="mt-3 d-flex justify-content-md-between">
                                            <div class="imgarea border">
                                                <a href="../../<?= h($relation->blogs_category->category_label) ?>/<?= h($relation->slug) ?>/"><img src="/files/blogs/thumbnails/<?= sprintf("%010d", $relation->id) ?>.jpg" width="80" height="80" alt="<?= h($relation->title) ?>" style="display: inlne-blcok;"></a>
                                            </div>
                                            <div class="textarea text-truncate ms-3">
                                                <div class="created_date text-muted d-inline-block" style="font-size: 12px;"><?= h($relation->created->i18nFormat('yyyy.MM.dd')) ?></div>
                                                <div class="title"><a href=""><?= h($relation->title) ?></a></div>
                                                <div class="body text-muted" style="font-size: 12px; font-weight: 100;"><?= mb_substr(strip_tags($relation->body),0,32) ?></div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="mt-2 text-end">
                                    <a href="../../<?= $cat ?>" class="view-all">もっと見る</a>
                                </div>
                            </div>                            
                        </div>
                </aside>
        </div>
    </div>
</div>
<div class="container my-5 breadcrumbs-wrapper">
    <?= $this->Breadcrumbs->render() ?>
</div>
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
<script type="text/javascript">
    function toggleIndexActive(blogIndex){
        console.log(blogIndex);
        const tgtIndex = document.getElementsByClassName('blogIndexWrapper-listItem');
        for(let i = 0; i < tgtIndex.length; i++){
            if(tgtIndex[i].classList.contains('index-active')){
                tgtIndex[i].classList.remove('index-active');
            }
        }
        tgtIndex[blogIndex].classList.add('index-active');
    }


    const bodyText = document.getElementById('blogBody');
    const targetTags = bodyText.querySelectorAll('h1, h2, h3, h4, h5, b, img');
    const blogIndexList = document.getElementById('blogIndexWrapper-list');

    let headingIndex = 0;
    let boldIndex = 0;
    for(let i = 0; i < targetTags.length; i++){

        if(targetTags[i].outerHTML.match(/h1|h2/gi)) {
            headingIndex++;
            targetTags[i].setAttribute('id',`targetHeading${headingIndex}`);
            targetTags[i].classList.add('tgt-elm');
            blogIndexList.insertAdjacentHTML('beforeend',`<li class="blogIndexWrapper-listItem list-large mb-3"><a class="blogIndexWrapper-listItem_heading" href="#targetHeading${headingIndex}" onclick="toggleIndexActive(${i});">${targetTags[i].innerText}</a></li>`);
        } else if(targetTags[i].outerHTML.match(/h3|h4|h5/gi)) {
            headingIndex++;
            targetTags[i].setAttribute('id',`targetHeading${headingIndex}`);
            targetTags[i].classList.add('tgt-elm');
            blogIndexList.insertAdjacentHTML('beforeend',`<li class="blogIndexWrapper-listItem list-small mb-3"><a class="blogIndexWrapper-listItem_heading" href="#targetHeading${headingIndex}" onclick="toggleIndexActive(${i});">${targetTags[i].innerText}</a></li>`);
        } else if(targetTags[i].outerHTML.match(/img/gi)) {
            targetTags[i].outerHTML = `<a href="${targetTags[i].src}">${targetTags[i].outerHTML}</a>`;
        }
        //  else if(targetTags[i].outerHTML.match(/\<b/gi)) {
        //     boldIndex++;
        //     targetTags[i].setAttribute('id',`targetBold${boldIndex}`);
        //     targetTags[i].classList.add('tgt-elm');
        //     blogIndexList.insertAdjacentHTML('beforeend',`<li class="blogIndexWrapper-listItem"><a class="blogIndexWrapper-listItem_bold" href="#targetBold${boldIndex}"  onclick="toggleIndexActive(${i});">${targetTags[i].innerText}</a></li>`);
        // }
    }
</script>
<?= $this->Html->script(['bootstrap.bundle.min']) ?>