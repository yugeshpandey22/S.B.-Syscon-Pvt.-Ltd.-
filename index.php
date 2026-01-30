<?php
require_once 'config/constants.php';
require_once 'config/database.php';
require_once 'includes/head.php';
require_once 'includes/navbar.php';
?>

<!-- Premium Hero Section (Swiper.js with Shatter Effect) -->
<section class="hero-section position-relative overflow-hidden p-0 m-0 bg-black" style="height: 850px;">



    <!-- Swiper Container -->
    <div class="swiper hero-swiper h-100 w-100">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide position-relative" data-bg="assets/images/siemens_hero_banner.png" style="background-color: #004b87;">
                <!-- MOBILE FALLBACK IMAGE: Ensures visibility on all devices -->
                <img src="assets/images/siemens_hero_banner.png" class="d-lg-none w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover; z-index: 1;">
                
                <div class="container-fluid px-5 h-100 position-relative z-3">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-8">
                                
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 2 (Restored Old Banner) -->
            <div class="swiper-slide position-relative" data-bg="assets/css/siemens_sinova_banner.png" style="background-color: #000;">
                <img src="assets/css/siemens_sinova_banner.png" class="d-lg-none w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover; z-index: 1;">
                <div class="container-fluid px-5 h-100 position-relative z-3">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-8">
                                
                        </div>
                    </div>
                </div>
            </div>

             <!-- Slide 3 -->
            <div class="swiper-slide position-relative" data-bg="assets/css/banner3.png" style="background-color: #000;">
                 <img src="assets/css/banner3.png" class="d-lg-none w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover; z-index: 1;">
                 <div class="container-fluid px-5 h-100 position-relative z-3">
                     <div class="row h-100 align-items-center">
                        <div class="col-lg-8">
                             <!-- Text Removed as per request -->
                             <a href="achievements.php" class="btn btn-light btn-lg rounded-pill px-5 py-3 fw-bold text-primary hover-scale animated-fade-up delay-4">
                                Our Achievements <i class="fas fa-history ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 4 -->
            <div class="swiper-slide position-relative" data-bg="assets/css/banner4.png" style="background-color: #000;">
                 <img src="assets/css/banner4.png" class="d-lg-none w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover; z-index: 1;">
                 <div class="container h-100 position-relative z-3"></div>
            </div>
             <!-- Slide 5 -->
            <div class="swiper-slide position-relative" data-bg="assets/css/banner5.png" style="background-color: #000;">
                 <img src="assets/css/banner5.png" class="d-lg-none w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover; z-index: 1;">
                 <div class="container h-100 position-relative z-3"></div>
            </div>
             <!-- Slide 6 -->
            <div class="swiper-slide position-relative" data-bg="assets/css/banner6.png" style="background-color: #000;">
                 <img src="assets/css/banner6.png" class="d-lg-none w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover; z-index: 1;">
                 <div class="container h-100 position-relative z-3"></div>
            </div>
             <!-- Slide 7 -->
            <div class="swiper-slide position-relative" data-bg="assets/css/banner7.png" style="background-color: #000;">
                 <img src="assets/css/banner7.png" class="d-lg-none w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover; z-index: 1;">
                 <div class="container h-100 position-relative z-3"></div>
            </div>
             <!-- Slide 8 -->
            <div class="swiper-slide position-relative" data-bg="assets/css/banner8.png" style="background-color: #000;">
                 <img src="assets/css/banner8.png" class="d-lg-none w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover; z-index: 1;">
                 <div class="container h-100 position-relative z-3"></div>
            </div>
        </div>
        
        <!-- Custom Navigation -->
        <div class="swiper-button-next text-white z-3"></div>
        <div class="swiper-button-prev text-white z-3"></div>
        <div class="swiper-pagination z-3"></div>
        
    </div>
</section>

