<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page[]|\Cake\Collection\CollectionInterface $pages
 */
    $this->assign('title', ' - Homepage');
?>

<?= $this->Html->css('https://unpkg.com/swiper@8/swiper-bundle.min.css', ['block' => 'css']) ?>

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
    <div class="swiper-pagination"></div>
</div>
<section class="about pt-3">
    <div class="container text-center text-md-start">
        <div class="row mb-5 py-5 ls-1">
            <h3>知ること。</h3>
            <p class="mb-5">Stay curious.</p>
        </div>
        <div class="row ls-1">
            <div class="col-md-4 pe-md-5 mt-5 mt-md-0">
                <div class="mb-5 mb-md-4">
                    <h4 class="fs-7">知識共有</h4>
                    <span>Knowledge</span>
                </div>
                <p class="fw-lighter pe-md-5">
                    技術メモ、プログラミング、学習について。
                    <br>プログラミングで得た知見の備忘録として残したり、資格取得のために勉強したことを共有します。
                </p>
            </div>
            <div class="col-md-4 pe-md-5 mt-5 mt-md-0">
                <div class="mb-5 mb-md-4">
                    <h4 class="fs-7">仕事</h4>
                    <span>Career</span>
                </div>
                <p class="fw-lighter pe-md-5">キャリアプランや就職活動などについて。
                <br>WEBプログラマーになるうえで必要だったスキルや、これからのキャリア形成ついて私見を共有します。
                </p>
            </div>
            <div class="col-md-4 pe-md-5 mt-5 mt-md-0">
                <div class="mb-5 mb-md-4">
                    <h4 class="fs-7">暮らし</h4>
                    <span>Life style</span>
                </div>
                <p class="fw-lighter pe-md-5">
                    異業種からの転職で変化したライフスタイル、その暮らしやお金のことについて。
                    <br>居酒屋店員からエンジニアに転職して生活面で変わったことや、地方の会社に勤める生活を共有します。
                </p>
            </div>

        </div>
    </div>
</section>
<section class="blog-wrapper">
    <div class="album py-5 bg-white">
        <div class="container">
            <div class="row my-5 align ls-1">
                <h3>ブログ</h3>
                <p>Lately posts</p>
            </div>
            <div class="row mb-2 px-3 d-flex justify-content-between align">
                <?php foreach ($news as $index => $new) : ?>
                    <a href="/blogs/view/<?= h($new->slug) ?>" class="col-md-12 col-lg-4 mb-5 pe-lg-5 h-100">
                        <div class="row card-item overflow-hidden position-relative">
                            <div class="col-auto blog-img w-100" style="overflow:hidden; background-image:url('https://devil-code.com/files/blogs/1.jpg'); background-position: center; background-size: cover; height: 180px;">
                            </div>
                            <span class="mb-2 catTag position-absolute" style="top: 32px; right: 16px; background-color:<?= h($new->blogs_category->category_color) ?>;"><?= h($new->blogs_category->category_label) ?></span>

                            <div class="col pb-4 px-4 d-flex flex-column position-relative">
                                <h3 class="mt-3 mb-0 pb-5 fs-5 blog-ttl text-truncate"><?= h($new->title) ?></h3>
                                <div class="mt-3 text-muted d-flex justify-content-between align-items-center"><span style="font-size: 12px;"><?= h($new->created->i18nFormat('yyyy.MM.dd')) ?></span><span class="arrow"></span></div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
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
                <img class="prof-img" src="img/prof.jpg" style="width: 100%; display: block;" alt="プロフィール画像">
            </div>
        </div>
        <div class="ls-1 col-lg-6 col-md-12 text-dark ">
                <p>Author</p>
                <h2>Takahiro Ueda</h2>
                <p>Web Programmer</p>
                <p class="lh-lg">宮城を拠点として活動しているWEBプログラマーです。
                    <br>新しい技術や知見を得ることに生きがいを感じます。
                    <br>趣味はラグビー観戦、筋トレ 好きな食べ物は寿司 猫派です。
                </p>
                <p class="lh-lg">Hello, I'm a Junior Web Developer based in Japan.
                    <br>I really enjoy using my skills to help improve things.
                    <br>I like watching Rugby, Workout, Sushi, Cats.
                </p>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<?= $this->Html->script(['https://unpkg.com/swiper@8/swiper-bundle.min.js','swiper'], ['block' => 'scriptBottom']) ?>
