
<?php $pageTitle = 'Add Category'; ?>

<div class="mb-4">
    <a href="/admin/categories" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>Back</a>
</div>

<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Add New Category</h5>
    </div>
    <div class="card-body">
        <form action="/admin/categories/store" method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= CSRF::token() ?>">
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category Name *</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Segment</label>
                    <select name="segment_id" class="form-select">
                        <option value="">-- Select Segment --</option>
                        <?php foreach ($segments as $segment): ?>
                        <option value="<?= $segment['id'] ?>"><?= htmlspecialchars($segment['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Category Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="0">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="2"></textarea>
            </div>
            
            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="show_in_menu" class="form-check-input" id="show_in_menu" checked>
                    <label class="form-check-label" for="show_in_menu">Show in Menu</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="show_on_home" class="form-check-input" id="show_on_home">
                    <label class="form-check-label" for="show_on_home">Show on Home Page</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
</div>
