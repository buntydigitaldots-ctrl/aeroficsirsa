<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="page-header py-5 bg-gradient-primary text-white">
    <div class="container">
        <h1 class="display-5 fw-bold">Project Gallery</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item active text-white">Gallery</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <?php if (empty($items)): ?>
        <div class="text-center py-5">
            <i class="fas fa-images fa-4x text-muted mb-3"></i>
            <h4>No gallery items yet</h4>
            <p class="text-muted">Check back soon for project photos.</p>
        </div>
        <?php else: ?>
        <div class="row g-4">
            <?php foreach ($items as $item): ?>
            <div class="col-md-4 col-lg-3">
                <div class="gallery-item">
                    <a href="<?= $item['image_path'] ?>" data-lightbox="gallery" data-title="<?= htmlspecialchars($item['title']) ?>">
                        <img src="<?= $item['image_path'] ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="img-fluid rounded-4 shadow-sm gallery-image">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </a>
                    <?php if ($item['title']): ?>
                    <h6 class="mt-2 text-center"><?= htmlspecialchars($item['title']) ?></h6>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<style>
.gallery-item {
    position: relative;
    overflow: hidden;
}
.gallery-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s;
}
.gallery-item:hover .gallery-image {
    transform: scale(1.05);
}
.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
    border-radius: 1rem;
}
.gallery-item:hover .gallery-overlay {
    opacity: 1;
}
.gallery-overlay i {
    color: white;
    font-size: 2rem;
}
</style>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
