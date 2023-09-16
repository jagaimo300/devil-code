<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page[]|\Cake\Collection\CollectionInterface $pages
 */
    $this->assign('title', 'devil-code(デビルコード) - ホームページ');
    $this->assign('canonical', '<link rel="canonical" href="https://devil-code.com" />');
?>

<?= $this->Html->css(['swiper-bundle.min.css'], ['block' => 'css']) ?>
<?= $this->Html->meta(["name"=>"description","content"=>"devil code(デビルコード)ではプログラミングの技術メモや学習記録、ITのキャリアプランや就職などについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:title","content"=>"【devil code】デビルコード プログラミングと情報技術"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:type","content"=>"article"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:description","content"=>"devil code(デビルコード)ではプログラミングの技術メモや学習記録、ITのキャリアプランや就職などについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:url","content"=>"https://devil-code.com"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:image","content"=>"https://devil-code.com/img/prof.webp"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:site_name","content"=>"devil code"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:locale","content"=>"ja_JP"],null,["block"=>'meta']); ?>

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image: url('../img/background-1.jpg')">
        </div>
        <div class="swiper-slide" style="background-image: url('../img/background-2.jpg')">
            <div class="text-wrapper ls-1 mt-5">
                <a href="/blogs" class="border-btn px-4 px-md-5 py-3 border border-3 border-white text-white text-nowrap">ブログを見る</a>
            </div>
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<section class="blog-wrapper">
    <div class="album py-5 bg-white">
        <div class="container">
            <div class="row my-5 align ls-1">
                <h3>ブログa</h3>
                <p>Latest posts</p>
            </div>
            <div class="row mb-2 px-3 d-flex justify-content-between align">
                <?php foreach ($news as $index => $new) : ?>
                    <a href="/blogs/<?= h($new->blogs_category->category_label) ?>/<?= h($new->slug) ?>/" class="col-md-12 col-lg-4 mb-5 pe-lg-5 h-100">
                        <div class="row card-item overflow-hidden position-relative">
                            <div class="col-auto blog-img w-100" style="overflow:hidden; background-image:url('/files/blogs/thumbnails/<?= sprintf("%010d", $new->id) ?>.webp'); background-position: center; background-size: contain; background-repeat: no-repeat; height: 180px;">
                            </div>
                            <span class="mb-2 catTag position-absolute" style="top: 32px; right: 16px; background-color:<?= h($new->blogs_category->category_color) ?>;"><?= h($new->blogs_category->category_label) ?></span>

                            <div class="col pb-4 px-4 d-flex flex-column position-relative" style="height: 180px;">
                                <h3 class="mt-3 mb-0 pb-5 fs-5 blog-ttl lh-base"><?= h($new->title) ?></h3>
                                <div class="mt-3 w-100 text-muted d-flex justify-content-between align-items-center position-absolute" style="bottom: 24px;">
                                    <span style="font-size: 12px;"><?= h($new->created->i18nFormat('yyyy.MM.dd')) ?></span>
                                    <span class="arrow"></span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="mt-5 category_tagWrapper">
                <ul class="p-0 categories">
                    <?php foreach ($categories as $category) : ?>
                        <li class="categoryLink d-inline-block">
                            <a class="d-inline-block" href="blogs/<?= h($category->cat_label) ?>/"><?= h($category->cat_label) ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="mt-5 text-end">
                <a href="/blogs" class="view-all">もっと見る</a>
            </div>
        </div>
    </div>
</section>
<section class="contact py-5">
    <div class="contact-bg container my-5">
        <div class="contact-inner row justify-content-center align-items-center text-center m-0">
            <div class="ls-1 col-6 h-50 d-flex flex-column text-white">
                <h3 class="py-5 border-top border-bottom border-white fw-bold">Connect With Me!</h3>
                <div class="contact-btn-wrapper mt-5">
                    <a href="/contact" class="border-btn px-4 px-md-5 py-3 border border-3 border-white text-white text-nowrap">
                        Send Message
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="profile">
    <div class="container my-5 py-5">
        <div class="profile-inner row h-50">
        <div class="col-lg-6 col-md-12 text-center">
            <div class="border-image w-50 mx-auto">
                <img class="prof-img" src="img/prof.webp" width="480" height="480" style="width: 100%; height:auto; display: block;" alt="プロフィール画像" loading=”lazy”>
            </div>
        </div>
        <div class="ls-1 col-lg-6 col-md-12 text-dark ">
                <p>Author</p>
                <h2>Takahiro Ueda</h2>
                <p>Web Engineer</p>
                <p class="lh-lg">宮城を拠点として活動しているWEBアプリケーションエンジニアです。
                    <br>新しい技術や知見を得ることに喜びと生きがいを感じます。
                    <br>趣味はラグビー観戦、筋トレ、外国語学習 好きな食べ物は寿司 猫派です。
                </p>
                <p class="lh-lg">Hello, I'm a Web Developer based in Japan.
                    <br>I really enjoy using my skills to help improve things.
                    <br>I like watching Rugby, Workout, Sushi, Cats.
                </p>
            </div>
        </div>
    </div>
</section>
<?= $this->Html->script(['swiper-bundle.min.js','swiper'], ['block' => 'scriptBottom']) ?>
