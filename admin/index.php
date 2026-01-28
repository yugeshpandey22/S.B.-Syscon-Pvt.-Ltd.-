<?php
session_start();
// If logged in, go to dashboard
if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
} else {
    // If not, go to login
    header("Location: login.php");
}
exit;
?>
