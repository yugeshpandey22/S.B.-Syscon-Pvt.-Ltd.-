<?php
require_once 'config/constants.php';
require_once 'includes/head.php';
require_once 'includes/navbar.php';
?>

<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<!-- Vanila Tilt -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>

<style>
    /* --- PREMIUM DARK JOURNEY THEME --- */
    body {
        background-color: #050505;
        color: #fff;
        font-family: 'Outfit', sans-serif;
        overflow-x: hidden;
    }
    
    /* Background Pattern */
    .journey-section {
        position: relative;
        padding: 80px 0;
        background: radial-gradient(circle at 50% 50%, #1a1a1a 0%, #050505 100%);
    }

    .journey-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        background-size: 50px 50px;
        pointer-events: none;
    }

    /* Hero Section */
    .journey-hero {
        height: 50vh;
        min-height: 400px;
        background: url('assets/css/journey-banner.png') no-repeat center center;
        background-size: cover;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        border-bottom: 2px solid #bf2626;
        animation: journeyBgAnim 25s infinite alternate; /* Added Animation */
    }
    
    @keyframes journeyBgAnim {
        0% { background-size: 100%; }
        100% { background-size: 120%; }
    }

    .journey-hero::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0,0,0,0.9), rgba(0,0,0,0.6));
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .hero-content h1 {
        font-size: 4rem;
        font-weight: 800;
        text-transform: uppercase;
        background: linear-gradient(to right, #fff, #999);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 15px;
        letter-spacing: 2px;
    }

    .hero-content p {
        font-size: 1.2rem;
        color: #f1c40f;
        letter-spacing: 1px;
    }

    /* TIMELINE */
    .timeline-container {
        position: relative;
        max-width: 1200px;
        margin: 60px auto 0;
    }

    /* Center Line */
    .timeline-line {
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 4px;
        background: rgba(255, 255, 255, 0.1);
        transform: translateX(-50%);
        z-index: 1;
        border-radius: 4px;
    }

    /* Red Fill Line */
    .timeline-line-fill {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 0%;
        background: #bf2626;
        box-shadow: 0 0 15px #bf2626;
        transition: height 0.1s linear;
        border-radius: 4px;
    }

    /* Timeline Row */
    .timeline-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 80px;
        position: relative;
        z-index: 2;
    }

    .timeline-row:nth-child(even) {
        flex-direction: row-reverse;
    }

    .timeline-content-wrapper {
        width: 45%;
        position: relative;
    }

    /* Glass Card */
    .timeline-card {
        background: rgba(20, 20, 20, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 30px;
        border-radius: 15px;
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(10px);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }
    
    .timeline-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(255,255,255,0.05) 0%, transparent 100%);
        pointer-events: none;
    }

    .timeline-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(191, 38, 38, 0.2);
        border-color: #bf2626;
    }

    /* --- Snake Border Animation on Hover --- */
    .timeline-card span {
        position: absolute;
        display: block;
        opacity: 0; 
        transition: opacity 0.3s;
    }
    .timeline-card:hover span {
        opacity: 1;
    }

    .timeline-card span:nth-child(1) {
        top: 0; left: -100%; width: 100%; height: 2px;
        background: linear-gradient(90deg, transparent, #bf2626);
        animation: btn-anim1 1s linear infinite;
    }
    .timeline-card span:nth-child(2) {
        top: -100%; right: 0; width: 2px; height: 100%;
        background: linear-gradient(180deg, transparent, #bf2626);
        animation: btn-anim2 1s linear infinite; animation-delay: .25s;
    }
    .timeline-card span:nth-child(3) {
        bottom: 0; right: -100%; width: 100%; height: 2px;
        background: linear-gradient(270deg, transparent, #bf2626);
        animation: btn-anim3 1s linear infinite; animation-delay: .5s;
    }
    .timeline-card span:nth-child(4) {
        bottom: -100%; left: 0; width: 2px; height: 100%;
        background: linear-gradient(360deg, transparent, #bf2626);
        animation: btn-anim4 1s linear infinite; animation-delay: .75s;
    }

    @keyframes btn-anim1 { 0% { left: -100%; } 50%,100% { left: 100%; } }
    @keyframes btn-anim2 { 0% { top: -100%; } 50%,100% { top: 100%; } }
    @keyframes btn-anim3 { 0% { right: -100%; } 50%,100% { right: 100%; } }
    @keyframes btn-anim4 { 0% { bottom: -100%; } 50%,100% { bottom: 100%; } }

    /* Content Styling */
    .journey-year {
        font-size: 2.5rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 10px;
        text-shadow: 0 0 10px rgba(255,255,255,0.3);
    }
    
    .timeline-row:nth-child(odd) .journey-year { color: #f1c40f; } /* Gold */
    .timeline-row:nth-child(even) .journey-year { color: #ffffff; } /* White */

    .journey-text {
        font-size: 1.1rem;
        color: #ccc;
        line-height: 1.6;
        margin: 0;
    }

    /* Pointers & Dots */
    .timeline-dot {
        position: absolute;
        left: 50%;
        top: 30px;
        width: 24px;
        height: 24px;
        background: #000;
        border: 4px solid #555;
        border-radius: 50%;
        transform: translateX(-50%);
        z-index: 3;
        transition: all 0.3s;
    }

    .timeline-row.active .timeline-dot {
        border-color: #bf2626;
        background: #bf2626;
        box-shadow: 0 0 20px #bf2626;
        transform: translateX(-50%) scale(1.3);
    }

    /* Connection Line to Card */
    .timeline-card::after {
        content: '';
        position: absolute;
        top: 40px;
        width: 40px;
        height: 2px;
        background: rgba(255,255,255,0.2);
    }

    .timeline-row:nth-child(odd) .timeline-card::after {
        right: -40px;
    }
    
    .timeline-row:nth-child(even) .timeline-card::after {
        left: -40px;
    }

    /* Mobile Responsive */
    @media (max-width: 991px) {
        .timeline-line { left: 20px; }
        .timeline-row {
            flex-direction: column !important;
            margin-bottom: 50px;
        }
        .timeline-content-wrapper {
            width: 100%;
            padding-left: 60px;
            padding-right: 20px;
        }
        .timeline-dot { left: 20px; }
        .timeline-card::after {
            left: -40px !important;
            right: auto !important;
            width: 40px;
        }
        .journey-year { font-size: 2rem; }
        .hero-content h1 { font-size: 2.5rem; }

        /* FIX: Prevent Horizontal Scrolling (Side-Sway) */
        html, body {
            max-width: 100%;
            overflow-x: hidden !important;
        }
        section, .journey-section {
            overflow-x: hidden !important;
            width: 100% !important;
        }
        .container, .timeline-container {
            padding-right: 15px;
            padding-left: 15px;
            overflow-x: hidden;
        }
        .row, .timeline-row {
            margin-right: 0 !important;
            margin-left: 0 !important;
        }
    }
    .animate-slide-up {
        opacity: 0;
        transform: translateY(30px);
        animation: slideUpFade 1s ease-out forwards;
    }
    @keyframes slideUpFade {
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Hero Section -->
<div class="journey-hero">
    <div class="hero-content">
        <h1 class="animate-slide-up">Our Journey</h1>
        <p class="animate-slide-up" style="animation-delay: 0.2s;">A Legacy of Innovation & Excellence Since 1992</p>
    </div>
</div>

<section class="journey-section">
    <div class="container timeline-container">
        <!-- Main Scroll Line -->
        <div class="timeline-line">
            <div class="timeline-line-fill" id="drawingLine"></div>
        </div>

        <?php
        $milestones = [
            ["year" => "1992", "text" => "Company established by a Graduate Engineer & Entrepreneur - Mr. R. P. Pandey."],
            ["year" => "1993", "text" => "Appointed as Channel Partner for Standard Company."],
            ["year" => "1995", "text" => "Appointed as Channel Partner for AEI - NGEF Company."],
            ["year" => "1999", "text" => "Started a Panel Manufacturing Unit in Faridabad."],
            ["year" => "2000", "text" => "Appointed as Channel Partner for GE."],
            ["year" => "2001", "text" => "Appointed as Channel Partner for Siemens."],
            ["year" => "2004", "text" => "Shifted focus solely to Trading & Distribution."],
            ["year" => "2005", "text" => "Became the 2nd Largest All-India by Volume for GE."],
            ["year" => "2006", "text" => "Broke the Barrier of 100 Million Revenue."],
            ["year" => "2007", "text" => "Reached milestone of 3,000 satisfied customers."],
            ["year" => "2008", "text" => "Became Biggest in North India for Siemens LV Switchgear."],
            ["year" => "2009", "text" => "Incorporated S.B. Syscon Pvt. Ltd. and moved to a 10,000+ sqft warehouse."],
            ["year" => "2010", "text" => "Achieved ISO Certification for Quality, Process, and Management."],
            ["year" => "2011", "text" => "Entered the LV Motors & Gearboxes industry."],
            ["year" => "2012", "text" => "Opened Western Region Office in Mumbai."],
            ["year" => "2013", "text" => "Recognized as an Export House after gaining IEC."],
            ["year" => "2014", "text" => "Broke 250 Million Revenue mark & workforce diversity reached 40% women."],
            ["year" => "2015", "text" => "Became ASCO Channel Partner."],
            ["year" => "2016", "text" => "Appointed as Havells Channel Partner."],
            ["year" => "2017", "text" => "Appointed as LAPP Channel Partner."],
            ["year" => "2018", "text" => "Established Centralized Warehouse in Faridabad as per GST norms."],
            ["year" => "2019", "text" => "Crossed 500 Million Revenue."],
            ["year" => "2020", "text" => "Launched SB Smart — Online B2B Portal for Omni-channel Sales."],
            ["year" => "2021", "text" => "Established Export BU with regular exports to 5 continents."],
            ["year" => "2022", "text" => "Top 3 finalist for MSME of the Year Award by Economic Times."],
            ["year" => "2023", "text" => "Started Special Purpose Machine manufacturing & Achieved 75% Green Fuel Delivery."],
            ["year" => "2024", "text" => "Reached 1000 Million Revenue milestone (₹100 Cr)."],
            ["year" => "2025", "text" => "Projecting 1250 Million Revenue (₹125 Cr) with stakeholder support."]
        ];

        foreach($milestones as $index => $ms) {
            $aos = ($index % 2 == 0) ? "fade-right" : "fade-left";
            ?>
            <div class="timeline-row" data-aos="<?php echo $aos; ?>">
                <div class="timeline-content-wrapper">
                    <div class="timeline-card" data-tilt>
                        <!-- Moving Borders -->
                        <span></span><span></span><span></span><span></span>
                        
                        <div class="journey-year"><?php echo $ms['year']; ?></div>
                        <p class="journey-text"><?php echo $ms['text']; ?></p>
                    </div>
                </div>
                <div class="timeline-dot"></div>
            </div>
            <?php
        }
        ?>

    </div>
</section>

<!-- AOS Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        offset: 100,
        once: false, // Re-animate on scroll up too
        mirror: true
    });

    // 3D Tilt Init
    VanillaTilt.init(document.querySelectorAll(".timeline-card"), {
        max: 10,
        speed: 400,
        glare: true,
        "max-glare": 0.2
    });

    // Scroll Logic for Line & Dots
    const journeySection = document.querySelector('.journey-section');
    const drawLine = document.getElementById('drawingLine');
    const rows = document.querySelectorAll('.timeline-row');

    window.addEventListener('scroll', () => {
        const sectionTop = journeySection.offsetTop;
        const sectionHeight = journeySection.offsetHeight;
        const scrollPos = window.scrollY + (window.innerHeight / 2); // Trigger point center screen

        // 1. Line Progress
        if (scrollPos > sectionTop) {
            const progress = ((scrollPos - sectionTop) / sectionHeight) * 100;
            drawLine.style.height = `${Math.min(progress, 100)}%`;
        }

        // 2. Active Dots
        rows.forEach(row => {
            const rowTop = row.offsetTop + sectionTop;
            if (scrollPos > rowTop) {
                row.classList.add('active');
            } else {
                row.classList.remove('active');
            }
        });
    });
</script>

<?php require_once 'includes/footer.php'; ?>
