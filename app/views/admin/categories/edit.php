
<?php $pageTitle = 'Edit Category'; ?>

<div class="mb-4">
    <a href="/admin/categories" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>Back</a>
</div>

<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Edit Category</h5>
    </div>
    <div class="card-body">
        <form action="/admin/categories/update/<?= $category['id'] ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= CSRF::token() ?>">
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category Name *</label>
                    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($category['name']) ?>" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Segment</label>
                    <select name="segment_id" class="form-select">
                        <option value="">-- Select Segment --</option>
                        <?php foreach ($segments as $segment): ?>
                        <option value="<?= $segment['id'] ?>" <?= $category['segment_id'] == $segment['id'] ? 'selected' : '' ?>><?= htmlspecialchars($segment['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($category['description'] ?? '') ?></textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Category Image</label>
                <?php if ($category['image_path']): ?>
                <div class="mb-2">
                    <img src="<?= $category['image_path'] ?>" alt="" style="max-height: 100px;">
                </div>
                <?php endif; ?>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="<?= $category['sort_order'] ?>">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="<?= htmlspecialchars($category['meta_title'] ?? '') ?>">
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="2"><?= htmlspecialchars($category['meta_description'] ?? '') ?></textarea>
            </div>
            
            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="show_in_menu" class="form-check-input" id="show_in_menu" <?= $category['show_in_menu'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="show_in_menu">Show in Menu</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="show_on_home" class="form-check-input" id="show_on_home" <?= $category['show_on_home'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="show_on_home">Show on Home Page</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" <?= $category['is_active'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
</div>
