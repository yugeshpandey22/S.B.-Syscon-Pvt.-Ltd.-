<?php
require_once '../includes/auth.php';
require_once '../../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Get file path to delete file
    $stmt = $conn->prepare("SELECT file_path FROM price_lists WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        $file_path = "../../" . $row['file_path'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        
        $del = $conn->prepare("DELETE FROM price_lists WHERE id = ?");
        $del->execute([$id]);
    }
}
header("Location: manage.php");
exit();
?>
