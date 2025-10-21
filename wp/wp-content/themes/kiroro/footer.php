        </main>
        <footer class="l-footer">
            <div class="l-footer__inner">
                <div class="l-footer__left">
                    <div class="l-footer__info">
                        <span class="l-footer__info-ja">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/common/logo.svg" alt="キロロ動物病院">
                        </span>
                        <span class="l-footer__info-en">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/common/logo-en.svg" alt="KIRORO ANIMAL HOSPITAL">
                        </span>
                        <span class="l-footer__info-group">&copy; Mid Tokyo Holdings Ltd.</span>
                    </div>
                    <nav class="l-footer__nav">
                        <ul class="l-footer__nav-list">
                            <li class="l-footer__nav-item">
                                <a href="<?php echo esc_url(home_url()); ?>" class="l-footer__nav-link">トップページ</a>
                            </li>
                            <li class="l-footer__nav-item">
                                <a href="<?php echo esc_url(home_url()); ?>/about" class="l-footer__nav-link">当院について</a>
                            </li>
                            <li class="l-footer__nav-item">
                                <a href="<?php echo esc_url(home_url()); ?>/information" class="l-footer__nav-link">診療のご案内</a>
                            </li>
                            <li class="l-footer__nav-item">
                                <a href="<?php echo esc_url(home_url()); ?>/news" class="l-footer__nav-link">お知らせ</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="l-footer__right">
                    <div class="l-footer__contact">
                        <div class="l-footer__phone">
                            <span class="l-footer__phone-text">予約・お問い合わせ</span>
                            <span class="l-footer__phone-number"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/common/icon-tel-black.svg" alt="電話番号">042-659-7799</span>
                        </div>
                        <div class="l-footer__book">
                            <a href="<?php echo esc_url('#'); ?>" class="l-footer__book-link" target="_blank" rel="noopener noreferrer">
                                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/common/icon-book-black.svg" alt="">オンライン診療予約</a>
                        </div>
                    </div>
                    <div class="l-footer__group-logo">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/common/logo-hachioji-animal-group.svg" alt="HACHIOJI ANIMAL GROUP Since 1998">
                    </div>
                </div>

            </div>
        </footer>
        <?php wp_footer() ?>
        </body>

        </html>