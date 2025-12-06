<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <div class="avatar bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-user fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-0"><?= htmlspecialchars($user['name']) ?></h5>
                            <small class="text-muted"><?= htmlspecialchars($user['email']) ?></small>
                        </div>
                        <hr>
                        <nav class="nav flex-column">
                            <a href="/account" class="nav-link <?= !isset($_GET['section']) ? 'active fw-bold' : '' ?>"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                            <a href="/account/orders" class="nav-link"><i class="fas fa-box me-2"></i>My Orders</a>
                            <a href="/logout" class="nav-link text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-9">
                <h4 class="fw-bold mb-4">Dashboard</h4>
                
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="fw-bold"><?= $orderCount ?? 0 ?></h3>
                                        <p class="mb-0">Total Orders</p>
                                    </div>
                                    <i class="fas fa-shopping-bag fa-3x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="fw-bold"><?= $deliveredCount ?? 0 ?></h3>
                                        <p class="mb-0">Delivered</p>
                                    </div>
                                    <i class="fas fa-check-circle fa-3x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm bg-warning text-dark">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="fw-bold"><?= $pendingCount ?? 0 ?></h3>
                                        <p class="mb-0">Pending</p>
                                    </div>
                                    <i class="fas fa-clock fa-3x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold">Recent Orders</h5>
                    </div>
                    <div class="card-body">
                        <?php if (empty($recentOrders)): ?>
                        <div class="text-center py-4">
                            <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No orders yet</p>
                            <a href="/" class="btn btn-primary rounded-pill">Start Shopping</a>
                        </div>
                        <?php else: ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentOrders as $order): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($order['order_number']) ?></td>
                                        <td><?= date('d M Y', strtotime($order['created_at'])) ?></td>
                                        <td>₹<?= number_format($order['total_amount'], 2) ?></td>
                                        <td><span class="badge bg-<?= $order['status'] == 'delivered' ? 'success' : ($order['status'] == 'pending' ? 'warning' : 'info') ?>"><?= ucfirst($order['status']) ?></span></td>
                                        <td><a href="/account/order/<?= $order['id'] ?>" class="btn btn-sm btn-outline-primary">View</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
