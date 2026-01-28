<?php
require_once '../includes/auth.php';
require_once '../../config/database.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    
    // File upload
    $target_dir = "../../uploads/principals/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $file_path = ''; // Optional logo
    
    if(isset($_FILES["logo"]) && $_FILES["logo"]["error"] == 0) {
        $file_name = time() . '_' . basename($_FILES["logo"]["name"]);
        $target_file = $target_dir . $file_name;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        $allowed = array('jpg', 'jpeg', 'png', 'gif', 'webp');
        if(in_array($fileType, $allowed)) {
            if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                $file_path = "uploads/principals/" . $file_name;
            } else {
                $message = "Error uploading file.";
            }
        } else {
            $message = "Invalid file type. Only JPG, PNG, GIF, WEBP allow.";
        }
    }

    if (empty($message)) {
        $sql = "INSERT INTO principals (name, logo) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        if($stmt->execute([$name, $file_path])) {
            header("Location: manage.php");
            exit();
        } else {
            $message = "Error saving to database.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Brand / Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="../dashboard.php">S.B. Admin</a>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Add New Brand / Principal</div>
                    <div class="card-body">
                        <?php if($message): ?>
                            <div class="alert alert-danger"><?php echo $message; ?></div>
                        <?php endif; ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Brand Name</label>
                                <input type="text" name="name" class="form-control" required placeholder="e.g. Siemens">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brand Logo</label>
                                <input type="file" name="logo" class="form-control" accept="image/*">
                                <div class="form-text">If you have the image in your folder, upload it here to register it.</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Brand</button>
                            <a href="manage.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
