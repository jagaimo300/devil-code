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
    false
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
        $this->assign('canonical', '<link rel="canonical" href="https://devil-code.com/blogs/' . $blog->blogs_category->category_label . '/' . $blog->slug . '/"' . ' />');
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

        // twiiter
        $this->Html->meta(["name"=>"twitter:card","value"=>"summary_large_image"],null,["block"=>'meta']);
        $this->Html->meta(["name"=>"twitter:site","value"=>"@devil_code_com"],null,["block"=>'meta']);
        $this->Html->meta(["name"=>"twitter:creator","value"=>"@devil_code_com"],null,["block"=>'meta']);
        $this->Html->meta(["name"=>"twitter:title","value"=>"$blog->title | devil code(デビルコード)"],null,["block"=>'meta']);
        $this->Html->meta(["name"=>"twitter:description","value"=>"$blog->description"],null,["block"=>'meta']);
        $this->Html->meta(["name"=>"twitter:image","value"=>"https://devil-code.com/files/blogs/thumbnails/" . sprintf('%010d', $blog->id) . ".webp"],null,["block"=>'meta']);

        $structuredData = array(
            "@context" => "http://schema.org",
            "@type" => "BlogPosting",
            "mainEntityOfPage" => array(
                "@type" => "WebPage",
                "@id" => "https://devil-code.com/blogs/" . h($blog->blogs_category->category_label) . "/" . h($blog->slug) . "/"
            ),
            "headline" => h($blog->title),
            "image" => array("https://devil-code.com/files/blogs/thumbnails/" . sprintf("%010d", $blog->id) . ".webp"),
            "datePublished" => h($created_iso8601),
            "dateModified" => h($modified_iso8601),
            "author" => array(
                "@type" => "Person",
                "name" => "Takahiro Ueda",
                "url" => "http://devil-code.com"
            ),
            "publisher" => array(
                "@type" => "Organization",
                "name" => "devil code",
                "logo" => array(
                    "@type" => "ImageObject",
                    "url" => "https://devil-code.com/img/brand-icon.png"
                )
            ),
            "description" => h($blog->description),
            "inLanguage" => "ja"
        );
?>

<?= $this->Html->css(['sunburst']) ?>
<section class="p-blogsView">
    <article class="c-articleView">
        <header class="c-articleView__header">
            <div class="l-container__wide l-container__common">
                <div class="c-articleView__header-main">
                    <div class="c-articleView__header-thumbnail">
                        <img itemprop="image" src="/files/blogs/thumbnails/<?= sprintf('%010d', $blog->id); ?>.webp" alt="ブログ <?= $blog->title; ?>のサムネイル" width="1200" height="630">
                    </div>
                    <h1 class="c-articleView__header-title"><span style="font-size:0.92em"><?= $blog->title; ?></span></h1>
                    <div class="c-articleView__header-publishDate">
                        <span class="c-articleView__header-publishDateCreated">Created at
                            <time datetime="<?= $created_iso8601; ?>"><?= date_format($blog->created, "Y年m月d日"); ?></time>
                        </span>
                        <?php if($blog->created != $blog->modified): ?>
                            <span class="c-articleView__header-publishDateModified">
                                Modified at
                                <time datetime="<?= $modified_iso8601; ?>"><?= date_format($blog->modified, "Y年m月d日"); ?></time>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </header>
        <div class="l-container__wide l-container__common">
            <div class="l-container__undo">
                <div class="c-articleView__inner">
                    <div class="l-container__columns">
                        <section class="c-articleView__content">
                            <div class="c-articleView__main">
                                <div class="l-container__wide l-container__common">
                                    <div class="c-articleView__tags">
                                    </div>
                                    <div id="blogBody" class="c-articleView__bodyContent">
                                        <?= $blog->body ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <aside class="c-articleView__sidebar">
                            <div class="c-articleView__sidebar-sticky">
                                <div class="c-articleView__sidebar-tableContent">
                                    <div class="c-articleView__sidebar-tableContentTitle">目次</div>
                                    <ol id="blogIndexWrapper-list" class="c-articleView__sidebar-tableContentBody c-steps">
                                    </ol>
                                </div>
                                <div class="p-blogsView__snsLinks desktop">
                                    <a href="//twitter.com/intent/tweet?url=https://devil-code.com/blogs/<?= $cat; ?>/<?= $slug ?>/&amp;text=<?= $blog->title; ?>%0a%23デビルコード%20@devil_code_com%0a" target="_blank" rel="noopener noreferrer">
                                                <svg class="sns-x" width="1200" height="1227" viewBox="0 0 1200 1227" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z" fill="black"/></svg>
                                            </a>
                                    <a href="https://www.facebook.com/share.php?u=https://devil-code.com/blogs/<?= $cat; ?>/<?= $slug ?>/" target="_blank" rel="noopener noreferrer">
            <svg  class="sns-facebook" fill="#000000" width="32px" height="32px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"/></svg>
                                            </a>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <!-- SNS LINKS for smart device -->
                    <div class="p-blogsView__snsLinks smart">
                        <a href="//twitter.com/intent/tweet?url=https://devil-code.com/blogs/<?= $cat; ?>/<?= $slug ?>/&amp;text=<?= $blog->title; ?>%0a%23デビルコード%20@devil_code_com%0a" target="_blank" rel="noopener noreferrer">
                                    <svg class="sns-x" width="1200" height="1227" viewBox="0 0 1200 1227" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z" fill="black"/></svg>
                                </a>
                        <a href="https://www.facebook.com/share.php?u=https://devil-code.com/blogs/<?= $cat; ?>/<?= $slug ?>/" target="_blank" rel="noopener noreferrer">
<svg  class="sns-facebook" fill="#000000" width="32px" height="32px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"/></svg>
                                </a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
<?php endforeach; ?>

<div class="container my-5 breadcrumbs-wrapper">
    <?= $this->Breadcrumbs->render() ?>
</div>

<script>
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
            blogIndexList.insertAdjacentHTML('beforeend',`<li class="c-articleView__sidebar-tableContentItem c-steps__content"><a class="c-steps__title" href="#targetHeading${headingIndex}">${targetTags[i].innerText}</a></li>`);
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
      const listItems = document.querySelectorAll(".c-articleView__sidebar-tableContentItem");

      function handleScroll() {
        for (let i = 0; i < listItems.length; i++) {
          const item = listItems[i];
          const link = item.querySelector("a");
          const targetId = link.getAttribute("href").substring(1);
          const targetElement = document.getElementById(targetId);

          // ブラウザのスクリーンTOPからの距離を取得
          const distanceFromTop = targetElement.getBoundingClientRect().top;

          // 距離が100px以内の場合にactiveクラスを追加、それ以外は削除
          if (distanceFromTop <= window.innerHeight / 2 && distanceFromTop >= -100) {
              item.classList.add("active");
          } else {
              item.classList.remove("active");
          }
        }
      }

      // 初回実行
      handleScroll();

      // スクロールイベントを追加
      window.addEventListener("scroll", handleScroll);
    });
</script>
<?= $this->Html->script(['run_pretty'],['defer']) ?>
<?php
$jsonLdScript = '
<script type="application/ld+json">
    ' . json_encode($structuredData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '
</script>';
$this->assign('jsonLd', $jsonLdScript);
?>
