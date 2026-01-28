<footer class="bg-dark text-white border-top border-secondary">
    
    <?php if (basename($_SERVER['PHP_SELF']) == 'index.php'): ?>
    <!-- MEMBERSHIPS SECTION -->
    <section class="py-5 bg-white border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <!-- Text Column -->
                <div class="col-lg-3 text-center text-lg-start mb-4 mb-lg-0">
                    <h3 class="fw-bold text-dark m-0 display-6" style="font-size: 1.8rem;">Members For:</h3>
                </div>
                
                <!-- Logos Column -->
                <div class="col-lg-9">
                    <div class="row g-4 justify-content-center">
                         <!-- Member 1 -->
                        <div class="col-6 col-lg-3">
                            <div class="card border shadow-none align-items-center justify-content-center p-0 membership-card w-100" style="height: 220px; overflow: hidden;">
                                <img src="assets/css/cer1.jpg" alt="IEEMA" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                        </div>
                         <!-- Member 2 -->
                         <div class="col-6 col-lg-3">
                             <div class="card border shadow-none align-items-center justify-content-center p-0 membership-card w-100" style="height: 220px; overflow: hidden;">
                                <img src="assets/css/cer2.jpg" alt="COSMA" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                        </div>
                         <!-- Member 3 -->
                          <div class="col-6 col-lg-3">
                              <div class="card border shadow-none align-items-center justify-content-center p-0 membership-card w-100" style="height: 220px; overflow: hidden;">
                                <img src="assets/css/cer3.jpg" alt="AESA" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                        </div>
                         <!-- Member 4 -->
                          <div class="col-6 col-lg-3">
                              <div class="card border shadow-none align-items-center justify-content-center p-0 membership-card w-100" style="height: 220px; overflow: hidden;">
                                <img src="assets/css/cer4.jpg" alt="FETA" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .membership-card {
                transition: all 0.3s ease;
                background: #fff;
                border-radius: 4px; 
                border: 1px solid #eee !important;
            }
            .membership-card:hover {
                /* transform: translateY(-5px); - REMOVED to stop lifting */
                /* box-shadow: 0 1rem 3rem rgba(0,0,0,.1)!important; - REMOVED */
                border-color: #ddd !important;
            }
        </style>
    </section>
    <?php endif; ?>

    <!-- Main Footer Content -->
    <div class="container py-5">
        <div class="row gy-4">
            <!-- Company Info -->
            <div class="col-lg-4">
                <a href="index.php" class="d-block mb-3">
                    <img src="assets/css/headerlogo.png" alt="S.B. Syscon" style="max-height: 70px; background: #fff; padding: 5px; border-radius: 4px;">
                </a>
                <p class="text-white-50 small">Leading innovation in technology with global reach and local expertise.</p>
            </div>

            <!-- Navigation -->
            <div class="col-lg-2 col-6">
                <h6 class="fw-bold mb-3 text-white">Navigation</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="index.php" class="text-white-50 text-decoration-none hover-white">Home</a></li>
                    <li class="mb-2"><a href="about.php" class="text-white-50 text-decoration-none hover-white">About Us</a></li>
                    <li class="mb-2"><a href="principals.php" class="text-white-50 text-decoration-none hover-white">Principals</a></li>
                    <li class="mb-2"><a href="journey.php" class="text-white-50 text-decoration-none hover-white">Our Journey</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Achievements</a></li>
                </ul>
            </div>

            <!-- Quick Links & Legal -->
            <div class="col-lg-2 col-6">
                <h6 class="fw-bold mb-3 text-white">Quick Links</h6>
                <ul class="list-unstyled small mb-4">
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Clientele</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Exports</a></li>
                    <li class="mb-2"><a href="pricelists.php" class="text-white-50 text-decoration-none hover-white">Price List</a></li>
                    <li class="mb-2"><a href="contact.php" class="text-white-50 text-decoration-none hover-white">Contact Us</a></li>
                </ul>
                
                <h6 class="fw-bold mb-3 text-white">Legal</h6>
                <ul class="list-unstyled small">
                    <li class="mb-1"><a href="#" class="text-white-50 text-decoration-none hover-white">Terms & Conditions</a></li>
                    <li class="mb-1"><a href="#" class="text-white-50 text-decoration-none hover-white">Privacy Policy</a></li>
                    <li class="mb-1"><a href="#" class="text-white-50 text-decoration-none hover-white">Disclaimer</a></li>
                </ul>
            </div>

            <!-- Get In Touch -->
            <div class="col-lg-4">
                <h6 class="fw-bold mb-3 text-white">Get In Touch</h6>
                <ul class="list-unstyled text-white">
                    <li class="mb-3 d-flex align-items-start">
                        <div class="me-3 mt-1 text-danger">
                            <i class="fas fa-map-marker-alt fa-lg"></i>
                        </div>
                        <span style="font-weight: 700; font-size: 1rem;">1D-45A, NIT Faridabad, Haryana<br>India-121001</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <div class="me-3 mt-1 text-danger">
                            <i class="fas fa-phone-alt fa-lg"></i>
                        </div>
                        <div style="font-weight: 700; font-size: 1rem;">
                            <span class="d-block">+91 9899598900</span>
                            <span class="d-block">+91 9899598955</span>
                            <span class="d-block text-white-50 small">+91 129 4150555</span>
                        </div>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <div class="me-3 text-danger">
                            <i class="fas fa-envelope fa-lg"></i>
                        </div>
                        <span style="font-weight: 700; font-size: 1rem;">info@sbsyscon.in</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Copyright Bar -->
    <div class="py-3" style="background-color: #6c757d;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <small class="text-white">&copy; 2025 S.B. Syscon Pvt. Ltd. All Rights Reserved. Powered by <span class="text-warning fw-bold">MINEIB</span></small>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <div class="d-inline-flex gap-2">
                        <a href="#" class="text-white fs-5"><i class="fab fa-facebook-square"></i></a>
                        <a href="#" class="text-white fs-5"><i class="fab fa-twitter-square"></i></a>
                        <a href="#" class="text-white fs-5"><i class="fab fa-instagram-square"></i></a>
                        <a href="#" class="text-white fs-5"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<!-- AOS Animation JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    easing: 'ease-in-out',
    once: true, // Animation happens once per scroll-down
    mirror: false,
    offset: 50
  });
