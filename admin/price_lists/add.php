<?php
require_once '../includes/auth.php';
require_once '../../config/database.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $principal_id = $_POST['principal_id'];
    $title = $_POST['title'];
    
    // File upload
    $target_dir = "../../uploads/price_lists/";
    $file_name = time() . '_' . basename($_FILES["pdf_file"]["name"]);
    $target_file = $target_dir . $file_name;
    $db_file_path = "uploads/price_lists/" . $file_name;
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a PDF
    if($fileType != "pdf" ) {
        $message = "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO price_lists (principal_id, title, file_path) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if($stmt->execute([$principal_id, $title, $db_file_path])) {
                header("Location: manage.php");
                exit();
            } else {
                $message = "Error saving to database.";
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}

// Fetch Principals for dropdown
$principals = $conn->query("SELECT * FROM principals ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Price List</title>
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
                    <div class="card-header">Add New Price List</div>
                    <div class="card-body">
                        <?php if($message): ?>
                            <div class="alert alert-danger"><?php echo $message; ?></div>
                        <?php endif; ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Brand / Principal</label>
                                <select name="principal_id" class="form-select" required>
                                    <?php foreach($principals as $p): ?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo htmlspecialchars($p['name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Title (e.g. Schneider ATS)</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">PDF File</label>
                                <input type="file" name="pdf_file" class="form-control" accept=".pdf" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Price List</button>
                            <a href="manage.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
