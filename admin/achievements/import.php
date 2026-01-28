<?php
// admin/achievements/import.php
require_once '../includes/auth.php';
require_once '../../config/database.php';

$imagesDir = '../../assets/images2';
$importedCount = 0;

if (is_dir($imagesDir)) {
    $files = scandir($imagesDir);
    
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        
        // Allowed extensions
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) continue;

        $relativePath = 'assets/images2/' . $file;
        
        // Check if already exists
        $stmt = $conn->prepare("SELECT COUNT(*) FROM achievements WHERE image_path = ?");
        $stmt->execute([$relativePath]);
        if ($stmt->fetchColumn() == 0) {
            // Insert
            // Generate a simple title based on filename
            $title = pathinfo($file, PATHINFO_FILENAME);
            $title = str_replace(['_', '-'], ' ', $title);
            $title = ucwords($title);

            $insert = $conn->prepare("INSERT INTO achievements (image_path, title, description) VALUES (?, ?, ?)");
            $insert->execute([$relativePath, "Achievement: " . $title, "Imported from local archive."]);
            $importedCount++;
        }
    }
}

header("Location: manage.php?msg=imported&count=" . $importedCount);
exit;
