<?php get_header(); ?>

<div class="c-page-header --news">
    <div class="c-page-header__title">
        <h1 class="c-page-header__title-text">お知らせ</h1>
    </div>
</div>
<div class="p-content">
    <div class="l-container">
        <h2 class="c-section-title --bird3 p-heading-secondary">
            お知らせ一覧
        </h2>
        <div class="c-news">
            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;

            $news_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 12,
                'orderby' => 'date',
                'order' => 'DESC',
                'ignore_sticky_posts' => false, // ← stickyを含めて表示
                'paged' => $paged,
            ));

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
            ?>
                    <a href="<?php the_permalink(); ?>" class="c-news__link">
                        <article class="c-news__card">
                            <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="c-news__date"><?php echo get_the_date('Y.m.d'); ?></time>
                            <h3 class="c-news__title"><?php the_title(); ?></h3>
                            <div class="c-news__content">
                                <?php
                                $content = get_the_content();
                                $content = apply_filters('the_content', $content);
                                // pタグとbrタグ以外のHTMLタグを削除
                                $content = strip_tags($content, '<p><br>');
                                //文字数制限
                                $trimmed = mb_substr($content, 0, 120);
                                echo $trimmed;
                                ?>
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
        <?php custom_pagination(); ?>
    </div>
</div>
<?php get_footer(); ?>