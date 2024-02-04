document.addEventListener( 'DOMContentLoaded', function() {
    // SETUP OPTION SLIDE SHOW
    const splide = new Splide( '.splide', {
        type   : 'loop',
        pagination: true,
        perPage: 4,
        focus: 'center',
        autoplay: "play",
        breakpoints: {
            1200: {
                perPage: 3,
            },
            767: {
                perPage: 1,
            },
        },
        gap: '1.5rem',
        arrows: false,     
    });
    splide.mount();

});

// SETUP OPTION SLIDE SWIPER
const swiper = new Swiper(".swiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    initialSlide: 2,
    loop: true,
    speed: 600,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 10,
      stretch: 120,
      depth: 200,
      modifier: 1,
      slideShadows: false,
    },
    on: {
      click(event) {
        swiper.slideTo(this.clickedIndex);
      },
    },
    pagination: {
      el: ".swiper-pagination",
    },
});