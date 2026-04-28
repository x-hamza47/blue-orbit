window.initSwiper = function({
    selector,
    loop = true,
    spaceBetween,
    delay,
    slidesPerView = 1,
    md,
    lg,
    autoplay,
    breakpoints,
    pagination,
}) {
    const config = {
        loop,
        slidesPerView,
        spaceBetween: spaceBetween ?? 30,

        autoplay: autoplay ?? {
            delay: delay ?? 5000,
            disableOnInteraction: false,
        },

        pagination: pagination ?? {
            el: `${selector} .swiper-pagination`,
            clickable: true,
        },

        breakpoints: breakpoints ?? {
            768: {
                slidesPerView: md ?? 2,
            },
            1280: {
                slidesPerView: lg ?? 3,
            },
        },
    };

    return new Swiper(selector, config);
}
