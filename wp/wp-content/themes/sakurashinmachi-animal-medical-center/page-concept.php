<?php get_header(); ?>
<div class="c-mv p-mv">
    <div class="c-mv__title">
        <h1 class="c-mv__title-text"><?php the_title() ?></h1>
    </div>
</div>
<nav aria-label="ページ内ナビゲーション" class="p-section-nav">
    <div class="l-container">
        <ul class="p-section-nav__list">
            <li><a href="#feature">当院の特徴</a></li>
            <li><a href="#staff">スタッフ紹介</a></li>
            <li><a href="#info">診療情報・アクセス</a></li>
            <li><a href="#equipment">施設紹介</a></li>
        </ul>
    </div>
</nav>
<?php if (have_posts()): while (have_posts()): the_post(); ?>

        <?php the_content();  ?>

<?php endwhile;
endif; ?>


<?php get_footer(); ?>