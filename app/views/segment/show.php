<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="page-header py-5 bg-gradient-primary text-white">
    <div class="container">
        <h1 class="display-5 fw-bold"><?= htmlspecialchars($segment['name']) ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item active text-white"><?= htmlspecialchars($segment['name']) ?></li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <?php if ($segment['description']): ?>
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <p class="lead text-muted"><?= htmlspecialchars($segment['description']) ?></p>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if (!empty($categories)): ?>
        <div class="mb-5">
            <h3 class="fw-bold mb-4">Categories in <?= htmlspecialchars($segment['name']) ?></h3>
            <div class="row g-4">
                <?php foreach ($categories as $cat): ?>
                <div class="col-md-4 col-lg-3">
                    <a href="/category/<?= $cat['slug'] ?>" class="text-decoration-none">
                        <div class="category-card bg-light rounded-4 p-4 text-center h-100 shadow-sm category-hover">
                            <?php if ($cat['image_path']): ?>
                            <img src="<?= $cat['image_path'] ?>" alt="<?= htmlspecialchars($cat['name']) ?>" class="category-img mb-3">
                            <?php else: ?>
                            <div class="category-placeholder mb-3"><i class="fas fa-image fa-3x text-muted"></i></div>
                            <?php endif; ?>
                            <h6 class="text-dark mb-0"><?= htmlspecialchars($cat['name']) ?></h6>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        
        <h3 class="fw-bold mb-4">All Products</h3>
        
        <?php if (empty($products)): ?>
        <div class="text-center py-5">
            <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
            <h4>No products found</h4>
            <p class="text-muted">Check back soon for new products in this category.</p>
        </div>
        <?php else: ?>
        <div class="row g-4">
            <?php 
            $productModel = new Product();
            foreach ($products as $product): 
                $img = $productModel->getPrimaryImage($product['id']);
            ?>
            <div class="col-md-4 col-lg-3">
                <div class="product-card card h-100 border-0 shadow-sm product-hover">
                    <div class="product-image-wrapper">
                        <img src="<?= $img ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="card-img-top product-image">
                        <?php if ($product['is_new']): ?>
                        <span class="badge bg-success position-absolute top-0 start-0 m-2">New</span>
                        <?php endif; ?>
                        <div class="product-overlay">
                            <a href="/product/<?= $product['slug'] ?>" class="btn btn-white btn-sm">View Details</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title"><?= htmlspecialchars($product['name']) ?></h6>
                        <p class="text-muted small mb-2"><?= htmlspecialchars($product['size_text']) ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <?php if ($product['mrp'] > $product['selling_price']): ?>
                                <span class="text-muted text-decoration-line-through small">₹<?= number_format($product['mrp']) ?></span>
                                <?php endif; ?>
                                <span class="fw-bold text-primary">₹<?= number_format($product['selling_price']) ?></span>
                            </div>
                            <button class="btn btn-primary btn-sm add-to-cart" data-product-id="<?= $product['id'] ?>">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
