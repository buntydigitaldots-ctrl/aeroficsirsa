<?php $pageTitle = 'Enquiries'; ?>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($queries)): ?>
                    <tr><td colspan="7" class="text-center py-4">No enquiries found</td></tr>
                    <?php else: ?>
                    <?php foreach ($queries as $query): ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($query['name']) ?></strong></td>
                        <td><?= htmlspecialchars($query['email']) ?></td>
                        <td><?= htmlspecialchars($query['subject'] ?? '-') ?></td>
                        <td><span class="badge bg-secondary"><?= ucfirst($query['type']) ?></span></td>
                        <td><span class="badge bg-<?= $query['status'] == 'new' ? 'danger' : ($query['status'] == 'replied' ? 'success' : 'warning') ?>"><?= ucfirst($query['status']) ?></span></td>
                        <td><?= date('d M Y', strtotime($query['created_at'])) ?></td>
                        <td>
                            <a href="/admin/enquiries/view/<?= $query['id'] ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
