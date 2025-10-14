<?php get_header(); ?>

<div class="c-mv p-mv">
    <div class="c-mv__title">
        <h1 class="c-mv__title-text">スタッフブログ</h1>
    </div>
</div>
<div class="p-content">
    <div class="l-container">
        <div class="c-heading-secondary p-heading-secondary">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-green-dark.png" alt="" width="137" height="140">
            <h2 class="c-heading-secondary__text --green">ブログ一覧</h2>
        </div>
        <div class="c-blog">
            <?php
            // ブログカテゴリーの投稿を3件取得
            $blog_args = array(
                'post_type' => 'blog',
                'posts_per_page' => 12,
                'orderby' => 'date',
                'order' => 'DESC',
                'ignore_sticky_posts' => true,
                'paged'          => $paged
            );

            $blog_query = new WP_Query($blog_args);

            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
            ?>
                    <article class="c-blog__card">
                        <a href="<?php the_permalink(); ?>" class="c-blog__link">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php
                                $thumbnail_id = get_post_thumbnail_id();
                                $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr($alt_text); ?>" class="c-blog__img">
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/noimage.jpg" alt="no image" class="c-blog__img">
                            <?php endif; ?>
                        </a>
                        <h3 class="c-blog__title"><?php the_title(); ?></h3>
                        <div class="c-blog__content">
                            <?php echo wp_trim_words(get_the_content(), 60, '...'); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="c-blog__link">
                            <p class="c-blog__more">>>続きを読む</p>
                        </a>
                    </article>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p>ブログ記事はありません。</p>
            <?php endif; ?>
        </div>
        <?php custom_pagination(); ?>
    </div>
</div>
<?php get_footer(); ?>