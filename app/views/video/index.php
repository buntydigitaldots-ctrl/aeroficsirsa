<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="page-header py-5 bg-gradient-primary text-white">
    <div class="container">
        <h1 class="display-5 fw-bold">Videos</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item active text-white">Videos</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <?php if (empty($videos)): ?>
        <div class="text-center py-5">
            <i class="fas fa-video fa-4x text-muted mb-3"></i>
            <h4>No videos yet</h4>
            <p class="text-muted">Check back soon for product videos.</p>
        </div>
        <?php else: ?>
        <div class="row g-4">
            <?php foreach ($videos as $video): ?>
            <div class="col-md-6 col-lg-4">
                <div class="video-card card border-0 shadow-sm h-100">
                    <div class="video-thumbnail position-relative">
                        <?php if ($video['video_type'] == 'youtube' && $video['video_url']): 
                            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video['video_url'], $matches);
                            $youtubeId = $matches[1] ?? '';
                        ?>
                        <img src="https://img.youtube.com/vi/<?= $youtubeId ?>/maxresdefault.jpg" alt="<?= htmlspecialchars($video['title']) ?>" class="card-img-top video-thumb">
                        <a href="<?= $video['video_url'] ?>" target="_blank" class="video-play-btn">
                            <i class="fas fa-play"></i>
                        </a>
                        <?php elseif ($video['thumbnail_path']): ?>
                        <img src="<?= $video['thumbnail_path'] ?>" alt="<?= htmlspecialchars($video['title']) ?>" class="card-img-top video-thumb">
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($video['title']) ?></h5>
                        <?php if ($video['description']): ?>
                        <p class="card-text text-muted small"><?= htmlspecialchars(substr($video['description'], 0, 100)) ?>...</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<style>
.video-thumb {
    height: 200px;
    object-fit: cover;
}
.video-thumbnail {
    position: relative;
}
.video-play-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    background: rgba(255,255,255,0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s;
}
.video-play-btn i {
    color: var(--bs-primary);
    font-size: 1.5rem;
    margin-left: 5px;
}
.video-play-btn:hover {
    background: var(--bs-primary);
}
.video-play-btn:hover i {
    color: white;
}
</style>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
