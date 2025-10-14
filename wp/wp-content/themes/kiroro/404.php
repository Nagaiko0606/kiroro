<?php get_header(); ?>
<div class="p-content">
    <div class="l-container">
        <div class="c-heading-secondary p-heading-secondary">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-green.png" alt="" width="137" height="140">
            <h1 class="c-heading-secondary__text --white">404 Not Found</h1>
        </div>
        <p class="p-text-large u-align-center">
            ページが見つかりませんでした
        </p>
        <p class="p-text u-align-center">
            お探しのページは削除されたか、名前が変更された、
            または一時的に利用できない可能性があります。
        </p>
        <div class="u-align-center p-button">
            <a href="<?php echo esc_url( home_url() ); ?>" class="c-button --secondary">トップへ戻る</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>