<style>
    /* Swiper & Tile Effect Styles */
    /* Global Scroll Fix (Prevents "Eder Udher") */
    html, body {
        overflow-x: hidden !important;
        width: 100%;
        position: relative;
    }

    .hero-section {
        width: 100%;
        max-width: 100vw;
        overflow: hidden !important;
    }

    .hero-swiper {
        background: #000;
        width: 100%;
        overflow: hidden;
    }
    .hero-swiper .swiper-slide {
        overflow: hidden;
        background: #000;
        width: 100%;
    }
    
    /* FIX: Button Clickability over Shatter Grid */
    .swiper-slide .btn {
        position: relative;
        z-index: 100 !important; 
        pointer-events: auto !important; /* Critical: Re-enable clicks */
    }
    
    /* The Grid Container */
    .shatter-grid {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-wrap: wrap;
        z-index: 0; /* Move to background level */
        pointer-events: none !important; /* Disable grid interaction to Fix Buttons */
    }
    
    /* Individual Tile */
    .shatter-tile {
        position: relative;
        overflow: hidden;
        /* Initial State: Scattered */
        opacity: 0;
        transform: scale(0) translate3d(0,0,0) rotate(0);
        /* FASTER ANIMATION: 0.6s transition instead of 1.2s */
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1), opacity 0.5s ease;
        background-size: cover; 
        background-repeat: no-repeat;
        /* Disable hover interaction to ensure buttons work */
        pointer-events: none !important; 
    }
    
    .shatter-overlay {
        position: absolute;
        top:0; left:0; width:100%; height:100%;
        /* Removed dark overlay to show Full HD Image Clarity */
        background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.1) 100%); 
        z-index: 1;
        pointer-events: none;
    }

    /* Active State: Assembled */
    .swiper-slide-active .shatter-tile {
        opacity: 1;
        transform: scale(1) translate3d(0,0,0) rotate(0deg) !important;
    }

    /* Interactive Hover Disabled */
    /* .swiper-slide-active .shatter-tile:hover { ... } */
    
    /* KEN BURNS / SLOW ZOOM ANIMATION */
    @keyframes slowZoom {
        from { transform: scale(1); }
        to { transform: scale(1.15); }
    }
    
    /* Apply zoom to the whole grid when active */
    .swiper-slide-active .shatter-grid {
        animation: slowZoom 6s linear forwards;
        transform-origin: center center;
    }
    
    /* Text Animations - Speed Up */
    .animated-text, .animated-fade-down, .animated-fade-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.5s ease-out; /* Faster text */
         pointer-events: none; /* Text container doesn't block */
    }
    .animated-fade-down { transform: translateY(-30px); }

    /* Ensure Layout Container is ABOVE the Shatter Grid */
    .swiper-slide .container {
        position: relative;
        z-index: 50 !important;
        pointer-events: none; 
    }
    
    /* CRITICAL FIX: Only enable clicks for elements in the ACTIVE slide */
    .swiper-slide-active .container * {
        pointer-events: auto !important; /* Buttons are clickable only when slide is visible */
    }
    
    /* Disable clicks for non-active slides to prevent ghost clicks */
    .swiper-slide:not(.swiper-slide-active) .container * {
        pointer-events: none !important;
    }
    
    .swiper-slide-active .animated-text, 
    .swiper-slide-active .animated-fade-down,
    .swiper-slide-active .animated-fade-up {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Delays for Staggered Text - Reduced */
    .delay-1 { transition-delay: 0.3s; }
    .delay-2 { transition-delay: 0.4s; }
    .delay-3 { transition-delay: 0.5s; }
    .delay-4 { transition-delay: 0.6s; }

    /* Nav Buttons */
    .swiper-button-next, .swiper-button-prev {
        background: rgba(255,255,255,0.1);
        width: 50px; height: 50px; border-radius: 50%;
        backdrop-filter: blur(5px);
        pointer-events: auto; /* Ensure clickable */
    }
    .swiper-button-next:hover, .swiper-button-prev:hover {
        
    }

   @media(max-width:768px){

    .hero-section{
        height:55vh;     /* Phone par perfect */
        min-height:420px;
    }

    .swiper-slide{
        background-position:60% center;
        /* 👉 Isse left wala product cut nahi hoga */
    }

    /* arrows hide */
    .swiper-button-next,
    .swiper-button-prev{
        display:none;
    }

}


        /* FORCE background image on slides */
        .hero-swiper .swiper-slide {
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-color: transparent !important;
        }

        .hero-swiper {
            background: transparent !important;
        }

        /* Hero height fix - DESKTOP */
        .hero-section {
            width: 100%;
            height: 650px; /* Precise height */
            position: relative;
        }

        .hero-swiper,
        .hero-swiper .swiper-slide {
            width: 100%;
            height: 100%;
        }

        /* Background Image Direct */
        .hero-swiper .swiper-slide {
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
        }
        
        /* 🔥 MOBILE RESPONSIVE FIX (Alignment & Alignment) */
        @media(max-width: 992px){
            
            /* 1. Control Height - AUTO (Removes White Bars) */
            .hero-section {
                height: auto !important;       
                min-height: 0 !important;  
                background: transparent !important; 
                padding: 0 !important; 
                margin: 0 !important;
                margin-top: -60px !important; /* Aggressive Pull-Up */
                position: relative;
                z-index: 1;
            }
            
            /* 2. Handle Image Scaling */
            .hero-swiper,
            .hero-swiper .swiper-slide {
                height: auto !important;       
                background: transparent !important;
                display: block !important;    
                min-height: 0 !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            
            /* If using IMG tag: FIT PROPERLY & IN FLOW */
            .hero-swiper img {
                display: block !important;     
                width: 100% !important;        
                height: auto !important;       
                object-fit: contain !important; 
                margin: 0 !important;
                padding: 0 !important;
                
                /* 🚨 CRITICAL FIX: Put image in flow so container doesn't collapse */
                position: relative !important; 
                top: 0 !important;
                left: 0 !important;
                
                /* Clarity */
                image-rendering: -webkit-optimize-contrast;
            }

            /* If using CSS Background: FORCE ASPECT RATIO HACK */
            .swiper-slide {
                background: transparent !important; 
                min-height: 0 !important; 
                margin: 0 !important;
                padding: 0 !important;
            }

            /* 3. Center Content (Hidden mainly) */
            .hero-section .container-fluid, 
            .hero-section .row {
                display: none !important; /* Hide overlay container completely */
            }
            
            .hero-section .col-lg-8 {
                width: 100% !important;
                padding: 0 !important;
            }

            /* 4. Text Overlay Hidden */
            .hero-section h1, .hero-section .display-3, .hero-section .lead, .hero-section .btn {
                display: none !important; 
            }
            
            .shatter-grid, .shatter-overlay, .swiper-button-next, .swiper-button-prev {
                display: none !important;
            }
        }

.hero-swiper,
.hero-swiper .swiper-slide{
    width:100%;
    height:100%;
}

/* Background Image Direct */
.hero-swiper .swiper-slide{
    background-size:cover !important;
    background-position:center !important;
    background-repeat:no-repeat !important;
}

/* 🔥 MOBILE FIX */
/* 🔥 MOBILE FIX - CLEANUP COMPLETE */
/* The conflicting 60vh rule has been removed to prevent white space bars */

    

    

     

    
</style>

<!-- Script for Shatter Effect -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // 1. Generate Tiles for each slide OR Handle Mobile Fallback
        const slides = document.querySelectorAll('.hero-swiper .swiper-slide');
        
        // MOBILE & TABLET FIX (<=1200px)
        if (window.innerWidth <= 1200) {

            // Apply normal background images instead of shatter tiles
            document.querySelectorAll('.hero-swiper .swiper-slide').forEach(slide => {
                const bg = slide.getAttribute('data-bg');
                if (bg) {
                    slide.style.backgroundImage = `url('${bg}')`;
                    slide.style.backgroundSize = 'cover';
                    slide.style.backgroundPosition = 'center';
                    slide.style.backgroundRepeat = 'no-repeat';
                }
            });

            // STOP shatter generation
            // Continue to Swiper initialization
        } else {
             // DESKTOP: Generate Shatter Tiles
             const rows = 5; 
             const cols = 8; 
             
             slides.forEach(slide => {
                 const bgImage = slide.getAttribute('data-bg');
                 if(!bgImage) return;
                 
                 // Create Grid Container
                 const grid = document.createElement('div');
                 grid.className = 'shatter-grid';
                 
                 // Create Overlay (for text readability)
                 const overlay = document.createElement('div');
                 overlay.className = 'shatter-overlay';
                 
                 // PREPEND so they sit BEHIND the existing content container in the DOM
                 slide.prepend(grid);
                 slide.prepend(overlay);

                 // Generate Tiles
                 for(let r=0; r<rows; r++) {
                     for(let c=0; c<cols; c++) {
                         const tile = document.createElement('div');
                         tile.className = 'shatter-tile';
                         tile.style.width = `${100/cols}%`;
                         tile.style.height = `${100/rows}%`;
                         
                         // Set Background Image & Position
                         tile.style.backgroundImage = `url('${bgImage}')`;
                         tile.style.backgroundSize = `${cols*100}% ${rows*100}%`;
                         tile.style.backgroundPosition = `${(c / (cols-1)) * 100}% ${(r / (rows-1)) * 100}%`;
                         
                         // Randomize Start Position
                         const randomX = (Math.random() - 0.5) * 500;
                         const randomY = (Math.random() - 0.5) * 500;
                         const randomRotate = (Math.random() - 0.5) * 360;
                         // FASTER RANDOM DELAY: Max 0.4s 
                         const randomDelay = Math.random() * 0.4; 
                         
                         tile.style.transform = `translate3d(${randomX}px, ${randomY}px, 0) rotate(${randomRotate}deg) scale(0)`;
                         tile.style.transitionDelay = `${randomDelay}s`;
                         
                         grid.appendChild(tile);
                     }
                 }
             });
        }

        // 2. Initialize Swiper
        const swiper = new Swiper('.hero-swiper', {
            loop: true,
            effect: 'fade', 
            fadeEffect: {
                crossFade: true
            },
            speed: 600, // Faster slide transition
            autoplay: {
                delay: 4000, 
                disableOnInteraction: false,
            },
            // CRITICAL FIX: Allow clicking on links/buttons inside slides
            preventClicks: false,
            preventClicksPropagation: false,
            touchStartPreventDefault: false,
            
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        // 3. Initialize Principals Slider
        new Swiper('.principals-slider', {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
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
            },

        });

        // 4. Initialize Clients Slider
        new Swiper('.clients-slider', {
            slidesPerView: 3,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 6,
                    spaceBetween: 40,
                },
            },
        });
    });
