document.addEventListener('DOMContentLoaded', function () {

    // Initialize Principals Swiper with Continuous Marquee Effect
    const principalsSwiper = new Swiper('.principals-slider', {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        allowTouchMove: false,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
            pauseOnMouseEnter: false, // Ensure it keeps running on hover
        },
        speed: 5000, // Adjusted speed for smooth flow
        freeMode: true, // Enables free scrolling
        freeModeMomentum: false, // Disables momentum so it doesn't accelerate/decelerate
        breakpoints: {
            640: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 40,
            },
        }
    });

    // Initialize Numbers Swiper (Same as Principals)
    const numbersSwiper = new Swiper('.numbers-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        allowTouchMove: false,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
            pauseOnMouseEnter: false,
        },
        speed: 5000,
        freeMode: true,
        freeModeMomentum: false,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
        }
    });

    // Initialize Clients Swiper (Same as Principals)
    const clientsSwiper = new Swiper('.clients-slider', {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        allowTouchMove: false,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
            pauseOnMouseEnter: false,
        },
        speed: 5000,
        freeMode: true,
        freeModeMomentum: false,
        breakpoints: {
            640: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 50,
            },
        }
    });

    // Number Counting Animation (Numbers at a Glance)
    const counters = document.querySelectorAll('.counter');
    const speed = 200; // The lower the slower

    const animateCounters = () => {
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;

                // Lower inc to slow and higher to speed up
                const inc = target / speed;

                if (count < target) {
                    // Check if target is a float or int
                    counter.innerText = Math.ceil(count + inc);
                    setTimeout(updateCount, 15);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });
    };

    // Use Intersection Observer to trigger animation when in viewport
    const options = {
        root: null,
        threshold: 0.5,
        rootMargin: "0px"
    };

    const observer = new IntersectionObserver(function (entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.disconnect(); // Run only once
            }
        });
    }, options);

    const statsSection = document.querySelector('.counter');
    if (statsSection) {
        // Observe the parent section or just the first counter
        observer.observe(statsSection);
    }

});
