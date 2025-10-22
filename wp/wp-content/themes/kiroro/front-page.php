<?php get_header(); ?>
<div class="p-mv">
    <h1>
        <picture>
            <source srcset="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/logo-mv.webp 393w, <?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/logo-mv@2x.webp 786w"
                type="image/webp" sizes="(max-width: 767px) 65.2vw, 393px">
            <img srcset="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/logo-mv.jpg 393w, <?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/logo-mv@2x.jpg 786w"
                src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/logo-mv.png" alt="桜新町動物医療センター"
                sizes="(max-width: 767px) 65.2vw, 393px" width="393" height="570" class="p-mv__logo">
        </picture>
    </h1>
    <div class="p-mv__video p-video">
        <video id="js-bgVideo" class="p-video__content" autoplay muted loop playsinline>
            <source id="js-source-mp4" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/" type="video/mp4">
            <source id="js-source-webm" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/" type="video/webm">
        </video>
    </div>
</div>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
        <?php the_content();  ?>
<?php endwhile;
endif; ?>
<!-- お知らせ一覧 -->
<section class="p-news">
    <div class="l-container">
        <div class="c-heading-secondary p-news__title">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-green.png" alt="" width="137" height="140">
            <h2 class="c-heading-secondary__text --white">お知らせ</h2>
            <p class="c-heading-secondary__sub --white">最新3件</p>
        </div>
        <div class="c-news">
            <?php
            // お知らせカテゴリーの投稿を3件取得
            $news_args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC',
                'ignore_sticky_posts' => true
            );

            $news_query = new WP_Query($news_args);

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
            ?>
                    <a href="<?php the_permalink(); ?>" class="c-news__link">
                        <article class="c-news__card">
                            <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="c-news__date"><?php echo get_the_date('Y.m.d'); ?></time>
                            <h3 class="c-news__title"><?php the_title(); ?></h3>
                            <div class="c-news__content">
                                <?php echo wp_trim_words(get_the_content(), 100, '...'); ?>
                            </div>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php
                                $thumbnail_id = get_post_thumbnail_id();
                                $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr($alt_text); ?>" class="c-news__img">
                            <?php endif; ?>
                        </article>
                    </a>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p>お知らせはありません。</p>
            <?php endif; ?>
        </div>
        <div class="u-align-center">
            <a href="<?php echo esc_url(home_url('/news')); ?>" class="c-button --primary">その他のお知らせ（一覧）</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>