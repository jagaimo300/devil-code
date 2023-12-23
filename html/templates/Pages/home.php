<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page[]|\Cake\Collection\CollectionInterface $pages
 */
    $this->assign('title', 'devil-code(デビルコード) - ホームページ');
    $this->assign('canonical', '<link rel="canonical" href="https://devil-code.com" />');
?>

<?= $this->Html->meta(["name"=>"description","content"=>"devil code(デビルコード)ではプログラミングの技術メモや学習記録、ITのキャリアプランや就職などについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:title","content"=>"【devil code】デビルコード プログラミングと情報技術"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:type","content"=>"article"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:description","content"=>"devil code(デビルコード)ではプログラミングの技術メモや学習記録、ITのキャリアプランや就職などについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:url","content"=>"https://devil-code.com"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:image","content"=>"https://devil-code.com/img/prof.webp"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:site_name","content"=>"devil code"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:locale","content"=>"ja_JP"],null,["block"=>'meta']); ?>
<section class="p-home__blogs">
    <div class="l-container l-container__common">
        <div class="p-home__sectionTitle">
           <h3 class="c-headingSize__2xl">Blog</h3>
           <span>ブログ</span>
        </div>

        <div class="p-home__articles c-articleListBasic">
            <?php foreach ($news as $index => $new) : ?>
                <article class="c-articleListBasic__article">
                    <a href="/blogs/<?= h($new->blogs_category->slug) ?>/<?= h($new->slug) ?>/" tabindex="-1" class="c-articleListBasic__article-link"></a>
                    <header class="c-articleListBasic__article-header">
                        <a class="c-articleListBasic__article-categoryLink" href="/blogs/<?= h($new->blogs_category->category_name) ?>/" tabidnex="1">
                            <div class="c-articleListBasic__article-categoryName"><?= h($new->blogs_category->category_name) ?></div>
                        </a>
                        <span class="c-articleListBasic__article-created"><time datetime="<?= $this->Time->format($new->created, 'yyyy-MM-dd\'T\'HH:mm:ssXXX'); ?>"><?= h($new->created->i18nFormat('yyyy-MM-dd')) ?></time></span>
                    </header>
                    <h4 class="c-articleListBasic__article-title"><a href="/blogs/<?= h($new->blogs_category->slug) ?>/<?= h($new->slug) ?>/"><?= h($new->title) ?></a></h4>
                    <footer class="c-articleListBasic__article-footer">
                        <ul class="c-articleListBasic__article-tags">
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

    <div class="l-container l-container__common c-viewMore">
        <a class=" c-viewMore__link" href="/blogs">ブログをもっと見る</a>
    </div>
</section>
