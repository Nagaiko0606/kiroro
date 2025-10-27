<!-- お知らせ一覧 -->
<section class="p-news">
    <div class="l-container">
        <div class="p-news__title">
            <h2 class="c-section-title --bird3">
                お知らせ
            </h2>
            <p class="p-news__title-sub">最新3件</p>
        </div>
        <div class="c-news">
            <?php
            $sticky = get_option('sticky_posts');

            if (!empty($sticky)) {
                // stickyを優先して取得
                rsort($sticky);

                $sticky_query = new WP_Query(array(
                    'post__in' => $sticky,
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                ));

                $sticky_ids = wp_list_pluck($sticky_query->posts, 'ID');
                $sticky_count = count($sticky_ids);

                // まだ3件に満たない場合、残りを通常投稿から取得
                if ($sticky_count < 3) {
                    $normal_query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 3 - $sticky_count,
                        'post__not_in' => $sticky_ids,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ));

                    // 結合
                    $news_query = new WP_Query(array(
                        'post__in' => array_merge($sticky_ids, wp_list_pluck($normal_query->posts, 'ID')),
                        'orderby' => 'post__in',
                    ));
                } else {
                    $news_query = $sticky_query;
                }
            } else {
                // stickyがない場合は通常投稿3件
                $news_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC',
                ));
            }

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
        <div class="u-align-center">
            <a href="<?php echo esc_url(home_url('/news')); ?>" class="c-button --primary">その他のお知らせ（一覧）</a>
        </div>
    </div>
</section>

