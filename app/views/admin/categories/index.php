<?php $pageTitle = 'Categories'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <p class="mb-0"><?= count($categories ?? []) ?> categories found</p>
    <a href="/admin/categories/create" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add Category</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Segment</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($categories)): ?>
                    <tr><td colspan="5" class="text-center py-4">No categories found</td></tr>
                    <?php else: ?>
                    <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($category['name']) ?></strong></td>
                        <td><?= htmlspecialchars($category['segment_name'] ?? '-') ?></td>
                        <td><code><?= htmlspecialchars($category['slug']) ?></code></td>
                        <td><span class="badge bg-<?= $category['is_active'] ? 'success' : 'secondary' ?>"><?= $category['is_active'] ? 'Active' : 'Inactive' ?></span></td>
                        <td>
                            <a href="/admin/categories/edit/<?= $category['id'] ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                            <form action="/admin/categories/delete/<?= $category['id'] ?>" method="post" class="d-inline" onsubmit="return confirm('Delete this category?')">
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
