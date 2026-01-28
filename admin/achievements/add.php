<?php
// admin/achievements/add.php
require_once '../includes/auth.php';
require_once '../../config/database.php';

$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    // Handle File Upload
    $target_dir = "../../uploads/achievements/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $file_name = time() . '_' . basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $file_name;
    $db_image_path = "uploads/achievements/" . $file_name; // Path to save in DB

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO achievements (title, description, image_path) VALUES (?, ?, ?)");
        if ($stmt->execute([$title, $description, $db_image_path])) {
            $msg = "<div class='alert alert-success'>Achievement added successfully!</div>";
        } else {
            $msg = "<div class='alert alert-danger'>Database error.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Error uploading file.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Achievement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Add New Achievement</h4>
        </div>
        <div class="card-body">
            <?php echo $msg; ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Description (Optional)</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label>Image (Required)</label>
                    <input type="file" name="image" class="form-control" required accept="image/*">
                </div>
                <button type="submit" class="btn btn-danger">Submit</button>
                <a href="manage.php" class="btn btn-secondary">Back to List</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
