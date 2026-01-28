<?php
require_once 'config/constants.php';
require_once 'includes/head.php';
require_once 'includes/navbar.php';
?> 

<!-- AOS For Animations -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- Hero Section with Custom Background -->
<section class="pricelist-hero d-flex align-items-center justify-content-center text-center text-white animate-bg-pulse" style="background: url('assets/images/pricelist_new_banner.jpg') no-repeat center center; background-size: cover; min-height: 400px; position: relative;">
    <!-- Overlay -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7));"></div>
    
    <div class="container position-relative" style="z-index: 2;" data-aos="zoom-in">
        <h1 class="display-3 fw-bold text-uppercase mb-4" style="font-family: 'Impact', sans-serif; letter-spacing: 2px; text-shadow: 0 5px 15px rgba(0,0,0,0.8);">DOWNLOAD ALL PRICE LISTS !</h1>
        
        <!-- PDF Icon Styled to match reference -->
        <div class="d-inline-block mt-2">
             <i class="fas fa-file-pdf text-danger bg-white rounded shadow-lg" style="font-size: 6rem; padding: 10px 20px;"></i>
             <div class="mt-2 text-white fw-bold">PDF</div>
        </div>
    </div>
</section>

<style>
    @keyframes bgPulse {
        0% { background-size: 100%; }
        100% { background-size: 110%; }
    }
    .animate-bg-pulse {
        animation: bgPulse 20s infinite alternate;
    }
</style>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<style>
    /* Premium Price List Design */
    .principal-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-left: 5px solid #dc3545; /* Red accent bar on left */
        border-radius: 8px;
        margin-bottom: 24px;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    
    .principal-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        border-color: #dc3545; /* Full red border on hover */
    }

    /* Left Side: Brand/Logo */
    .brand-section {
        background-color: #f8f9fa;
        min-width: 260px; /* Increased width */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        border-right: 1px solid #eee;
    }

    /* Right Side: PDF List */
    .pdf-section {
        flex-grow: 1;
        padding: 20px 30px;
        display: flex;
        align-items: center;
    }

    /* PDF Button Styling */
    .pdf-btn {
        background-color: #fff;
        border: 1px solid #dee2e6;
        color: #495057;
        padding: 10px 20px;
        border-radius: 50px; /* Pill shape */
        font-size: 0.9rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        min-width: 180px; /* Uniform width */
        justify-content: center;
    }

    .pdf-btn:hover {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
        transform: scale(1.02);
    }
    
    .pdf-btn:hover i {
        color: #fff !important;
    }

    .pdf-icon {
        color: #dc3545;
        font-size: 1.2rem;
        transition: color 0.2s ease;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .principal-card {
            flex-direction: column;
            text-align: center;
        }
        .brand-section {
            width: 100%;
            border-right: none;
            border-bottom: 1px solid #eee;
            padding: 15px;
        }
        .pdf-section {
            width: 100%;
            justify-content: center;
            padding: 20px;
        }
    }
</style>

<section class="py-5 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <span class="text-danger fw-bold text-uppercase ls-2">Documentation</span>
                <h2 class="display-6 fw-bold mt-2">Product Price Lists</h2>
                <div class="bg-danger mx-auto mt-3" style="width: 60px; height: 3px;"></div>
                <p class="text-muted mt-3">Access and download the latest official price lists from our principals.</p>
            </div>
        </div>

        <?php
        require_once 'config/database.php';

        // Fetch data
        $sql = "SELECT p.id, p.name, p.logo, pl.title, pl.file_path 
                FROM principals p 
                LEFT JOIN price_lists pl ON p.id = pl.principal_id 
                ORDER BY p.id ASC";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $principals = [];
        foreach ($results as $row) {
            // Fix for SINOVA and INNOMOTICS logos
            if (stripos($row['name'], 'SINOVA') !== false) {
                $row['logo'] = 'assets/css/sinoplus.jpg';
            }
            if (stripos($row['name'], 'INNOMOTICS') !== false) {
                $row['logo'] = 'assets/css/innomotics.png';
            }

            if (!isset($principals[$row['id']])) {
                $principals[$row['id']] = [
                    'name' => $row['name'],
                    'logo' => $row['logo'],
                    'lists' => []
                ];
            }
            if ($row['title']) {
                $principals[$row['id']]['lists'][] = [
                    'title' => $row['title'],
                    'file_path' => $row['file_path']
                ];
            }
        }
        ?>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php if(empty($principals)): ?>
                    <div class="text-center py-5">
                        <div class="display-1 text-muted mb-3 opacity-25"><i class="fas fa-folder-open"></i></div>
                        <h4 class="text-muted">No price lists available.</h4>
                    </div>
                <?php else: ?>
                    
                    <?php foreach($principals as $p): ?>
                    <div class="principal-card d-flex" data-aos="fade-up" data-aos-duration="800">
                        <!-- Left: Brand Identity -->
                        <div class="brand-section">
                            <?php if(!empty($p['logo'])): ?>
                                <img src="<?php echo htmlspecialchars($p['logo']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>" class="img-fluid" style="max-height: 90px; max-width: 220px;">
                            <?php else: ?>
                                <h4 class="mb-0 fw-bold text-dark"><?php echo htmlspecialchars($p['name']); ?></h4>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Right: Actionable Items -->
                        <div class="pdf-section">
                            <div class="d-flex flex-wrap gap-3 w-100 justify-content-start">
                                <?php if(empty($p['lists'])): ?>
                                    <span class="text-muted small fst-italic"><i class="fas fa-info-circle me-1"></i> Coming Soon</span>
                                <?php else: ?>
                                    <?php foreach($p['lists'] as $list): ?>
                                        <a href="<?php echo htmlspecialchars($list['file_path']); ?>" target="_blank" class="pdf-btn shadow-sm">
                                            <i class="fas fa-file-pdf pdf-icon"></i>
                                            <span><?php echo htmlspecialchars($list['title']); ?></span>
                                            <i class="fas fa-download ms-auto small opacity-50"></i>
                                        </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?php require_once 'includes/footer.php'; ?>



