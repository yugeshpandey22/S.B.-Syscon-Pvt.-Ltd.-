<?php
// admin/certificates/edit.php
require_once '../includes/auth.php';
require_once '../../config/database.php';

$id = $_GET['id'] ?? null;
if (!$id) { header("Location: manage.php"); exit; }

$stmt = $conn->prepare("SELECT * FROM certificates WHERE id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch();
if (!$item) { header("Location: manage.php"); exit; }

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand_name = $_POST['brand_name'];
    
    // Default keep old paths
    $logo_path = $item['brand_logo'];
    $cert_path = $item['certificate_file'];
    
    $target_dir_img = "../../assets/images/";
    $target_dir_cert = "../../assets/certificates/";

    // 1. New Logo Upload
    if(!empty($_FILES["brand_logo"]["name"])) {
        $logo_name = basename($_FILES["brand_logo"]["name"]);
        $logo_target = $target_dir_img . $logo_name;
        if(move_uploaded_file($_FILES["brand_logo"]["tmp_name"], $logo_target)) {
            $logo_path = "assets/images/" . $logo_name;
        }
    }

    // 2. New Certificate Upload
    if(!empty($_FILES["certificate_file"]["name"])) {
        $cert_name = basename($_FILES["certificate_file"]["name"]);
        $cert_target = $target_dir_cert . $cert_name;
        if(move_uploaded_file($_FILES["certificate_file"]["tmp_name"], $cert_target)) {
            $cert_path = "assets/certificates/" . $cert_name;
        }
    }

    try {
        $stmt = $conn->prepare("UPDATE certificates SET brand_name=?, brand_logo=?, certificate_file=? WHERE id=?");
        $stmt->execute([$brand_name, $logo_path, $cert_path, $id]);
        header("Location: manage.php");
        exit;
    } catch(PDOException $e) {
        $error = "Database Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Certificate</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Certificate</h4>
        </div>
        <div class="card-body">
            <?php if($error): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
            
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Brand Name</label>
                    <input type="text" name="brand_name" class="form-control" value="<?php echo htmlspecialchars($item['brand_name']); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Current Logo</label><br>
                    <img src="../../<?php echo $item['brand_logo']; ?>" style="height: 60px;">
                </div>
                <div class="mb-3">
                    <label class="form-label">Change Logo (Optional)</label>
                    <input type="file" name="brand_logo" class="form-control" accept="image/*">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Current Certificate PDF</label><br>
                    <a href="../../<?php echo $item['certificate_file']; ?>" target="_blank">View Current PDF</a>
                </div>
                <div class="mb-3">
                    <label class="form-label">Change Certificate (Optional)</label>
                    <input type="file" name="certificate_file" class="form-control" accept=".pdf">
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update Certificate</button>
                    <a href="manage.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