</script>




<!-- Principals Section (Logos) -->
<style>
    .client-logo-box {
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 180px; /* Increased height */
    }
    .client-logo-box img {
        max-height: 150px; /* Significantly increased logo size */
        width: auto;
        max-width: 100%;
        transition: transform 0.3s ease;
    }
    .client-logo-box:hover img {
        transform: scale(1.15);
    }
</style>
<section class="principals-section pt-2 pb-5 bg-white" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-5 mb-3" style="color: #333; font-weight: 300;">Our Principles</h2>
        </div>
        
        <div class="swiper principals-slider">
            <div class="swiper-wrapper align-items-center">
                <!-- Siemens -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/siemens.png" alt="Siemens" class="img-fluid">
                    </div>
                </div>
                <!-- Flender -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/flender.png" alt="Flender" class="img-fluid">
                    </div>
                </div>
                <!-- BCH -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/bch_final.png" alt="BCH Electric" class="img-fluid">
                    </div>
                </div>
                <!-- ASCO -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/asco12.png" alt="ASCO" class="img-fluid">
                    </div>
                </div>
                <!-- Secure -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/secure.png" alt="Secure" class="img-fluid">
                    </div>
                </div>
                <!-- Lapp -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/Lapp.png" alt="LAPP" class="img-fluid">
                    </div>
                </div>
                <!-- Connectwell -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/connectwell.png" alt="Connectwell" class="img-fluid">
                    </div>
                </div>
                <!-- Sinoplus -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/sinoplus.jpg" alt="Sinoplus" class="img-fluid">
                    </div>
                </div>
                
                <!-- DUPLICATE FOR SMOOTH LOOP -->
                <!-- Siemens -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/siemens.png" alt="Siemens" class="img-fluid">
                    </div>
                </div>
                <!-- Flender -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/flender.png" alt="Flender" class="img-fluid">
                    </div>
                </div>
                <!-- BCH -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/bch white.png" alt="BCH Electric" class="img-fluid">
                    </div>
                </div>
                <!-- ASCO -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/asco12.png" alt="ASCO" class="img-fluid">
                    </div>
                </div>
                <!-- Secure -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/secure.png" alt="Secure" class="img-fluid">
                    </div>
                </div>
                <!-- Lapp -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/Lapp.png" alt="LAPP" class="img-fluid">
                    </div>
                </div>
                <!-- Connectwell -->
                <div class="swiper-slide">
                    <div class="client-logo-box">
                        <img src="assets/css/connectwell.png" alt="Connectwell" class="img-fluid">
                    </div>
                </div>
            </div>
            </div>

        </div>
    </div>
</section>

