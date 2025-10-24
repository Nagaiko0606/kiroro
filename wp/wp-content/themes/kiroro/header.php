<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ファビコン -->
    <!-- <link rel="icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/favicon.ico" sizes="32x32">
    <link rel="icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/apple-touch-icon.png">
    <link rel="manifest" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/manifest.json"> -->
    <?php wp_head(); ?>
</head>

<body>
    <?php wp_body_open(); ?>
    <header class="l-header">
        <div class="l-header__inner">
            <div class="l-header__left">
                <a href="<?php echo esc_url(home_url()); ?>" class="l-header__logo-link">
                <?php if(is_front_page()): ?>
                <h1>
                <?php endif; ?>
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/common/logo.svg" alt="キロロ動物病院" class="l-header__logo">
                <?php if(is_front_page()): ?>
                </h1>
                <?php endif; ?>
                </a>
            </div>
            <div class="l-header__right">
                <p class="l-header__text">予約不要・<br class="l-header__text-br">土日診察可能</p>
                <dl class="l-header__tel">
                    <dt>お問い合わせ</dt>
                    <dd>
                        042-659-7799
                    </dd>
                </dl>
                <!-- ドロワーメニューアイコン -->
                <button type="button" id="js-hamburger" class="l-hamburger" aria-controls="js-spMenu" aria-expanded="false"
                    aria-label="メニューを開く" tabindex="2">
                </button>
            </div>
        </div>
    </header>
    <!-- ドロワーメニューコンテンツ　-->
    <div class="l-drawerNav-wrapper" id="js-spMenu" aria-hidden="true" aria-label="メニューリスト">
        <div class="l-drawerNav-wrapper__header">
            <div class="l-drawerNav-wrapper__header-text">Menu</div>
            <button type="button" class="l-drawerNav-wrapper__close js-menuClose" aria-controls="js-spMenu" aria-expanded="false"
                aria-label="メニューを閉じる" tabindex="2">×</button>
        </div>
        <nav class="l-drawerNav">
            <ul class="l-drawerNav__list">
                <li class="l-drawerNav__item --green">
                    <a href="<?php echo esc_url(home_url()); ?>">トップページ</a>
                    <ul class="l-drawerNav__sublist --green">
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url()); ?>#overview" class="l-drawerNav__sublink">病院概要</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url()); ?>#doctor-schedule" class="l-drawerNav__sublink">獣医師勤務表</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url()); ?>#group-hospital" class="l-drawerNav__sublink">グループ病院紹介</a></li>
                    </ul>
                </li>
                <li class="l-drawerNav__item --blue">
                    <a href="<?php echo esc_url(home_url()); ?>/about">当院について</a>
                    <ul class="l-drawerNav__sublist --blue">
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url()); ?>/about/#feature" class="l-drawerNav__sublink">当院の特徴</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url()); ?>/about/#staff" class="l-drawerNav__sublink">スタッフ紹介</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url()); ?>/about/#access" class="l-drawerNav__sublink">診療情報・アクセス</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url()); ?>/about/#facility" class="l-drawerNav__sublink">施設紹介</a></li>
                    </ul>
                </li>
                <li class="l-drawerNav__item --orange">
                    <a href="<?php echo esc_url(home_url()); ?>/information">診療のご案内</a>
                    <ul class="l-drawerNav__sublist --orange">
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url()); ?>/information/#preventive-medicine" class="l-drawerNav__sublink">予防医療</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url()); ?>/information/#health-check" class="l-drawerNav__sublink">健康診断</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url()); ?>/information/#neutering-and-spaying" class="l-drawerNav__sublink">去勢避妊手術</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url()); ?>/information/#departments" class="l-drawerNav__sublink">診療科目紹介</a></li>
                        <li class="l-drawerNav__subitem"><a href="<?php echo esc_url(home_url()); ?>/information/#second-opinion" class="l-drawerNav__sublink">セカンドオピニオン</a></li>
                    </ul>
                </li>
                <li class="l-drawerNav__item --pink">
                    <a href="<?php echo esc_url(home_url()); ?>/news">お知らせ</a>
                </li>
            </ul>

        </nav>
        <div class="l-drawerNav-wrapper__bottom">
            <p class="l-drawerNav-wrapper__note">当院は予約優先制です。<br>
                お電話か予約ページから<br>
                ご予約ください。</p>
            <div class="l-drawerNav-wrapper__tel">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/common/icon-tel-blue.svg" alt="電話番号" width="23" height="23">
                042-659-77799
            </div>
            <div class="l-drawerNav-wrapper__book">
                <a href="<?php echo esc_url('#'); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/common/icon-book-blue.svg" alt="オンライン予約サイトへのリンク" width="29" height="22">
                    オンライン診療予約</a>
            </div>
            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/common/logo-secondary.svg" alt="キロロ動物病院" lass="l-drawerNav-wrapper__logo">
        </div>
    </div>
    </div>
    <div class="l-drawerBackground" id="js-drawerBackground" aria-hidden="true" aria-label="メニューの背景"
        role="presentation"></div>
    <!-- ドロワーメニュー ends-->
    <main class="l-main">