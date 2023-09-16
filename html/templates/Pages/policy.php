
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
    'サイトポリシー',
    ['controller' => '/', 'action' => 'policy'],
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

$this->assign('title', 'サイトポリシー');
$this->assign('canonical', '<link rel="canonical" href="https://devil-code.com/site-policy/" />');
?>

<?= $this->Html->meta(["name"=>"description","content"=>"devil code(デビルコード)ではプログラミングの技術メモや学習記録、ITのキャリアプランや就職などについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:title","content"=>"【devil code】デビルコード プログラミングと情報技術"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:type","content"=>"article"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:description","content"=>"devil code(デビルコード)ではプログラミングの技術メモや学習記録、ITのキャリアプランや就職などについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:url","content"=>"https://devil-code.com"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:image","content"=>"https://devil-code.com/img/prof.jpg"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:site_name","content"=>"devil code"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:locale","content"=>"ja_JP"],null,["block"=>'meta']); ?>

<section class="page-title pt-5">
    <div class="container mt-5">
        <h1>サイトポリシー</h1>
        <p>Site policy</p>
    </div>
</section>
<section class="privacy-policy">
    <div class="container">
        <div class="row my-5 py-5 ps-3 d-flex" style="background: #fbfbfb">
            <div class="col-md-8 me-md-1">
                <h2>プライバシーポリシー</h2>
                <p>Privacy policy</p>
                <dl>
                    <dt class="pt-3 mb-3">基本方針</dt>
                    <dd>
                        <p>デビルコード（以下、当サイトといいます。）は、個人情報の保護が社会的責任であると認識しております。</p>
                        <p>個人情報に関する法令を遵守し、以下のとおりプライバシーポリシーを定め、本方針に従って個人情報を適切に利用、管理及び保護することといたします。</p>
                        <p>当サイトで収集した情報は、利用目的の範囲内で適切に取り扱います。</p>
                    <dd>
                </dl>
                <dl>
                    <dt class="pt-3 mb-3">個人情報の取得と利用目的</dt>
                    <dd>
                        <p>当サイトでは、アクセスされた際にIPアドレス、お問い合わせの際に、名前、メールアドレス等の個人情報を取得します。</p>
                        <p>これらの個人情報はスパム検出などの不正対策及びお問い合わせいただいた内容に回答する場合又は電子メールにてご連絡する場合に利用させていただくものであり、それ目的以外では利用いたしません。</p>
                        <p>また、お問い合わせの際に取得した個人情報は１年間保存します。
                    <dd>
                </dl>
                <dl>
                    <dt class="pt-3 mb-3">個人情報の第三者開示</dt>
                    <dd>
                        <p>取得した個人情報は適切に管理し、以下に該当する場合を除いて第三者に開示することはありません。</p>
                        <p>・本人の同意が得られた場合</p>
                        <p>・法令により開示が求められた場合</p>
                        <p>個人情報についてご本人が開示、訂正または削除を希望される場合、お申し出をいただいた方がご本人であることを確認させていただいた上で対応いたします。</p>
                    <dd>
                </dl>
                <dl>
                    <dt class="pt-3 mb-3">未成年の個人情報について</dt>
                    <dd>
                        <p>未成年者がお問い合わせフォームから問い合わせをされたりする場合は必ず親権者の同意を得るものとし、お問い合わせをされた時点で、当プライバシーポリシーに対して親権者の同意があるものとみなします</p>
                    <dd>
                </dl>
            </div>
        </div>
        <div class="row my-5 py-5 ps-3 d-flex" style="background: #fbfbfb">
            <div class="col-md-8 me-md-1">
                <h2>Cookieポリシー</h2>
                <p>Cookie policy</p>
                <dl>
                    <dt class="pt-3 mb-3">Cookieについて</dt>
                    <dd>
                        <p>クッキーとはお客様のウェブサイト閲覧情報を、そのお客様のコンピューター（PCやスマートフォン、タブレットなどインターネット接続可能な機器）に記憶させる機能のことです。</p>
                        <p>クッキーには、当サイトによって設定されるもの（ファーストパーティークッキー）と、当社と提携する第三者によって設定されるもの（サードパーティークッキー）があります。</p>
                    <dd>
                </dl>
                <dl>
                <dl>
                    <dt class="pt-3 mb-3">Cookieの使用について</dt>
                    <dd>
                        <p>当サイトでは、クッキーを使用して収集した情報を利用して、お客様のウェブサイトの利用状況（アクセス状況、トラフィック、ルーティング等）を分析し、ウェブサイト自体のパフォーマンス改善や、当社からお客様に提供するサービスの向上、改善のために使用することがあります。</p>
                        <p>また、この分析にあたっては、主に以下のツールが利用され、ツール提供者に情報提供されることがあります。</p>
                        <p>この他、クッキーは、提携する広告配信サービス提供会社における行動ターゲティング広告の配信に使用される場合があります。</p>
                    <dd>
                </dl>
                <dl>
                    <dt class="pt-3 mb-3">Cookieの無効化について</dt>
                    <dd>
                        <p>当サイトの利用者は、ブラウザの設定を変更することにより、Cookieを無効にすることができます。以下では、一般的なブラウザにおける設定方法を掲載しています。<br>
                        <p>
                            ■<a class="mb-3 d-inline-block" href="https://support.google.com/chrome/answer/95647?_fsi=d17E722N">Google Chrome</a><br>
                            ■<a class="mb-3 d-inline-block" href="https://support.apple.com/ja-jp/HT201265?_fsi=ccEoJ0KL">Safari (iPhone, iPad)</a><br>
                            ■<a class="mb-3 d-inline-block" href="https://support.apple.com/ja-jp/guide/safari/sfri11471/mac?_fsi=XaB0Z1tC">Apple Safari (Mac)</a><br>
                            ■<a class="mb-3 d-inline-block" href="https://support.microsoft.com/ja-jp/windows/cookie-%E3%81%AE%E5%89%8A%E9%99%A4%E3%81%A8%E7%AE%A1%E7%90%86%E3%82%92%E8%A1%8C%E3%81%86-168dab11-0753-043d-7c16-ede5947fc64d">Microsoft Internet Explorer</a><br>
                            ■<a class="mb-3 d-inline-block" href="https://support.microsoft.com/ja-jp/microsoft-edge/microsoft-edge-%E3%81%A7-cookie-%E3%82%92%E5%89%8A%E9%99%A4%E3%81%99%E3%82%8B-63947406-40ac-c3b8-57b9-2a946a29ae09">Microsoft Edge</a><br>
                            ■<a class="mb-3 d-inline-block" href="https://support.mozilla.org/ja/kb/cookies-information-websites-store-on-your-computer?_fsi=W65kL31n">Mozilla Firefox</a></p>                    
                        </p>
                    <dd>
                </dl>
                <dl>
                    <dt class="pt-3 mb-3">Cloudflareについて</dt>
                    <dd>
                    
                        <p>当サイトは、CloudflareのCDNを利用しています。</p>
                        <p>当サイトへの悪意のある訪問者を検出し、改善するためにCookieを使用して収集した情報を分析などに使用することがあります。</p>
                        <p>以下ではCloudflareでデータが収集、処理される仕組みについて掲載しておりますのでご確認ください。</p>
                        <p>
                            ■<a class="mb-3 d-inline-block" href="https://www.cloudflare.com/ja-jp/cookie-policy/">Cookieポリシー|Cloudflare</a><br>
                        </p>
                    <dd>
                </dl>
            </div>
        </div>
        <div class="row my-5 py-5 ps-3 d-flex" style="background: #fbfbfb">
            <div class="col-md-8 me-md-1">
                <h2>第三者配信の広告サービスについて</h2>
                <p>About adsense</p>
                <p class="py-2">当サイトでは、第三者配信の広告サービス（Googleアドセンス）を利用しています。 このような広告配信事業者は、訪問者の興味に応じた商品やサービスの広告を表示するため、当サイトや他サイトへのアクセスに関する情報 『Cookie』(氏名、住所、メール アドレス、電話番号は含まれません) を使用することがあります。
                <dl>
                    <dt class="pt-3 mb-3">Googleアドセンスついて</dt>
                    <dd>
                    
                        <p>Googleアドセンスに関して、以下ではこのプロセスの詳細やこのような情報が広告配信事業者に使用されないようにする方法について掲載していますのでご確認ください。</p>
                        <p>
                            ■<a class="mb-3 d-inline-block" href="https://policies.google.com/technologies/ads?gl=jp">広告 – ポリシーと規約|Google</a><br>
                        </p> 
                        <p>第三者配信による広告掲載を無効にしていない場合は、第三者配信事業者や広告ネットワークの配信する広告がサイトに掲載されることがあります。</p>                        
                        <p>Googleによって広告の第三者配信が認められている広告配信事業者の詳細は以下で掲載していますのでご確認ください。</p>
                        <p>
                            ■<a class="mb-3 d-inline-block" href="https://support.google.com/admanager/answer/94149">広告の第三者配信が認められている広告配信事業者|Google</a><br>
                        </p> 
                    <dd>
                </dl>
                <dl>
            </div>
        </div>
        <div class="row my-5 py-5 ps-3 d-flex" style="background: #fbfbfb">
            <div class="col-md-8 me-md-1">
                <h2>アクセス解析サービスの利用</h2>
                <p>About Analytics</p>
                <dl>
                    <dt class="pt-3 mb-3">アクセス解析について</dt>
                    <dd>
                        <p>当サイトでは、Googleによるアクセス解析ツール「Googleアナリティクス」を利用しています。</p>
                        <p>このGoogleアナリティクスはアクセス情報の収集のためにCookieを使用しています。このアクセス情報は匿名で収集されており、個人を特定するものではありません。</p>
                        <p>GoogleアナリティクスのCookieは、26ヶ月間保持されます。この機能はCookieを無効にすることで収集を拒否することが出来ますので、お使いのブラウザの設定をご確認ください。</p>
                        <p>Googleアナリティクスでデータが収集、処理される仕組みについては、Google社が提供するページからご確認ください。</p>
                        <p>
                            ■<a class="mb-3 d-inline-block" href="https://marketingplatform.google.com/about/analytics/terms/jp/">利用規約|Google Analytics</a><br>
                            ■<a class="mb-3 d-inline-block" href="https://policies.google.com/privacy?hl=ja">プライバシーポリシー|Google</a><br>
                        </p>
                    <dd>
                </dl>
                <dl>
            </div>
        </div>
        <div class="row my-5 py-5 ps-3 d-flex" style="background: #fbfbfb">
            <div class="col-md-8 me-md-1">
                <h2>お問い合わせ先</h2>
                <p>Contact</p>
                <p class="py-2">当サイト、又は個人情報の取扱いに関しては、お問い合わせフォームよりご連絡ください。</p>
                <dl>
                    <dt class="pt-3 mb-3">サイト運営者</dt>
                    <dd>
                        <p>Takahiro Ueda</p>
                    <dd>
                </dl>
                <dl>
                    <dt class="pt-3 mb-3">連絡先</dt>
                    <dd>
                        <p><a href="mailto:tkhr6022@gmail.com">E-mail:tkhr6022@gmail.com</a></p>
                        <p><a href="/contact">お問い合わせフォーム</a></p>
                    <dd>
                </dl>
                <dl>
            </div>
        </div>
        <div class="row my-5 py-5 ps-3 d-flex" style="background: #fbfbfb">
            <div class="col-md-8 me-md-1">
                <h2>サイトポリシーの改定について</h2>
                <p>Regarding the revision of the site policy</p>
                <p class="py-2">当サイトは、個人情報に関して適用される法令を遵守するとともに、本プライバシーポリシーの内容を適宜見直しその改善に努めます。修正された最新のプライバシーポリシーは常に本ページにて開示されます。</p>
                <p class="py-2 text-end">2023年6月19日 策定</p>
            </div>
        </div>
    </div>
</section>
<div class="container my-5 breadcrumbs-wrapper">
    <?= $this->Breadcrumbs->render() ?>
</div>
