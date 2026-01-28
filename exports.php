<?php
require_once 'config/constants.php';
require_once 'includes/head.php';
require_once 'includes/navbar.php';
?>

<!-- AOS for Animations -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- Export Hero Section -->
<section class="exports-hero position-relative">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-12 text-center bg-dark">
                <!-- Main Export Banner Image -->
                <img src="assets/images/exports_bg.png" alt="Global Exports" class="img-fluid w-100 animate-hero-img" style="max-height: 85vh; object-fit: cover; opacity: 0.95;">
            </div>
        </div>
    </div>
    <!-- Simple Overlay Title (Optional, as image has text) -->
    <!-- We hide the text overlay if the image already says 'EXPORTS' clearly, but we can keep a subtle one for SEO/Access -->
    <div class="position-absolute top-50 start-50 translate-middle text-white text-center d-none">
        <h1 class="display-3 fw-bold">EXPORTS</h1>
    </div>
</section>

<!-- Export Content Section -->
<section class="py-5 bg-white">
    <div class="container">
       <div class="text-center mb-5" data-aos="fade-up">
           <h2 class="fw-bold display-5" style="color: #dc3545; font-family: 'Segoe UI', sans-serif;">Global Reach. Trusted Worldwide.</h2>
           <p class="text-secondary text-uppercase ls-2" style="font-size: 0.85rem; letter-spacing: 2px;">Delivering Industrial Solutions Across Continents</p>
       </div>
       
       <div class="row align-items-center mb-5">
           <div class="col-lg-5 mb-4 mb-lg-0" data-aos="fade-right">
               <!-- Ship Image -->
                <!-- Ship Image -->
                <img src="assets/images/cargo_ship.jpg" alt="Cargo Ship - Global Logistics" class="img-fluid rounded shadow-lg w-100" style="min-height: 350px; object-fit: cover;">
           </div>
           <div class="col-lg-7 ps-lg-5" data-aos="fade-left">
               <p class="mb-4 text-secondary" style="line-height: 1.8; font-size: 1.05rem;">
                   At S.B. Syscon Pvt. Ltd., we are proud to extend our commitment to quality, innovation, and reliability beyond national borders.
               </p>
               <p class="mb-4 text-secondary" style="line-height: 1.8; font-size: 1.05rem;">
                   Backed by an active <strong class="text-dark">Import Export Code (IEC)</strong> and strong alliances with leading Freight Forwarders, Logistics Partners, and Custom House Agents (CHAs), we ensure seamless and timely international deliveries.
               </p>
               <p class="mb-0 text-secondary" style="line-height: 1.8; font-size: 1.05rem;">
                   Our logistics infrastructure and global network help us meet diverse client needs with precision and consistency.
               </p>
           </div>
       </div>

       <!-- Regions -->
       <div class="row row-cols-2 row-cols-md-5 g-4 text-center mt-5 mb-5 justify-content-center">
           <!-- Asia -->
           <div class="col" data-aos="fade-up" data-aos-delay="100">
                <div class="p-3 hover-lift position-relative d-inline-block w-100">
                   <div class="position-relative d-inline-block w-100">
                        <img src="assets/images/asia.jpg" class="img-fluid w-100" style="object-fit: cover;" alt="Asia">
                   </div>
                   <h6 class="fw-bold text-dark mt-3">Asia</h6>
                </div>
           </div>
           <!-- Middle East -->
           <div class="col" data-aos="fade-up" data-aos-delay="200">
                <div class="p-3 hover-lift position-relative d-inline-block w-100">
                   <div class="position-relative d-inline-block w-100">
                        <img src="assets/images/middle-east.jpg" class="img-fluid w-100" style="object-fit: cover;" alt="Middle East">
                   </div>
                   <h6 class="fw-bold text-dark mt-3">Middle East</h6>
                </div>
           </div>
           <!-- Africa -->
           <div class="col" data-aos="fade-up" data-aos-delay="300">
                <div class="p-3 hover-lift position-relative d-inline-block w-100">
                   <div class="position-relative d-inline-block w-100">
                        <img src="assets/images/africa.jpg" class="img-fluid w-100" style="object-fit: cover;" alt="Africa">
                   </div>
                   <h6 class="fw-bold text-dark mt-3">Africa</h6>
                </div>
           </div>
           <!-- Latin America -->
           <div class="col" data-aos="fade-up" data-aos-delay="400">
                <div class="p-3 hover-lift position-relative d-inline-block w-100">
                   <div class="position-relative d-inline-block w-100">
                        <img src="assets/images/latin-america.jpg" class="img-fluid w-100" style="object-fit: cover;" alt="Latin America">
                   </div>
                   <h6 class="fw-bold text-dark mt-3">Latin America</h6>
                </div>
           </div>
           <!-- Europe -->
           <div class="col" data-aos="fade-up" data-aos-delay="500">
                <div class="p-3 hover-lift position-relative d-inline-block w-100">
                   <div class="position-relative d-inline-block w-100">
                        <img src="assets/images/europe.jpg" class="img-fluid w-100" style="object-fit: cover;" alt="Europe">
                   </div>
                   <h6 class="fw-bold text-dark mt-3">Europe</h6>
                </div>
           </div>
       </div>

       <!-- Footer message -->
       <div class="text-center mt-5 pt-4 border-top">
           <p class="fw-bold text-dark mb-0 fs-5">
               We view exports not just as transactions, but as lasting partnerships built on trust, performance, and shared success. 
               <i class="fas fa-shield-alt text-warning ms-2"></i>
           </p>
       </div>
    </div>
</section>

<style>
    .animate-hero-img {
        animation: slideInHero 1.5s ease-out forwards;
    }
    @keyframes slideInHero {
        from { opacity: 0; transform: scale(1.05); }
        to { opacity: 0.95; transform: scale(1); }
    }

    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    /* MOBILE FIXES */
    @media (max-width: 991px) {
        .exports-hero img {
            max-height: 400px !important;
        }
        
        /* FIX: Prevent Horizontal Scrolling (Side-Sway) */
        html, body {
            max-width: 100%;
            overflow-x: hidden !important;
        }
        section {
            overflow-x: hidden !important;
            width: 100% !important;
        }
        .container, .container-fluid {
            padding-right: 15px;
            padding-left: 15px;
            overflow-x: hidden;
        }
        .row {
            margin-right: 0 !important;
            margin-left: 0 !important;
        }
    }
</style>

<!-- AOS Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<?php require_once 'includes/footer.php'; ?>
 



    