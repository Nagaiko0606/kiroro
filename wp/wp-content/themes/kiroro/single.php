<?php get_header(); ?>
<div class="c-mv p-mv">
    <div class="c-mv__title">
        <p class="c-mv__title-text">お知らせ</p>
    </div>
</div>
<div class="p-content">
    <article class="c-article --news">
        <div class="l-container">
            <div class="c-article__header">
                <div class="c-article__meta">
                    <time class="c-article__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
                    <?php
                    $category = get_the_category();
                    if (!empty($category)) :
                        $category_name = esc_html($category[0]->name); // カテゴリー名を取得
                    ?>
                        <span class="c-label --news"><?php echo $category_name; ?></span>
                    <?php endif; ?>
                </div>
                <h1 class="c-article__title"><?php the_title(); ?></h1>
            </div>
            <div class="c-article__content">
                <?php the_content(); ?>
            </div>
            <div class="u-align-center">
                <a href="<?php echo esc_url( home_url('/news') ); ?>" class="c-button --primary">一覧へ戻る</a>
            </div>
        </div>
    </article>
</div>
<?php get_footer(); ?>