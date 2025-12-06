<?php $pageTitle = 'Products'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <p class="mb-0"><?= count($products ?? []) ?> products found</p>
    <a href="/admin/products/create" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add Product</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>MRP</th>
                        <th>Selling Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)): ?>
                    <tr><td colspan="7" class="text-center py-4">No products found</td></tr>
                    <?php else: ?>
                    <?php 
                    $productModel = new Product();
                    foreach ($products as $product): 
                        $img = $productModel->getPrimaryImage($product['id']);
                    ?>
                    <tr>
                        <td><img src="<?= $img ?>" alt="" style="width: 50px; height: 50px; object-fit: cover;" class="rounded"></td>
                        <td>
                            <strong><?= htmlspecialchars($product['name']) ?></strong>
                            <br><small class="text-muted">SKU: <?= htmlspecialchars($product['sku'] ?? '-') ?></small>
                        </td>
                        <td><?= htmlspecialchars($product['category_name'] ?? '-') ?></td>
                        <td>₹<?= number_format($product['mrp'], 2) ?></td>
                        <td>₹<?= number_format($product['selling_price'], 2) ?></td>
                        <td><span class="badge bg-<?= $product['status'] == 'active' ? 'success' : 'secondary' ?>"><?= ucfirst($product['status']) ?></span></td>
                        <td>
                            <a href="/admin/products/edit/<?= $product['id'] ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                            <form action="/admin/products/delete/<?= $product['id'] ?>" method="post" class="d-inline" onsubmit="return confirm('Delete this product?')">
                                <input type="hidden" name="csrf_token" value="<?= CSRF::token() ?>">
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
