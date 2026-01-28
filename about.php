<?php
require_once 'config/constants.php';
require_once 'includes/head.php';
require_once 'includes/navbar.php';
?>

<!-- Page Header -->
<section class="page-header py-5 position-relative d-flex align-items-center justify-content-center" style="height: 400px;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8));"></div>
    <div class="container position-relative text-center z-index-1">
        <h1 class="display-2 fw-bold text-white text-uppercase ls-3 animate-slide-down">About Us</h1>
        <div class="bg-primary mx-auto mt-4" style="width: 100px; height: 5px;"></div>
        <p class="lead text-white-50 mt-4 fw-light ls-1 text-uppercase animate-fade-in">Excellence in Industrial Automation & Engineering</p>
    </div>
    <style>
        .page-header { overflow: hidden; }
        .page-header::before {
            content: "";
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: url('assets/css/about_banner_premium.png') no-repeat center center; 
            background-size: cover;
            animation: zoomBg 20s infinite alternate;
            z-index: 0;
        }
        .page-header .position-absolute,
        .page-header .container { z-index: 1; } /* Ensure text sits on top */
        
        @keyframes zoomBg {
            0% { transform: scale(1); }
            100% { transform: scale(1.15); }
        }

        .animate-slide-down { animation: slideDown 1s ease-out; }
        .animate-fade-in { animation: fadeIn 1.5s ease-out; }
        @keyframes slideDown { from { transform: translateY(-50px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    </style>
</section>

<!-- Who We Are Section -->
<section class="who-we-are py-5 bg-dark text-white position-relative">
    <div class="container py-4">
        <div class="text-center mb-5 mw-800 mx-auto">
            <h5 class="text-danger fw-bold text-uppercase ls-2 mb-3">Who We Are</h5>
            <p class="lead text-white-50">At S.B. Syscon Pvt. Ltd., we specialize in delivering a complete range of high-quality electrical and industrial equipment for industries including manufacturing, infrastructure, power, engineering, and energy.</p>
        </div>

        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-lg-4">
                <div class="feature-card bg-white text-dark p-4 rounded-3 h-100 text-center shadow-lg position-relative overflow-hidden" style="transition: transform 0.3s ease;">
                    <div class="icon-wrapper mb-3 text-danger">
                        <i class="fas fa-industry fa-3x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Authorized Channel Partners</h5>
                    <p class="text-muted small mb-0">Trusted partners for leading global brands like <strong class="text-dark">SIEMENS, LAPP, INNOMOTICS, SCHNEIDER ASCO, SECURE METERS, BCH, and FLENDER GEARBOXES.</strong></p>
                    <div class="card-border-bottom position-absolute bottom-0 start-0 w-100 bg-danger" style="height: 4px;"></div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4">
                <div class="feature-card bg-white text-dark p-4 rounded-3 h-100 text-center shadow-lg position-relative overflow-hidden" style="transition: transform 0.3s ease;">
                    <div class="icon-wrapper mb-3 text-danger">
                        <i class="fas fa-handshake fa-3x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Bridge to Global Manufacturers</h5>
                    <p class="text-muted small mb-0">We connect <strong class="text-dark">renowned manufacturers</strong> with thousands of end-users and OEMs across India and globally.</p>
                    <div class="card-border-bottom position-absolute bottom-0 start-0 w-100 bg-danger" style="height: 4px;"></div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4">
                <div class="feature-card bg-white text-dark p-4 rounded-3 h-100 text-center shadow-lg position-relative overflow-hidden" style="transition: transform 0.3s ease;">
                    <div class="icon-wrapper mb-3 text-danger">
                        <i class="fas fa-user-shield fa-3x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Respected & Reliable</h5>
                    <p class="text-muted small mb-0">Recognized for our ethical business practices, technical expertise, and commitment to <strong class="text-dark">customer satisfaction.</strong></p>
                    <div class="card-border-bottom position-absolute bottom-0 start-0 w-100 bg-danger" style="height: 4px;"></div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .feature-card:hover {
            transform: translateY(-10px);
        }
    </style>
</section>

<!-- Our Product Range Section -->
<section class="product-range py-5 position-relative" style="background: url('assets/css/machine_bg.png') no-repeat center center; background-size: cover; background-attachment: fixed;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.85);"></div>
    <div class="container position-relative z-index-1 py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-white text-uppercase ls-2">Our Product Range</h2>
            <div class="bg-danger mx-auto mt-3" style="width: 80px; height: 4px;"></div>
            <p class="text-white-50 mt-3">We offer a comprehensive portfolio covering:</p>
        </div>

        <div class="row align-items-center g-5">
            <!-- Left: List -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-4">
                        <i class="fas fa-toggle-on text-danger fs-4 me-3 mt-1"></i>
                        <span class="text-white fs-5 fw-light">Switchgear, Protection Devices, and Control Gear Products</span>
                    </li>
                    <li class="d-flex align-items-start mb-4">
                        <i class="fas fa-bolt text-danger fs-4 me-3 mt-1"></i>
                        <span class="text-white fs-5 fw-light">Wires & Cables for diverse industrial applications</span>
                    </li>
                    <li class="d-flex align-items-start mb-4">
                        <i class="fas fa-chart-line text-danger fs-4 me-3 mt-1"></i>
                        <span class="text-white fs-5 fw-light">Energy Monitoring and Management Solutions</span>
                    </li>
                    <li class="d-flex align-items-start mb-4">
                        <i class="fas fa-cogs text-danger fs-4 me-3 mt-1"></i>
                        <span class="text-white fs-5 fw-light">Heavy-Duty Gearboxes for mechanical and industrial uses</span>
                    </li>
                    <li class="d-flex align-items-start mb-4">
                        <i class="fas fa-box text-danger fs-4 me-3 mt-1"></i>
                        <span class="text-white fs-5 fw-light">Modular Enclosures for panel and equipment housing</span>
                    </li>
                    <li class="d-flex align-items-start mb-4">
                        <i class="fas fa-search text-danger fs-4 me-3 mt-1"></i>
                        <span class="text-white fs-5 fw-light">Customized sourcing solutions for specific customer projects</span>
                    </li>
                </ul>
            </div>
            
            <!-- Right: Paragraph -->
            <div class="col-lg-6">
                <div class="bg-white bg-opacity-10 p-5 rounded-3 border border-light border-opacity-25 backdrop-blur">
                    <p class="lead text-white lh-base mb-0" style="font-weight: 300;">
                        "Each product is carefully selected to meet the highest standards of quality, performance, and reliability. Whether you're managing critical infrastructure or expanding industrial operations — we deliver solutions you can trust."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Infrastructure & Inventory Readiness Section -->
<section class="infrastructure-section py-5 bg-dark text-white">
    <div class="container py-4">
        <div class="text-center mb-5 mw-800 mx-auto">
            <h2 class="text-danger fw-bold display-6 mb-3">Infrastructure & Inventory Readiness</h2>
            <p class="text-white-50 lead">Our strength lies in always being prepared to serve our customers efficiently and effectively:</p>
        </div>

        <div class="row align-items-center g-5">
            <!-- Left: List in White Card -->
            <div class="col-lg-6">
                <div class="bg-white text-dark p-4 rounded-3 shadow-lg">
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-start mb-3 border-bottom pb-3">
                            <i class="fas fa-warehouse text-danger mt-1 me-3"></i>
                            <span><strong>20,000+ sq. ft.</strong> modern warehouse with ready-to-dispatch inventory</span>
                        </li>
                        <li class="d-flex align-items-start mb-3 border-bottom pb-3">
                            <i class="fas fa-network-wired text-danger mt-1 me-3"></i>
                            <span><strong>ERP-integrated</strong> inventory management with real-time stock monitoring</span>
                        </li>
                        <li class="d-flex align-items-start mb-3 border-bottom pb-3">
                            <i class="fas fa-cubes text-danger mt-1 me-3"></i>
                            <span><strong>Thousands of SKUs</strong> for immediate dispatch, minimizing downtime</span>
                        </li>
                        <li class="d-flex align-items-start mb-3 border-bottom pb-3">
                            <i class="fas fa-shopping-cart text-danger mt-1 me-3"></i>
                            <span>E-Commerce Portal: <a href="https://www.sbsmart.in" target="_blank" class="text-danger fw-bold text-decoration-none">www.sbsmart.in</a> for 24/7 access</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-shipping-fast text-danger mt-1 me-3"></i>
                            <span><strong>Robust logistics</strong> for timely deliveries across India and globally</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Right: Paragraph -->
            <div class="col-lg-6">
                <div class="ps-lg-4">
                    <p class="lead text-white lh-lg" style="font-weight: 300;">
                        "Our deep inventory capabilities ensure that you stay on schedule — <strong class="text-white">no project delays, no compromises.</strong> You can rely on S.B. Syscon for speed, scale, and service."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Annual Rate Contracts Division Section -->
<section class="arc-section py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5 mw-800 mx-auto">
            <h2 class="text-danger fw-bold display-6 mb-3">Annual Rate Contracts Division</h2>
            <p class="text-muted lead">Understanding the unique needs of large corporates and multinational companies, we have a dedicated Annual Rate Contracts Division.</p>
        </div>

        <div class="row align-items-center g-5">
            <!-- Left: List -->
            <div class="col-lg-6 order-lg-1">
                 <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-4">
                        <i class="fas fa-file-contract text-danger fs-5 me-3 mt-1"></i>
                        <span class="text-secondary fs-5">Centralized rate contracts for companies with multiple plants and locations</span>
                    </li>
                    <li class="d-flex align-items-start mb-4">
                        <i class="fas fa-hand-holding-usd text-danger fs-5 me-3 mt-1"></i>
                        <span class="text-secondary fs-5">Cost-efficient supply chains ensuring savings on procurement budgets</span>
                    </li>
                    <li class="d-flex align-items-start mb-4">
                        <i class="fas fa-globe text-danger fs-5 me-3 mt-1"></i>
                        <span class="text-secondary fs-5">Seamless coordination across different sites and geographies</span>
                    </li>
                    <li class="d-flex align-items-start mb-4">
                        <i class="fas fa-headset text-danger fs-5 me-3 mt-1"></i>
                        <span class="text-secondary fs-5">Customized support services to match dynamic procurement needs</span>
                    </li>
                </ul>
            </div>
            
            <!-- Right: Paragraph -->
            <div class="col-lg-6 order-lg-2">
                <div class="p-4 bg-light rounded-3 border-start border-4 border-danger">
                    <p class="lead text-dark lh-base mb-0">
                        "This division proudly caters to some of the biggest names in various industries, delivering <strong class="text-danger">consistency, efficiency, and reliability</strong> across every engagement."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Global Reach Section -->
<section class="global-reach-section py-5 bg-dark text-white">
    <div class="container py-4">
        <div class="text-center mb-5 mw-800 mx-auto">
            <h2 class="text-danger fw-bold display-6 mb-3">Our Global Reach</h2>
            <p class="text-white-50 lead">We are proud to serve industries not just within India, but across the globe.</p>
        </div>

        <div class="row align-items-center g-5">
            <!-- Left: List in White Card -->
            <div class="col-lg-6">
                <div class="bg-white text-dark p-4 rounded-3 shadow-lg">
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-start mb-3 border-bottom pb-3">
                            <i class="fas fa-plane-departure text-danger mt-1 me-3"></i>
                            <span>Regular exports to <strong>20+ countries</strong> including Asia, the Middle East, and Africa</span>
                        </li>
                        <li class="d-flex align-items-start mb-3 border-bottom pb-3">
                            <i class="fas fa-passport text-danger mt-1 me-3"></i>
                            <span>Registered with <strong>Import Export Code (IEC)</strong> for seamless international operations</span>
                        </li>
                        <li class="d-flex align-items-start mb-3 border-bottom pb-3">
                            <i class="fas fa-handshake text-danger mt-1 me-3"></i>
                            <span>Strong alliances with top <strong>Freight Forwarders and CHAs</strong></span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-file-invoice-dollar text-danger mt-1 me-3"></i>
                            <span>Expertise in international compliance, documentation, and packaging standards</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Right: Paragraph -->
            <div class="col-lg-6">
                <div class="ps-lg-4">
                    <p class="lead text-white lh-lg" style="font-weight: 300;">
                        "Our global clients trust us for the same <strong>high standards of service and quality</strong> that define our presence in India — making S.B. Syscon Pvt. Ltd. a reliable partner, worldwide."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Key Strengths Section -->
<section class="strengths-section py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5 mw-800 mx-auto">
            <h2 class="text-danger fw-bold display-6 mb-3">Our Key Strengths</h2>
            <p class="text-muted lead">What sets us apart from the rest of the industry.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Left Column Strengths -->
            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li class="d-flex align-items-center mb-4 p-3 bg-light rounded hover-shadow">
                        <i class="fas fa-history text-danger fs-3 me-3"></i>
                        <span class="fs-5 text-dark">34 Years of Industry Legacy rooted in trust and excellence</span>
                    </li>
                    <li class="d-flex align-items-center mb-4 p-3 bg-light rounded hover-shadow">
                        <i class="fas fa-heart text-danger fs-3 me-3"></i>
                        <span class="fs-5 text-dark">High Customer Loyalty with significant repeat business</span>
                    </li>
                    <li class="d-flex align-items-center mb-4 p-3 bg-light rounded hover-shadow">
                        <i class="fas fa-boxes text-danger fs-3 me-3"></i>
                        <span class="fs-5 text-dark">Massive Inventory Readiness for urgent requirements</span>
                    </li>
                </ul>
            </div>
            <!-- Right Column Strengths -->
            <div class="col-md-6">
                 <ul class="list-unstyled">
                    <li class="d-flex align-items-center mb-4 p-3 bg-light rounded hover-shadow">
                        <i class="fas fa-star text-danger fs-3 me-3"></i>
                        <span class="fs-5 text-dark">Respected Reputation from decades of ethical practices</span>
                    </li>
                    <li class="d-flex align-items-center mb-4 p-3 bg-light rounded hover-shadow">
                        <i class="fas fa-users-cog text-danger fs-3 me-3"></i>
                        <span class="fs-5 text-dark">Expert Sales and Support Team with application know-how</span>
                    </li>
                    <li class="d-flex align-items-center mb-4 p-3 bg-light rounded hover-shadow">
                        <i class="fas fa-smile text-danger fs-3 me-3"></i>
                        <span class="fs-5 text-dark">Customer-Centric Processes delivering value beyond transactions</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <style>
        .hover-shadow { transition: box-shadow 0.3s ease; }
        .hover-shadow:hover { box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    </style>
</section>

<!-- Celebrating Trust Section -->
<section class="trust-section py-5 bg-dark text-white">
    <div class="container py-4">
        <div class="text-center mw-800 mx-auto">
            <h2 class="text-danger fw-bold display-6 mb-3">Celebrating Trust and Relationships</h2>
            <p class="text-white-50 lead mb-5">More than business — it's about building lasting bonds.</p>
            
            <div class="lead lh-lg" style="font-weight: 300;">
                <p class="mb-4">Over the years, S.B. Syscon has grown thanks to relationships built on consistency, service, and transparency.</p>
                <p class="mb-4">Our <strong class="text-white">high repeat order volume</strong> stands as proof of the trust we've earned.</p>
                <p class="mb-0">From humble beginnings to becoming a respected organization with a global footprint, our journey has been possible because of the people we serve — and the values we uphold.</p>
            </div>
        </div>
    </div>
</section>

<!-- Looking Ahead Section -->
<section class="looking-ahead-section py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5 mw-800 mx-auto">
            <h2 class="text-danger fw-bold display-6 mb-3">Looking Ahead</h2>
            <p class="text-muted lead">Driven by a vision for innovation and leadership in industrial solutions.</p>
        </div>

        <div class="row g-4 justify-content-center mb-5">
            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-boxes text-danger me-3"></i>
                        <span>Expand product offerings to match evolving industry needs</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-globe-asia text-danger me-3"></i>
                        <span>Deepen our global footprint through new partnerships</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-server text-danger me-3"></i>
                        <span>Strengthen our tech backbone for better service efficiency</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                 <ul class="list-unstyled">
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-users text-danger me-3"></i>
                        <span>Foster a growth-oriented, balanced workplace culture</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-heart text-danger me-3"></i>
                        <span>Stay true to our core values: Integrity, Reliability, Customer-First Thinking</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="text-center mw-800 mx-auto">
            <p class="lead text-dark fst-italic">"At S.B. Syscon Pvt. Ltd., we are not just moving with the times — we are shaping the future of industrial solutions. <br><span class="text-danger fw-bold">Join us on this journey of excellence and innovation.</span>"</p>
        </div>
    </div>
</section>

<!-- Values Section (Glassmorphism) -->
<section class="values-section py-5 position-relative" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="text-white fw-bold display-6">Our Core Values</h2>
            <div class="bg-white mx-auto mt-3 rounded-pill" style="width: 60px; height: 3px;"></div>
        </div>
        
        <div class="row g-4">
            <!-- Mission -->
            <div class="col-md-4">
                <div class="value-card bg-white p-5 rounded-3 h-100 text-center position-relative overflow-hidden group">
                    <div class="icon-box mb-4 mx-auto bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="fas fa-bullseye text-danger display-5"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Our Mission</h4>
                    <p class="text-muted small">To empower industries with reliable, efficient, and sustainable electrical power distribution solutions, ensuring zero downtime for our partners.</p>
                    <div class="hover-overlay position-absolute top-0 start-0 w-100 h-100 bg-danger opacity-0 transition-all"></div>
                </div>
            </div>
            
            <!-- Vision -->
            <div class="col-md-4">
                <div class="value-card bg-white p-5 rounded-3 h-100 text-center position-relative overflow-hidden group">
                     <div class="icon-box mb-4 mx-auto bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="fas fa-eye text-primary display-5"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Our Vision</h4>
                    <p class="text-muted small">To be the preferred partner for industrial automation and electrical engineering across the nation, setting benchmarks in quality and service.</p>
                </div>
            </div>
            
            <!-- Values -->
            <div class="col-md-4">
                <div class="value-card bg-white p-5 rounded-3 h-100 text-center position-relative overflow-hidden group">
                     <div class="icon-box mb-4 mx-auto bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="fas fa-handshake text-success display-5"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Our Values</h4>
                    <p class="text-muted small">Integrity, Innovation, Quality, and a "Customer First" approach are the pillars of everything we do at S.B. Syscon.</p>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .value-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        .icon-box {
            transition: transform 0.3s ease;
        }
        .value-card:hover .icon-box {
            transform: scale(1.1);
        }
        
        /* ----- MOBILE RESPONSIVE ----- */
        @media (max-width: 991px) {
            .page-header {
                height: 350px !important;
            }
            .display-2 {
                font-size: 3rem !important;
            }
        }

        @media (max-width: 768px) {
            /* Page Header */
            .page-header {
                height: 300px !important;
            }
            .display-2 { /* About Us Title */
                font-size: 2.2rem !important;
            }
            .page-header .lead {
                font-size: 0.9rem !important;
                padding: 0 15px;
            }
            
            /* Section Headings */
            h2.fw-bold { 
                font-size: 1.7rem !important; 
            }
            .display-6 {
                font-size: 1.5rem !important;
            }
            
            /* Content Padding */
            section {
                padding-top: 40px !important;
                padding-bottom: 40px !important;
            }
            
            /* Lists & Text */
            ul.list-unstyled li {
                font-size: 0.9rem !important;
                margin-bottom: 1rem !important;
            }
            p.lead {
                font-size: 1rem !important;
                line-height: 1.6 !important;
            }
            .p-5 {
                padding: 1.5rem !important; /* Fix oversized padding on mobile cards */
            }
             .p-4 {
                padding: 1.25rem !important;
            }
            
            /* Reorder Columns for Text First, Image/List Second on Mobile */
            .order-lg-1 { order: 2; }
            .order-lg-2 { order: 1; margin-bottom: 2rem; }
            
            /* Cards Spacing */
            .feature-card, .value-card, .bg-white.text-dark {
                margin-bottom: 20px;
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
            .container {
                padding-right: 20px;
                padding-left: 20px;
                overflow-x: hidden;
            }
            .row {
                margin-right: -10px !important;
                margin-left: -10px !important;
            }
            .col-12, .col-lg-4, .col-lg-6, .col-md-6 {
                padding-right: 10px !important;
                padding-left: 10px !important;
            }
        }
        
        @media (max-width: 480px) {
            .page-header {
                height: 250px !important;
            }
            .display-2 {
                font-size: 1.8rem !important;
            }
            h2.fw-bold { 
                font-size: 1.5rem !important; 
            }
             .icon-wrapper .fa-3x {
                font-size: 2.5em; /* Smaller icons */
            }
        }
    </style>
</section>

<?php require_once 'includes/footer.php'; ?>
