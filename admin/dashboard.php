<?php
require_once 'includes/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>S.B. Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', sans-serif; }
        .sidebar { background: #0d0d0d; min-height: 100vh; color: #aaa; }
        .sidebar .nav-link { color: #aaa; padding: 15px 20px; border-left: 3px solid transparent; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: #1a1a1a; color: #fff; border-left-color: #dc3545; }
        .sidebar .nav-link i { width: 25px; text-align: center; margin-right: 10px; }
        .topbar { background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 15px 30px; }
        .card-custom { border: none; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: transform 0.3s; }
        .card-custom:hover { transform: translateY(-5px); }
        .btn-red { background-color: #dc3545; color: white; border: none; }
        .btn-red:hover { background-color: #c82333; color: white; }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3" style="width: 260px;">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none px-3">
                <i class="fas fa-shield-alt fa-2x text-danger me-2"></i>
                <span class="fs-4 fw-bold">Syscon Admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="price_lists/manage.php" class="nav-link">
                        <i class="fas fa-file-pdf"></i> Price Lists
                    </a>
                </li>


                <li>
                    <a href="achievements/manage.php" class="nav-link">
                        <i class="fas fa-trophy"></i> Achievements
                    </a>
                </li>
                <li>
                    <a href="certificates/manage.php" class="nav-link">
                        <i class="fas fa-certificate"></i> Certificates
                    </a>
                </li>
            </ul>
            <hr>
            <a href="logout.php" class="nav-link text-danger fw-bold">
                <i class="fas fa-sign-out-alt"></i> Sign Out
            </a>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 bg-light">
            <!-- Topbar -->
            <div class="topbar d-flex justify-content-between align-items-center">
                <h4 class="m-0 text-secondary">Dashboard</h4>
                <div class="d-flex align-items-center">
                    <span class="me-3 text-muted">Welcome, <strong><?php echo htmlspecialchars($_SESSION['admin_username']); ?></strong></span>
                    <a href="../index.php" target="_blank" class="btn btn-outline-secondary btn-sm"><i class="fas fa-external-link-alt"></i> View Site</a>
                </div>
            </div>

            <!-- Content -->
            <div class="p-4">
                <div class="row g-4">
                    <!-- Price Lists Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-custom h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title fw-bold text-dark">Price Lists</h5>
                                    <div class="icon-box bg-danger bg-opacity-10 text-danger p-2 rounded">
                                        <i class="fas fa-file-pdf fa-lg"></i>
                                    </div>
                                </div>
                                <p class="card-text text-muted">Manage Principal's price lists and brochures.</p>
                                <a href="price_lists/manage.php" class="btn btn-red w-100">Manage Lists</a>
                            </div>
                        </div>
                    </div>



                    <!-- Achievements Card -->
                     <div class="col-md-6 col-lg-4">
                        <div class="card card-custom h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title fw-bold text-dark">Achievements</h5>
                                    <div class="icon-box bg-success bg-opacity-10 text-success p-2 rounded">
                                        <i class="fas fa-trophy fa-lg"></i>
                                    </div>
                                </div>
                                <p class="card-text text-muted">Manage awards and recognition.</p>
                                <a href="achievements/manage.php" class="btn btn-success w-100">Manage Awards</a>
                            </div>
                        </div>
                    </div>

                   <!-- Certificates Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-custom h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title fw-bold text-dark">Certificates</h5>
                                    <div class="icon-box bg-info bg-opacity-10 text-info p-2 rounded">
                                        <i class="fas fa-certificate fa-lg"></i>
                                    </div>
                                </div>
                                <p class="card-text text-muted">Manage brand authorization certificates.</p>
                                <a href="certificates/manage.php" class="btn btn-info text-white w-100">Manage Certificates</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
