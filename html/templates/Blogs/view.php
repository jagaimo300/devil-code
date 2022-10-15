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

$this->assign('title', ' - Blog - '. $slug);

?>

<div class="blog ls-1">
    <div class="container">
        <div class="row">
            <?php foreach ($blogs as $index => $blog) : ?>
                <article class="col-12 col-md-9 min-vh-100">
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
                        <span class="text-muted d-inline-block ms-1" style="font-size: 12px;"><?= h($blog->created->i18nFormat('yyyy.MM.dd')) ?>
                        <span class="catTag d-inline-block  ms-3" style="background-color: <?= h($blog->blogs_category->category_color) ?>;"><?= h($blog->blogs_category->category_label) ?></span>
                    </section>
                    <section class="blog_title mt-0 mb-7">
                        <h1 class="blog_title-heading"><?= h($blog->title) ?></h1>
                    </section>
                    <section id="blogBody" class="blog_body my-7 pe-3 pe-md-0 text-break ls-1">
                        <?= $blog->body ?>
                    </section>
                </article>
                <aside class="col-3 d-none d-md-block">
                    <div class="mt-5 blogIndexWrapper sticky-top text-break">
                        <h5>目次</h5>
                    	<span>Contents</span>
                        <ol id="blogIndexWrapper-list" class="blogIndexWrapper-list">
                            <!-- Cleate elements using JavaSctipt -->
                        </ol>
                        <div class="mt-5 category_tagWrapper">
			                <?php foreach ($categories as $category) : ?>
			                    <a href="blogs/<?= h($category->cat_label) ?>/" class="fs-5 d-inline-block" style="font-size:<?= h(($category->cat_count) * 0.5) ?>px; font-weight:<?= h(100 * ($category->cat_count)) ?>"><?= h($category->cat_label) ?><a>
			                <?php endforeach; ?>
                        </div>

                        <div class="mt-5 related_tagWrapper">
                        	<h5>関連記事</h5>
                        	<span>Related posts</span>
                        	<ul class="p-0">
                        		<li class="mt-3 d-flex justify-content-between">
                        			<div class="imgarea w-20 border">
										<a href=""><img src="https://devil-code.com/img/prof.jpg" width="95" height="95" alt="関連記事"></a>
									</div>
									<div class="textarea text-truncate ms-3">
										<div class="created_date text-muted d-inline-block" style="font-size: 12px;">2022.10.14</div>
										<div class="title"><a href="">Hellow World</a></div>
										<div class="body text-muted w-lighter lh-32">foooofoooofoooofoooo・・・</div>
									</div>
								</li>
                        	</ul>
                        </div>

                    </div>
                </aside>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="container my-5 breadcrumbs-wrapper">
    <?= $this->Breadcrumbs->render() ?>
</div>
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

    window.onload = () => {

        const bodyText = document.getElementById('blogBody');
        const targetTags = bodyText.querySelectorAll('h1, h2, h3, h4, h5, b');
        const blogIndexList = document.getElementById('blogIndexWrapper-list');

        let headingIndex = 0;
        let boldIndex = 0;
        for(let i = 0; i < targetTags.length; i++){

            if(targetTags[i].outerHTML.match(/h1|h2|h3|h4|h5/gi)) {
                headingIndex++;
                targetTags[i].setAttribute('id',`targetHeading${headingIndex}`);
                targetTags[i].classList.add('tgt-elm');
                blogIndexList.insertAdjacentHTML('beforeend',`<li class="blogIndexWrapper-listItem"><a class="blogIndexWrapper-listItem_heading" href="#targetHeading${headingIndex}" onclick="toggleIndexActive(${i});">${targetTags[i].innerText}</a></li>`);
            } else if(targetTags[i].outerHTML.match(/\<b/gi)) {
                boldIndex++;
                targetTags[i].setAttribute('id',`targetBold${boldIndex}`);
                targetTags[i].classList.add('tgt-elm');
                blogIndexList.insertAdjacentHTML('beforeend',`<li class="blogIndexWrapper-listItem"><a class="blogIndexWrapper-listItem_bold" href="#targetBold${boldIndex}"  onclick="toggleIndexActive(${i});">${targetTags[i].innerText}</a></li>`);
            }
        }
        const headerHeight = document.getElementById('header').getBoundingClientRect().height;
        const tgtElm = document.getElementsByClassName('tgt-elm');
        const tgtIndex = document.getElementsByClassName('blogIndexWrapper-listItem');

        
        window.addEventListener('scroll',() =>{
	        for(let i = 0; i < tgtElm.length; i++){
	            if((tgtElm[i].getBoundingClientRect().y + headerHeight) < 96){
	                toggleIndexActive(i);
	            }
	        }
        },false);
    }
</script>


<!-- <div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Blog'), ['action' => 'edit', $blog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Blog'), ['action' => 'delete', $blog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Blogs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Blog'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="blogs view content">
            <h3><?= h($blog->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($blog->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($blog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Id') ?></th>
                    <td><?= $this->Number->format($blog->category_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($blog->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($blog->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Body') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($blog->body)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div> -->
