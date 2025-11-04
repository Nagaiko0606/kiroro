'use strict';

window.addEventListener('load', () => {
  setHeaderHeight();
});

window.addEventListener('resize', setHeaderHeight);

function setHeaderHeight() {
  requestAnimationFrame(() => {
    const header = document.querySelector('.l-header');
    if (header) {
      const headerHeight = header.offsetHeight;
      document.documentElement.style.setProperty('--header-height', `${headerHeight}px`);
    }
  });
}

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
  });

  // ヘッダー影の追加
  scrollHeaderShadow();
  function scrollHeaderShadow() {
    const header = document.querySelector('.l-header');
    if (header) {
      window.addEventListener('scroll', () => {
        header.classList.toggle('--shadow', window.scrollY > 0);
      });
    }
  }

  // スワイパー
  const swiper = new Swiper('.p-swiper', {
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    speed: 1000,
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },
  });
});
