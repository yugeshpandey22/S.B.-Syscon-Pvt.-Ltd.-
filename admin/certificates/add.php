<?php
// admin/certificates/add.php
require_once '../includes/auth.php';
require_once '../../config/database.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand_name = $_POST['brand_name'];
    
    // File Upload Handling
    $target_dir_img = "../../assets/images/";
    $target_dir_cert = "../../assets/certificates/";
    
    // Create directories if not exist
    if (!file_exists($target_dir_img)) mkdir($target_dir_img, 0777, true);
    if (!file_exists($target_dir_cert)) mkdir($target_dir_cert, 0777, true);

    // 1. Upload Logo
    $logo_name = basename($_FILES["brand_logo"]["name"]);
    $logo_path = "assets/images/" . $logo_name;
    $logo_target = $target_dir_img . $logo_name;
    
    // 2. Upload Certificate
    $cert_name = basename($_FILES["certificate_file"]["name"]);
    $cert_path = "assets/certificates/" . $cert_name;
    $cert_target = $target_dir_cert . $cert_name;
    
    $uploadOk = 1;

    // Check if files are selected
    if(empty($logo_name) || empty($cert_name) || empty($brand_name)) {
        $error = "All fields are required.";
        $uploadOk = 0;
    }

    if ($uploadOk) {
        if (move_uploaded_file($_FILES["brand_logo"]["tmp_name"], $logo_target) && 
            move_uploaded_file($_FILES["certificate_file"]["tmp_name"], $cert_target)) {
            
            try {
                $stmt = $conn->prepare("INSERT INTO certificates (brand_name, brand_logo, certificate_file) VALUES (?, ?, ?)");
                $stmt->execute([$brand_name, $logo_path, $cert_path]);
                $success = "Certificate added successfully!";
                header("Location: manage.php"); // Redirect back
                exit;
            } catch(PDOException $e) {
                $error = "Database Error: " . $e->getMessage();
            }
        } else {
            $error = "Sorry, there was an error uploading your files.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Certificate</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Add New Certificate</h4>
        </div>
        <div class="card-body">
            <?php if($error): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
            
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Brand Name</label>
                    <input type="text" name="brand_name" class="form-control" required placeholder="e.g. Siemens">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Brand Logo (Image)</label>
                    <input type="file" name="brand_logo" class="form-control" accept="image/*" required>
                    <div class="form-text">Recommended: PNG with transparent background.</div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Certificate File (PDF)</label>
                    <input type="file" name="certificate_file" class="form-control" accept=".pdf" required>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Add Certificate</button>
                    <a href="manage.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
