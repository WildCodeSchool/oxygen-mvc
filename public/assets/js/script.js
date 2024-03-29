document.addEventListener( 'DOMContentLoaded', function() {
    // SETUP OPTION SLIDE SHOW
    const splide = new Splide( '.splide', {
        type   : 'loop',
        pagination: false,
        perPage: 4,
        focus: 'center',
        autoplay: false,
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

    // SETUP OPTION SECOND SLIDE

    const splide2 = new Splide( '#course', {
        type   : 'carousel',
        pagination: false,
        perPage: 5,
        focus: 'center',
        breakpoints: {
            1200: {
                perPage: 3,
            },
            767: {
                perPage: 1,
            },
        },
        gap: '1.5rem',
        arrows: true,     
    
    });
    splide2.mount();
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

const swiper2 = new Swiper(".swiper2", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    initialSlide: 3,
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
        swiper2.slideTo(this.clickedIndex);
      },
    },
    pagination: {
      el: ".swiper-pagination",
    },
});