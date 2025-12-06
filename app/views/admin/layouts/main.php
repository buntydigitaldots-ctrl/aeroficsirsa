<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Admin' ?> - Arofic Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root { --sidebar-width: 250px; }
        body { background-color: #f8f9fa; }
        .sidebar { width: var(--sidebar-width); min-height: 100vh; background: #1a365d; position: fixed; left: 0; top: 0; }
        .sidebar .nav-link { color: rgba(255,255,255,0.7); padding: 12px 20px; border-radius: 8px; margin: 2px 10px; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: rgba(255,255,255,0.1); color: white; }
        .sidebar .nav-link i { width: 25px; }
        .main-content { margin-left: var(--sidebar-width); padding: 20px; }
        .top-bar { background: white; padding: 15px 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 20px; }
        .card { border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.05); border-radius: 10px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="p-4 text-center">
            <h5 class="text-white fw-bold mb-0">AROFIC</h5>
            <small class="text-white-50">Admin Panel</small>
        </div>
        <nav class="nav flex-column">
            <a href="/admin/dashboard" class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/admin/dashboard') !== false ? 'active' : '' ?>">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="/admin/products" class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/admin/products') !== false ? 'active' : '' ?>">
                <i class="fas fa-box"></i> Products
            </a>
            <a href="/admin/categories" class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/admin/categories') !== false ? 'active' : '' ?>">
                <i class="fas fa-folder"></i> Categories
            </a>
            <a href="/admin/orders" class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/admin/orders') !== false ? 'active' : '' ?>">
                <i class="fas fa-shopping-cart"></i> Orders
            </a>
            <a href="/admin/enquiries" class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/admin/enquiries') !== false ? 'active' : '' ?>">
                <i class="fas fa-envelope"></i> Enquiries
            </a>
            <a href="/admin/sliders" class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/admin/sliders') !== false ? 'active' : '' ?>">
                <i class="fas fa-images"></i> Sliders
            </a>
            <a href="/admin/testimonials" class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/admin/testimonials') !== false ? 'active' : '' ?>">
                <i class="fas fa-quote-left"></i> Testimonials
            </a>
            <a href="/admin/faqs" class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/admin/faqs') !== false ? 'active' : '' ?>">
                <i class="fas fa-question-circle"></i> FAQs
            </a>
            <a href="/admin/gallery" class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/admin/gallery') !== false ? 'active' : '' ?>">
                <i class="fas fa-image"></i> Gallery
            </a>
            <a href="/admin/videos" class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/admin/videos') !== false ? 'active' : '' ?>">
                <i class="fas fa-video"></i> Videos
            </a>
            <a href="/admin/settings" class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/admin/settings') !== false ? 'active' : '' ?>">
                <i class="fas fa-cog"></i> Settings
            </a>
            <hr class="my-3 border-light">
            <a href="/" class="nav-link" target="_blank">
                <i class="fas fa-external-link-alt"></i> View Site
            </a>
            <a href="/admin/logout" class="nav-link text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </div>
    
    <div class="main-content">
        <div class="top-bar d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold"><?= $pageTitle ?? 'Dashboard' ?></h5>
            <div>
                <span class="text-muted me-3">Welcome, <?= htmlspecialchars(Auth::user()['name'] ?? 'Admin') ?></span>
            </div>
        </div>
        
        <?php if (Session::hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= Session::getFlash('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>
        <?php if (Session::hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?= Session::getFlash('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>
        
        <?= $content ?? '' ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
