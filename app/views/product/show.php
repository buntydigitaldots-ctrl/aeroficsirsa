<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<!-- Luxury Breadcrumb -->
<section class="luxury-breadcrumb-section py-3 bg-light-cream">
    <div class="container">
        <nav aria-label="breadcrumb" data-aos="fade-right">
            <ol class="breadcrumb luxury-breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Home</a></li>
                <?php if (!empty($product['segment_id']) && !empty($segment)): ?>
                <li class="breadcrumb-item"><a href="/segment/<?= $segment['slug'] ?? '' ?>"><?= htmlspecialchars($segment['name'] ?? 'Products') ?></a></li>
                <?php endif; ?>
                <?php if (!empty($category)): ?>
                <li class="breadcrumb-item"><a href="/category/<?= $category['slug'] ?>"><?= htmlspecialchars($category['name']) ?></a></li>
                <?php endif; ?>
                <li class="breadcrumb-item active"><?= htmlspecialchars($product['name']) ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- Product Detail Section -->
<section class="product-detail-section py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Product Gallery -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="product-gallery-wrapper">
                    <!-- Main Image -->
                    <div class="main-image-container">
                        <div class="image-zoom-wrapper">
                            <img src="<?= $primaryImage ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="main-product-image" id="mainProductImage">
                        </div>
                        
                        <!-- Badges -->
                        <div class="product-detail-badges">
                            <?php if ($product['is_new']): ?>
                            <span class="detail-badge badge-new"><i class="fas fa-star me-1"></i>New Arrival</span>
                            <?php endif; ?>
                            <?php if ($product['is_featured']): ?>
                            <span class="detail-badge badge-featured"><i class="fas fa-crown me-1"></i>Featured</span>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Zoom Hint -->
                        <div class="zoom-hint">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                    
                    <!-- Thumbnails -->
                    <?php if (!empty($images) && count($images) > 1): ?>
                    <div class="thumbnail-gallery mt-3">
                        <?php foreach ($images as $index => $img): ?>
                        <div class="thumbnail-item <?= $index === 0 ? 'active' : '' ?>">
                            <img src="<?= $img['image_path'] ?>" alt="" class="product-thumb">
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="product-detail-info">
                    <!-- Product Title -->
                    <h1 class="product-detail-title"><?= htmlspecialchars($product['name']) ?></h1>
                    
                    <!-- Article Code & SKU -->
                    <div class="product-meta d-flex flex-wrap gap-3 mb-3">
                        <?php if ($product['article_code']): ?>
                        <span class="meta-item">
                            <i class="fas fa-barcode text-gold me-2"></i>
                            Article: <strong><?= htmlspecialchars($product['article_code']) ?></strong>
                        </span>
                        <?php endif; ?>
                        <?php if ($product['size_text']): ?>
                        <span class="meta-item">
                            <i class="fas fa-ruler-combined text-gold me-2"></i>
                            Size: <strong><?= htmlspecialchars($product['size_text']) ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Price Box -->
                    <div class="luxury-price-box">
                        <div class="price-content">
                            <?php if ($product['mrp'] > $product['selling_price']): ?>
                            <div class="price-row">
                                <span class="mrp-label">M.R.P:</span>
                                <span class="mrp-value">₹<?= number_format($product['mrp'], 2) ?></span>
                                <span class="discount-badge"><?= round((($product['mrp'] - $product['selling_price']) / $product['mrp']) * 100) ?>% OFF</span>
                            </div>
                            <?php endif; ?>
                            <div class="selling-price-row">
                                <span class="price-label">Price:</span>
                                <span class="selling-price">₹<?= number_format($product['selling_price'], 2) ?></span>
                            </div>
                            <p class="tax-info"><i class="fas fa-check-circle text-success me-1"></i>Inclusive of all taxes</p>
                        </div>
                    </div>
                    
                    <!-- Short Description -->
                    <?php if ($product['short_description']): ?>
                    <div class="product-short-desc">
                        <p><?= htmlspecialchars($product['short_description']) ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Add to Cart Form -->
                    <form id="addToCartForm" class="add-to-cart-form">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        
                        <div class="quantity-selector mb-4">
                            <label class="qty-label">Quantity:</label>
                            <div class="qty-controls">
                                <button type="button" class="qty-btn qty-minus">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" name="quantity" value="1" min="1" class="qty-input">
                                <button type="button" class="qty-btn qty-plus">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="action-buttons d-flex flex-wrap gap-3">
                            <button type="submit" class="btn btn-luxury-gold btn-lg flex-grow-1">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                            <a href="/checkout" class="btn btn-luxury-outline btn-lg">
                                <i class="fas fa-bolt me-2"></i>Buy Now
                            </a>
                        </div>
                    </form>
                    
                    <!-- USP Features -->
                    <div class="product-usp-features">
                        <div class="usp-item">
                            <div class="usp-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="usp-content">
                                <h6>Free Delivery</h6>
                                <p>On orders above ₹5,000</p>
                            </div>
                        </div>
                        <div class="usp-item">
                            <div class="usp-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="usp-content">
                                <h6>10 Year Warranty</h6>
                                <p>Guaranteed protection</p>
                            </div>
                        </div>
                        <div class="usp-item">
                            <div class="usp-icon">
                                <i class="fas fa-undo-alt"></i>
                            </div>
                            <div class="usp-content">
                                <h6>Easy Returns</h6>
                                <p>Hassle-free exchange</p>
                            </div>
                        </div>
                        <div class="usp-item">
                            <div class="usp-icon">
                                <i class="fas fa-medal"></i>
                            </div>
                            <div class="usp-content">
                                <h6>Premium Quality</h6>
                                <p>Certified products</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Share & Wishlist -->
                    <div class="share-wishlist-bar">
                        <div class="share-section">
                            <span class="share-label">Share:</span>
                            <div class="share-icons">
                                <a href="#" class="share-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="share-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                                <a href="https://wa.me/?text=Check out this product: <?= urlencode($product['name']) ?>" class="share-icon whatsapp" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="#" class="share-icon" title="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Product Tabs -->
        <?php if ($product['long_description']): ?>
        <div class="row mt-5" data-aos="fade-up">
            <div class="col-12">
                <div class="luxury-tabs-wrapper">
                    <ul class="nav luxury-tabs" id="productTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">
                                <i class="fas fa-file-alt me-2"></i>Description
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specifications" type="button" role="tab">
                                <i class="fas fa-list-alt me-2"></i>Specifications
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab">
                                <i class="fas fa-shipping-fast me-2"></i>Shipping & Returns
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content luxury-tab-content" id="productTabsContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="tab-inner-content">
                                <?= $product['long_description'] ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="specifications" role="tabpanel">
                            <div class="tab-inner-content">
                                <table class="specs-table">
                                    <tbody>
                                        <tr>
                                            <th><i class="fas fa-tag me-2 text-gold"></i>Article Code</th>
                                            <td><?= htmlspecialchars($product['article_code'] ?? '-') ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-barcode me-2 text-gold"></i>SKU</th>
                                            <td><?= htmlspecialchars($product['sku'] ?? '-') ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-ruler me-2 text-gold"></i>Size</th>
                                            <td><?= htmlspecialchars($product['size_text'] ?? '-') ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-expand-arrows-alt me-2 text-gold"></i>Dimensions</th>
                                            <td><?= htmlspecialchars($product['dimensions'] ?? '-') ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="shipping" role="tabpanel">
                            <div class="tab-inner-content">
                                <div class="shipping-info">
                                    <h5><i class="fas fa-truck text-gold me-2"></i>Shipping Information</h5>
                                    <ul>
                                        <li>Free delivery on orders above ₹5,000</li>
                                        <li>Standard delivery: 5-7 business days</li>
                                        <li>Express delivery available in select cities</li>
                                        <li>Tracking number provided via SMS & Email</li>
                                    </ul>
                                    
                                    <h5 class="mt-4"><i class="fas fa-undo text-gold me-2"></i>Return Policy</h5>
                                    <ul>
                                        <li>Easy 7-day return policy</li>
                                        <li>Product must be unused and in original packaging</li>
                                        <li>Refund processed within 5-7 business days</li>
                                        <li>Free pickup for returns</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Related Products -->
        <?php if (!empty($relatedProducts)): ?>
        <div class="row mt-5 pt-4" data-aos="fade-up">
            <div class="col-12">
                <div class="section-header text-center mb-4">
                    <span class="section-badge">You May Also Like</span>
                    <h2 class="section-title">Related Products</h2>
                </div>
                
                <div class="related-products-slider swiper">
                    <div class="swiper-wrapper">
                        <?php 
                        $productModel = new Product();
                        foreach ($relatedProducts as $related): 
                            $img = $productModel->getPrimaryImage($related['id']);
                        ?>
                        <div class="swiper-slide">
                            <div class="luxury-product-card">
                                <div class="product-image-container">
                                    <a href="/product/<?= $related['slug'] ?>">
                                        <img src="<?= $img ?>" alt="<?= htmlspecialchars($related['name']) ?>" class="product-img">
                                    </a>
                                    <div class="product-actions">
                                        <button class="action-btn add-to-cart" data-product-id="<?= $related['id'] ?>" title="Add to Cart">
                                            <i class="fas fa-cart-plus"></i>
                                        </button>
                                        <a href="/product/<?= $related['slug'] ?>" class="action-btn" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="/product/<?= $related['slug'] ?>" class="product-title">
                                        <?= htmlspecialchars($related['name']) ?>
                                    </a>
                                    <div class="product-price-row">
                                        <span class="current-price">₹<?= number_format($related['selling_price']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<style>
/* Luxury Breadcrumb Section */
.luxury-breadcrumb-section {
    border-bottom: 1px solid rgba(201, 169, 98, 0.1);
}

.bg-light-cream {
    background: linear-gradient(180deg, #faf8f5 0%, #ffffff 100%);
}

.luxury-breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
}

.luxury-breadcrumb .breadcrumb-item a {
    color: #666;
    text-decoration: none;
    transition: all 0.3s ease;
}

.luxury-breadcrumb .breadcrumb-item a:hover {
    color: var(--gold);
}

.luxury-breadcrumb .breadcrumb-item.active {
    color: var(--dark-navy);
    font-weight: 500;
}

.luxury-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    color: var(--gold);
}