<section class="py-5" style="background-color: #262629;" data-aos="fade-up">
  <div class="container">
    <div class="bg-white rounded-3 p-4 p-md-5 shadow-lg">
        <!-- Heading -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary h2">Welcome to S.B. Syscon Pvt. Ltd.</h2>
        </div>

        <div class="row g-5">
            <!-- LEFT CONTENT -->
            <div class="col-lg-8">
                <p class="fst-italic fw-semibold text-danger mb-4" style="font-size: 0.95rem;">
                    Driving Industrial Excellence Through Reliable Solutions, Ethical Practices & Customer-Centric Service
                </p>
                <div class="text-secondary" style="font-size: 0.9rem; line-height: 1.7; text-align: justify;">
                    <p>At <strong class="text-primary">S.B. Syscon Pvt. Ltd.</strong>, we are committed to delivering world-class electrical solutions that power progress across a wide spectrum of industries. With decades of experience and a deep understanding of industrial needs, we go beyond just supplying products—we partner with businesses to provide end-to-end, customized solutions that enhance efficiency, reliability, and sustainability.</p>
                    <p>Our expertise lies in offering sophisticated, efficient, and economical electrical products and turnkey solutions tailored to meet the unique requirements of our clients. Whether you’re in manufacturing, infrastructure, utilities, process industries, or emerging sectors, our offerings are designed to support diverse operational demands with precision and consistency.</p>
                    <p>As authorized channel partners of some of the world’s most respected multinational brands—SIEMENS, LAPP, INNOMOTICS  (Siemens Motors), SCHNEIDER ASCO, SECURE METERS, BCH,   CONNECTWELL and FLENDER GEARBOXES—we bring cutting-edge technology, global quality standards, and proven reliability to the Indian industrial landscape.</p>
                    <p><strong class="text-primary">Our expansive portfolio includes:</strong> Switchgears & Power Distribution Products, Wires & Cables for diverse applications, Energy Monitoring & Management Solutions, Industrial Motors and Drives, Heavy-Duty Gearboxes, Modular Enclosures & Control Gear Products, Customized Electrical Panels & Accessories, and a wide array of value-added products to support all your project needs.</p>
                    
                    <p>
                        What truly sets S.B. Syscon apart is our unwavering commitment to customer satisfaction and ethical business practices. We believe in building relationships based on trust, transparency, and mutual growth. From the first interaction to long after the sale, our team stands beside our clients with a service-driven approach—offering technical guidance, responsive communication, and dependable after-sales support.
                    </p>

                    <p>
                        We recognize that in today's fast-paced industrial ecosystem, availability and speed are critical. That's why <strong class="text-primary">we've invested in a robust operational infrastructure:</strong>
                    </p>
                    
                    <ul class="mb-4">
                        <li>A 20,000+ sq. ft. state-of-the-art warehouse ensuring ready stock and quick dispatch</li>
                        <li>An ERP-powered inventory system for real-time tracking and accuracy</li>
                        <li>A dedicated e-commerce portal (<a href="https://www.sbsmart.in" target="_blank" class="text-primary text-decoration-none">www.sbsmart.in</a>) enabling seamless B2B procurement</li>
                        <li>A technically proficient and customer-focused sales & support team</li>
                        <li>An integrated CRM platform to streamline service and maintain long-term customer engagement</li>
                        <li>Efficient, well-coordinated logistics and delivery mechanisms that prioritize timelines and project commitments</li>
                    </ul>

                    <div id="welcome-more-text" style="display: none;">
                        <p>At S.B. Syscon, integrity is at the heart of everything we do. We adhere to the highest standards of compliance, transparency, and responsibility in all aspects of our business—ensuring that our solutions not only meet technical expectations but also reflect our core values.</p>
                        <p>As industries continue to evolve, so do we—constantly innovating, learning, and adapting to deliver better value, greater efficiency, and unmatched reliability to our customers.</p>
                        <p class="fw-bold text-dark mt-3 fst-italic">S.B. Syscon Pvt. Ltd. is more than just a supplier — We’re your trusted partner in powering industrial growth.</p>
                    </div>
                </div>

                <div class="d-flex justify-content-center position-relative mb-8" style="z-index: 4; margin-top: 8rem !important;">
                     <button id="welcome-read-more-btn" class="btn btn-primary px-8 py-8 fw-bold shadow rounded-pill" style="background-color: #0d6efd; border-color: #0d6efd; transition: all 0.3s;">Read More</button>
                </div>

                <script>
                    document.getElementById('welcome-read-more-btn').addEventListener('click', function() {
                        var moreText = document.getElementById('welcome-more-text');
                        var btnText = document.getElementById('welcome-read-more-btn');

                        if (moreText.style.display === "none") {
                            // Slide down effect using simple display block for now
                            moreText.style.display = "block";
                            btnText.innerHTML = "Read Less";
                        } else {
                            moreText.style.display = "none";
                            btnText.innerHTML = "Read More";
                            // Scroll back to button smoothly to maintain context
                            btnText.scrollIntoView({behavior: 'smooth', block: 'center'});
                        }
                    });
                </script>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-4">
                <div class="mb-5 text-center">
                    <img src="assets/css/team_meeting.png" class="img-fluid rounded-4 shadow-sm" alt="Team Meeting" style="width: 100%; object-fit: cover;">
                </div>
                <!-- VISION -->
                <div class="mb-5 px-3">
                    <div class="bg-light py-2 mb-3 rounded-1 text-center">
                        <h6 class="fw-bold text-primary text-uppercase m-0" style="font-size: 0.85rem; letter-spacing: 1px;">OUR VISION</h6>
                    </div>
                    <p class="text-secondary small" style="text-align: justify; line-height: 1.8; font-size: 0.9rem;">
                        To be recognized as a leading force in delivering innovative, dependable, and forward-thinking industrial solutions that drive progress and performance across the nation. We aim to empower businesses by consistently offering unmatched quality, service, and value — fostering enduring partnerships built on trust, integrity, and a relentless pursuit of excellence.
                    </p>
                </div>
                <!-- MISSION -->
                <div class="px-3">
                    <div class="bg-light py-2 mb-3 rounded-1 text-center">
                        <h6 class="fw-bold text-primary text-uppercase m-0" style="font-size: 0.85rem; letter-spacing: 1px;">OUR MISSION</h6>
                    </div>
                    <p class="text-secondary small" style="text-align: justify; line-height: 1.8; font-size: 0.9rem;">
                        To provide high-performance industrial solutions tailored to the evolving needs of our clients. Through continuous innovation, dependable service, and a strong customer-first philosophy, we aim to enhance operational efficiency and contribute meaningfully to the growth of businesses worldwide.
                    </p>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
