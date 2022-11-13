
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
    ['controller' => '/', 'action' => 'sitemaps'],
    [
        'templateVars' => [
            'num' => '2'
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

$this->assign('title', ' - Sitemaps');

$cat_exists = array();
?>

<section class="blog">
    <div class="container">
        <div class="row my-5 d-flex">
            <div class="col-md-8 me-md-1">
                <h2>ブログ</h2>
                <p>Blogs</p>
                <ul>
                    <?php foreach ($blogs as $index => $blog) : ?>
                        <?php 
                            if (!in_array($blogs->$category_id, $cat_exists)) {
                                echo "<li><a href='/blogs/" . $blog->blogs_category->category_label ."'><span class='catTag mb-4' style='background-color:" . $blog->blogs_category->category_color . ";'>" . $blog->blogs_category->category_label . "</span></a></li>";
                            }    
                            $cat_exists[] = $blogs->$category_id;                        
                        ?>
                        <li style="list-style: square"><a href="/blogs/<?= h($blog->blogs_category->category_label) ?>/<?= h($blog->slug) ?>" class="pe-lg-5 h-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="fs-5 blog-ttl text-truncate"><?= h($blog->title) ?></h3>
                            </div>
                        </a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="row my-5 d-flex">
            <div class="col-md-8 me-md-1">
                <h2>固定ページ</h2>
                <p>Pages</p>
                <ul>
                    <li style="list-style: square">
                        <a href="/contact/" class="pe-lg-5 h-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="fs-5 blog-ttl text-truncate">お問い合わせ</h3>
                            </div>
                        </a>
                    </li>
                    <li style="list-style: square">
                        <a href="/sitemaps/" class="pe-lg-5 h-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="fs-5 blog-ttl text-truncate">サイトマップ</h3>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</section>
<div class="container my-5 breadcrumbs-wrapper">
    <?= $this->Breadcrumbs->render() ?>
</div>
