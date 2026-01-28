<?php
require_once 'config/constants.php';
require_once 'includes/head.php';
require_once 'includes/navbar.php';
?>

<section class="page-header py-5 bg-dark text-white text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Industries We Serve</h1>
        <p class="lead">Powering diverse sectors with precision and reliability.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Industry 1 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Construction">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Construction & Infrastructure</h4>
                        <p class="card-text text-muted">Reliable switchgear and cabling solutions for large-scale infrastructure projects.</p>
                    </div>
                </div>
            </div>
            <!-- Industry 2 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1565514020176-892ebda97a8a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Oil & Gas">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Oil & Gas</h4>
                        <p class="card-text text-muted">Explosion-proof motors and heavy-duty controls for hazardous environments.</p>
                    </div>
                </div>
            </div>
            <!-- Industry 3 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Manufacturing">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Manufacturing</h4>
                        <p class="card-text text-muted">Automation systems (PLCs, HMIs) to drive efficiency in production lines.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
