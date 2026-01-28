<?php
// send_otp.php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Simple OTP Generation
        $otp = rand(100000, 999999);
        $_SESSION['contact_otp'] = $otp;
        $_SESSION['contact_email'] = $email;
        
        // 1. Try to send Real Email (Works on Hosting/Live Server)
        $subject = "Your Verification Code - S.B. Syscon";
        $message = "Your verification OTP is: $otp";
        
        // Use PHPMailer
        require_once 'includes/mailer.php';
        sendMail($email, $subject, $message); 

        // 2. ALWAYS Log to file (For Localhost Testing)
        // Since XAMPP usually can't send emails, check this file:
        $logEntry = date('Y-m-d H:i:s') . " - OTP for $email: $otp\n";
        file_put_contents('otp_log.txt', $logEntry, FILE_APPEND);

        // Return success
        echo json_encode([
            'success' => true, 
            'message' => 'OTP Sent! (Check email or otp_log.txt on localhost)'
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
