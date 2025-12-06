<h1 class="h3 mb-4">Order Details</h1>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Order #<?= $order['order_number'] ?></span>
                <span class="badge bg-<?= $order['status'] === 'pending' ? 'warning' : ($order['status'] === 'completed' ? 'success' : ($order['status'] === 'cancelled' ? 'danger' : 'info')) ?>">
                    <?= ucfirst($order['status']) ?>
                </span>
            </div>
            <div class="card-body">
                <h6 class="text-muted mb-3">Order Items</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($orderItems)): foreach ($orderItems as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['product_name']) ?></td>
                                <td>₹<?= number_format($item['price'], 2) ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td class="text-end">₹<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                            </tr>
                            <?php endforeach; else: ?>
                            <tr><td colspan="4" class="text-center text-muted">No items found</td></tr>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Subtotal</th>
                                <th class="text-end">₹<?= number_format($order['subtotal'] ?? $order['total_amount'], 2) ?></th>
                            </tr>
                            <?php if (!empty($order['shipping_amount'])): ?>
                            <tr>
                                <td colspan="3">Shipping</td>
                                <td class="text-end">₹<?= number_format($order['shipping_amount'], 2) ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if (!empty($order['discount_amount'])): ?>
                            <tr>
                                <td colspan="3">Discount</td>
                                <td class="text-end text-success">-₹<?= number_format($order['discount_amount'], 2) ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr class="table-primary">
                                <th colspan="3">Total</th>
                                <th class="text-end">₹<?= number_format($order['total_amount'], 2) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header">Customer Details</div>
            <div class="card-body">
                <p class="mb-1"><strong>Name:</strong> <?= htmlspecialchars($order['customer_name'] ?? 'Guest') ?></p>
                <p class="mb-1"><strong>Email:</strong> <?= htmlspecialchars($order['customer_email'] ?? 'N/A') ?></p>
                <p class="mb-1"><strong>Phone:</strong> <?= htmlspecialchars($order['customer_phone'] ?? 'N/A') ?></p>
                <p class="mb-0"><strong>Date:</strong> <?= date('d M Y, h:i A', strtotime($order['created_at'])) ?></p>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header">Shipping Address</div>
            <div class="card-body">
                <p class="mb-0"><?= nl2br(htmlspecialchars($order['shipping_address'] ?? 'No address provided')) ?></p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header">Update Status</div>
            <div class="card-body">
                <form action="/admin/orders/<?= $order['id'] ?>/status" method="POST">
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                    <select name="status" class="form-select mb-3">
                        <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="processing" <?= $order['status'] === 'processing' ? 'selected' : '' ?>>Processing</option>
                        <option value="shipped" <?= $order['status'] === 'shipped' ? 'selected' : '' ?>>Shipped</option>
                        <option value="delivered" <?= $order['status'] === 'delivered' ? 'selected' : '' ?>>Delivered</option>
                        <option value="completed" <?= $order['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                        <option value="cancelled" <?= $order['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                    </select>
                    <button type="submit" class="btn btn-primary w-100">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mt-3">
    <a href="/admin/orders" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>Back to Orders</a>
</div>
