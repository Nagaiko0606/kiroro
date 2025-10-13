<?php

function mytheme_setup()
{
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('editor-styles');
    add_theme_support( 'editor-font-sizes' );
    add_theme_support( 'theme-json' );
    add_editor_style('/style.css');
    add_editor_style('/assets/css/main.css');
}
add_action('after_setup_theme', 'mytheme_setup');


// head 内にGTMスクリプトを挿入　本番環境のみ
function add_gtm_head()
{
?>
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <!-- End Google Tag Manager -->
<?php
}
add_action('wp_head', 'add_gtm_head', 0);

function mytheme_enqueue_assets()
{
    // google fontsの読み込み
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap',
        array(),
        null
    );

    // テーマ用スタイルの読み込み
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri(),
        filemtime(get_theme_file_path('style.css'))
    );

    // lightboxのCSSを読み込み
    wp_enqueue_style(
        'lightbox-style',
        get_stylesheet_directory_uri() . '/assets/js/vender/lightbox/css/lightbox.min.css',
        array(),
        filemtime(get_theme_file_path('/assets/js/vender/lightbox/css/lightbox.min.css'))
    );

    wp_enqueue_style(
        'common-style',
        get_stylesheet_directory_uri() . '/assets/css/main.css',
        array('google-fonts', 'lightbox-style'),
        filemtime(get_theme_file_path('/assets/css/main.css'))
    );
    // フロントページのスタイルを読み込む
    if (is_front_page()) {
        wp_enqueue_style(
            'mytheme-front-style',
            get_stylesheet_directory_uri() . '/assets/css/project/home/style.css',
            array('common-style'),
            filemtime(get_theme_file_path('/assets/css/project/home/style.css'))
        );
    }
    // ブログページのスタイルを読み込む
    // if (is_home() || is_single()) {
    //     wp_enqueue_style(
    //         'mytheme-blog-style',
    //         get_stylesheet_directory_uri() . '/assets/css/project/information/style.css',
    //         array('common-style'),
    //         filemtime(get_theme_file_path('/assets/css/project/information/style.css'))
    //     );
    // }
    // 固定ページのスタイル読み込み
    if (is_page()) {
        $slug = get_post_field('post_name');
        $parent_id = wp_get_post_parent_id(get_the_ID());

        if ($parent_id) {
            // 親ページがある場合は親ページのスラッグを使用
            $parent_slug = get_post_field('post_name', $parent_id);
            $css_path = '/assets/css/project/' . $parent_slug . '/style.css';
        } else {
            // 親ページがない場合は通常のスラッグを使用
            $css_path = '/assets/css/project/' . $slug . '/style.css';
        }

        $css_file = get_theme_file_path($css_path);

        if (file_exists($css_file)) {
            wp_enqueue_style(
                'mytheme-' . ($parent_id ? $parent_slug : $slug) . '-style',
                get_stylesheet_directory_uri() . $css_path,
                array('common-style'),
                filemtime($css_file)
            );
        }
    }

    // 404ページのスタイルを読み込む
    if (is_404()) {
        $css_file = get_template_directory() . '/assets/css/project/404/style.css';

        // ファイルが存在する場合のみCSSを読み込み
        if (file_exists($css_file)) {
            wp_enqueue_style(
                'mytheme-404-style',
                get_stylesheet_directory_uri() . '/assets/css/project/404/style.css',
                array('common-style'),
                filemtime($css_file)
            );
        }
    }

    // SwiperのJavaScriptを読み込み
    wp_enqueue_script(
        'lightbox-script',
        get_stylesheet_directory_uri() . '/assets/js/vender/lightbox/js/lightbox.min.js',
        array(),
        filemtime(get_theme_file_path('/assets/js/vender/lightbox/js/lightbox.min.js')),
    );

    // 共通JavaScriptファイルの読み込み
    wp_enqueue_script(
        'custom_script',
        get_stylesheet_directory_uri() . '/assets/js/script.js',
        array('lightbox-script'),
        filemtime(get_theme_file_path('/assets/js/script.js')),
    );
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets');


// 最初へと最後へがあるカスタムページネーション
function custom_pagination($query = null)
{
    if (!$query) {
        global $wp_query;
        $query = $wp_query;
    }

    $big = 999999999; // 大きな数値を設定（置換用）
    $paged = max(1, get_query_var('paged'));
    $total_pages = $query->max_num_pages; // 総ページ数

    $pages = paginate_links([
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => $paged,
        'total' => $total_pages,
        'prev_text' => '<img src="' . get_template_directory_uri() . '/assets/images/common/pagination_before.svg" alt="Previous">',
        'next_text' => '<img src="' . get_template_directory_uri() . '/assets/images/common/pagination_next.svg" alt="Next">',
        'before_page_number' => '<span class="page-number">',
        'after_page_number' => '</span>',
        'type' => 'array'
    ]);

    if ($pages) {
        echo '<nav class="p-pagination c-pagination" aria-label="Paging posts"><div class="nav-links">';

        // 総ページ数が2ページ超の場合のみ「最初のページへ」リンクを表示
        if ($total_pages > 2 && $paged > 1) {
            echo '<a href="' . esc_url(get_pagenum_link(1)) . '" class="first page-numbers">';
            echo '<img src="' . get_template_directory_uri() . '/assets/images/common/pagination_first.svg" alt="First">';
            echo '</a>';
        }

        foreach ($pages as $page) {
            echo $page;
        }

        // 総ページ数が2ページ超の場合のみ「最後のページへ」リンクを表示
        if ($total_pages > 2 && $paged < $total_pages) {
            echo '<a href="' . esc_url(get_pagenum_link($total_pages)) . '" class="last page-numbers">';
            echo '<img src="' . get_template_directory_uri() . '/assets/images/common/pagination_last.svg" alt="Last">';
            echo '</a>';
        }

        echo '</div></nav>';
    }
}


// ログイン画面のカスタマイズ
function custom_login_style()
{ ?>
    <style>
        #login h1 a {
            width: 200px;
            height: 100px;
            background-repeat: no-repeat;
            background-size: contain;
            background-image: url("<?php bloginfo('template_directory'); ?>/assets/images/common/logo-long@2x.jpg");
        }

        body.login {
            background-color: #FFFFFF;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_style');
