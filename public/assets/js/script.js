document.addEventListener( 'DOMContentLoaded', function() {

    // BACK TO TOP
    function handleBackToTop() {
        const backToTopButton = document.querySelector('[data-backtop]');
    
        function handleBackToTopVisibility() {
          if (window.scrollY >= 200) {
            backToTopButton.style.display = 'block';
          } else {
            backToTopButton.style.display = 'none';
          }
        }
        function scrollToTop() {
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        }
    
        window.addEventListener('scroll', handleBackToTopVisibility);
        backToTopButton.addEventListener('click', scrollToTop);
        handleBackToTopVisibility();
    }
    handleBackToTop();


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
} );