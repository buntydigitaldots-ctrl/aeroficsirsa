<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="success-icon mb-4">
                    <i class="fas fa-check-circle text-success fa-5x"></i>
                </div>
                <h1 class="fw-bold mb-3">Order Placed Successfully!</h1>
                <p class="lead text-muted mb-4">Thank you for your order. We'll send you a confirmation email shortly.</p>
                
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Order Details</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Order Number:</span>
                            <span class="fw-bold"><?= htmlspecialchars($order['order_number']) ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Order Date:</span>
                            <span><?= date('d M Y', strtotime($order['created_at'])) ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Amount:</span>
                            <span class="fw-bold text-primary">₹<?= number_format($order['total_amount'], 2) ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Payment Status:</span>
                            <span class="badge bg-<?= $order['payment_status'] == 'paid' ? 'success' : 'warning' ?>"><?= ucfirst($order['payment_status']) ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-center gap-3">
                    <a href="/" class="btn btn-primary rounded-pill px-4">Continue Shopping</a>
                    <?php if (Auth::check()): ?>
                    <a href="/account/orders" class="btn btn-outline-primary rounded-pill px-4">View Orders</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
