
<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="luxury-page-header py-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold text-white mb-3">All Segments</h1>
            <p class="lead text-white-50">Explore our premium product segments</p>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <?php if (!empty($segments)): foreach ($segments as $segment): ?>
            <div class="col-md-6 col-lg-4">
                <a href="/segment/<?= $segment['slug'] ?>" class="text-decoration-none">
                    <div class="segment-card bg-white rounded-4 p-4 text-center h-100 shadow-sm segment-hover">
                        <?php if ($segment['image_path']): ?>
                        <img src="<?= $segment['image_path'] ?>" alt="<?= htmlspecialchars($segment['name']) ?>" class="segment-img mb-3" style="max-height: 200px; object-fit: contain;">
                        <?php else: ?>
                        <div class="segment-placeholder mb-3"><i class="fas fa-th-large fa-3x text-gold"></i></div>
                        <?php endif; ?>
                        <h5 class="text-dark mb-2 fw-semibold"><?= htmlspecialchars($segment['name']) ?></h5>
                        <?php if ($segment['description']): ?>
                        <p class="text-muted small"><?= htmlspecialchars(substr(strip_tags($segment['description']), 0, 100)) ?>...</p>
                        <?php endif; ?>
                        <span class="btn btn-outline-primary btn-sm mt-2">View Products</span>
                    </div>
                </a>
            </div>
            <?php endforeach; else: ?>
            <div class="col-12">
                <p class="text-center text-muted">No segments found</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.luxury-page-header {
    background: linear-gradient(135deg, var(--dark-navy) 0%, #0d1a2d 100%);
}

.segment-hover {
    transition: all 0.3s ease;
}

.segment-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.segment-img {
    width: 100%;
    height: auto;
}

.segment-placeholder {
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
    border-radius: 12px;
}
</style>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