<section class="py-5 bg-light border-bottom">
    <div class="container text-center">
        <h2 class="display-6 fw-bold text-dark mb-3">Numbers at a Glance</h2>
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <p class="text-muted lead px-md-5">
                    Our growth is not just in numbers but in the trust we've built over decades. From a modest beginning to becoming a dominant force in industrial electrical distribution, every figure here represents a milestone of reliability, quality, and partnership.
                </p>
                <span class="bg-danger text-white py-1 px-4 rounded-pill fw-light shadow-sm" style="font-size: 0.9rem; letter-spacing: 0.5px;">
                    Innovating Distribution in Industrial Electricals Since 1992
                </span>
            </div>
        </div>

        <div class="swiper stats-slider pb-5">
            <div class="swiper-wrapper">
                <!-- Stat 1 -->
                <div class="swiper-slide h-auto">
                    <div class="stat-card bg-white p-4 rounded shadow-sm h-100 position-relative overflow-hidden mx-2" style="transition: all 0.3s ease; border-bottom: 4px solid #dc3545;">
                        <div class="mb-3">
                                <i class="fas fa-users text-danger fs-1 mb-2"></i>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <h2 class="fw-bold display-5 mb-0 text-dark counter" data-target="50000">0</h2>
                            <span class="fs-4 fw-bold text-dark ms-1">+</span>
                        </div>
                        <p class="text-muted small text-uppercase mt-2 fw-bold ls-1">Customers Served</p>
                    </div>
                </div>
                <!-- Stat 2 -->
                <div class="swiper-slide h-auto">
                    <div class="stat-card bg-white p-4 rounded shadow-sm h-100 position-relative overflow-hidden mx-2" style="transition: all 0.3s ease; border-bottom: 4px solid #ffc107;">
                        <div class="mb-3">
                            <i class="fas fa-boxes text-warning fs-1 mb-2"></i>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <h2 class="fw-bold display-5 mb-0 text-dark counter" data-target="25000">0</h2>
                            <span class="fs-4 fw-bold text-dark ms-1">+</span>
                        </div>
                        <p class="text-muted small text-uppercase mt-2 fw-bold ls-1">SKUs in Inventory</p>
                    </div>
                </div>
                <!-- Stat 3 -->
                <div class="swiper-slide h-auto">
                    <div class="stat-card bg-white p-4 rounded shadow-sm h-100 position-relative overflow-hidden mx-2" style="transition: all 0.3s ease; border-bottom: 4px solid #0d6efd;">
                        <div class="mb-3">
                            <i class="fas fa-medal text-primary fs-1 mb-2"></i>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <h2 class="fw-bold display-5 mb-0 text-dark counter" data-target="34">0</h2>
                            <span class="fs-4 fw-bold text-dark ms-1">+</span>
                        </div>
                        <p class="text-muted small text-uppercase mt-2 fw-bold ls-1">Years of Excellence</p>
                    </div>
                </div>
                <!-- Stat 4 -->
                <div class="swiper-slide h-auto">
                    <div class="stat-card bg-white p-4 rounded shadow-sm h-100 position-relative overflow-hidden mx-2" style="transition: all 0.3s ease; border-bottom: 4px solid #198754;">
                        <div class="mb-3">
                            <i class="fas fa-warehouse text-success fs-1 mb-2"></i>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <h2 class="fw-bold display-5 mb-0 text-dark counter" data-target="20000">0</h2>
                            <span class="fs-4 fw-bold text-dark ms-1">+</span>
                        </div>
                        <p class="text-muted small text-uppercase mt-2 fw-bold ls-1">Infra Capacity (Sq.Ft.)</p>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination position-relative mt-4"></div>
        </div>
    </div>
    <style>
        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
        }
    </style>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.stats-slider', {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.stats-slider .swiper-pagination',
                    clickable: true,
                },
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
                        spaceBetween: 30,
                    },
                },
            });
        });
    </script>

</section>

