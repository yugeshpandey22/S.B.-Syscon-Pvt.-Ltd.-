<?php
require_once '../includes/auth.php';
require_once '../../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // First get the logo path to delete the file if needed
    $stmt = $conn->prepare("SELECT logo FROM principals WHERE id = ?");
    $stmt->execute([$id]);
    $principal = $stmt->fetch(PDO::FETCH_ASSOC);

    // Delete from DB (Cascade will handle price lists if set up, but let's be safe)
    // The table definition had ON DELETE CASCADE for price_lists foreign key.
    
    $sql = "DELETE FROM principals WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute([$id])) {
        // Optional: Delete logo file if it exists
        if ($principal['logo'] && file_exists("../../" . $principal['logo'])) {
            unlink("../../" . $principal['logo']);
        }
        header("Location: manage.php?msg=Principal deleted");
    } else {
        header("Location: manage.php?error=Could not delete principal");
    }
} else {
    header("Location: manage.php");
}
exit();
?>
