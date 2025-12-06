<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<!-- Luxury Page Header -->
<section class="luxury-page-header position-relative overflow-hidden">
    <div class="page-header-bg"></div>
    <div class="container position-relative py-5">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" data-aos="fade-right">
                    <ol class="breadcrumb luxury-breadcrumb mb-3">
                        <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Home</a></li>
                        <?php if (!empty($segment)): ?>
                        <li class="breadcrumb-item"><a href="/segment/<?= $segment['slug'] ?>"><?= htmlspecialchars($segment['name']) ?></a></li>
                        <?php endif; ?>
                        <li class="breadcrumb-item active"><?= htmlspecialchars($category['name']) ?></li>
                    </ol>
                </nav>
                <h1 class="display-4 fw-bold text-white mb-3" data-aos="fade-up">
                    <?= htmlspecialchars($category['name']) ?>
                </h1>
                <?php if ($category['description']): ?>
                <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                    <?= htmlspecialchars($category['description']) ?>
                </p>
                <?php endif; ?>
            </div>
            <div class="col-lg-4 text-end d-none d-lg-block" data-aos="fade-left">
                <div class="category-icon-wrapper">
                    <i class="fas fa-gem fa-4x text-gold"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="py-5 bg-light-cream">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 mb-4" data-aos="fade-right">
                <div class="luxury-sidebar">
                    <!-- Categories Filter -->
                    <div class="sidebar-widget mb-4">
                        <h5 class="widget-title">
                            <i class="fas fa-layer-group me-2 text-gold"></i>Categories
                        </h5>
                        <ul class="category-filter-list">
                            <?php if (!empty($allCategories)): foreach ($allCategories as $cat): ?>
                            <li>
                                <a href="/category/<?= $cat['slug'] ?>" class="<?= $cat['id'] == $category['id'] ? 'active' : '' ?>">
                                    <span class="cat-name"><?= htmlspecialchars($cat['name']) ?></span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>
                    
                    <!-- Price Filter -->
                    <div class="sidebar-widget">
                        <h5 class="widget-title">
                            <i class="fas fa-rupee-sign me-2 text-gold"></i>Price Range
                        </h5>
                        <form method="get" action="" class="price-filter-form">
                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <div class="price-input-wrapper">
                                        <span class="currency-symbol">₹</span>
                                        <input type="number" name="min_price" class="form-control luxury-input" placeholder="Min" value="<?= $_GET['min_price'] ?? '' ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="price-input-wrapper">
                                        <span class="currency-symbol">₹</span>
                                        <input type="number" name="max_price" class="form-control luxury-input" placeholder="Max" value="<?= $_GET['max_price'] ?? '' ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gold w-100">
                                <i class="fas fa-filter me-2"></i>Apply Filter
                            </button>
                        </form>
                    </div>
                    
                    <!-- Need Help Widget -->
                    <div class="help-widget mt-4">
                        <div class="help-content text-center">
                            <i class="fas fa-headset fa-3x text-gold mb-3"></i>
                            <h6 class="fw-bold">Need Assistance?</h6>
                            <p class="small text-muted mb-3">Our experts are here to help you choose the perfect products</p>
                            <a href="tel:+919876543210" class="btn btn-outline-gold btn-sm">
                                <i class="fas fa-phone me-2"></i>Call Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Products Grid -->
            <div class="col-lg-9">
                <!-- Toolbar -->
                <div class="products-toolbar d-flex justify-content-between align-items-center mb-4" data-aos="fade-up">
                    <div class="results-count">
                        <span class="badge bg-gold text-dark"><?= count($products) ?></span>
                        <span class="text-muted ms-2">Products Found</span>
                    </div>
                    <div class="sort-wrapper d-flex align-items-center gap-3">
                        <span class="text-muted d-none d-md-inline">Sort By:</span>
                        <select class="form-select luxury-select" onchange="window.location.href=this.value">
                            <option value="?sort=newest" <?= ($_GET['sort'] ?? '') == 'newest' ? 'selected' : '' ?>>Newest First</option>
                            <option value="?sort=price_low" <?= ($_GET['sort'] ?? '') == 'price_low' ? 'selected' : '' ?>>Price: Low to High</option>
                            <option value="?sort=price_high" <?= ($_GET['sort'] ?? '') == 'price_high' ? 'selected' : '' ?>>Price: High to Low</option>
                            <option value="?sort=name" <?= ($_GET['sort'] ?? '') == 'name' ? 'selected' : '' ?>>Name A-Z</option>
                        </select>
                    </div>
                </div>
                
                <?php if (empty($products)): ?>
                <!-- Empty State -->
                <div class="empty-state text-center py-5" data-aos="fade-up">
                    <div class="empty-icon mb-4">
                        <i class="fas fa-box-open fa-5x text-gold opacity-50"></i>
                    </div>
                    <h4 class="fw-bold mb-3">No Products Found</h4>
                    <p class="text-muted mb-4">Try adjusting your filters or browse other categories.</p>
                    <a href="/" class="btn btn-gold">
                        <i class="fas fa-home me-2"></i>Back to Home
                    </a>
                </div>
                <?php else: ?>
                <!-- Products Grid -->
                <div class="row g-4">
                    <?php 
                    $productModel = new Product();
                    $delay = 0;
                    foreach ($products as $product): 
                        $img = $productModel->getPrimaryImage($product['id']);
                    ?>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                        <div class="luxury-product-card">
                            <div class="product-image-container">
                                <a href="/product/<?= $product['slug'] ?>">
                                    <img src="<?= $img ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="product-img">
                                </a>
                                
                                <!-- Badges -->
                                <div class="product-badges">
                                    <?php if ($product['is_new']): ?>
                                    <span class="badge badge-new">New</span>
                                    <?php endif; ?>
                                    <?php if ($product['mrp'] > $product['selling_price']): ?>
                                    <span class="badge badge-sale"><?= round((($product['mrp'] - $product['selling_price']) / $product['mrp']) * 100) ?>% OFF</span>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Quick Actions -->
                                <div class="product-actions">
                                    <button class="action-btn add-to-cart" data-product-id="<?= $product['id'] ?>" title="Add to Cart">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                    <a href="/product/<?= $product['slug'] ?>" class="action-btn" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="product-info">
                                <a href="/product/<?= $product['slug'] ?>" class="product-title">
                                    <?= htmlspecialchars($product['name']) ?>
                                </a>
                                <?php if ($product['size_text']): ?>
                                <p class="product-size"><?= htmlspecialchars($product['size_text']) ?></p>
                                <?php endif; ?>
                                <div class="product-price-row">
                                    <div class="price-wrapper">
                                        <?php if ($product['mrp'] > $product['selling_price']): ?>
                                        <span class="old-price">₹<?= number_format($product['mrp']) ?></span>
                                        <?php endif; ?>
                                        <span class="current-price">₹<?= number_format($product['selling_price']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $delay += 50;
                        if ($delay > 200) $delay = 0;
                    endforeach; 
                    ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Features Bar -->
<section class="features-bar py-4 bg-dark-navy">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3" data-aos="fade-up">
                <div class="feature-item">
                    <i class="fas fa-truck fa-2x text-gold mb-2"></i>
                    <h6 class="text-white mb-0">Free Delivery</h6>
                    <small class="text-white-50">Orders above ₹5,000</small>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-item">
                    <i class="fas fa-shield-alt fa-2x text-gold mb-2"></i>
                    <h6 class="text-white mb-0">10 Year Warranty</h6>
                    <small class="text-white-50">On all products</small>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-item">
                    <i class="fas fa-medal fa-2x text-gold mb-2"></i>
                    <h6 class="text-white mb-0">Premium Quality</h6>
                    <small class="text-white-50">Certified products</small>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-item">
                    <i class="fas fa-headset fa-2x text-gold mb-2"></i>
                    <h6 class="text-white mb-0">24/7 Support</h6>
                    <small class="text-white-50">Expert assistance</small>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Luxury Page Header */
.luxury-page-header {
    background: linear-gradient(135deg, var(--dark-navy) 0%, #0d1a2d 100%);
    position: relative;
    overflow: hidden;
}

.page-header-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('/assets/images/patterns/luxury-pattern.png') repeat;
    opacity: 0.05;
}

.luxury-breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
}

