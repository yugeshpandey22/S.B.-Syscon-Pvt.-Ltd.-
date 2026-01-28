<?php
// admin/certificates/import.php
require_once '../includes/auth.php';
require_once '../../config/database.php';

$msg = "";

if (isset($_POST['import'])) {
    $dir = "../../assets/certificates/";
    if (is_dir($dir)) {
        $files = scandir($dir);
        $imported_count = 0;

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') continue;
            
            // Check if file is PDF
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if ($ext !== 'pdf') continue;

            $relativePath = 'assets/certificates/' . $file;
            
            // Check if already exists in DB
            $stmt = $conn->prepare("SELECT COUNT(*) FROM certificates WHERE certificate_file = ?");
            $stmt->execute([$relativePath]);
            if ($stmt->fetchColumn() > 0) continue;

            // Guess Brand Name from Filename
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $brandName = "Unknown Brand";
            $brandLogo = "assets/images/default_logo.png"; // Placeholder

            if (stripos($filename, 'Siemens') !== false) { 
                $brandName = 'Siemens'; 
                $brandLogo = 'assets/images/siemens.png';
            } elseif (stripos($filename, 'Flender') !== false) {
                $brandName = 'Flender';
                $brandLogo = 'assets/images/flender.png';
            } elseif (stripos($filename, 'BCH') !== false) {
                $brandName = 'BCH Electric';
                $brandLogo = 'assets/images/bch white.png';
            } elseif (stripos($filename, 'LAPP') !== false) {
                $brandName = 'Lapp Cables';
                $brandLogo = 'assets/images/Lapp.png';
            } elseif (stripos($filename, 'Secure') !== false) {
                $brandName = 'Secure Meters';
                $brandLogo = 'assets/images/secure.png';
            } elseif (stripos($filename, 'Schneider') !== false || stripos($filename, 'ASCO') !== false) {
                $brandName = 'ASCO (Schneider)';
                $brandLogo = 'assets/images/asco12.png';
            } elseif (stripos($filename, 'innomotics') !== false) {
                $brandName = 'Innomotics';
                $brandLogo = 'assets/images/innomotics-logo.png';
            }

            // Insert into DB
            try {
                $insert = $conn->prepare("INSERT INTO certificates (brand_name, brand_logo, certificate_file) VALUES (?, ?, ?)");
                $insert->execute([$brandName, $brandLogo, $relativePath]);
                $imported_count++;
            } catch (Exception $e) {
                // Ignore error and continue
            }
        }
        $msg = "Successfully imported $imported_count new certificates.";
    } else {
        $msg = "Directory not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Import Certificates</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4>Import Certificates from Folder</h4>
        </div>
        <div class="card-body">
            <p>This will scan the <code>assets/certificates/</code> folder and add any missing PDF files to the database automatically.</p>
            
            <?php if($msg): ?>
                <div class="alert alert-info"><?php echo $msg; ?></div>
                <a href="manage.php" class="btn btn-primary">Go Back to Manage</a>
            <?php else: ?>
                <form method="post">
                    <button type="submit" name="import" class="btn btn-warning">Start Import</button>
                    <a href="manage.php" class="btn btn-secondary">Cancel</a>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
