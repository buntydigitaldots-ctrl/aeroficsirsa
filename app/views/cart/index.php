<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="py-5">
    <div class="container">
        <h1 class="fw-bold mb-4">Shopping Cart</h1>
        
        <?php if (empty($cartItems)): ?>
        <div class="text-center py-5">
            <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
            <h4>Your cart is empty</h4>
            <p class="text-muted">Add some products to your cart to get started.</p>
            <a href="/" class="btn btn-primary rounded-pill px-5">Continue Shopping</a>
        </div>
        <?php else: ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cartItems as $item): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= $item['image'] ?? '/assets/images/placeholder.jpg' ?>" alt="" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                            <div>
                                                <h6 class="mb-0"><?= htmlspecialchars($item['name']) ?></h6>
                                                <small class="text-muted"><?= htmlspecialchars($item['size_text'] ?? '') ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>₹<?= number_format($item['price'], 2) ?></td>
                                    <td>
                                        <form class="update-cart-form d-flex align-items-center" style="width: 120px;">
                                            <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                                            <input type="hidden" name="csrf_token" value="<?= CSRF::token() ?>">
                                            <button type="button" class="btn btn-sm btn-outline-secondary qty-minus-cart">-</button>
                                            <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" class="form-control form-control-sm text-center mx-1">
                                            <button type="button" class="btn btn-sm btn-outline-secondary qty-plus-cart">+</button>
                                        </form>
                                    </td>
                                    <td class="fw-bold">₹<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                                    <td>
                                        <form action="/cart/remove" method="post" class="d-inline">
                                            <input type="hidden" name="csrf_token" value="<?= CSRF::token() ?>">
                                            <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-4">Order Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>₹<?= number_format($subtotal, 2) ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping</span>
                            <span><?= $subtotal >= 5000 ? 'FREE' : '₹200.00' ?></span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold fs-5 text-primary">₹<?= number_format($total, 2) ?></span>
                        </div>
                        <a href="/checkout" class="btn btn-primary w-100 btn-lg rounded-pill">Proceed to Checkout</a>
                        <a href="/" class="btn btn-outline-secondary w-100 mt-2">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
document.querySelectorAll('.qty-minus-cart').forEach(btn => {
    btn.addEventListener('click', function() {
        const form = this.closest('form');
        const input = form.querySelector('input[name="quantity"]');
        if (input.value > 1) {
            input.value--;
            updateCart(form);
        }
    });
});

document.querySelectorAll('.qty-plus-cart').forEach(btn => {
    btn.addEventListener('click', function() {
        const form = this.closest('form');
        const input = form.querySelector('input[name="quantity"]');
        input.value++;
        updateCart(form);
    });
});

function updateCart(form) {
    const formData = new FormData(form);
    fetch('/cart/update', {
        method: 'POST',
        body: formData
    }).then(() => location.reload());
}
</script>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