/* Product Gallery */
.product-gallery-wrapper {
    position: sticky;
    top: 100px;
}

.main-image-container {
    position: relative;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
}

.image-zoom-wrapper {
    padding: 30px;
}

.main-product-image {
    width: 100%;
    height: auto;
    max-height: 500px;
    object-fit: contain;
    transition: transform 0.5s ease;
}

.main-image-container:hover .main-product-image {
    transform: scale(1.05);
}

.product-detail-badges {
    position: absolute;
    top: 20px;
    left: 20px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.detail-badge {
    padding: 8px 16px;
    border-radius: 25px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.badge-new {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
}

.badge-featured {
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
    color: white;
}

.zoom-hint {
    position: absolute;
    bottom: 20px;
    right: 20px;
    width: 40px;
    height: 40px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--gold);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.thumbnail-gallery {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.thumbnail-item {
    width: 80px;
    height: 80px;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    border: 3px solid transparent;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.thumbnail-item:hover,
.thumbnail-item.active {
    border-color: var(--gold);
    box-shadow: 0 4px 15px rgba(201, 169, 98, 0.3);
}

.thumbnail-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Product Detail Info */
.product-detail-info {
    padding-left: 20px;
}

.product-detail-title {
    font-family: var(--font-heading);
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--dark-navy);
    line-height: 1.3;
    margin-bottom: 15px;
}

.product-meta {
    color: #666;
    font-size: 0.9rem;
}

.meta-item {
    background: #f8f9fa;
    padding: 6px 14px;
    border-radius: 25px;
}

.text-gold {
    color: var(--gold) !important;
}

/* Luxury Price Box */
.luxury-price-box {
    background: linear-gradient(135deg, #fdf8f0 0%, #fff9f0 100%);
    border: 1px solid rgba(201, 169, 98, 0.2);
    border-radius: 16px;
    padding: 20px 24px;
    margin: 20px 0;
}

.price-row {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 8px;
}

.mrp-label {
    color: #888;
    font-size: 0.9rem;
}

.mrp-value {
    color: #888;
    text-decoration: line-through;
    font-size: 1.1rem;
}

.discount-badge {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.selling-price-row {
    display: flex;
    align-items: center;
    gap: 12px;
}

.price-label {
    color: #666;
    font-size: 1rem;
}

.selling-price {
    font-size: 2rem;
    font-weight: 700;
    color: var(--gold-dark);
    font-family: var(--font-heading);
}

.tax-info {
    margin: 10px 0 0;
    font-size: 0.85rem;
    color: #666;
}

/* Short Description */
.product-short-desc {
    padding: 15px 0;
    border-bottom: 1px solid #eee;
    margin-bottom: 20px;
}

.product-short-desc p {
    color: #555;
    line-height: 1.7;
    margin: 0;
}

/* Quantity Selector */
.quantity-selector {
    display: flex;
    align-items: center;
    gap: 20px;
}

.qty-label {
    font-weight: 600;
    color: var(--dark-navy);
}

.qty-controls {
    display: flex;
    align-items: center;
    background: #f8f9fa;
    border-radius: 12px;
    overflow: hidden;
    border: 2px solid #e0e0e0;
}

.qty-btn {
    width: 44px;
    height: 44px;
    border: none;
    background: transparent;
    color: var(--dark-navy);
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.qty-btn:hover {
    background: var(--gold);
    color: white;
}

.qty-input {
    width: 60px;
    height: 44px;
    border: none;
    background: transparent;
    text-align: center;
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--dark-navy);
}

.qty-input:focus {
    outline: none;
}

/* Action Buttons */
.btn-luxury-gold {
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 16px 32px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(201, 169, 98, 0.3);
}

.btn-luxury-gold:hover {
    background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold) 100%);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(201, 169, 98, 0.4);
}

.btn-luxury-outline {
    background: transparent;
    color: var(--dark-navy);
    border: 2px solid var(--dark-navy);
    border-radius: 12px;
    padding: 14px 28px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.btn-luxury-outline:hover {
    background: var(--dark-navy);
    color: white;
    transform: translateY(-3px);
}

/* USP Features */
.product-usp-features {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
    margin: 30px 0;
    padding: 24px;
    background: #f8f9fa;
    border-radius: 16px;
}

.usp-item {
    display: flex;
    align-items: center;
    gap: 12px;
}

.usp-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.1rem;
    flex-shrink: 0;
}

.usp-content h6 {
    margin: 0;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--dark-navy);
}

.usp-content p {
    margin: 0;
    font-size: 0.8rem;
    color: #888;
}

/* Share & Wishlist */
.share-wishlist-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 20px;
    border-top: 1px solid #eee;
}

.share-section {
    display: flex;
    align-items: center;
    gap: 12px;
}

.share-label {
    font-weight: 500;
    color: #666;
}

.share-icons {
    display: flex;
    gap: 8px;
}

.share-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #666;
    text-decoration: none;
    transition: all 0.3s ease;
}

