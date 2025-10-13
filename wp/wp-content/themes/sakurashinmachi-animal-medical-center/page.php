<?php get_header(); ?>
<div class="c-mv p-mv">
    <div class="c-mv__title">
        <h1 class="c-mv__title-text"><?php the_title() ?></h1>
    </div>
</div>
<?php if (have_posts()): while (have_posts()): the_post(); ?>

        <?php the_content();  ?>

<?php endwhile;
endif; ?>


<?php get_footer(); ?>