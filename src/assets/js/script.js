'use strict';

document.addEventListener('DOMContentLoaded', () => {


  // ハンバーガーメニュー
  const hamburger = document.getElementById('js-hamburger');
  const spMenu = document.getElementById('js-spMenu');
  const spMenuBg = document.getElementById('js-drawerBackground');
  document.getElementById('js-hamburger').addEventListener('click', function () {

    if (this.getAttribute('aria-expanded') === "false") {
      this.setAttribute('aria-expanded', true);
      spMenu.setAttribute('aria-hidden', false);
      spMenu.classList.add('is-active');
      spMenuBg.classList.add('is-active');
    } else {
      this.setAttribute('aria-expanded', false);
      spMenu.setAttribute('aria-hidden', true);
      spMenu.classList.remove('is-active');
      spMenuBg.classList.remove('is-active');
    }
  })
  document.querySelectorAll('.js-menuClose, #js-drawerBackground').forEach(function (item) {
    item.addEventListener('click', function () {
      spMenu.classList.remove('is-active');
      spMenu.setAttribute('aria-hidden', true);
      hamburger.setAttribute('aria-expanded', false);
      spMenuBg.classList.remove('is-active');
    })
  })

  // スクロールダウンヘッダー
  // window.addEventListener('scroll', function () {
  //   const header = document.querySelector('.l-header');
  //   const scrollY = window.scrollY;

  //   if (scrollY >= 100) {
  //     header.classList.add("--sticky");
  //   } else {
  //     header.classList.remove('--sticky');
  //   }
  // })

  // ヘッダー高さ
  setHeaderHeight();

  function setHeaderHeight() {
    requestAnimationFrame(() => {
      const header = document.querySelector('.l-header');
      if (header) {
        const headerHeight = header.offsetHeight;
        document.documentElement.style.setProperty('--header-height', `${headerHeight}px`);
      }
    });
  }
  setHeaderHeight();
  window.addEventListener('resize', setHeaderHeight);

  // 動画要素の取得
  const video = document.getElementById("js-bgVideo");
  const mp4 = document.getElementById("js-source-mp4");
  const webm = document.getElementById("js-source-webm");

  let currentDevice = "";

  if (video) {
    const themePath = mp4.src.replace(/\/$/, ""); // 最後のスラッシュを削除

    // 動画の切り替え処理
    function updateVideoSource() {
      const newDevice = window.innerWidth <= 767 ? "sp" : "pc";
      const mp4Src = `${themePath}/assets/images/home/video-${newDevice}.mp4`;
      const webmSrc = `${themePath}/assets/images/home/video-${newDevice}.webm`;

      // デバイスが切り替わった場合のみ動画を変更
      if (newDevice !== currentDevice) {
        currentDevice = newDevice;
        mp4.src = mp4Src;
        webm.src = webmSrc;
        video.load(); // 動画を再読み込み
      }
    }

    // 初回実行
    updateVideoSource();

    // 画面リサイズ時に動画を切り替える
    window.addEventListener("resize", updateVideoSource);

  }

});
