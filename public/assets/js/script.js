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