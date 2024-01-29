document.addEventListener("DOMContentLoaded", function () {

  // TRANSITION ELEMENT
  const animatedEls = document.querySelectorAll("[data-animation]");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      const animation = entry.target.getAttribute("data-animation");

      if (entry.isIntersecting) {
        entry.target.classList.add("animate", `${animation}`);
      } else {
        entry.target.classList.remove("animate", `${animation}`);
      }
    });
  });

animatedEls.forEach((el) => observer.observe(el));


  // Function to update active state of navbar links
  function updateActiveState() {
      // Get the current path URL
      var path = window.location.pathname;

      // Get all the navbar links
      var links = document.querySelectorAll('#target-nav a');

      // Loop through each link and check if the path matches
      links.forEach(function (link) {
          if (link.getAttribute('href') === path) {
              link.classList.add('active');
          } else {
              link.classList.remove('active');
          }
      });
  }

  // Initial update on page load
  updateActiveState();

  // Update active state on each URL change
  window.addEventListener('popstate', updateActiveState);

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

});


/* ---- particles.js config ---- */

particlesJS("particles-js", {
    "particles": {
      "number": {
        "value": 200,
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": {
        "value": "#ffffff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "fill": true,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 5
        },
        "image": {
          "src": "img/github.svg",
          "width": 100,
          "height": 100
        }
      },
      "opacity": {
        "value": 0.5,
        "random": false,
        "anim": {
          "enable": false,
          "speed": 1,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 3,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 40,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": true,
        "distance": 150,
        "color": "#ffffff",
        "opacity": 0.4,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 6,
        "direction": "none",
        "random": false,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": true,
          "mode": "grab"
        },
        "onclick": {
          "enable": true,
          "mode": "push"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 140,
          "line_linked": {
            "opacity": 1
          }
        },
        "bubble": {
          "distance": 400,
          "size": 40,
          "duration": 2,
          "opacity": 8,
          "speed": 3
        },
        "repulse": {
          "distance": 100,
          "duration": 0.4
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": true
});