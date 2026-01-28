<?php
require_once 'config/constants.php';
require_once 'config/database.php';
require_once 'includes/head.php';
require_once 'includes/navbar.php';
?>

<!-- AOS already included in footer -->

<style>
    /* Dark Premium Theme */
    body {
        background: #0a0a0a;
        color: #ffffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Hero Slideshow */
    .achievements-hero {
        position: relative;
        height: 60vh;
        min-height: 500px;
        overflow: hidden;
        background: #000;
        border-bottom: 2px solid #ffd700;
    }

    .hero-slideshow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .hero-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        opacity: 0;
        transition: opacity 1.5s ease-in-out;
    }

    .hero-slide.active {
        opacity: 1;
    }

    /* Hero Images */
    .hero-slide:nth-child(1) {
        background-image: url('assets/images/achievements-hero-collage.png');
    }
    .hero-slide:nth-child(2) {
        background-image: url('assets/images/achievements-hero-collage-2.png');
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* Reduced opacity significantly for fresh look */
        background: linear-gradient(135deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.1) 100%);
        z-index: 1;
    }

    .hero-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        text-align: center;
        width: 100%;
    }

    .hero-content h1 {
        font-size: 4rem;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 4px;
        margin-bottom: 20px;
        background: linear-gradient(90deg, #ffd700, #ff0000, #00ff00, #0000ff, #ffd700);
        background-size: 400% 100%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 0 30px rgba(255, 215, 0, 0.4);
        animation: textGradient 6s linear infinite;
    }

    @keyframes textGradient {
        0% { background-position: 0% 50%; }
        100% { background-position: 100% 50%; }
    }

    .hero-content p {
        font-size: 1.4rem;
        color: rgba(255, 255, 255, 0.9);
        letter-spacing: 1px;
    }

    /* Hall of Fame Section */
    .hall-of-fame {
        padding: 80px 0;
        background: #0a0a0a;
        background-image: 
            linear-gradient(rgba(255, 215, 0, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 215, 0, 0.03) 1px, transparent 1px);
        background-size: 40px 40px;
    }

    .achievements-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 30px;
    }

    /* Neon Moving Light Effect for Heading */
    .section-title h2 {
        position: relative;
        display: inline-block;
        font-size: 3rem;
        font-weight: 900;
        color: #ffd700;
        text-transform: uppercase;
        letter-spacing: 4px;
        text-decoration: none;
        overflow: hidden;
        transition: 0.2s;
        margin-bottom: 60px;
        padding: 20px 40px; /* Space for border */
    }

    .section-title h2:hover {
        background: #ffd700;
        color: #000; /* Black text on hover */
        box-shadow: 0 0 10px #ffd700, 0 0 40px #ffd700, 0 0 80px #ffd700;
        transition-delay: 0.1s; /* Instant glow */
    }

    /* Moving Lines Spans (will be added in HTML) */
    .section-title h2 span {
        position: absolute;
        display: block;
    }

    /* Top Line */
    .section-title h2 span:nth-child(1) {
        top: 0;
        left: -100%;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, transparent, #ffd700);
        animation: animate1 1s linear infinite;
    }
    @keyframes animate1 {
        0% { left: -100%; }
        50%, 100% { left: 100%; }
    }

    /* Right Line */
    .section-title h2 span:nth-child(2) {
        top: -100%;
        right: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(180deg, transparent, #ffd700);
        animation: animate2 1s linear infinite;
        animation-delay: 0.25s;
    }
    @keyframes animate2 {
        0% { top: -100%; }
        50%, 100% { top: 100%; }
    }

    /* Bottom Line */
    .section-title h2 span:nth-child(3) {
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 4px;
        background: linear-gradient(270deg, transparent, #ffd700);
        animation: animate3 1s linear infinite;
        animation-delay: 0.5s;
    }
    @keyframes animate3 {
        0% { right: -100%; }
        50%, 100% { right: 100%; }
    }

    /* Left Line */
    .section-title h2 span:nth-child(4) {
        bottom: -100%;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(360deg, transparent, #ffd700);
        animation: animate4 1s linear infinite;
        animation-delay: 0.75s;
    }
    @keyframes animate4 {
        0% { bottom: -100%; }
        50%, 100% { bottom: 100%; }
    }

    /* GLOWING CARD CSS */
    .award-card {
        background: #111;
        border-radius: 15px;
        padding: 20px;
        position: relative;
        overflow: hidden;
        border: 1px solid #333;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    /* The "Light Jalti Thi" Effect (Glowing Animation) */
    @keyframes borderGlow {
        0%, 100% { box-shadow: 0 0 10px #ffd700, inset 0 0 10px #ffd700; border-color: #ffd700; }
        50% { box-shadow: 0 0 30px #ffd700, inset 0 0 20px #ffd700; border-color: #ffed4e; }
    }

    .award-card:hover {
        transform: translateY(-10px);
        animation: borderGlow 1.5s infinite alternate; /* Pulsing Glow */
    }

    /* Color Changing Animation */
    @keyframes rainbowColor {
        0% { filter: hue-rotate(0deg); }
        100% { filter: hue-rotate(360deg); }
    }

    /* Moving Light Spans for Outer Card */
    .award-card span.outer-light {
        position: absolute;
        display: block;
        z-index: 5;
    }

    .award-card span.outer-light:nth-child(1) {
        top: 0;
        left: -100%;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, transparent, #ffd700);
        animation: animate1 4s linear infinite, rainbowColor 5s linear infinite;
    }

    .award-card span.outer-light:nth-child(2) {
        top: -100%;
        right: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(180deg, transparent, #ffd700);
        animation: animate2 4s linear infinite, rainbowColor 5s linear infinite;
        animation-delay: 1s, 0s;
    }

    .award-card span.outer-light:nth-child(3) {
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 4px;
        background: linear-gradient(270deg, transparent, #ffd700);
        animation: animate3 4s linear infinite, rainbowColor 5s linear infinite;
        animation-delay: 2s, 0s;
    }

    .award-card span.outer-light:nth-child(4) {
        bottom: -100%;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(360deg, transparent, #ffd700);
        animation: animate4 4s linear infinite, rainbowColor 5s linear infinite;
        animation-delay: 3s, 0s;
    }

    /* --- MOBILE RESPONSIVE TWEAKS --- */
    @media (max-width: 991px) {
        .achievements-hero {
            height: 50vh;
        }
        .hero-content h1 {
            font-size: 3rem;
        }
    }

    @media (max-width: 768px) {
        /* Hero Section */
        .achievements-hero {
            height: auto; 
            min-height: 400px; /* Reduced from 500 */
        }
        .hero-content h1 {
            font-size: 2rem !important;
            letter-spacing: 2px;
            margin-bottom: 15px;
            padding: 0 15px;
            line-height: 1.2;
        }
        .hero-content p {
            font-size: 1rem !important;
            display: block; /* Show subtitle but smaller */
            max-width: 90%;
            margin: 0 auto;
        }

        /* Section Title */
        .section-title h2 {
            font-size: 1.5rem !important;
            padding: 15px 10px;
            margin-bottom: 40px;
            text-shadow: none;
            background: rgba(255, 215, 0, 0.05); 
            border: 1px solid rgba(255, 215, 0, 0.3);
            width: 100%;
        }
        
        .hall-of-fame {
            padding: 40px 0;
            background-size: 20px 20px;
        }

        .achievements-container {
            padding: 0 20px;
        }

        /* Grid Gutter Fix */
        .g-5 {
            --bs-gutter-y: 2rem !important; /* Reduce vertical gap */
            --bs-gutter-x: 0 !important;   /* Reduce horizontal gutter to prevent broken layout */
        }

        /* Card Adjustments */
        .award-card {
            margin-bottom: 0;
            padding: 15px;
            border-radius: 10px;
        }
        
        /* Disable Complex Animations on Mobile */
        .award-card span.outer-light { display: none; }
        .award-frame span { display: none; }
        
        .award-frame {
            height: 200px;
            box-shadow: none;
            border: 1px solid #333;
            margin-bottom: 15px;
        }
        
        /* Text Sizing */
        .award-details p {
            font-size: 1rem !important;
        }
        .award-details div {
            font-size: 0.85rem !important;
        }
    }

    /* Award Frame with Moving Light */
    .award-frame {
        width: 100%;
        height: 300px;
        background: #fff;
        border-radius: 8px; /* Slightly reduced for sharp corners for spans */
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        position: relative;
        overflow: hidden; /* Vital for snake effect */
        box-shadow: inset 0 0 0 4px #d4af37; /* Keeping inner gold border too */
    }

    /* Moving Light Spans for Frame */
    .award-frame span {
        position: absolute;
        display: block;
    }

    .award-frame span:nth-child(1) {
        top: 0;
        left: -100%;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, transparent, #00e5ff); 
        animation: animate1 4s linear infinite, rainbowColor 4s linear infinite;
    }

    .award-frame span:nth-child(2) {
        top: -100%;
        right: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(180deg, transparent, #00e5ff);
        animation: animate2 4s linear infinite, rainbowColor 4s linear infinite;
        animation-delay: 1s, 0s;
    }

    .award-frame span:nth-child(3) {
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 4px;
        background: linear-gradient(270deg, transparent, #00e5ff);
        animation: animate3 4s linear infinite, rainbowColor 4s linear infinite;
        animation-delay: 2s, 0s;
    }

    .award-frame span:nth-child(4) {
        bottom: -100%;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(360deg, transparent, #00e5ff);
        animation: animate4 4s linear infinite, rainbowColor 4s linear infinite;
        animation-delay: 3s, 0s;
    }

    .award-frame img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        transition: transform 0.4s;
        z-index: 2; /* Keep image above lights */
    }

    .award-card:hover .award-frame img {
        transform: scale(1.08);
    }

    .award-details {
        text-align: center;
        margin-top: auto;
    }

    .award-details h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #ffd700;
        text-transform: uppercase;
        margin-bottom: 8px;
        letter-spacing: 0.5px;
    }

    .award-details p {
        font-size: 0.9rem;
        color: #ccc;
    }

</style>

<!-- Hero Slideshow Section -->
<section class="achievements-hero">
    <div class="hero-slideshow">
        <div class="hero-slide active"></div>
        <div class="hero-slide"></div>
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 data-aos="fade-right" data-aos-duration="1500"> Achievements</h1>
    </div>
</section>

<!-- Hall of Fame Grid -->
<section class="hall-of-fame">
    <div class="achievements-container">
        
        <div class="section-title" data-aos="fade-down">
            <div style="text-align: center;">
                <h2>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Our Achievements
                </h2>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-5">
            <?php
            // Auto-Import Logic (Self-Healing)
            try {
                // Check if table is empty
                $checkStmt = $conn->query("SELECT COUNT(*) FROM achievements");
                if ($checkStmt->fetchColumn() == 0) {
                    $imagesDir = __DIR__ . '/assets/images2';
                    if (is_dir($imagesDir)) {
                        $files = scandir($imagesDir);
                        foreach ($files as $file) {
                            if ($file === '.' || $file === '..') continue;
                            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                                $relativePath = 'assets/images2/' . $file;
                                $title = ucwords(str_replace(['_', '-'], ' ', pathinfo($file, PATHINFO_FILENAME)));
                                $insert = $conn->prepare("INSERT INTO achievements (image_path, title, description) VALUES (?, ?, ?)");
                                $insert->execute([$relativePath, $title, 'Recognized Excellence']);
                            }
                        }
                    }
                }
            } catch (Exception $e) {
                // Silent fail or log
            }

            // Fetch Achievements from Database
            try {
                $stmt = $conn->query("SELECT * FROM achievements ORDER BY created_at DESC");
                $achievements = $stmt->fetchAll();


                if (count($achievements) > 0) {
                    foreach ($achievements as $row) {
                        $img_path = $row['image_path'];
                        $title = !empty($row['title']) ? htmlspecialchars($row['title']) : 'Recognition for Excellence & Innovation';
            ?>
            <div class="col">
                <div class="award-card" data-aos="fade-up">
                    <span class="outer-light"></span>
                    <span class="outer-light"></span>
                    <span class="outer-light"></span>
                    <span class="outer-light"></span>
                    
                    <div class="award-frame">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <img src="<?php echo $img_path; ?>" alt="<?php echo $title; ?>" loading="lazy">
                    </div>
                    <div class="award-details p-3">
                        <p class="mb-2" style="text-transform: uppercase; font-weight: 800; font-size: 1rem; color: #fff; letter-spacing: 0.5px; line-height: 1.2;">
                            <?php echo $title; ?>
                        </p>
                        <?php if(!empty($row['description'])): ?>
                            <div style="color: #ffd700; font-size: 0.85rem; font-weight: 500; line-height: 1.4; border-top: 1px solid rgba(255,215,0,0.2); padding-top: 8px;">
                                <?php echo nl2br(htmlspecialchars($row['description'])); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
                    }
                } else {
                    echo '<div class="col-12"><p class="text-white text-center">No achievements added yet.</p></div>';
                }
            } catch(PDOException $e) {
                echo '<p class="text-white">Error loading data.</p>';
            }
            ?>
        </div>
    </div>
</section>

<!-- AOS Script handled globally -->
<!-- Vanilla Tilt 3D Effect -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>

<script>
    // AOS init is global now


    // Initialize 3D Tilt on Cards only on Desktop
    if (window.innerWidth > 768) {
        VanillaTilt.init(document.querySelectorAll(".award-card"), {
            max: 15,            // Max tilt angle
            speed: 400,         // Speed of the enter/exit transition
            glare: true,        // Turn on "glare" effect
            "max-glare": 0.3,   // Opacity of glare
            scale: 1.05         // Slight zoom on hover
        });
    }

    // Slideshow Script
    const slides = document.querySelectorAll('.hero-slide');
    let currentSlide = 0;
    const slideInterval = 5000;

    function nextSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
    }

    if(slides.length > 0) {
        setInterval(nextSlide, slideInterval);
    }
</script>

<?php require_once 'includes/footer.php'; ?>
