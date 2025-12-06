<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="hero-section">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="hero-slide">
                    <div class="container">
                        <div class="row align-items-center min-vh-75">
                            <div class="col-lg-6 hero-content">
                                <div class="luxury-badge mb-4">
                                    <i class="fas fa-gem"></i>
                                    <span>Premium Collection 2025</span>
                                </div>
                                <h1 class="display-3 fw-bold text-white mb-4">
                                    Transform Your
                                    <span>Bathroom into Luxury</span>
                                </h1>
                                <p class="lead text-white-50 mb-4" style="font-size: 1.3rem;">
                                    Discover the finest collection of bath fittings, sanitaryware, and designer fixtures crafted for elegance and durability.
                                </p>
                                <div class="hero-buttons">
                                    <a href="/segment/designer-collection" class="btn-luxury btn-luxury-gold">
                                        <span>Explore Collection</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                    <a href="/contact" class="btn-luxury btn-luxury-outline">
                                        <span>Get Quote</span>
                                        <i class="fas fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="hero-image-wrapper">
                                    <div class="hero-glow"></div>
                                    <div class="hero-3d-frame">
                                        <div class="product-showcase">
                                            <img src="/assets/images/products/luxury_chrome_gold_faucet.png" alt="Luxury Faucet" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($sliders)): foreach ($sliders as $slider): ?>
            <div class="swiper-slide">
                <div class="hero-slide">
                    <div class="container">
                        <div class="row align-items-center min-vh-75">
                            <div class="col-lg-6 hero-content">
                                <div class="luxury-badge mb-4">
                                    <i class="fas fa-star"></i>
                                    <span>Featured</span>
                                </div>
                                <h1 class="display-4 fw-bold text-white mb-3"><?= htmlspecialchars($slider['title']) ?></h1>
                                <p class="lead text-white-50 mb-4"><?= htmlspecialchars($slider['subtitle']) ?></p>
                                <?php if ($slider['cta_text']): ?>
                                <div class="hero-buttons">
                                    <a href="<?= $slider['cta_link'] ?>" class="btn-luxury btn-luxury-gold">
                                        <span><?= htmlspecialchars($slider['cta_text']) ?></span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block">
                                <?php if ($slider['image_path']): ?>
                                <div class="hero-image-wrapper">
                                    <div class="hero-glow"></div>
                                    <div class="hero-3d-frame">
                                        <div class="product-showcase">
                                            <img src="<?= $slider['image_path'] ?>" alt="<?= htmlspecialchars($slider['title']) ?>" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<section class="py-5 bg-champagne" data-aos="fade-up">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-3 text-center">
                <div class="stat-card h-100">
                    <h2 class="counter fw-bold text-gold" style="font-size: 3rem;">30+</h2>
                    <p class="text-muted mb-0">Years Experience</p>
                </div>
            </div>
            <div class="col-6 col-md-3 text-center">
                <div class="stat-card h-100">
                    <h2 class="counter fw-bold text-gold" style="font-size: 3rem;">200+</h2>
                    <p class="text-muted mb-0">Channel Partners</p>
                </div>
            </div>
            <div class="col-6 col-md-3 text-center">
                <div class="stat-card h-100">
                    <h2 class="counter fw-bold text-gold" style="font-size: 3rem;">1000+</h2>
                    <p class="text-muted mb-0">Products</p>
                </div>
            </div>
            <div class="col-6 col-md-3 text-center">
                <div class="stat-card h-100">
                    <h2 class="counter fw-bold text-gold" style="font-size: 3rem;">100K+</h2>
                    <p class="text-muted mb-0">Happy Customers</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 py-lg-6" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                <span class="section-subtitle d-block mb-3">Our Story</span>
                <h2 class="section-title text-start mb-4">About Aerofic</h2>
                <p class="lead text-muted mb-4" style="font-size: 1.1rem; line-height: 1.9;">
                    AEROFIC brand came into existence in 2014 and has since grown to become a leading name in the plumbing industry. With over three decades of experience, we deliver excellence in every product.
                </p>
                <p class="text-muted mb-4" style="line-height: 1.8;">
                    All products under AEROFIC are manufactured using superior quality raw materials and are constantly tested by our team of experts. We have developed a controlled quality management system which places great prominence towards providing the finest quality.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="/about" class="btn-luxury btn-luxury-gold">
                        <span>Learn More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="/gallery" class="btn-outline-luxury">
                        View Gallery
                    </a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="position-relative">
                    <img src="/assets/images/hero/luxury_bathroom_interior_scene.png" alt="Luxury Bathroom" class="img-fluid rounded-4 shadow-lg">
                    <div class="position-absolute bottom-0 start-0 m-4 glass-card p-4" style="max-width: 280px;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-gold rounded-circle p-3">
                                <i class="fas fa-award text-white fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">ISO Certified</h5>
                                <small class="text-muted">Quality Assured</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-navy" data-aos="fade-up">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-subtitle d-block mb-3 text-gold">Complete Solutions</span>
            <h2 class="section-title text-white">Our Product Range</h2>
        </div>
        <div class="row g-4">
            <?php if (!empty($segments)): foreach ($segments as $index => $segment): ?>
            <div class="col-md-4 col-lg-2" data-aos="zoom-in" data-aos-delay="<?= $index * 50 ?>">
                <a href="/segment/<?= $segment['slug'] ?>" class="segment-card text-decoration-none">
                    <div class="card h-100 border-0 text-center segment-hover bg-white rounded-4">
                        <div class="card-body py-4">
                            <div class="segment-icon mb-3">
                                <i class="fas <?= $segment['icon'] ?: 'fa-box' ?> fa-xl"></i>
                            </div>
                            <h6 class="card-title mb-0 fw-semibold"><?= htmlspecialchars($segment['name']) ?></h6>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<section class="py-5 py-lg-6" data-aos="fade-up">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-subtitle d-block mb-3">Browse Collections</span>
            <h2 class="section-title">Shop by Category</h2>
        </div>
        <div class="swiper categories-swiper">
            <div class="swiper-wrapper">
                <?php if (!empty($categories)): foreach ($categories as $category): ?>
                <div class="swiper-slide">
                    <a href="/category/<?= $category['slug'] ?>" class="text-decoration-none">
                        <div class="category-card bg-white rounded-4 p-4 text-center h-100 shadow-sm category-hover">
                            <?php if ($category['image_path']): ?>
                            <img src="<?= $category['image_path'] ?>" alt="<?= htmlspecialchars($category['name']) ?>" class="category-img mb-3">
                            <?php else: ?>
                            <div class="category-placeholder mb-3"><i class="fas fa-image fa-3x text-gold"></i></div>
                            <?php endif; ?>
                            <h6 class="text-dark mb-0 fw-semibold"><?= htmlspecialchars($category['name']) ?></h6>
                        </div>
                    </a>
                </div>
                <?php endforeach; endif; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<section class="py-5 py-lg-6 bg-champagne" data-aos="fade-up">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end mb-5">
            <div>
                <span class="section-subtitle d-block mb-3">Handpicked For You</span>
                <h2 class="section-title text-start">Featured Products</h2>
            </div>
            <a href="/products" class="btn-outline-luxury d-none d-md-inline-flex">View All Products</a>
        </div>
        <div class="swiper products-swiper">
            <div class="swiper-wrapper">
                <?php 
                $productModel = new Product();
                if (!empty($featuredProducts)): foreach ($featuredProducts as $product): 
                    $image = $productModel->getPrimaryImage($product['id']);
                ?>
                <div class="swiper-slide">
                    <div class="product-card card h-100 border-0 shadow-sm product-hover rounded-4">
                        <div class="product-image-wrapper">
                            <img src="<?= $image ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="card-img-top product-image">
                            <?php if ($product['is_new']): ?>
                            <div class="product-badge">
                                <span class="badge bg-gold">New Arrival</span>
                            </div>
                            <?php endif; ?>
                            <div class="product-overlay">
                                <a href="/product/<?= $product['slug'] ?>" class="btn-white btn-sm rounded-pill px-4">
                                    <i class="fas fa-eye me-2"></i>View Details
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title"><?= htmlspecialchars($product['name']) ?></h6>
                            <p class="text-muted small mb-2"><?= htmlspecialchars($product['size_text']) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="product-price">
                                    <span class="mrp">&#8377;<?= number_format($product['mrp']) ?></span>
                                    <span class="selling">&#8377;<?= number_format($product['selling_price']) ?></span>
                                </div>
                                <button class="btn btn-primary btn-sm rounded-circle add-to-cart" data-product-id="<?= $product['id'] ?>" style="width: 40px; height: 40px;">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<section class="py-5 py-lg-6 bg-dark-luxury text-white position-relative overflow-hidden" data-aos="fade-up">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="luxury-badge bg-transparent border-gold mb-4">
                    <i class="fas fa-gem text-gold"></i>
                    <span class="text-gold">Exclusive Collection</span>
                </div>
                <h2 class="display-5 fw-bold mb-4">Designer Collection 2025</h2>
                <p class="lead text-white-50 mb-4">Explore our exclusive designer collection featuring artistic wash basins and premium faucets for the modern luxury home.</p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-3 d-flex align-items-center gap-3">
                        <div class="bg-gold rounded-circle p-2" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-check text-dark"></i>
                        </div>
                        <span>Premium Quality Materials</span>
                    </li>
                    <li class="mb-3 d-flex align-items-center gap-3">
                        <div class="bg-gold rounded-circle p-2" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-check text-dark"></i>
                        </div>
                        <span>Elegant Modern Designs</span>
                    </li>
                    <li class="mb-3 d-flex align-items-center gap-3">
                        <div class="bg-gold rounded-circle p-2" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-check text-dark"></i>
                        </div>
                        <span>10 Year Warranty</span>
                    </li>
                    <li class="mb-3 d-flex align-items-center gap-3">
                        <div class="bg-gold rounded-circle p-2" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-check text-dark"></i>
                        </div>
                        <span>Easy Installation</span>
                    </li>
                </ul>
                <a href="/segment/designer-collection" class="btn-luxury btn-luxury-gold">
                    <span>View Collection</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="iphone-frame mx-auto">
                    <div class="iphone-notch"></div>
                    <div class="iphone-screen">
                        <img src="/assets/images/products/designer_white_wash_basin.png" alt="Designer Wash Basin" class="p-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 py-lg-6 bg-champagne" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-lg-2" data-aos="fade-left">
                <span class="section-subtitle d-block mb-3">Durable Storage</span>
                <h2 class="section-title text-start mb-4">Water Storage Tanks</h2>
                <p class="lead text-muted mb-4">Durable water storage tanks with 3 to 10 layer technology. Food grade material for safe water storage.</p>
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-gold rounded-3 p-3">
                                <i class="fas fa-shield-alt text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Multi-Layer</h6>
                                <small class="text-muted">Protection</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-gold rounded-3 p-3">
                                <i class="fas fa-leaf text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Food Grade</h6>
                                <small class="text-muted">Material</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-gold rounded-3 p-3">
                                <i class="fas fa-sun text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">UV Stabilized</h6>
                                <small class="text-muted">Technology</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-gold rounded-3 p-3">
                                <i class="fas fa-award text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">10 Year</h6>
                                <small class="text-muted">Warranty</small>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/segment/water-tanks" class="btn-luxury btn-luxury-gold">
                    <span>Explore Tanks</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-6 order-lg-1" data-aos="fade-right">
                <div class="tv-frame mx-auto">
                    <div class="tv-screen">
                        <img src="/assets/images/products/premium_water_storage_tank.png" alt="Water Tank" class="img-fluid p-4">
                    </div>
                    <div class="tv-stand"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 py-lg-6 usp-section" data-aos="fade-up">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-subtitle d-block mb-3">Quality You Can Trust</span>
            <h2 class="section-title">Why Choose Aerofic</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="usp-card">
                    <div class="usp-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h5>Premium Quality</h5>
                    <p>Superior quality raw materials tested by our team of experts</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="usp-card">
                    <div class="usp-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h5>Long Warranty</h5>
                    <p>Up to 10 years warranty on our premium products</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="usp-card">
                    <div class="usp-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h5>Pan India Delivery</h5>
                    <p>200+ channel partners across India for quick delivery</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="usp-card">
                    <div class="usp-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h5>Expert Support</h5>
                    <p>Dedicated customer support team for all your needs</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 py-lg-6" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="section-subtitle d-block mb-3">Rain Shower Systems</span>
                <h2 class="section-title text-start mb-4">Luxury Shower Experience</h2>
                <p class="lead text-muted mb-4">Transform your daily shower into a spa-like experience with our premium rainfall shower systems.</p>
                <p class="text-muted mb-4">Our collection features advanced technology with anti-limescale nozzles, adjustable flow rates, and stunning designs that complement any bathroom decor.</p>
                <div class="d-flex gap-4 mb-4">
                    <div class="text-center">
                        <h3 class="fw-bold text-gold mb-0">50+</h3>
                        <small class="text-muted">Shower Models</small>
                    </div>
                    <div class="text-center">
                        <h3 class="fw-bold text-gold mb-0">5 Star</h3>
                        <small class="text-muted">Customer Rating</small>
                    </div>
                    <div class="text-center">
                        <h3 class="fw-bold text-gold mb-0">7 Year</h3>
                        <small class="text-muted">Warranty</small>
                    </div>
                </div>
                <a href="/segment/bath-fittings" class="btn-luxury btn-luxury-gold">
                    <span>Explore Showers</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="/assets/images/products/luxury_rainfall_shower_head.png" alt="Luxury Shower" class="img-fluid rounded-4">
                    <div class="position-absolute top-0 end-0 m-4 bg-gold text-dark p-3 rounded-3 shadow-lg">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-star"></i>
                            <span class="fw-bold">Best Seller</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 py-lg-6" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="section-subtitle d-block mb-3">Visit Us Today</span>
                <h2 class="section-title text-start mb-4">Aerofic Experience Center</h2>
                <p class="lead text-muted mb-4">Experience our complete range of products at our store. Expert guidance and best prices guaranteed.</p>
                <div class="mb-4">
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="bg-gold rounded-circle p-2 mt-1">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Address</h6>
                            <p class="text-muted mb-0">Near Jio-BP Petrol Pump, Dabwali Road, Sirsa-125055, Haryana, India</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="bg-gold rounded-circle p-2 mt-1">
                            <i class="fas fa-phone text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Phone</h6>
                            <p class="text-muted mb-0">+91 99961 00970</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <div class="bg-gold rounded-circle p-2 mt-1">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Working Hours</h6>
                            <p class="text-muted mb-0">Mon - Sat: 9:00 AM - 7:00 PM</p>
                        </div>
                    </div>
                </div>
                <a href="/contact" class="btn-luxury btn-luxury-gold">
                    <span>Contact Us</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="shop-frame">
                    <div class="shop-header">
                        <span class="shop-name">AEROFIC</span>
                    </div>
                    <div class="shop-content">
                        <img src="/assets/images/logo.png" alt="Aerofic Store" class="img-fluid">
                        <p class="mt-4 mb-0 text-muted">Premium Plumbing Solutions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 py-lg-6 testimonial-section" data-aos="fade-up">
    <div class="container position-relative" style="z-index: 2;">
        <div class="text-center mb-5">
            <span class="section-subtitle d-block mb-3 text-gold">What Our Customers Say</span>
            <h2 class="section-title text-white">Customer Reviews</h2>
        </div>
        <div class="swiper testimonials-swiper">
            <div class="swiper-wrapper">
                <?php if (!empty($testimonials)): foreach ($testimonials as $testimonial): ?>
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="stars mb-3">
                            <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                            <i class="fas fa-star"></i>
                            <?php endfor; ?>
                        </div>
                        <p class="mb-4">"<?= htmlspecialchars($testimonial['message']) ?>"</p>
                        <div class="d-flex align-items-center gap-3">
                            <div class="testimonial-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-white"><?= htmlspecialchars($testimonial['name']) ?></h6>
                                <small class="text-white-50"><?= htmlspecialchars($testimonial['designation']) ?>, <?= htmlspecialchars($testimonial['company']) ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; else: ?>
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="stars mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="mb-4">"Excellent quality products with great customer service. The faucets we purchased are still working perfectly after 3 years."</p>
                        <div class="d-flex align-items-center gap-3">
                            <div class="testimonial-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-white">Rajesh Kumar</h6>
                                <small class="text-white-50">Homeowner, Delhi</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="stars mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="mb-4">"Best plumbing brand in India. Their water tanks are incredibly durable and the warranty service is excellent."</p>
                        <div class="d-flex align-items-center gap-3">
                            <div class="testimonial-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-white">Amit Sharma</h6>
                                <small class="text-white-50">Contractor, Chandigarh</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="stars mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="mb-4">"The designer collection is absolutely stunning. Perfect for our modern bathroom renovation project."</p>
                        <div class="d-flex align-items-center gap-3">
                            <div class="testimonial-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-white">Priya Patel</h6>
                                <small class="text-white-50">Interior Designer, Mumbai</small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<section class="py-5 py-lg-6 bg-light" data-aos="fade-up">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-subtitle d-block mb-3">Get Your Answers</span>
            <h2 class="section-title">Frequently Asked Questions</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <?php if (!empty($faqs)): $i = 0; foreach ($faqs as $faq): $i++; ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?= $i > 1 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?= $faq['id'] ?>">
                                <?= htmlspecialchars($faq['question']) ?>
                            </button>
                        </h2>
                        <div id="faq<?= $faq['id'] ?>" class="accordion-collapse collapse <?= $i == 1 ? 'show' : '' ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?= $faq['answer_html'] ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; else: ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                What warranty do you offer on your products?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We offer warranties ranging from 5 to 10 years depending on the product category. Bath fittings come with a 7-year warranty, while water tanks come with a 10-year warranty.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Do you provide installation services?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, we provide professional installation services through our network of certified plumbers. Contact us for installation assistance.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                How can I become an Aerofic dealer?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can apply to become a dealer by filling out our dealer enquiry form. Our team will get in touch with you to discuss the partnership opportunities.
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="text-center mt-4">
                    <a href="/faq" class="btn-outline-luxury">View All FAQs</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" data-aos="fade-up">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-subtitle d-block mb-3">Visit Our Store</span>
            <h2 class="section-title">Find Us</h2>
        </div>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.5!2d75.0!3d29.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sSirsa%2C%20Haryana!5e0!3m2!1sen!2sin!4v1" height="400" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<section class="py-5 cta-section" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h3 class="fw-bold mb-2">Become an Aerofic Dealer</h3>
                <p class="mb-0" style="opacity: 0.8;">Join our growing network of 200+ dealers across India. Partner with a trusted brand and grow your business.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="/dealer-enquiry" class="btn btn-dark btn-lg rounded-pill px-5">Apply Now <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-navy" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h3 class="text-white mb-4">Subscribe to Our Newsletter</h3>
                <p class="text-white-50 mb-4">Get the latest updates on new products, offers, and design inspiration.</p>
                <form class="row g-3 justify-content-center">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="email" class="form-control form-control-lg rounded-pill" placeholder="Enter your email address" style="padding-left: 25px;">
                            <button type="submit" class="btn btn-gold btn-lg rounded-pill px-4 ms-2" style="background: var(--gradient-gold); border: none; color: #1a365d;">
                                Subscribe <i class="fas fa-paper-plane ms-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
