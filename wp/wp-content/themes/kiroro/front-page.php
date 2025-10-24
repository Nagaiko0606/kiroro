<?php get_header(); ?>
<div class="swiper c-swiper">
    <div class="swiper-wrapper c-swiper__wrapper">
        <div class="swiper-slide c-swiper__slide">
            <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/home/mv1-sp.jpg" media="(max-width: 767px)">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home/mv1.jpg" alt="" class="c-swiper__img">
            </picture>
        </div>
        <div class="swiper-slide c-swiper__slide">
            <div class="swiper-slide c-swiper__slide">
                <picture>
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/home/mv2-sp.jpg" media="(max-width: 767px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home/mv2.jpg" alt="" class="c-swiper__img">
                </picture>
            </div>
        </div>
    </div>
</div>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
        <?php the_content();  ?>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>