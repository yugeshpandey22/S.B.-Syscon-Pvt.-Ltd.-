<?php
// admin/queries.php
require_once 'includes/auth.php';
require_once '../config/database.php';

// Fetch all queries
$stmt = $conn->query("SELECT * FROM contact_queries ORDER BY created_at DESC");
$queries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Queries - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <!-- Sidebar ( Simplified for this view ) -->
    <div class="bg-dark text-white p-3 vh-100" style="width: 250px;">
        <h4>S.B. Admin</h4>
        <ul class="nav flex-column mt-4">
            <li class="nav-item mb-2"><a href="dashboard.php" class="nav-link text-white">Dashboard</a></li>
            <li class="nav-item mb-2"><a href="achievements/manage.php" class="nav-link text-white">Achievements</a></li>
            <li class="nav-item mb-2"><a href="price_lists/manage.php" class="nav-link text-white">Price Lists</a></li>
            <li class="nav-item mb-2"><a href="queries.php" class="nav-link active bg-primary text-white">Contact Queries</a></li>
            <li class="nav-item mt-5"><a href="../logout.php" class="nav-link text-danger">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="p-4 w-100 bg-light" style="max-height: 100vh; overflow-y: auto;">
        <h2 class="mb-4">Contact Form Submissions</h2>
        
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($queries) > 0): ?>
                            <?php foreach($queries as $row): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo date('d M Y, h:i A', strtotime($row['created_at'])); ?></td>
                                <td class="fw-bold"><?php echo htmlspecialchars($row['name']); ?></td>
                                <td class="text-primary fw-bold"><?php echo htmlspecialchars($row['mobile']); ?></td>
                                <td><a href="mailto:<?php echo htmlspecialchars($row['email']); ?>"><?php echo htmlspecialchars($row['email']); ?></a></td>
                                <td><?php echo htmlspecialchars($row['subject']); ?></td>
                                <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No queries received yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