</script>
<script src="assets/js/main.js"></script>

<!-- MAGIC CURSOR ELEMENTS -->
<div class="cursor-dot" data-cursor-dot></div>
<div class="cursor-outline" data-cursor-outline></div>

<style>
    /* Cursor Styles */
    .cursor-dot {
        width: 8px;
        height: 8px;
        background-color: #f1c40f; /* Gold Dot */
        position: fixed;
        top: 0;
        left: 0;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        z-index: 9999;
        pointer-events: none;
    }

    .cursor-outline {
        width: 40px;
        height: 40px;
        border: 2px solid rgba(191, 38, 38, 0.5); /* Red Ring */
        position: fixed;
        top: 0;
        left: 0;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        z-index: 9999;
        pointer-events: none;
        transition: width 0.2s, height 0.2s, background-color 0.2s;
    }

    /* Hover State for Cursor */
    body.hovering .cursor-outline {
        width: 70px;
        height: 70px;
        background-color: rgba(241, 196, 15, 0.1); /* Subtle Gold Fill */
        border-color: #f1c40f;
    }
    
    /* Hide on Mobile */
    @media (max-width: 768px) {
        .cursor-dot, .cursor-outline {
            display: none;
        }
        body {
            cursor: auto;
        }
    }
</style>

<script>
    // Magic Cursor Script
    const cursorDot = document.querySelector('[data-cursor-dot]');
    const cursorOutline = document.querySelector('[data-cursor-outline]');

    window.addEventListener("mousemove", function(e) {
        const posX = e.clientX;
        const posY = e.clientY;

        // Dot follows instantly
        cursorDot.style.left = `${posX}px`;
        cursorDot.style.top = `${posY}px`;

        // Outline follows with lag (smooth animation)
        cursorOutline.animate({
            left: `${posX}px`,
            top: `${posY}px`
        }, { duration: 500, fill: "forwards" });
    });

    // Add Hover Effect on Links & Buttons
    const hoverElements = document.querySelectorAll('a, button, .btn, .card, img');
    
    hoverElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            document.body.classList.add('hovering');
        });
        el.addEventListener('mouseleave', () => {
            document.body.classList.remove('hovering');
        });
    });
</script>

</body>
</html>
