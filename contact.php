<?php
session_start();
require_once 'config/constants.php';
require_once 'includes/head.php';
require_once 'includes/navbar.php';

require_once 'config/database.php';

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mobile = trim($_POST['mobile'] ?? ''); // Added Mobile
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Note: We do NOT insert here anymore. 
    // Insertion happens in the OTP verification block below.
}
?>

<!-- AOS Animation CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<style>
    /* --- ULTRA PREMIUM CONTACT THEME --- */
    body {
        font-family: 'Outfit', sans-serif;
        background-color: #050505;
        color: #e0e0e0;
        overflow-x: hidden; /* Prevent side scroll globally */
    }

    /* 1. Cinematic Hero Section */
    .contact-hero-dark {
        position: relative;
        padding: 150px 0 120px;
        background: url('assets/css/contact_bg_premium.png') no-repeat center center;
        background-size: cover;
        background-attachment: fixed;
        overflow: hidden;
    }
    
    .contact-hero-dark::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to bottom, rgba(5,5,5,0.3), #050505);
        z-index: 1;
    }

    /* Animated Background Particles (CSS only) */
    .contact-hero-dark::after {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background-image: radial-gradient(rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 30px 30px;
        opacity: 0.3;
        z-index: 0;
        animation: bgMove 20s linear infinite;
    }
    @keyframes bgMove { 0% { transform: translateY(0); } 100% { transform: translateY(-30px); } }

    .hero-title-large {
        font-size: 4.5rem;
        font-weight: 800;
        text-transform: uppercase;
        color: #fff;
        text-shadow: 0 10px 30px rgba(0,0,0,0.5);
        position: relative;
        z-index: 2;
        margin-bottom: 10px;
        letter-spacing: -2px;
    }
    
    .hero-subtitle {
        color: #fff;
        background: linear-gradient(90deg, #dc3545, #b02a37);
        font-size: 1.1rem;
        font-weight: 800;
        letter-spacing: 3px;
        text-transform: uppercase;
        position: relative;
        z-index: 2;
        display: inline-block;
        padding: 8px 25px;
        border-radius: 50px;
        box-shadow: 0 0 25px rgba(220, 53, 69, 0.5);
        margin-bottom: 15px;
        border: 1px solid rgba(255,255,255,0.2);
    }

    /* 2. Floating Glass Container */
    .contact-container {
        position: relative;
        margin-top: -80px; /* Overlap Hero */
        z-index: 10;
        margin-bottom: 100px;
    }

    .glass-panel {
        background: rgba(25, 25, 25, 0.6);
        backdrop-filter: blur(25px) saturate(180%);
        -webkit-backdrop-filter: blur(25px) saturate(180%);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 40px 80px rgba(0,0,0,0.6);
        display: flex;
        flex-wrap: wrap;
    }

    /* Left Side: Info (Frosted Dark) */
    .info-side {
        padding: 50px;
        background: rgba(0,0,0,0.4);
        position: relative;
        overflow: hidden;
        border-right: 1px solid rgba(255,255,255,0.05);
    }
    
    /* Decorative Circle */
    .info-side::before {
        content: '';
        position: absolute;
        top: -50px; left: -50px;
        width: 200px; height: 200px;
        background: radial-gradient(#dc3545, transparent 70%);
        opacity: 0.15;
        filter: blur(40px);
    }

    /* Info Items */
    .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 30px;
        padding: 15px;
        border-radius: 12px;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    .contact-item:hover {
        background: rgba(255,255,255,0.03);
        border-color: rgba(255,255,255,0.05);
        transform: translateX(10px);
    }
    
    .icon-box {
        min-width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #222, #111);
        border: 1px solid #333;
        color: #dc3545;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin-right: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    /* Right Side: Form */
    .form-side {
        padding: 60px;
        flex: 1;
        background: rgba(255,255,255,0.01);
    }

    .form-heading {
        font-size: 2rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 30px;
    }

    /* Modern Inputs */
    .dark-input {
        background: rgba(0,0,0,0.3);
        border: 1px solid #333;
        color: #fff;
        padding: 18px 20px;
        border-radius: 12px;
        width: 100%;
        margin-bottom: 25px;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .dark-input:focus {
        background: rgba(0,0,0,0.5);
        border-color: #dc3545;
        box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1);
        outline: none;
        transform: translateY(-2px);
    }
    
    .dark-label {
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        color: #888;
        margin-bottom: 8px;
        display: block;
        letter-spacing: 1px;
    }

    /* Premium Button */
    .btn-submit-dark {
        background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%);
        color: #fff;
        border: none;
        padding: 18px 40px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        border-radius: 12px;
        width: 100%;
        cursor: pointer;
        transition: all 0.4s ease;
        box-shadow: 0 10px 20px rgba(220, 53, 69, 0.3);
        position: relative;
        overflow: hidden;
    }
    
    .btn-submit-dark:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(220, 53, 69, 0.4);
    }

    /* Map Section */
    .map-wrapper {
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.1);
        height: 250px;
        /* Removed Filters for Natural Color Map as requested */
        transition: transform 0.3s;
    }
    .map-wrapper:hover { transform: scale(1.02); }

    /* ---- MOBILE RESPONSIVE ---- */
    @media (max-width: 991px) {
        .contact-hero-dark { padding: 100px 0 80px; }
        .hero-title-large { font-size: 3rem; }
        
        /* Stack Layout */
        .glass-panel { flex-direction: column; }
        .info-side, .form-side { width: 100%; padding: 40px 25px; }
        .info-side { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.1); }
        
        .contact-container { margin-top: -30px; }
        
        /* Fix Horizontal Scroll */
        html, body { max-width: 100%; overflow-x: hidden !important; }
        .row { margin-left: 0; margin-right: 0; }
        .container { padding-left: 15px; padding-right: 15px; overflow-x: hidden; }
        
        .contact-item { margin-bottom: 20px; }
        .icon-box { min-width: 40px; height: 40px; font-size: 1rem; margin-right: 15px; }
    }
    
    @media (max-width: 480px) {
        .hero-title-large { font-size: 2.2rem; }
        .hero-subtitle { font-size: 0.9rem; }
        .form-heading { font-size: 1.5rem; }
        .btn-submit-dark { padding: 15px 20px; font-size: 0.9rem; }
    }

    .animate-highlight {
        color: #ffffff;
        text-shadow: 0 0 15px rgba(255, 255, 255, 0.6);
        animation: glowPulse 2s infinite alternate;
        display: inline-block;
    }
    
    @keyframes glowPulse {
        from { text-shadow: 0 0 10px rgba(255, 255, 255, 0.4); }
        to { text-shadow: 0 0 25px rgba(255, 255, 255, 0.9), 0 0 10px #ffffff; }
    }
</style>

<!-- Hero Section -->
<div class="contact-hero-dark text-center">
    <div class="container" data-aos="zoom-in">
        <p class="hero-subtitle">GET IN TOUCH</p>
        <h1 class="hero-title-large"><span class="animate-highlight">Contact Us</span></h1>
    </div>
</div>

<!-- Main Contact Section -->
<div class="container contact-container">
    <div class="glass-panel" data-aos="fade-up">
        
        <!-- LEFT SIDE: Contact Info -->
        <div class="info-side">
            <h3 class="form-heading">Reach Out</h3>
            
            <div class="contact-item">
                <div class="icon-box">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="text-white">
                    <h5 class="fw-bold mb-1">Our Headquarters</h5>
                    <p class="text-white-50 mb-0 small">ID-45A, NIT Faridabad<br>Haryana, India - 121001</p>
                </div>
            </div>

            <div class="contact-item">
                <div class="icon-box">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="text-white">
                    <h5 class="fw-bold mb-1">Email Us</h5>
                    <p class="text-white-50 mb-0 small">info@sbsyscon.in</p>
                </div>
            </div>

            <div class="contact-item">
                <div class="icon-box">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div class="text-white">
                    <h5 class="fw-bold mb-1">Call Us</h5>
                    <p class="text-white-50 mb-0 small">+91 129 4150555<br>+91 9899598900</p>
                </div>
            </div>

            <!-- Mini Map -->
            <div class="map-wrapper mt-4">
                 <iframe 
                    width="100%" 
                    height="100%" 
                    id="gmap_canvas" 
                    src="https://maps.google.com/maps?q=S%20B%20SYSCON%20PVT%20LTD%20Faridabad&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                    frameborder="0" 
                    scrolling="no" 
                    marginheight="0" 
                    marginwidth="0">
                </iframe>
            </div>
        </div>

<?php
    // Verify OTP on Backend
    if (isset($_POST['otp_code'])) {
        // session_start() removed (already started in header/auth)
        $user_otp = trim($_POST['otp_code']);
        $sess_otp = $_SESSION['contact_otp'] ?? '';
        
        if ($user_otp != $sess_otp) {
            $msg = "<div class='alert alert-danger'>Invalid OTP. Verification failed.</div>";
        } else {
            // Proceed with Insert
             if(!empty($name) && !empty($email) && !empty($message)) {
                try {
                    // Mobile already extracted at top
                    
                    // 1. Save to Database
                    $stmt = $conn->prepare("INSERT INTO contact_queries (name, email, mobile, subject, message) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([$name, $email, $mobile, $subject, $message]);
                    
                    $msg = "<div class='alert alert-success bg-transparent text-success border border-success'>Thank you, $name! We have received your query. A confirmation email has been sent.</div>";
                    
                    // 2. Send Confirmation Email to User via PHPMailer
                    require_once 'includes/mailer.php';

                    $confirmSubject = "We received your message - S.B. Syscon";
                    $confirmBody = "Dear $name,<br><br>Thank you for contacting S.B. Syscon.<br><br>We have received your message regarding '$subject'. Our team will review your query and get back to you shortly.<br><br><strong>Your Details:</strong><br>Mobile: $mobile<br>Email: $email<br><br>Best Regards,<br>S.B. Syscon Team<br>www.sbsyscon.in";
                    
                    sendMail($email, $confirmSubject, $confirmBody); // Send to User

                    // 3. Send Notification Email to Admin
                    $adminEmail = "pyugesh66@gmail.com";
                    $adminSubject = "New Contact Query from $name";
                    $adminBody = "<strong>New Inquiry Received:</strong><br><br>Name: $name<br>Mobile: $mobile<br>Email: $email<br>Subject: $subject<br>Message: $message<br><br>Time: " . date('Y-m-d H:i:s');
                    
                    sendMail($adminEmail, $adminSubject, $adminBody); // Send to Admin (Check mailer.php for config)
                    
                    // Log for localhost testing
                    $log = date('Y-m-d H:i:s') . " - EXECUTED EMAILS:\n1. User ($email)\n2. Admin ($adminEmail)\nBody:\n$confirmBody\n---\n";
                    file_put_contents('email_log.txt', $log, FILE_APPEND);

                    // Clear OTP
                    unset($_SESSION['contact_otp']);
                } catch(PDOException $e) {
                    $msg = "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
                }
            }
        }
    }
?>

        <!-- RIGHT SIDE: Contact Form -->
        <div class="form-side">
            <h3 class="form-heading">Send Message</h3>
            <?php echo $msg; ?>
            
            <form method="POST" action="contact.php" id="contactForm">
                <div class="row">
                    <div class="col-md-6">
                        <label class="dark-label">Name</label>
                        <input type="text" name="name" class="dark-input" placeholder="John Doe" required>
                    </div>
                    <div class="col-md-6">
                        <label class="dark-label">Mobile Number</label>
                        <input type="tel" name="mobile" class="dark-input" placeholder="+91 9876543210" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="dark-label">Email</label>
                        <div class="input-group mb-3">
                            <input type="email" name="email" id="emailInput" class="dark-input" placeholder="john@example.com" style="border-top-right-radius: 0; border-bottom-right-radius: 0; margin-bottom: 0;" required>
                            <button type="button" class="btn btn-outline-danger" id="sendOtpBtn" style="border-top-right-radius: 12px; border-bottom-right-radius: 12px; border: 1px solid #333; height: 58px;">Verify</button>
                        </div>
                        <small id="otpHelp" class="text-warning" style="display:none; margin-top: -15px; margin-bottom: 10px; display: block;">Click 'Verify' to receive OTP.</small>
                    </div>
                </div>
                
                <!-- Hidden OTP Field -->
                <div id="otpSection" style="display:none;">
                    <label class="dark-label">Enter OTP</label>
                    <input type="text" name="otp_code" class="dark-input" placeholder="Enter 6-digit code" required>
                </div>

                <label class="dark-label">Subject</label>
                <input type="text" name="subject" class="dark-input" placeholder="Project Inquiry" value="<?php echo isset($_GET['product']) ? 'Inquiry about '.htmlspecialchars($_GET['product']) : ''; ?>">
                
                <label class="dark-label">Message</label>
                <textarea name="message" class="dark-input" rows="4" placeholder="How can we assist you?" required></textarea>
                
                <button type="submit" class="btn-submit-dark" id="submitBtn" disabled>
                    <span>Send Message</span> <i class="fas fa-paper-plane ms-2"></i>
                </button>
            </form>
        </div>

    </div>
</div>

<script>
document.getElementById('sendOtpBtn').addEventListener('click', function() {
    const email = document.getElementById('emailInput').value;
    const btn = this;
    const msg = document.getElementById('otpHelp');
    
    if(email && email.includes('@')) {
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        
        fetch('send_otp.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'email=' + encodeURIComponent(email)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                btn.innerHTML = 'Sent';
                btn.classList.remove('btn-outline-danger');
                btn.classList.add('btn-success');
                // Show OTP Field
                document.getElementById('otpSection').style.display = 'block';
                document.getElementById('submitBtn').disabled = false; // Enable verify needed but assume user enters it
                msg.innerText = "OTP Sent to " + email + " (Check otp_log.txt for demo)";
                msg.classList.remove('text-warning');
                msg.classList.add('text-success');
            } else {
                btn.innerHTML = 'Retry';
                msg.innerText = data.message;
            }
        });
    } else {
        alert("Please enter a valid email first.");
    }
});
</script>



<!-- Scripts -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

<?php require_once 'includes/footer.php'; ?>
