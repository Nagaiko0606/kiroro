<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ファビコン -->
    <link rel="icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/favicon.ico" sizes="32x32">
    <link rel="icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/apple-touch-icon.png">
    <link rel="manifest" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/manifest.json">
    <?php wp_head(); ?>
</head>

<body>
    <?php wp_body_open(); ?>
    <header class="l-header --fixed">
        <div class="l-header__inner">
            <div class="l-header__left">
                <a href="<?php echo esc_url(home_url()); ?>" class="">
                    <picture>
                        <source
                            srcset="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo-long.webp 447w, <?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo-long@2x.webp 894w"
                            type="image/webp"
                            sizes="(max-width: 767px) 70%, 446px">
                        <img
                            srcset="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo-long.png 447w, <?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo-long@2x.png 894w"
                            src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo-long.png"
                            alt=""
                            sizes="(max-width: 767px) 70%, 446px" width="447" height="54">
                    </picture>
                </a>
            </div>
            <div class="l-header__right">
                <p class="l-header__text">予約不要・<br class="l-header__text-br">土日診察可能</p>
                <dl class="l-header__tel">
                    <dt>お問い合わせ</dt>
                    <dd>
                        03-6413-9982
                    </dd>
                </dl>
                <!-- ドロワーメニューアイコン -->
                <button type="button" id="js-hamburger" class="l-hamburger" aria-controls="js-spMenu" aria-expanded="false"
                    aria-label="メニューを開閉する" tabindex="2">
                </button>
            </div>
        </div>
    </header>
    <!-- ドロワーメニューコンテンツ　-->
    <div class="l-drawerNav-wrapper" id="js-spMenu" aria-hidden="true" aria-label="メニューリスト">
        <div class="l-drawerNav-wrapper__title">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/drawer_menu.svg" alt="MENU">
        </div>
        <nav class="l-drawerNav">
            <ul class="l-drawerNav__list">
                <li class="l-drawerNav__item">
                    <a href="<?php echo esc_url(home_url()); ?>">トップページ</a>
                    <ul class="l-drawerNav__sublist">
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url('#about')); ?>" class="l-drawerNav__sublink">病院概要</a></li>
                    </ul>
                </li>
                <li class="l-drawerNav__item">
                    <a href="<?php echo esc_url(home_url('/concept')); ?>">当院のご紹介</a>
                    <ul class="l-drawerNav__sublist">
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url('/concept#feature')); ?>" class="l-drawerNav__sublink">当院の特徴</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url('/concept#staff')); ?>" class="l-drawerNav__sublink">スタッフ紹介</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url('/concept#info')); ?>" class="l-drawerNav__sublink">診療情報・アクセス</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url('/concept#equipment')); ?>" class="l-drawerNav__sublink">施設紹介</a></li>
                    </ul>
                </li>
                <li class="l-drawerNav__item">
                    <a href="<?php echo esc_url(home_url('/menu')); ?>">診療案内</a>
                    <ul class="l-drawerNav__sublist">
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url('/menu#preventive-medicine')); ?>" class="l-drawerNav__sublink">予防医療</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url('/menu#health-check')); ?>" class="l-drawerNav__sublink">健康診断</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url('/menu#neutering_and_spaying')); ?>" class="l-drawerNav__sublink">去勢避妊手術</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url('/menu#departments')); ?>" class="l-drawerNav__sublink">診療科目紹介</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url('/menu#second-opinion')); ?>" class="l-drawerNav__sublink">セカンドオピニオン</a></li>
                    </ul>
                </li>
                <li class="l-drawerNav__item">
                    <a href="<?php echo esc_url(home_url('/pet-stay')); ?>">ペットホテル</a>
                </li>
                <li class="l-drawerNav__item">
                    <a href="<?php echo esc_url(home_url('/news')); ?>">お知らせ</a>
                </li>
                <li class="l-drawerNav__item">
                    <a href="<?php echo esc_url(home_url('/blog')); ?>">スタッフブログ</a>
                </li>
                <li class="l-drawerNav__item">
                    <a href="<?php echo esc_url(home_url('/recruit')); ?>">求人情報</a>
                </li>
            </ul>

        </nav>
        <div class="l-drawerNav-wrapper__bottom">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/drawer_text.svg" class="l-drawerNav-wrapper__open" alt="予約不要・土日診察可能" width="188" height="16">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/drawer_logo.svg" class="l-drawerNav-wrapper__logo" alt="桜新町動物医療センター" width="219" height="54">
            <div class="l-drawerNav-wrapper__tel">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/icon-tel@2x.png" alt="電話番号" width="34" height="34">
                03-6413-9982
            </div>
        </div>
    </div>
    </div>
    <div class="l-drawerBackground" id="js-drawerBackground" aria-hidden="true" aria-label="スマホ用メニューの背景"
        role="presentation"></div>
    <!-- ドロワーメニュー ends-->
    <main class="l-main --underlayer">