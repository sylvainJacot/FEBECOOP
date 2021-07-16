const ActualitesSwiper = new Swiper(".js-type-b-swiper", {
  // Optional parameters
  direction: "horizontal",
  visibilityFullFit: true,
  slidesPerView: 1,
  spaceBetween: 16,
  centeredSlides: false,
  breakpoints: {
    768: {
      spaceBetween: 36,
      slidesPerView: 2,
    },
    1025: {
      spaceBetween: 40,
      slidesPerView: 3,
    },
    1300: {
      spaceBetween: 51,
      slidesPerView: 3,
    },
  },
  // If we need pagination
  pagination: {
    el: ".js-swiper-pagination-type-b",
    type: 'bullets',
    clickable: 'true',
  },

  // Navigation arrows
  navigation: {
    nextEl: ".js-button-next-actus",
    prevEl: ".js-button-prev-actus",
  },
});


let ProjetsSwiperM = new Swiper(".js-projets-swiper-mobile", {
  visibilityFullFit: true,
  slidesPerView: 1,
  spaceBetween: 36,
  breakpoints: {
    768: {
      spaceBetween: 36,
      slidesPerView: 2,
    },
  },
  pagination: {
    el: ".js-pagination-mobile-projets",
  },
});

let ProjetsSwiperL = new Swiper(".js-projets-swiper-laptop", {
  visibilityFullFit: true,
  slidesPerView: 1,
  effect: "fade",
  speed: 600,
  fadeEffect: {
    crossFade: true,
  },
  // Navigation arrows
  navigation: {
    nextEl: ".js-button-next-projets",
    prevEl: ".js-button-prev-projets",
  },
  pagination: {
    el: ".js-pagination-laptop-projets",
    type: "fraction",
  },
});