<!-- SOCIAL MEDIA FEED SECTION -->
<section class="social-media-section py-5 position-relative" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('assets/images/smbg.jpg') no-repeat center center; background-size: cover; background-attachment: fixed;">
    <div class="container text-center">
        <!-- Section Heading -->
        <h2 class="text-white fw-bold mb-5 pb-2 display-6 border-bottom border-danger d-inline-block">
            SOCIAL MEDIA FEED
        </h2>

        <div class="row g-4 justify-content-center">
            
            <!-- Instagram Flip Card -->
            <div class="col-md-6 col-lg-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- Front (Image & Icon) -->
                        <div class="flip-card-front">
                            <div class="social-overlay-gradient"></div>
                            <img src="assets/css/award1.jpg" class="social-front-img" alt="Instagram">
                            <div class="social-icon-overlay">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <div class="position-absolute bottom-0 start-0 w-100 p-3 text-white text-start">
                                <small class="text-uppercase fw-bold ls-1">@sbsyscon</small>
                            </div>
                        </div>
                        <!-- Back (Details) -->
                        <div class="flip-card-back">
                            <div class="card h-100 border-0 text-start">
                                <div class="card-header bg-white border-0 d-flex align-items-center p-3">
                                    <img src="assets/css/headerlogo.png" class="rounded-circle border p-1" width="40" height="40" alt="Logo">
                                    <div class="ms-2 lh-1">
                                        <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">sbsyscon</h6>
                                        <small class="text-muted" style="font-size: 0.75rem;">S.B. Syscon Pvt Ltd</small>
                                    </div>
                                    <a href="https://www.instagram.com/sbsyscon/" class="btn btn-sm btn-primary ms-auto rounded-pill px-3" style="font-size: 0.7rem;">Follow</a>
                                </div>
                                <div class="card-body p-3 overflow-auto">
                                    <p class="card-text small text-muted mb-2">We are proud to announce our new partnership with standard global leaders in automation. <span class="text-primary cursor-pointer">more</span></p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div>
                                            <i class="far fa-heart text-danger me-2 cursor-pointer"></i>
                                            <i class="far fa-comment text-secondary cursor-pointer"></i>
                                        </div>
                                        <small class="text-muted" style="font-size: 0.7rem;">2 HOURS AGO</small>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-top text-center p-2">
                                     <a href="https://www.instagram.com/sbsyscon/" class="text-danger text-decoration-none small fw-bold"><i class="fab fa-instagram me-1"></i> View on Instagram</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- LinkedIn Flip Card -->
            <div class="col-md-6 col-lg-3">
                 <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- Front -->
                        <div class="flip-card-front">
                             <div class="social-overlay-gradient"></div>
                             <img src="assets/css/award2.jpeg" class="social-front-img" alt="LinkedIn">
                             <div class="social-icon-overlay">
                                <i class="fab fa-linkedin"></i>
                            </div>
                             <div class="position-absolute bottom-0 start-0 w-100 p-3 text-white text-start">
                                <small class="text-uppercase fw-bold ls-1">S B Syscon Pvt Ltd</small>
                            </div>
                        </div>
                        <!-- Back -->
                        <div class="flip-card-back">
                             <div class="card h-100 border-0 text-start">
                                <div class="card-header bg-white border-0 d-flex align-items-center p-3">
                                     <img src="assets/css/headerlogo.png" class="rounded-circle border p-1" width="40" height="40" alt="Logo">
                                    <div class="ms-2 lh-1">
                                        <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">S B Syscon Pvt Ltd</h6>
                                         <small class="text-muted" style="font-size: 0.75rem;">1,265 followers</small>
                                    </div>
                                </div>
                                <div class="card-body p-3 overflow-auto">
                                    <p class="small text-dark mb-2">Proud to receive the "Highest Total Revenue" award from Siemens! A big thank you to our team.</p>
                                     <p class="small text-muted mb-0">#Siemens #Authorized #Distributor #Award</p>
                                </div>
                                 <div class="card-footer bg-secondary text-center p-2">
                                     <a href="https://www.linkedin.com/company/s-b-syscon-pvt-ltd" class="text-white text-decoration-none small"><i class="fab fa-linkedin-in me-1"></i> Connect on LinkedIn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Facebook Flip Card -->
            <div class="col-md-6 col-lg-3">
                 <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- Front -->
                        <div class="flip-card-front">
                            <div class="social-overlay-gradient"></div>
                             <img src="assets/css/award3.jpeg" class="social-front-img" alt="Facebook">
                             <div class="social-icon-overlay">
                                <i class="fab fa-facebook"></i>
                            </div>
                             <div class="position-absolute bottom-0 start-0 w-100 p-3 text-white text-start">
                                <small class="text-uppercase fw-bold ls-1">S.B. Syscon</small>
                            </div>
                        </div>
                        <!-- Back -->
                        <div class="flip-card-back">
                             <div class="card h-100 border-0 text-start">
                                <div class="card-header bg-white border-0 d-flex align-items-center p-3">
                                     <img src="assets/css/headerlogo.png" class="rounded-circle border p-1" width="40" height="40" alt="Logo">
                                    <div class="ms-2 lh-1">
                                        <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">S.B. Syscon</h6>
                                         <small class="text-muted" style="font-size: 0.75rem;">Technology Company</small>
                                    </div>
                                </div>
                                <div class="card-body p-3 overflow-auto">
                                    <p class="small text-dark mb-2">Exploring new horizons in industrial automation. Our latest project in executing...</p>
                                    <div class="d-flex align-items-center small text-muted">
                                         <i class="fas fa-thumbs-up text-primary me-1"></i> 45 Likes
                                    </div>
                                </div>
                                 <div class="card-footer bg-primary text-center p-2">
                                     <a href="https://www.facebook.com/sbsyscon/" class="text-white text-decoration-none small"><i class="fab fa-facebook-f me-1"></i> Like our Page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Twitter/X Flip Card -->
            <div class="col-md-6 col-lg-3">
                 <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- Front (Custom Color BG) -->
                        <div class="flip-card-front">
                            <div class="social-overlay-gradient"></div>
                             <img src="assets/css/award4.jpg" class="social-front-img" alt="Twitter">
                             <div class="social-icon-overlay text-white">
                                <i class="fab fa-twitter"></i>
                            </div>
                            <div class="position-absolute bottom-0 start-0 w-100 p-3 text-white text-start">
                                <small class="text-uppercase fw-bold ls-1">@SBSyscon</small>
                            </div>
                        </div>
                        <!-- Back -->
                        <div class="flip-card-back">
                             <div class="card h-100 border-0 text-start">
                                <div class="card-header bg-white border-0 d-flex align-items-center p-3">
                                     <img src="assets/css/headerlogo.png" class="rounded-circle border p-1" width="40" height="40" alt="Logo">
                                     <div class="ms-2 lh-1">
                                        <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">S.B. Syscon</h6>
                                        <small class="text-muted" style="font-size: 0.75rem;">@SBSyscon</small>
                                    </div>
                                </div>
                                <div class="card-body p-3 overflow-auto">
                                    <p class="small text-dark mb-3">Availability and speed are critical. That's why we have invested in robust operational infrastructure. 🚀 <span class="text-primary">#SupplyChain</span></p>
                                </div>
                                 <div class="card-footer bg-info text-center p-2">
                                     <a href="https://twitter.com/sbsyscon" class="text-white text-decoration-none small"><i class="fab fa-twitter me-1"></i> Follow @SBSyscon</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <style>
        /* Social Media Flip Cards Styles */
        .flip-card {
          perspective: 1000px;
          height: 380px; /* Adjusted height for balance */
          cursor: pointer;
        }
        .flip-card-inner {
          position: relative;
          width: 100%;
          height: 100%;
          text-align: center;
          transition: transform 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55); /* Bounce/Flip Effect */
          transform-style: preserve-3d;
        }
        .flip-card:hover .flip-card-inner {
          transform: rotateY(180deg);
        }
        .flip-card-front, .flip-card-back {
          position: absolute;
          width: 100%;
          height: 100%;
          backface-visibility: hidden;
          -webkit-backface-visibility: hidden;
          border-radius: 15px;
          overflow: hidden;
          box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }
        .flip-card-front {
          background: #fff;
          z-index: 2;
        }
        .flip-card-back {
          background: #fff;
          transform: rotateY(180deg);
          z-index: 1;
        }
        
        .social-front-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        .flip-card:hover .social-front-img {
            transform: scale(1.1);
        }
        .social-icon-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 5rem;
            color: white;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.5));
            z-index: 10;
        }
        .social-overlay-gradient {
            position: absolute; top:0; bottom:0; left:0; right:0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent 60%);
            z-index: 5;
        }

        /* ----- MOBILE RESPONSIVE OPTIMIZATIONS ----- */
        /* ----- MOBILE RESPONSIVE OPTIMIZATIONS ----- */
        @media (max-width: 991px) {
            .hero-section {
                height: 550px !important;
            }
             .hero-section .display-3 {
                font-size: 2.5rem !important;
            }
            .hero-section .lead {
                 font-size: 1rem !important;
            }
        }

        @media (max-width: 768px) {
            
            /* HERO SECTION - Text & Layout */
            .hero-section {
                height: 400px !important; 
                min-height: auto;
                padding-top: 60px !important; /* Space for navbar */
                padding-bottom: 20px !important;
            }
            .hero-section .container-fluid {
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
            .hero-section .row {
                text-align: center !important;
                justify-content: center !important;
            }
            .hero-section .col-lg-8 {
                width: 100% !important;
                padding: 0 10px;
            }
            .hero-section .display-3 {
                font-size: 2rem !important; /* Smaller, cleaner heading */
                margin-bottom: 1rem !important;
                line-height: 1.2 !important;
            }
            .hero-section .lead {
                font-size: 0.9rem !important;
                margin-bottom: 25px !important;
                display: block !important; 
                opacity: 0.9;
                margin-left: auto;
                margin-right: auto;
            }
            .hero-section .btn-lg {
                padding: 12px 35px !important;
                font-size: 0.9rem !important;
                width: auto !important;
            }
            .hero-section .badge {
                font-size: 0.75rem !important;
                margin-bottom: 15px !important;
                display: inline-block;
            }
            
            /* SWIPER CONTROLS */
            .swiper-button-next, .swiper-button-prev {
                display: none !important; /* Hide arrows on mobile for cleaner look */
            }
            .swiper-pagination {
                bottom: 15px !important;
            }

            /* SECTIONS SPACING */
            section.py-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important;
            }
            
            /* TYPOGRAPHY */
            h2.display-4, h2.display-5, h2.display-6, .h2 {
                font-size: 1.6rem !important;
            }
            
            /* SOCIAL CARDS - Vertical Stack Fix */
            .flip-card {
                height: 300px; 
                margin-bottom: 20px;
            }
            .social-icon-overlay {
                font-size: 3.5rem;
            }
            
            /* STATS CARDS */
            .stat-card {
                margin-bottom: 15px;
                padding: 1.5rem !important;
            }
            
            /* MEMBERSHIP CARDS */
            .membership-card {
                width: 100% !important; /* Full width on mobile or flexible */
                max-width: 320px; /* But keep max size */
                height: 220px !important;
                margin-bottom: 10px;
            }
        }
        
        @media (max-width: 480px) {
            /* Small Phone Fixes */
            .hero-section {
                height: auto !important;
                min-height: 450px;
            }
            .hero-section .display-3 {
                font-size: 1.7rem !important;
            }
            .hero-section .btn-lg {
                width: 80% !important; /* Wider button */
            }
            .membership-card {
                height: 180px !important;
            }
        }
    </style>
