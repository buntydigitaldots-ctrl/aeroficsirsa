
<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="luxury-page-header py-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold text-white mb-3">All Categories</h1>
            <p class="lead text-white-50">Browse our complete range of bathroom products</p>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <?php if (!empty($categories)): foreach ($categories as $category): ?>
            <div class="col-md-6 col-lg-4">
                <a href="/category/<?= $category['slug'] ?>" class="text-decoration-none">
                    <div class="category-card bg-white rounded-4 p-4 text-center h-100 shadow-sm category-hover">
                        <?php if ($category['image_path']): ?>
                        <img src="<?= $category['image_path'] ?>" alt="<?= htmlspecialchars($category['name']) ?>" class="category-img mb-3" style="max-height: 200px; object-fit: contain;">
                        <?php else: ?>
                        <div class="category-placeholder mb-3"><i class="fas fa-image fa-3x text-gold"></i></div>
                        <?php endif; ?>
                        <h5 class="text-dark mb-2 fw-semibold"><?= htmlspecialchars($category['name']) ?></h5>
                        <?php if ($category['description']): ?>
                        <p class="text-muted small"><?= htmlspecialchars(substr(strip_tags($category['description']), 0, 100)) ?>...</p>
                        <?php endif; ?>
                        <span class="btn btn-outline-primary btn-sm mt-2">View Products</span>
                    </div>
                </a>
            </div>
            <?php endforeach; else: ?>
            <div class="col-12">
                <p class="text-center text-muted">No categories found</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.luxury-page-header {
    background: linear-gradient(135deg, var(--dark-navy) 0%, #0d1a2d 100%);
}

.category-hover {
    transition: all 0.3s ease;
}

.category-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.category-img {
    width: 100%;
    height: auto;
}

.category-placeholder {
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
    border-radius: 12px;
}
</style>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
