<?php
// admin/certificates/manage.php
require_once '../includes/auth.php';
require_once '../../config/database.php';

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    try {
        // Get file paths to delete files from server
        $stmt = $conn->prepare("SELECT brand_logo, certificate_file FROM certificates WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        
        if($row) {
            if(file_exists('../../' . $row['brand_logo'])) { unlink('../../' . $row['brand_logo']); }
            if(file_exists('../../' . $row['certificate_file'])) { unlink('../../' . $row['certificate_file']); }
        }

        $stmt = $conn->prepare("DELETE FROM certificates WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: manage.php?msg=deleted");
    } catch (PDOException $e) {
        // If table doesn't exist, we can't delete anyway
        die("Error: " . $e->getMessage());
    }
}

// Ensure table exists (Self-Healing)
try {
    $conn->query("SELECT 1 FROM certificates LIMIT 1");
} catch (PDOException $e) {
    if ($e->getCode() == '42S02' || strpos($e->getMessage(), '1146') !== false) {
        $sql = "CREATE TABLE IF NOT EXISTS certificates (
            id INT AUTO_INCREMENT PRIMARY KEY,
            brand_name VARCHAR(255) NOT NULL,
            brand_logo VARCHAR(255) NOT NULL,
            certificate_file VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
        $conn->exec($sql);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Certificates</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Certificates</h2>
        <div>
            <a href="add.php" class="btn btn-success me-2"><i class="fas fa-plus"></i> Add New</a>
            <a href="import.php" class="btn btn-warning me-2"><i class="fas fa-file-import"></i> Sync Files</a>
            <a href="../dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>

    <?php if(isset($_GET['msg']) && $_GET['msg']=='deleted'): ?>
        <div class="alert alert-success">Certificate deleted successfully!</div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Brand Logo</th>
                        <th>Brand Name</th>
                        <th>Certificate File</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = $conn->query("SELECT * FROM certificates ORDER BY created_at DESC");
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td><img src='../../" . htmlspecialchars($row['brand_logo']) . "' style='height: 50px; max-width: 100px; object-fit: contain;'></td>";
                            echo "<td>" . htmlspecialchars($row['brand_name']) . "</td>";
                            echo "<td><a href='../../" . htmlspecialchars($row['certificate_file']) . "' target='_blank' class='btn btn-sm btn-outline-info'><i class='fas fa-file-pdf'></i> View PDF</a></td>";
                            echo "<td>
                                    <a href='edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary me-2'><i class='fas fa-edit'></i> Edit</a>
                                    <a href='manage.php?delete=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\")'><i class='fas fa-trash'></i> Delete</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } catch(PDOException $e) {
                        echo "<tr><td colspan='4' class='text-danger'>Error: " . $e->getMessage() . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