</section>

<!-- OUR PRESTIGIOUS CLIENTS SECTION -->
<section class="clients-section py-5 bg-white" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold display-6" style="color: #333;">Our Prestigious Clients</h2>
        <div class="swiper clients-slider">
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide text-center"><img src="assets/css/3.png" class="img-fluid" style="max-height: 120px; width: auto;" alt="Client 3"></div>
                <div class="swiper-slide text-center"><img src="assets/css/4.png" class="img-fluid" style="max-height: 120px; width: auto;" alt="Client 4"></div>
                <div class="swiper-slide text-center"><img src="assets/css/5.png" class="img-fluid" style="max-height: 120px; width: auto;" alt="Client 5"></div>
                <div class="swiper-slide text-center"><img src="assets/css/6.png" class="img-fluid" style="max-height: 120px; width: auto;" alt="Client 6"></div>
                <div class="swiper-slide text-center"><img src="assets/css/8.png" class="img-fluid" style="max-height: 120px; width: auto;" alt="Client 8"></div>
                <div class="swiper-slide text-center"><img src="assets/css/9.png" class="img-fluid" style="max-height: 120px; width: auto;" alt="Client 9"></div>
                <div class="swiper-slide text-center"><img src="assets/css/10.png" class="img-fluid" style="max-height: 120px; width: auto;" alt="Client 10"></div>
                <div class="swiper-slide text-center"><img src="assets/css/14.png" class="img-fluid" style="max-height: 120px; width: auto;" alt="Client 14"></div>
                <div class="swiper-slide text-center"><img src="assets/css/16.png" class="img-fluid" style="max-height: 120px; width: auto;" alt="Client 16"></div>
                <div class="swiper-slide text-center"><img src="assets/css/17.png" class="img-fluid" style="max-height: 120px; width: auto;" alt="Client 17"></div>
                <div class="swiper-slide text-center"><img src="assets/css/18.png" class="img-fluid" style="max-height: 120px; width: auto;" alt="Client 18"></div>
                <div class="swiper-slide text-center"><img src="assets/css/19.png" class="img-fluid" style="max-height: 120px; width: auto;" alt="Client 19"></div>
            </div>
        </div>
    </div>
