<?php get_header(); ?>
<div class="p-mv">
    <picture>
        <source srcset="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/mv-sp.webp 414w, <?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/mv-sp@2x.webp 828w"
            media="(max-width: 767px)" type="image/webp" sizes="100vw">
        <source srcset="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/mv-sp.jpg 414w, <?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/mv-sp@2x.jpg 828w"
            media="(max-width: 767px)" sizes="100vw">
        <source srcset="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/mv.webp 1367w, <?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/mv@2x.webp 2734w"
            type="image/webp" sizes="100vw">
        <img srcset="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/mv.jpg 1367w, <?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/mv@2x.jpg 2734w"
            src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/mv.jpg" alt="" sizes="100vw" class="p-mv__img">
    </picture>
    <h1>
        <picture>
            <source srcset="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/logo-mv.webp 393w, <?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/logo-mv@2x.webp 786w"
                type="image/webp" sizes="(max-width: 767px) 65.2vw, 393px">
            <img srcset="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/logo-mv.jpg 393w, <?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/logo-mv@2x.jpg 786w"
                src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/home/logo-mv.png" alt="桜新町動物医療センター"
                sizes="(max-width: 767px) 65.2vw, 393px" width="393" height="570" class="p-mv__logo">
        </picture>
    </h1>
</div>
<?php if (have_posts()): while (have_posts()): the_post(); ?>

        <?php the_content();  ?>

<?php endwhile;
endif; ?>


<?php get_footer(); ?>