.share-icon:hover {
    background: var(--gold);
    color: white;
    transform: translateY(-3px);
}

.share-icon.whatsapp:hover {
    background: #25d366;
}

/* Luxury Tabs */
.luxury-tabs-wrapper {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.06);
    overflow: hidden;
}

.luxury-tabs {
    display: flex;
    background: #f8f9fa;
    padding: 0;
    margin: 0;
    border: none;
}

.luxury-tabs .nav-item {
    flex: 1;
}

.luxury-tabs .nav-link {
    width: 100%;
    padding: 18px 24px;
    border: none;
    border-radius: 0;
    background: transparent;
    color: #666;
    font-weight: 600;
    transition: all 0.3s ease;
    text-align: center;
}

.luxury-tabs .nav-link:hover {
    color: var(--gold);
}

.luxury-tabs .nav-link.active {
    background: white;
    color: var(--gold);
    box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
}

.luxury-tab-content {
    padding: 0;
}

.tab-inner-content {
    padding: 30px;
}

/* Specs Table */
.specs-table {
    width: 100%;
    border-collapse: collapse;
}

.specs-table tr {
    border-bottom: 1px solid #f0f0f0;
}

.specs-table tr:last-child {
    border-bottom: none;
}

.specs-table th,
.specs-table td {
    padding: 16px 20px;
    text-align: left;
}

