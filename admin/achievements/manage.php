<?php
// admin/achievements/manage.php
require_once '../includes/auth.php';
require_once '../../config/database.php';

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM achievements WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: manage.php?msg=deleted");
}

try {
    $stmt = $conn->query("SELECT * FROM achievements ORDER BY created_at DESC");
    $achievements = $stmt->fetchAll();
} catch (PDOException $e) {
    // If Table Not Found (Error 1146), Create it automatically
    if ($e->getCode() == '42S02' || strpos($e->getMessage(), '1146') !== false) {
        $createSql = "CREATE TABLE IF NOT EXISTS achievements (
            id INT AUTO_INCREMENT PRIMARY KEY,
            image_path VARCHAR(255) NOT NULL,
            title VARCHAR(255),
            description TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB;";
        
        $conn->exec($createSql);
        
        // Retry fetch
        $stmt = $conn->query("SELECT * FROM achievements ORDER BY created_at DESC");
        $achievements = $stmt->fetchAll();
    } else {
        throw $e; // Rethrow other errors
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Achievements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Achievements</h2>
        <div>
            <a href="add.php" class="btn btn-success me-2"><i class="fas fa-plus"></i> Add New</a>
            <a href="import.php" class="btn btn-warning me-2" onclick="return confirm('Import all files from assets/images2?')"><i class="fas fa-file-import"></i> Import from Archive</a>
            <a href="../dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>

    <?php if(isset($_GET['msg']) && $_GET['msg']=='deleted'): ?>
        <div class="alert alert-success">Achievement deleted successfully!</div>
    <?php endif; ?>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($achievements as $item): ?>
            <tr>
                <td>
                    <img src="../../<?php echo $item['image_path']; ?>" width="80" class="img-thumbnail">
                </td>
                <td><?php echo htmlspecialchars($item['title']); ?></td>
                <td><?php echo htmlspecialchars(mb_strimwidth($item['description'], 0, 80, "...")); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $item['id']; ?>" class="btn btn-sm btn-primary me-2"><i class="fas fa-edit"></i> Edit</a>
                    <a href="manage.php?delete=<?php echo $item['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
