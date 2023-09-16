<?php
$this->assign('title', 'お問い合わせ');
$this->assign('canonical', '<link rel="canonical" href="http://devil-code.com/contact/" />');
echo $this->Html->meta(["name"=>"description","content"=>"お仕事のお誘いや、ブログ記事の誤った情報についてご指摘などございましたらこちらのお問い合わせフォームまでお願いいたします。"],null,["block"=>'meta']);
?>
        

<section class="contact">
    <div class="container my-5 py-5 text-center h-100">
        <h2>お問い合わせ</h2>
        <span>Contact</span>
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeatGNUaSN9aPRqZ82SwTLJ2y-PdZ4RuQHv0sWK1IGyzsWyfw/viewform?embedded=true" width="100%" height="1300" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
    </div>
</section>

