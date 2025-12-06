<?php $pageTitle = 'Dashboard'; ?>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="fw-bold"><?= $stats['products'] ?? 0 ?></h3>
                        <p class="mb-0">Products</p>
                    </div>
                    <i class="fas fa-box fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="fw-bold"><?= $stats['orders'] ?? 0 ?></h3>
                        <p class="mb-0">Orders</p>
                    </div>
                    <i class="fas fa-shopping-cart fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-dark">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="fw-bold"><?= $stats['users'] ?? 0 ?></h3>
                        <p class="mb-0">Customers</p>
                    </div>
                    <i class="fas fa-users fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="fw-bold"><?= $stats['enquiries'] ?? 0 ?></h3>
                        <p class="mb-0">Enquiries</p>
                    </div>
                    <i class="fas fa-envelope fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <h6 class="mb-0 fw-bold">Recent Orders</h6>
            </div>
            <div class="card-body">
                <?php if (empty($recentOrders)): ?>
                <p class="text-muted text-center py-4">No orders yet</p>
                <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recentOrders as $order): ?>
                        <tr>
                            <td><?= htmlspecialchars($order['order_number']) ?></td>
                            <td><?= htmlspecialchars($order['shipping_name']) ?></td>
                            <td>₹<?= number_format($order['total_amount'], 2) ?></td>
                            <td><span class="badge bg-<?= $order['status'] == 'delivered' ? 'success' : ($order['status'] == 'pending' ? 'warning' : 'info') ?>"><?= ucfirst($order['status']) ?></span></td>
                            <td><?= date('d M Y', strtotime($order['created_at'])) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-white">
                <h6 class="mb-0 fw-bold">Recent Enquiries</h6>
            </div>
            <div class="card-body">
                <?php if (empty($recentEnquiries)): ?>
                <p class="text-muted text-center py-4">No enquiries yet</p>
                <?php else: ?>
                <?php foreach ($recentEnquiries as $enquiry): ?>
                <div class="border-bottom pb-2 mb-2">
                    <strong><?= htmlspecialchars($enquiry['name']) ?></strong>
                    <p class="mb-0 small text-muted"><?= htmlspecialchars(substr($enquiry['message'], 0, 50)) ?>...</p>
                    <small class="text-muted"><?= date('d M', strtotime($enquiry['created_at'])) ?></small>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
