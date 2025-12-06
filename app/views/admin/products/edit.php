
<?php $pageTitle = 'Edit Product'; ?>

<div class="mb-4">
    <a href="/admin/products" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>Back</a>
</div>

<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Edit Product</h5>
    </div>
    <div class="card-body">
        <form action="/admin/products/update/<?= $product['id'] ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= CSRF::token() ?>">
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Product Name *</label>
                    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($product['name']) ?>" required>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label class="form-label">Article Code</label>
                    <input type="text" name="article_code" class="form-control" value="<?= htmlspecialchars($product['article_code'] ?? '') ?>">
                </div>
                
                <div class="col-md-3 mb-3">
                    <label class="form-label">SKU</label>
                    <input type="text" name="sku" class="form-control" value="<?= htmlspecialchars($product['sku'] ?? '') ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Segment</label>
                    <select name="segment_id" class="form-select">
                        <option value="">-- Select Segment --</option>
                        <?php foreach ($segments as $segment): ?>
                        <option value="<?= $segment['id'] ?>" <?= $product['segment_id'] == $segment['id'] ? 'selected' : '' ?>><?= htmlspecialchars($segment['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select">
                        <option value="">-- Select Category --</option>
                        <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= $product['category_id'] == $category['id'] ? 'selected' : '' ?>><?= htmlspecialchars($category['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">MRP *</label>
                    <input type="number" name="mrp" class="form-control" step="0.01" value="<?= $product['mrp'] ?>" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label class="form-label">Selling Price *</label>
                    <input type="number" name="selling_price" class="form-control" step="0.01" value="<?= $product['selling_price'] ?>" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label class="form-label">Size/Dimensions</label>
                    <input type="text" name="size_text" class="form-control" value="<?= htmlspecialchars($product['size_text'] ?? '') ?>">
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="short_description" class="form-control" rows="3"><?= htmlspecialchars($product['short_description'] ?? '') ?></textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Long Description</label>
                <textarea name="long_description" class="form-control" rows="6"><?= htmlspecialchars($product['long_description'] ?? '') ?></textarea>
            </div>
            
            <?php if (!empty($images)): ?>
            <div class="mb-3">
                <label class="form-label">Current Images</label>
                <div class="row g-2">
                    <?php foreach ($images as $img): ?>
                    <div class="col-auto">
                        <img src="<?= $img['image_path'] ?>" alt="" style="height: 100px; width: 100px; object-fit: cover;" class="rounded">
                        <?php if ($img['is_primary']): ?>
                        <small class="d-block text-center badge bg-success">Primary</small>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="mb-3">
                <label class="form-label">Add More Images</label>
                <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="<?= htmlspecialchars($product['meta_title'] ?? '') ?>">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?= $product['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= $product['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                        <option value="out_of_stock" <?= $product['status'] == 'out_of_stock' ? 'selected' : '' ?>>Out of Stock</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="2"><?= htmlspecialchars($product['meta_description'] ?? '') ?></textarea>
            </div>
            
            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="is_featured" class="form-check-input" id="is_featured" <?= $product['is_featured'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="is_featured">Featured Product</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="is_new" class="form-check-input" id="is_new" <?= $product['is_new'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="is_new">New Arrival</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="show_on_home" class="form-check-input" id="show_on_home" <?= $product['show_on_home'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="show_on_home">Show on Home Page</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</div>
