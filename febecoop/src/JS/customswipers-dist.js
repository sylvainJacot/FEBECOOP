"use strict";var ActualitesSwiper=new Swiper(".js-type-b-swiper",{direction:"horizontal",visibilityFullFit:!0,slidesPerView:1,spaceBetween:22,centeredSlides:!1,breakpoints:{768:{spaceBetween:36,slidesPerView:2},1025:{spaceBetween:40,slidesPerView:3},1300:{spaceBetween:51,slidesPerView:3}},pagination:{el:".js-swiper-pagination-type-b",type:"bullets",clickable:"true"},navigation:{nextEl:".js-button-next-actus",prevEl:".js-button-prev-actus"}}),ProjetsSwiperM=new Swiper(".js-projets-swiper-mobile",{visibilityFullFit:!0,slidesPerView:1,spaceBetween:36,breakpoints:{768:{spaceBetween:36,slidesPerView:2}},pagination:{el:".js-pagination-mobile-projets"}}),ProjetsSwiperL=new Swiper(".js-projets-swiper-laptop",{visibilityFullFit:!0,slidesPerView:1,effect:"fade",speed:600,fadeEffect:{crossFade:!0},navigation:{nextEl:".js-button-next-projets",prevEl:".js-button-prev-projets"},pagination:{el:".js-pagination-laptop-projets",type:"fraction"}});