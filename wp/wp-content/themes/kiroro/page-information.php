<?php get_header(); ?>
<div class="c-mv p-mv">
    <div class="c-page-header --information">
        <div class="c-page-header__title">
            <h1 class="c-page-header__title-text"><?php the_title() ?></h1>
        </div>
    </div>
</div>
<nav aria-label="ページ内ナビゲーション" class="p-section-nav">
        <div class="l-container p-section-nav__inner">
          <ul class="p-section-nav__list">
            <li class="p-section-nav__item-sub">
              <a href="#preventive-medicine">予防医療<span class="u-pc">：</span><span class="u-sp">4種</span></a>
              <ul class="p-section-nav__sublist">
                <li class="p-section-nav__subitem"><a href="#vaccination" class="p-section-nav__sublink">予防接種（混合ワクチン）</a></li>
                <li class="p-section-nav__subitem"><a href="#rabies" class="p-section-nav__sublink">狂犬病予防接種</a></li>
                <li class="p-section-nav__subitem"><a href="#filaria" class="p-section-nav__sublink">フィラリア予防</a></li>
                <li class="p-section-nav__subitem"><a href="#ticks" class="p-section-nav__sublink">ノミ・マダニ予防</a></li>
            </ul>
            </li>
            <li><a href="#health-check">健康診断</a></li>
            <li><a href="#sterilization">去勢避妊手術</a></li>
            <li class="p-section-nav__item-sub"><a href="#departments">診療科紹介<span class="u-pc">：</span><span class="u-sp">9種</span></a>
              <ul class="p-section-nav__sublist">
                <li class="p-section-nav__subitem"><a href="#surgery" class="p-section-nav__sublink">一般外科</a></li>
                <li class="p-section-nav__subitem"><a href="#internal" class="p-section-nav__sublink">一般内科</a></li>
                <li class="p-section-nav__subitem"><a href="#orthopedics" class="p-section-nav__sublink">整形外科</a></li>
                <li class="p-section-nav__subitem"><a href="#respiratory-circulatory" class="p-section-nav__sublink">循環器科／呼吸器科</a></li>
                <li class="p-section-nav__subitem"><a href="#digestive" class="p-section-nav__sublink">消化器科</a></li>
                <li class="p-section-nav__subitem"><a href="#urology" class="p-section-nav__sublink">腎臓・泌尿器科</a></li>
                <li class="p-section-nav__subitem"><a href="#dentistry" class="p-section-nav__sublink">歯科</a></li>
                <li class="p-section-nav__subitem"><a href="#ophthalmology" class="p-section-nav__sublink">眼科</a></li>
                <li class="p-section-nav__subitem"><a href="#dermatology" class="p-section-nav__sublink">皮膚科</a></li>
                <li class="p-section-nav__subitem"><a href="#oncology" class="p-section-nav__sublink">腫瘍科</a></li>
                <li class="p-section-nav__subitem"><a href="#neurology" class="p-section-nav__sublink">神経科</a></li>
              </ul>
            </li>
            <li><a href="#about">セカンドオピニオン</a></li>
          </ul>
        </div>
      </nav>
<?php if (have_posts()): while (have_posts()): the_post(); ?>

        <?php the_content();  ?>

<?php endwhile;
endif; ?>


<?php get_footer(); ?>