.specs-table th {
    width: 40%;
    color: #666;
    font-weight: 500;
    background: #fafafa;
}

.specs-table td {
    color: var(--dark-navy);
    font-weight: 500;
}

/* Shipping Info */
.shipping-info h5 {
    font-size: 1.1rem;
    color: var(--dark-navy);
    margin-bottom: 15px;
}

.shipping-info ul {
    padding-left: 0;
    list-style: none;
}

.shipping-info ul li {
    padding: 8px 0;
    padding-left: 24px;
    position: relative;
    color: #555;
}

.shipping-info ul li::before {
    content: "✓";
    position: absolute;
    left: 0;
    color: var(--gold);
    font-weight: bold;
}

/* Related Products */
.section-badge {
    display: inline-block;
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
    color: white;
    padding: 6px 20px;
    border-radius: 25px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 12px;
}

.section-title {
    font-family: var(--font-heading);
    font-size: 2rem;
    color: var(--dark-navy);
    margin: 0;
}

.related-products-slider {
    padding: 20px 0 50px;
}

.related-products-slider .swiper-button-next,
.related-products-slider .swiper-button-prev {
    width: 50px;
    height: 50px;
    background: white;
    border-radius: 50%;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    color: var(--gold);
}

.related-products-slider .swiper-button-next::after,
.related-products-slider .swiper-button-prev::after {
    font-size: 1rem;
}

