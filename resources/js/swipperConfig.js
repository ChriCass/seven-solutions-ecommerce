// resources/js/swiperConfig.js
import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';

const initSwiper = () => {
    // Carrusel personalizado para bootcamp
    new Swiper('.bootcamp_container', {
        spaceBetween: 32,
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    // Carrusel personalizado para testimonios
    new Swiper('.testimonio__content', {
        loop: true,
        spaceBetween: 32,
        grabCursor: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            600: {
                slidesPerView: 2,
            },
            968: {
                slidesPerView: 3,
            },
        },
    });

    // Carrusel genérico
    new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // Otras opciones de Swiper...
    });
};

document.addEventListener('DOMContentLoaded', initSwiper);