.luxury-breadcrumb .breadcrumb-item a {
    color: var(--gold);
    text-decoration: none;
    transition: all 0.3s ease;
}

.luxury-breadcrumb .breadcrumb-item a:hover {
    color: var(--gold-light);
}

.luxury-breadcrumb .breadcrumb-item.active {
    color: rgba(255,255,255,0.7);
}

.luxury-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    color: var(--gold);
}

.category-icon-wrapper {
    width: 120px;
    height: 120px;
    border: 2px solid var(--gold);
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    animation: float 3s ease-in-out infinite;
}

.text-gold {
    color: var(--gold) !important;
}

.bg-light-cream {
    background: linear-gradient(180deg, #faf8f5 0%, #ffffff 100%);
}

/* Luxury Sidebar */
.luxury-sidebar {
    position: sticky;
    top: 100px;
}

.sidebar-widget {
    background: white;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
}

.widget-title {
    font-family: var(--font-heading);
    font-size: 1.1rem;
    color: var(--dark-navy);
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid #f0f0f0;
}

.category-filter-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.category-filter-list li {
    margin-bottom: 8px;
}

.category-filter-list a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 14px;
    border-radius: 8px;
    text-decoration: none;
    color: #555;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

.category-filter-list a:hover,
.category-filter-list a.active {
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
    color: white;
    transform: translateX(5px);
}

.category-filter-list a i {
    font-size: 0.75rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.category-filter-list a:hover i,
.category-filter-list a.active i {
    opacity: 1;
}

.price-input-wrapper {
    position: relative;
}

.price-input-wrapper .currency-symbol {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gold);
    font-weight: 600;
}

.luxury-input {
    padding-left: 30px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.luxury-input:focus {
    border-color: var(--gold);
    box-shadow: 0 0 0 3px rgba(201, 169, 98, 0.15);
}

.btn-gold {
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
    color: white;
    border: none;
    border-radius: 8px;
    padding: 12px 24px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-gold:hover {
    background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold) 100%);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(201, 169, 98, 0.4);
}

.btn-outline-gold {
    border: 2px solid var(--gold);
    color: var(--gold);
    background: transparent;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn-outline-gold:hover {
    background: var(--gold);
    color: white;
}

.help-widget {
    background: linear-gradient(135deg, #fdf8f0 0%, #fff9f0 100%);
    border: 1px solid rgba(201, 169, 98, 0.2);
    border-radius: 16px;
    padding: 24px;
}

/* Products Toolbar */
.products-toolbar {
    background: white;
    padding: 16px 20px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
}

.bg-gold {
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%) !important;
}

.luxury-select {
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    padding: 8px 40px 8px 16px;
    min-width: 180px;
    transition: all 0.3s ease;
}

.luxury-select:focus {
    border-color: var(--gold);
    box-shadow: 0 0 0 3px rgba(201, 169, 98, 0.15);
}

/* Luxury Product Card */
.luxury-product-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    transition: all 0.4s ease;
    height: 100%;
}

.luxury-product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.12);
}