/* Luxury Product Card (from category page) */
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
    margin-bottom: 10px;
    transition: color 0.3s ease;
    line-height: 1.4;
}

.product-title:hover {
    color: var(--gold);
}

.product-price-row {
    display: flex;
    justify-content: center;
    align-items: center;
}

.current-price {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--gold-dark);
}

/* Responsive */
@media (max-width: 991px) {
    .product-gallery-wrapper {
        position: static;
        margin-bottom: 30px;
    }
    
    .product-detail-info {
        padding-left: 0;
    }
    
    .product-detail-title {
        font-size: 1.8rem;
    }
    
    .product-usp-features {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 576px) {
    .product-detail-title {
        font-size: 1.5rem;
    }
    
    .selling-price {
        font-size: 1.6rem;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .btn-luxury-gold,
    .btn-luxury-outline {
        width: 100%;
    }
    
    .luxury-tabs {
        flex-direction: column;
    }
    
    .thumbnail-item {
        width: 60px;
        height: 60px;
    }
}
</style>

<script>
document.querySelectorAll('.product-thumb').forEach(thumb => {
    thumb.addEventListener('click', function() {
        document.getElementById('mainProductImage').src = this.src;
        document.querySelectorAll('.thumbnail-item').forEach(t => t.classList.remove('active'));
        this.closest('.thumbnail-item').classList.add('active');
    });
});

document.querySelector('.qty-minus')?.addEventListener('click', function() {
    const input = document.querySelector('.qty-input');
    if (input.value > 1) input.value--;
});

document.querySelector('.qty-plus')?.addEventListener('click', function() {
    const input = document.querySelector('.qty-input');
    input.value++;
});

document.getElementById('addToCartForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const btn = this.querySelector('button[type="submit"]');
    const originalText = btn.innerHTML;
    
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Adding...';
    btn.disabled = true;
    
    fetch('/cart/add', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            btn.innerHTML = '<i class="fas fa-check me-2"></i>Added!';
            btn.classList.remove('btn-luxury-gold');
            btn.classList.add('btn-success');
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.classList.add('btn-luxury-gold');
                btn.classList.remove('btn-success');
                btn.disabled = false;
                location.reload();
            }, 1500);
        } else {
            btn.innerHTML = originalText;
            btn.disabled = false;
            alert('Failed to add product to cart');
        }
    })
    .catch(() => {
        btn.innerHTML = originalText;
        btn.disabled = false;
        alert('Something went wrong');
    });
});

document.addEventListener('DOMContentLoaded', function() {
    if (typeof Swiper !== 'undefined') {
        new Swiper('.related-products-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 4 }
            }
        });
    }
});
</script>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
