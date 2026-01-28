<?php
// admin/includes/auth.php
session_start();

// Security: Check for Session Timeout (30 Minutes)
$timeout_duration = 1800; // 30 minutes in seconds

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    // Last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header("Location: ../login.php?timeout=1");
    exit;
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit;
}
?>
