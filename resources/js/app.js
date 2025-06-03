import './bootstrap';
import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';

document.addEventListener('DOMContentLoaded', () => {
  const swiper = new Swiper('.mySwiper', {
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });
});