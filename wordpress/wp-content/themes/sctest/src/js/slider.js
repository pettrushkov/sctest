import Swiper from "swiper";
import {Pagination, Navigation} from "swiper/modules";

document.addEventListener("DOMContentLoaded", () => {
    "use strict";

    slider();
});

const slider = () => {
    const slider = document.querySelector(".slider-carousel");

    if (slider) {
        let init = false;
        let swiper;

        function swiperCard() {
            if (window.innerWidth > 991) {
                if (!init) {
                    init = true;
                    swiper = new Swiper(slider, {
                        modules: [Pagination, Navigation],
                        spaceBetween: 35,
                        loop: true,
                        pagination: {
                            el: slider.querySelector(".slider-carousel-pagination"),
                            clickable: true,
                        },
                        navigation: {
                            nextEl: slider.querySelector(".swiper-button-next"),
                            prevEl: slider.querySelector(".swiper-button-prev"),
                        },
                    });
                }
            } else if (init) {
                swiper.destroy();
                init = false;
            }
        }

        swiperCard();
        window.addEventListener("resize", swiperCard);
    }
};