</section>


<!-- TESTIMONIALS SECTION (From Screenshot) -->
<section class="py-5" style="background-color: #1a1e21; border-top: 1px solid #444;" data-aos="fade-up">
    <div class="container py-4">
        <!-- Title -->
        <h2 class="text-center text-white mb-5 display-5" style="font-family: var(--font-heading); font-weight: 300;">
            What Our Clients Say
        </h2>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Testimonial Swiper -->
                <div class="swiper testimonial-slider">
                    <div class="swiper-wrapper">
                        
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <div class="bg-white p-5 shadow-sm text-center position-relative h-100" style="border-radius: 4px;">
                                <h5 class="fw-bold mb-1 text-dark">Central Maintenance Head</h5>
                                <p class="text-secondary small text-uppercase mb-4" style="letter-spacing: 0.5px; font-weight: 600;">
                                    Steel Conglomerate Having Multiple Plants Across India
                                </p>
                                <div class="px-md-5">
                                    <p class="lead text-muted fst-italic position-relative" style="font-size: 1.05rem; line-height: 1.8;">
                                        <span class="text-primary fs-1 position-absolute top-0 start-0 translate-middle ps-3 pt-3 opacity-25">"</span>
                                        "Our facility’s MRO needs are wide-ranging— Switchgears, Energy Metering Solutions, Distribution Boxes, Wires & Cables and more. S.B. Syscon has been our go-to partner for all of it. Their ability to cater to diverse requirements with quick turnaround, reliable sourcing, and fair pricing is unmatched. <br><br>What impresses us even more is their ethical working style and the genuine relationships they build. It’s rare to find a supplier who brings both operational efficiency and human touch to the table"
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <div class="bg-white p-5 shadow-sm text-center position-relative h-100" style="border-radius: 4px;">
                                <h5 class="fw-bold mb-1 text-dark">Managing Director</h5>
                                <p class="text-secondary small text-uppercase mb-4" style="letter-spacing: 0.5px; font-weight: 600;">
                                    Leading Crane OEM of Faridabad
                                </p>
                                <div class="px-md-5">
                                    <p class="lead text-muted fst-italic position-relative" style="font-size: 1.05rem; line-height: 1.8;">
                                        <span class="text-primary fs-1 position-absolute top-0 start-0 translate-middle ps-3 pt-3 opacity-25">"</span>
                                        "We manufacture cranes for some of the most demanding industrial applications, and working with S.B. Syscon has been a major asset. From S4 duty motors to flat Lapp cables and other critical crane components, they’ve consistently provided the right solutions with excellent availability and technical understanding. Pricing is always fair, but what really makes a difference is the personal connect and the sense of partnership they bring to every interaction. We don’t need to follow up twice—they’re proactive, ethical, and deeply committed"
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <div class="bg-white p-5 shadow-sm text-center position-relative h-100" style="border-radius: 4px;">
                                <h5 class="fw-bold mb-1 text-dark">XEN</h5>
                                <p class="text-secondary small text-uppercase mb-4" style="letter-spacing: 0.5px; font-weight: 600;">
                                    A Major Thermal Power Plant under the aegis of Haryana Government
                                </p>
                                <div class="px-md-5">
                                    <p class="lead text-muted fst-italic position-relative" style="font-size: 1.05rem; line-height: 1.8;">
                                        <span class="text-primary fs-1 position-absolute top-0 start-0 translate-middle ps-3 pt-3 opacity-25">"</span>
                                        "We entrusted S.B. Syscon with the supply of a Flender Gearbox rated at 1861 kW, suitable for our Main Reducer – Tube Mill application, which is one of the most critical operations in our plant. Handling a gearbox of this magnitude requires deep technical expertise and flawless execution, and S.B. Syscon delivered on every front. Delivery timelines were met as committed, the pricing was extremely competitive, and the technical documentation was complete and compliant with all our internal protocols. Their commitment, coordination, and follow-through have set a new benchmark in our vendor relationships"
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 4 -->
                        <div class="swiper-slide">
                            <div class="bg-white p-5 shadow-sm text-center position-relative h-100" style="border-radius: 4px;">
                                <h5 class="fw-bold mb-1 text-dark">Operations Director</h5>
                                <p class="text-secondary small text-uppercase mb-4" style="letter-spacing: 0.5px; font-weight: 600;">
                                    A Leading Panel Manufacturer of New Delhi
                                </p>
                                <div class="px-md-5">
                                    <p class="lead text-muted fst-italic position-relative" style="font-size: 1.05rem; line-height: 1.8;">
                                        <span class="text-primary fs-1 position-absolute top-0 start-0 translate-middle ps-3 pt-3 opacity-25">"</span>
                                        "For us as a panel builder, having a supplier who can consistently deliver the entire range—from 6300A Siemens Air Circuit Breakers down to 0.5A MCBs, along with Lapp control cables and Schneider Automatic Transfer Switches—is non-negotiable. S.B. Syscon has been that partner. Their stock availability is outstanding, and they’ve never let us down even on tight project timelines. Add to that their competitive pricing and ethical business approach, and it’s easy to see why we’ve stuck with them for years. They’re not just a supplier—they’re an extension of our team."
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Navigation Buttons -->
                    <div class="swiper-button-next text-primary"></div>
                    <div class="swiper-button-prev text-primary"></div>
                    <div class="swiper-pagination position-relative mt-4"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Initialize Testimonial Slider -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.testimonial-slider', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            grabCursor: true, /* Shows hand cursor for dragging */
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true, /* Pause when cursor is over it */
            },
            pagination: {
                el: '.testimonial-slider .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.testimonial-slider .swiper-button-next',
                prevEl: '.testimonial-slider .swiper-button-prev',
            },
            autoHeight: true, 
        });
    });
</script>


<!-- SOCIAL MEDIA FEED SECTION -->
<!-- SOCIAL MEDIA FEED SECTION -->



<?php require_once 'includes/footer.php'; ?>
