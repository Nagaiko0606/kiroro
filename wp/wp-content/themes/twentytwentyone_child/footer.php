        </main>
        <footer class="l-footer">
            <div class="l-container">
                <div class="l-footer__logo">
                    <a href="">
                        <picture>
                            <source
                                srcset="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo-long.webp 456w, <?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo-long@2x.webp 912w"
                                type="image/webp" sizes="(max-width : 767px) 83vw, 456px">
                            <!-- 768px以上でWebP非対応ブラウザの場合 -->
                            <img srcset="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo-long.jpg 456w, <?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo-long@2x.jpg 912w"
                                src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo-long.png" alt="新桜町動物医療センター"
                                sizes="(max-width : 767px) 83vw, 456px" width="447" height="54">
                        </picture>
                    </a>
                </div>
                <address class="l-footer__contact">
                    <span class="l-footer__contact-address">〒154-0014 東京都世田谷区新町2-25-16</span>
                    <span class="l-footer__contact-tel">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/icon-tel-b@2x.png" alt="電話" width="34" height="34">
                        03-6413-9982
                    </span>
                </address>
                <nav class="l-footer__nav">
                    <ul class="l-footer__nav-list">
                        <li class="l-footer__nav-item">
                            <a href="">トップページ</a>
                        </li>
                        <li class="l-footer__nav-item">
                            <a href="stay">当院のご紹介</a>
                        </li>
                        <li class="l-footer__nav-item">
                            <a href="foodexperience">診療案内</a>
                        </li>
                        <li class="l-footer__nav-item">
                            <a href="system">ペットホテル</a>
                        </li>
                        <li class="l-footer__nav-item">
                            <a href="koyaruzawa">お知らせ</a>
                        </li>
                        <li class="l-footer__nav-item">
                            <a href="into-nature">スタッフブログ</a>
                        </li>
                        <li class="l-footer__nav-item">
                            <a href="into-nature">求人情報</a>
                        </li>
                    </ul>
                </nav>
                <div class="l-footer__copy">
                    © Sakurashinmachi Animal Medical Center
                </div>
            </div>
        </footer>
        <?php wp_footer() ?>
        </body>

        </html>