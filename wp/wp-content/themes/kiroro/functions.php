<?php

function mytheme_setup()
{
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('editor-styles');
    add_theme_support('theme-json');
    add_editor_style('/style.css');
    add_editor_style('/assets/css/main.css');
}
add_action('after_setup_theme', 'mytheme_setup');

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
        array(), 
        filemtime(get_theme_file_path('style.css'))
    );

    // lightboxのCSSを読み込み
    wp_enqueue_style(
        'lightbox-style',
        get_template_directory_uri() . '/assets/js/vender/lightbox/css/lightbox.min.css',
        array(),
        filemtime(get_theme_file_path('/assets/js/vender/lightbox/css/lightbox.min.css'))
    );

    // swiperのCSSを読み込み
    wp_enqueue_style(
        'swiper-style',
        get_template_directory_uri() . '/assets/js/vender/swiper/swiper-bundle.min.css',
        array(),
        filemtime(get_theme_file_path('/assets/js/vender/swiper/swiper-bundle.min.css'))
    );

    wp_enqueue_style(
        'common-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array('google-fonts', 'lightbox-style'),
        filemtime(get_theme_file_path('/assets/css/main.css'))
    );
    // フロントページのスタイルを読み込む
    if (is_front_page()) {
        wp_enqueue_style(
            'mytheme-front-style',
            get_template_directory_uri() . '/assets/css/project/home/style.css',
            array('common-style'),
            filemtime(get_theme_file_path('/assets/css/project/home/style.css'))
        );
        wp_enqueue_style(
            'mytheme-group-map-style',
            get_template_directory_uri() . '/assets/group-map/group-map.css',
            array('common-style'),
            filemtime(get_theme_file_path('/assets/group-map/group-map.css'))
        );
    }
    // お知らせページのスタイルを読み込む
    if (is_home() || is_single() ) {
        wp_enqueue_style(
            'mytheme-news-style',
            get_template_directory_uri() . '/assets/css/project/news/style.css',
            array('common-style'),
            filemtime(get_theme_file_path('assets/css/project/news/style.css'))
        );
    }
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
                get_template_directory_uri() . $css_path,
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
                get_template_directory_uri() . '/assets/css/project/404/style.css',
                array('common-style'),
                filemtime($css_file)
            );
        }
    }

    // lightboxのJavaScriptを読み込み
    wp_enqueue_script(
        'lightbox-script',
        get_template_directory_uri() . '/assets/js/vender/lightbox/js/lightbox.min.js',
        array('jquery'),
        filemtime(get_theme_file_path('assets/js/vender/lightbox/js/lightbox.min.js')),
        true,
    );
    
    // swiperのJavaScriptを読み込み
    wp_enqueue_script(
        'swiper-script',
        get_template_directory_uri() . '/assets/js/vender/swiper/swiper-bundle.min.js',
        array('jquery'),
        filemtime(get_theme_file_path('/assets/js/vender/swiper/swiper-bundle.min.js')),
        true,
    );

    // 共通JavaScriptファイルの読み込み
    wp_enqueue_script(
        'custom_script',
        get_stylesheet_directory_uri() . '/assets/js/script.js',
        array('lightbox-script'),
        filemtime(get_theme_file_path('assets/js/script.js')),
        true,
    );
    // トップページのみmap.jsを読み込む
    if (is_front_page()) {
        wp_enqueue_script(
            'map-script',
            get_template_directory_uri() . '/assets/group-map/map.js',
            array('custom_script'),
            filemtime(get_theme_file_path('/assets/group-map/map.js')),
            true,
        );

        // JSにテンプレートディレクトリURIを渡す
        wp_localize_script(
            'map-script',
            'templateDirectory',
            array(
                'uri' => get_template_directory_uri(),
            )
        );
    }
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
        'format' => (get_option('permalink_structure')) ? 'page/%#%/' : '?paged=%#%',
        'current' => $paged,
        'total' => $total_pages,
        'prev_text' => '<span aria-hidden="true">&lsaquo;</span><span class="screen-reader-text">前のページ</span>',
        'next_text' => '<span aria-hidden="true">&rsaquo;</span><span class="screen-reader-text">次のページ</span>',
        'before_page_number' => '<span class="page-number">',
        'after_page_number' => '</span>',
        'type' => 'array'
    ]);

    if ($pages) {
        echo '<nav class="p-pagination c-pagination" aria-label="Paging posts"><div class="nav-links">';

        // 総ページ数が2ページ超の場合のみ「最初のページへ」リンクを表示
        if ($total_pages > 2 && $paged > 1) {
            echo '<a href="' . esc_url(get_pagenum_link(1)) . '" class="first page-numbers">';
            echo '<span aria-hidden="true">&laquo;</span><span class="screen-reader-text">最初のページ</span>';
            echo '</a>';
        }

        foreach ($pages as $page) {
            echo $page;
        }

        // 総ページ数が2ページ超の場合のみ「最後のページへ」リンクを表示
        if ($total_pages > 2 && $paged < $total_pages) {
            echo '<a href="' . esc_url(get_pagenum_link($total_pages)) . '" class="last page-numbers">';
            echo '<span aria-hidden="true">&raquo;</span><span class="screen-reader-text">最後のページ</span>';
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
            width: 320px;
            height: 45px;
            background-repeat: no-repeat;
            background-size: contain;
            background-image: url("<?php bloginfo('template_directory'); ?>/assets/images/common/logo.svg");
        }

        body.login {
            background-color: #FFFFFF;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_style');


// ブロックスタイルの登録
function mytheme_register_block_styles()
{
    //角丸写真
    register_block_style(
        'core/image',
        array(
            'name' => 'rounded-image',
            'label' => 'カスタム角丸'
        )
    );
    //数字付見出しの字下げ
    register_block_style(
        'core/heading',
        array(
            'name' => 'number-indent',
            'label' => '字下げ'
        )
    );
    //SPで縦並び
    register_block_style(
        'core/group',
        array(
            'name' => 'sp-column',
            'label' => 'SP縦並び'
        )
    );
    //SPで縦並び(逆)
    register_block_style(
        'core/group',
        array(
            'name' => 'sp-column-reverse',
            'label' => 'SP逆縦並び'
        )
    );
}
add_action('init', 'mytheme_register_block_styles');

// グループマップブロッグの登録
function render_group_map_block( $attributes, $content ) {
    ob_start();
    get_template_part( 'assets/group-map/group-map' );
    return ob_get_clean();
}

add_shortcode( 'group_map', 'render_group_map_block' );


// お知らせ一覧ブロックの登録
function render_news_section() {
    ob_start();
    get_template_part( 'template-parts/section-news' ); 
    return ob_get_clean();
    }
    add_shortcode( 'section_news', 'render_news_section' );