<?php
// admin/achievements/edit.php
require_once '../includes/auth.php';
require_once '../../config/database.php';

$msg = "";
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: manage.php");
    exit;
}

// Fetch existing data
$stmt = $conn->prepare("SELECT * FROM achievements WHERE id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch();

if (!$item) {
    header("Location: manage.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    // Default to existing path
    $db_image_path = $item['image_path']; 

    // Handle File Upload if new file is selected
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "../../uploads/achievements/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file_name = time() . '_' . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $file_name;
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $db_image_path = "uploads/achievements/" . $file_name;
        } else {
            $msg = "<div class='alert alert-danger'>Error uploading file.</div>";
        }
    }
    
    // Update DB
    $updateStmt = $conn->prepare("UPDATE achievements SET title = ?, description = ?, image_path = ? WHERE id = ?");
    if ($updateStmt->execute([$title, $description, $db_image_path, $id])) {
        $msg = "<div class='alert alert-success'>Achievement updated successfully!</div>";
        // Refresh item data
        $stmt->execute([$id]);
        $item = $stmt->fetch();
    } else {
        $msg = "<div class='alert alert-danger'>Database error.</div>";
    }
}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Achievement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Achievement</h4>
        </div>
        <div class="card-body">
            <?php echo $msg; ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($item['title']); ?>" required>
                </div>
                <div class="mb-3">
                    <label>Description (Optional)</label>
                    <textarea name="description" class="form-control" rows="3"><?php echo htmlspecialchars($item['description']); ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label>Current Image</label><br>
                    <?php if(!empty($item['image_path'])): ?>
                        <img src="../../<?php echo $item['image_path']; ?>" width="150" class="img-thumbnail mb-2">
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label>Change Image (Leave blank to keep current)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                
                <button type="submit" class="btn btn-primary">Update Achievement</button>
                <a href="manage.php" class="btn btn-secondary">Back to List</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
