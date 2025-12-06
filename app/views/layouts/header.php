<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Aerofic Bathware - Premium Plumbing Solutions' ?></title>
    <meta name="description" content="<?= $metaDescription ?? 'Aerofic Bathware - Premium quality bath fittings, sanitaryware, pipes, fittings, and water storage tanks.' ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="top-bar d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center gap-4">
                        <a href="mailto:info@aerofic.com" class="d-flex align-items-center gap-2">
                            <i class="fas fa-envelope"></i>
                            <span>info@aerofic.com</span>
                        </a>
                        <a href="tel:+919996100970" class="d-flex align-items-center gap-2">
                            <i class="fas fa-phone"></i>
                            <span>+91 99961 00970</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-end">
                    <div class="d-flex align-items-center justify-content-end gap-3">
                        <span class="text-white-50 small">Follow us:</span>
                        <div class="social-links">
                            <a href="https://facebook.com/aerofic" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://instagram.com/aerofic" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="https://youtube.com/@aerofic" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                            <a href="https://twitter.com/aerofic" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="main-header" id="mainHeader">
        <div class="container">
            <div class="row align-items-center py-2">
                <div class="col-lg-3 col-6">
                    <div class="logo-section">
                        <a href="/">
                            <img src="/assets/images/logo.png" alt="Aerofic Bathware" class="logo-img">
                            <div class="tagline d-none d-md-block">Premium Plumbing Solutions</div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <form action="/search" method="GET" class="search-box">
                        <input type="text" name="q" placeholder="Search for products, categories..." autocomplete="off">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="d-flex align-items-center justify-content-end gap-3">
                        <div class="header-icons d-flex align-items-center gap-2">
                            <a href="/search" class="icon-link d-lg-none" title="Search">
                                <i class="fas fa-search"></i>
                            </a>
                            <?php if (Auth::check()): ?>
                            <a href="/account" class="icon-link" title="My Account">
                                <i class="fas fa-user"></i>
                            </a>
                            <?php else: ?>
                            <a href="/login" class="icon-link" title="Login">
                                <i class="fas fa-user"></i>
                            </a>
                            <?php endif; ?>
                            <a href="/cart" class="icon-link" title="Shopping Cart">
                                <i class="fas fa-shopping-bag"></i>
                                <span class="cart-count" id="cartCount">0</span>
                            </a>
                            <a href="/admin" class="icon-link d-none d-md-flex" title="Admin Panel">
                                <i class="fas fa-cog"></i>
                            </a>
                        </div>
                        <button class="navbar-toggler d-lg-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                            <i class="fas fa-bars fa-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <nav class="categories-bar d-none d-lg-block">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                <a href="/" class="category-link <?= ($_SERVER['REQUEST_URI'] == '/') ? 'active' : '' ?>">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                <?php
                $segmentModel = new Segment();
                $menuSegments = $segmentModel->menuSegments();
                $segmentIcons = [
                    'bath-fittings' => 'fa-shower',
                    'sanitaryware' => 'fa-toilet',
                    'pipes' => 'fa-grip-lines',
                    'fittings' => 'fa-wrench',
                    'water-tanks' => 'fa-database',
                    'designer-collection' => 'fa-gem'
                ];
                foreach ($menuSegments as $seg):
                    $icon = $segmentIcons[$seg['slug']] ?? 'fa-box';
                ?>
                <a href="/segment/<?= $seg['slug'] ?>" class="category-link">
                    <i class="fas <?= $icon ?>"></i>
                    <span><?= htmlspecialchars($seg['name']) ?></span>
                </a>
                <?php endforeach; ?>
                <a href="/gallery" class="category-link">
                    <i class="fas fa-images"></i>
                    <span>Gallery</span>
                </a>
                <a href="/contact" class="category-link">
                    <i class="fas fa-envelope"></i>
                    <span>Contact</span>
                </a>
                <a href="/dealer-enquiry" class="category-link">
                    <i class="fas fa-handshake"></i>
                    <span>Become Dealer</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
        <div class="offcanvas-header bg-primary text-white">
            <div class="d-flex align-items-center gap-3">
                <img src="/assets/images/logo.png" alt="Aerofic" height="40">
                <span class="fw-bold">Menu</span>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="p-3">
                <form action="/search" method="GET" class="search-box mb-3">
                    <input type="text" name="q" placeholder="Search products..." class="form-control">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <ul class="list-unstyled mb-0">
                <li><a href="/" class="d-flex align-items-center gap-3 p-3 border-bottom text-decoration-none text-dark"><i class="fas fa-home text-primary"></i> Home</a></li>
                <?php foreach ($menuSegments as $seg): ?>
                <li><a href="/segment/<?= $seg['slug'] ?>" class="d-flex align-items-center gap-3 p-3 border-bottom text-decoration-none text-dark"><i class="fas <?= $segmentIcons[$seg['slug']] ?? 'fa-box' ?> text-primary"></i> <?= htmlspecialchars($seg['name']) ?></a></li>
                <?php endforeach; ?>
                <li><a href="/about" class="d-flex align-items-center gap-3 p-3 border-bottom text-decoration-none text-dark"><i class="fas fa-info-circle text-primary"></i> About Us</a></li>
                <li><a href="/gallery" class="d-flex align-items-center gap-3 p-3 border-bottom text-decoration-none text-dark"><i class="fas fa-images text-primary"></i> Gallery</a></li>
                <li><a href="/contact" class="d-flex align-items-center gap-3 p-3 border-bottom text-decoration-none text-dark"><i class="fas fa-envelope text-primary"></i> Contact</a></li>
                <li><a href="/dealer-enquiry" class="d-flex align-items-center gap-3 p-3 border-bottom text-decoration-none text-dark"><i class="fas fa-handshake text-primary"></i> Become Dealer</a></li>
                <li><a href="/admin" class="d-flex align-items-center gap-3 p-3 border-bottom text-decoration-none text-dark"><i class="fas fa-cog text-primary"></i> Admin Panel</a></li>
            </ul>
            <div class="p-3 bg-light">
                <p class="mb-2 small text-muted">Contact Us</p>
                <a href="tel:+919996100970" class="d-flex align-items-center gap-2 text-decoration-none text-dark mb-2">
                    <i class="fas fa-phone text-primary"></i> +91 99961 00970
                </a>
                <a href="mailto:info@aerofic.com" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                    <i class="fas fa-envelope text-primary"></i> info@aerofic.com
                </a>
            </div>
        </div>
    </div>
    
    <?php if (Session::hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible fade show m-0 rounded-0" role="alert">
        <div class="container d-flex align-items-center gap-2">
            <i class="fas fa-check-circle"></i>
            <?= Session::getFlash('success') ?>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>
    
    <?php if (Session::hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show m-0 rounded-0" role="alert">
        <div class="container d-flex align-items-center gap-2">
            <i class="fas fa-exclamation-circle"></i>
            <?= Session::getFlash('error') ?>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>
