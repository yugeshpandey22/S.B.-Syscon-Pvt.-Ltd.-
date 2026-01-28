<?php
// admin/price_lists/edit.php
require_once '../includes/auth.php';
require_once '../../config/database.php';

$message = '';
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: manage.php");
    exit;
}

// Fetch Existing Data
$stmt = $conn->prepare("SELECT * FROM price_lists WHERE id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$item) {
    header("Location: manage.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $principal_id = $_POST['principal_id'];
    $title = $_POST['title'];
    $db_file_path = $item['file_path'];

    // Handle Optional File Update
    if (!empty($_FILES["pdf_file"]["name"])) {
        $target_dir = "../../uploads/price_lists/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $file_name = time() . '_' . basename($_FILES["pdf_file"]["name"]);
        $target_file = $target_dir . $file_name;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($fileType != "pdf") {
            $message = "Sorry, only PDF files are allowed.";
        } else {
            if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $target_file)) {
                $db_file_path = "uploads/price_lists/" . $file_name;
                
                // Optionally delete old file? (Leaving it for safety for now)
            } else {
                $message = "Error uploading new file.";
            }
        }
    }

    if (empty($message)) {
        $sql = "UPDATE price_lists SET principal_id = ?, title = ?, file_path = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$principal_id, $title, $db_file_path, $id])) {
            header("Location: manage.php?msg=updated");
            exit();
        } else {
            $message = "Database Error.";
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
    <title>Edit Price List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">Edit Price List</div>
                    <div class="card-body">
                        <?php if($message): ?>
                            <div class="alert alert-danger"><?php echo $message; ?></div>
                        <?php endif; ?>
                        
                        <form action="" method="post" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label class="form-label">Brand / Principal</label>
                                <select name="principal_id" class="form-select" required>
                                    <?php foreach($principals as $p): ?>
                                        <option value="<?php echo $p['id']; ?>" <?php if($p['id'] == $item['principal_id']) echo 'selected'; ?>>
                                            <?php echo htmlspecialchars($p['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($item['title']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Current File</label><br>
                                <a href="../../<?php echo htmlspecialchars($item['file_path']); ?>" target="_blank" class="btn btn-sm btn-outline-info">
                                    View Current PDF
                                </a>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Replace PDF (Optional)</label>
                                <input type="file" name="pdf_file" class="form-control" accept=".pdf">
                            </div>

                            <button type="submit" class="btn btn-primary">Update Price List</button>
                            <a href="manage.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
