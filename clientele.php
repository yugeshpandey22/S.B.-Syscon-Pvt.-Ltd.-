<?php
require_once 'config/constants.php';
require_once 'includes/head.php';
require_once 'includes/navbar.php';
?>

<!-- AOS for Scroll Animations -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    /* Clean White Background with Subtle Texture */
    body {
        background-color: #f9f9f9;
        font-family: 'Outfit', sans-serif;
    }

    /* Premium Hero Section - Minimalist */
    .clientele-hero {
        position: relative;
        padding: 120px 0 80px 0;
        background: url('assets/images/clientele-hero.png') no-repeat center center;
        background-size: cover;
        text-align: center;
        overflow: hidden;
        animation: panBg 30s linear infinite alternate;
    }
    
    @keyframes panBg {
         0% { background-position: 0% 50%; background-size: 110%; }
         100% { background-position: 100% 50%; background-size: 110%; }
    }

    .clientele-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(10, 10, 10, 0.9) 0%, rgba(20, 20, 20, 0.7) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-content h1 {
        font-size: 3.5rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 0 5px 15px rgba(0,0,0,0.5);
    }

    .hero-content p {
        font-size: 1.2rem;
        color: #f1c40f; /* Gold accent */
        max-width: 700px;
        margin: 0 auto;
        letter-spacing: 1px;
    }

    /* Clean Client Grid Section */
    .client-grid-section {
        padding: 80px 0;
        background-color: #ffffff;
    }

    .clients-container {
        max-width: 1900px;
        margin: 0 auto;
        padding: 0 40px;
    }

    /* Grid Layout - Matching Reference Design */
    .clients-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: 20px;
        padding: 40px 0;
    }

    /* Clean Logo Card */
    .logo-card {
        background: #ffffff;
        border: 1px solid #eee;
        border-radius: 12px;
        padding: 20px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
        position: relative;
        overflow: hidden;
    }
    
    .logo-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0%;
        height: 3px;
        background: #bf2626;
        transition: width 0.3s ease;
    }

    .logo-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.08); /* Soft shadow */
        border-color: #fff;
    }
    
    .logo-card:hover::after {
        width: 100%;
    }

    .logo-card img {
        max-width: 90%;
        max-height: 70%;
        object-fit: contain;
        transition: all 0.3s ease;
        /* Removed grayscale filter */
    }

    .logo-card:hover img {
        transform: scale(1.1);
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .clients-grid {
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .clients-grid {
            grid-template-columns: repeat(2, 1fr); /* 2 Column mobile */
            gap: 15px;
        }
        
        .logo-card {
            height: 100px;
            padding: 15px;
        }
        
        .hero-content h1 {
            font-size: 2.2rem;
        }
    }

    /* Heading Section Styling */
    .section-heading {
        margin-bottom: 60px;
        padding: 0 20px;
    }

    .section-heading h2 {
        font-size: 3rem;
        font-weight: 800;
        color: #222;
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }

    .section-heading h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: #bf2626; /* Red line */
        border-radius: 2px;
    }

    .section-heading p {
        font-size: 1.15rem;
        color: #555;
        line-height: 1.8;
        max-width: 800px;
        margin: 25px auto 0;
    }

</style>

<!-- Hero Section -->
<section class="clientele-hero">
    <div class="container">
        <div class="hero-content" data-aos="fade-up">
            <h1 class="animate-char">Our Clientele</h1>
            <p class="animate-char" style="animation-delay: 0.5s;">Trusted by Industry Leaders Across India</p>
        </div>
    </div>
</section>

<style>
    .animate-char {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 1s ease-out forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Clean Client Grid Layout -->
<section class="client-grid-section">
    <div class="clients-container">
        <!-- Heading Section -->
        <div class="section-heading text-center" data-aos="fade-up">
            <h2>Our Clients</h2>
            <p>
                At S.B. Syscon Pvt. Ltd., our clients are at the core of our mission. We proudly serve dynamic startups and established enterprises across India's industrial landscape.
            </p>
        </div>

        <div class="clients-grid">
            <?php
            // Display ALL images found in the assets/images3 folder
            // Clean grid layout matching the reference design

            for ($i = 1; $i <= 110; $i++) {
                $img_path = "assets/images3/{$i}.png";
                
                if (file_exists($img_path)) {
            ?>
            <div class="logo-card" data-aos="fade-up" data-aos-delay="<?php echo ($i * 10) % 200; ?>">
                <img src="<?php echo $img_path; ?>" alt="Client Logo <?php echo $i; ?>" loading="lazy">
            </div>
            <?php 
                }
            } 
            ?>
        </div>
    </div>
</section>

<!-- AOS Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

<?php require_once 'includes/footer.php'; ?>