.product-image-container {
    position: relative;
    padding-top: 100%;
    overflow: hidden;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.product-image-container .product-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 20px;
    transition: transform 0.5s ease;
}

.luxury-product-card:hover .product-img {
    transform: scale(1.08);
}

.product-badges {
    position: absolute;
    top: 12px;
    left: 12px;
    display: flex;
    flex-direction: column;
    gap: 6px;
    z-index: 2;
}

.product-badges .badge {
    padding: 6px 12px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.badge-new {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
}

.badge-sale {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
}

.product-actions {
    position: absolute;
    bottom: 12px;
    right: 12px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    opacity: 0;
    transform: translateX(20px);
    transition: all 0.3s ease;
    z-index: 2;
}

.luxury-product-card:hover .product-actions {
    opacity: 1;
    transform: translateX(0);
}

.action-btn {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: none;
    background: white;
    color: var(--dark-navy);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
    cursor: pointer;
    text-decoration: none;
}

.action-btn:hover {
    background: var(--gold);
    color: white;
    transform: scale(1.1);
}

.product-info {
    padding: 20px;
    text-align: center;
}

.product-title {
    display: block;
    font-family: var(--font-heading);
    font-size: 1rem;
    font-weight: 600;
    color: var(--dark-navy);
    text-decoration: none;
    margin-bottom: 6px;
    transition: color 0.3s ease;
    line-height: 1.4;
}

.product-title:hover {
    color: var(--gold);
}

.product-size {
    font-size: 0.85rem;
    color: #888;
    margin-bottom: 12px;
}

.product-price-row {
    display: flex;
    justify-content: center;
    align-items: center;
}

.price-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
}

.old-price {
    font-size: 0.9rem;
    color: #999;
    text-decoration: line-through;
}

.current-price {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--gold-dark);
}

/* Empty State */
.empty-state {
    background: white;
    border-radius: 20px;
    padding: 60px 40px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
}

/* Features Bar */
.bg-dark-navy {
    background: var(--dark-navy);
}

.feature-item i {
    display: block;
}

/* Animations */
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Responsive */
@media (max-width: 991px) {
    .luxury-sidebar {
        position: static;
        margin-bottom: 30px;
    }
    
    .products-toolbar {
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }
}

@media (max-width: 576px) {
    .luxury-page-header h1 {
        font-size: 2rem;
    }
    
    .product-info {
        padding: 15px;
    }
    
    .product-title {
        font-size: 0.9rem;
    }
}
</style>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
