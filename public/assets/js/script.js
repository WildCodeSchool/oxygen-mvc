// Setup Slide Show

document.addEventListener( 'DOMContentLoaded', function() {
    const splide = new Splide( '.splide', {
        type   : 'loop',
        pagination: true,
        autoplay: true,
        perPage: 4,
        focus: 'center',
        reducedMotion: {
            interval: 400,
            speed: 3600,
            autoplay: "play"
        },
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
} );