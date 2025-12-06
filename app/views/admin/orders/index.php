<?php $pageTitle = 'Orders'; ?>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($orders)): ?>
                    <tr><td colspan="7" class="text-center py-4">No orders found</td></tr>
                    <?php else: ?>
                    <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($order['order_number']) ?></strong></td>
                        <td>
                            <?= htmlspecialchars($order['shipping_name']) ?>
                            <br><small class="text-muted"><?= htmlspecialchars($order['shipping_phone']) ?></small>
                        </td>
                        <td>₹<?= number_format($order['total_amount'], 2) ?></td>
                        <td><span class="badge bg-<?= $order['payment_status'] == 'paid' ? 'success' : 'warning' ?>"><?= ucfirst($order['payment_status']) ?></span></td>
                        <td><span class="badge bg-<?= $order['status'] == 'delivered' ? 'success' : ($order['status'] == 'pending' ? 'warning' : 'info') ?>"><?= ucfirst($order['status']) ?></span></td>
                        <td><?= date('d M Y', strtotime($order['created_at'])) ?></td>
                        <td>
                            <a href="/admin/orders/view/<?= $order['id'] ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
