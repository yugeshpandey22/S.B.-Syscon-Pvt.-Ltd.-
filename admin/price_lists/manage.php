<?php
require_once '../includes/auth.php';
require_once '../../config/database.php';

// Fetch all principals with their price lists
$sql = "SELECT p.id as principal_id, p.name as principal_name, p.logo, pl.id as list_id, pl.title, pl.file_path 
        FROM principals p 
        LEFT JOIN price_lists pl ON p.id = pl.principal_id 
        ORDER BY p.name, pl.title";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Group by Principal
$principals = [];
foreach ($results as $row) {
    if (!isset($principals[$row['principal_id']])) {
        $principals[$row['principal_id']] = [
            'name' => $row['principal_name'],
            'logo' => $row['logo'],
            'lists' => []
        ];
    }
    if ($row['list_id']) {
        $principals[$row['principal_id']]['lists'][] = [
            'id' => $row['list_id'],
            'title' => $row['title'],
            'file_path' => $row['file_path']
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Price Lists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="../dashboard.php">S.B. Admin</a>
        <a href="../logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </nav>
    <div class="d-flex">
         <div class="bg-light border-end vh-100 p-3" style="width: 250px;">
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="../dashboard.php" class="nav-link text-dark">Dashboard</a></li>
                <li class="nav-item mb-2"><a href="../achievements/manage.php" class="nav-link text-dark">Achievements</a></li>
                <li class="nav-item mb-2"><a href="manage.php" class="nav-link active">Price Lists</a></li>
            </ul>
        </div>
        <div class="p-4 w-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Price Lists</h2>
                <div>
                   <a href="add_principal.php" class="btn btn-secondary">Add New Brand</a>
                   <a href="add.php" class="btn btn-primary">Add Price List</a>
                </div>
            </div>

            <?php foreach ($principals as $principal): ?>
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <?php if($principal['logo']): ?>
                            <img src="../../<?php echo htmlspecialchars($principal['logo']); ?>" alt="<?php echo htmlspecialchars($principal['name']); ?>" style="height: 50px; margin-right: 15px;">
                        <?php endif; ?>
                        <h4 class="mb-0"><?php echo htmlspecialchars($principal['name']); ?></h4>
                        <a href="delete_principal.php?id=<?php echo $principal['principal_id']; ?>" class="btn btn-sm btn-outline-danger ms-3" onclick="return confirm('Are you sure you want to delete this brand and all its price lists?')">Delete Brand</a>
                    </div>
                    
                    <div class="row">
                        <?php if (empty($principal['lists'])): ?>
                            <div class="col-12"><p class="text-muted">No price lists added yet.</p></div>
                        <?php else: ?>
                            <?php foreach ($principal['lists'] as $list): ?>
                            <div class="col-md-3 mb-2">
                                <div class="border rounded p-2 d-flex justify-content-between align-items-center">
                                    <a href="../../<?php echo htmlspecialchars($list['file_path']); ?>" target="_blank" class="text-decoration-none text-dark">
                                        <i class="fas fa-file-pdf text-danger me-2"></i>
                                        <?php echo htmlspecialchars($list['title']); ?>
                                    </a>
                                    <div>
                                        <a href="edit.php?id=<?php echo $list['id']; ?>" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                                        <a href="delete.php?id=<?php echo $list['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</body>
</html>
