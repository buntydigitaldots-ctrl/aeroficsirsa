<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="py-5 bg-light">
    <div class="container">
        <h1 class="fw-bold mb-4">Checkout</h1>
        
        <form action="/checkout" method="post" id="checkoutForm">
            <input type="hidden" name="csrf_token" value="<?= CSRF::token() ?>">
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-4">Shipping Information</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" name="shipping_name" class="form-control" required value="<?= htmlspecialchars($user['name'] ?? '') ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number *</label>
                                    <input type="tel" name="shipping_phone" class="form-control" required value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Address *</label>
                                    <textarea name="shipping_address" class="form-control" rows="3" required></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">City *</label>
                                    <input type="text" name="shipping_city" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">State *</label>
                                    <input type="text" name="shipping_state" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">PIN Code *</label>
                                    <input type="text" name="shipping_pincode" class="form-control" required pattern="[0-9]{6}">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-4">Billing Information</h5>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="sameAsShipping" checked>
                                <label class="form-check-label" for="sameAsShipping">Same as shipping address</label>
                            </div>
                            <div id="billingFields" style="display: none;">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="billing_name" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="tel" name="billing_phone" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Address</label>
                                        <textarea name="billing_address" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold mb-4">Order Notes (Optional)</h5>
                            <textarea name="notes" class="form-control" rows="3" placeholder="Any special instructions for your order..."></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm sticky-top" style="top: 100px;">
                        <div class="card-body">
                            <h5 class="fw-bold mb-4">Order Summary</h5>
                            
                            <?php foreach ($cartItems as $item): ?>
                            <div class="d-flex justify-content-between mb-2">
                                <span><?= htmlspecialchars($item['name']) ?> x <?= $item['quantity'] ?></span>
                                <span>₹<?= number_format($item['price'] * $item['quantity'], 2) ?></span>
                            </div>
                            <?php endforeach; ?>
                            
                            <hr>
                            
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span>₹<?= number_format($subtotal, 2) ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tax (18% GST)</span>
                                <span>₹<?= number_format($tax, 2) ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping</span>
                                <span><?= $shipping == 0 ? 'FREE' : '₹' . number_format($shipping, 2) ?></span>
                            </div>
                            
                            <hr>
                            
                            <div class="d-flex justify-content-between mb-4">
                                <span class="fw-bold fs-5">Total</span>
                                <span class="fw-bold fs-5 text-primary">₹<?= number_format($total, 2) ?></span>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill">
                                <i class="fas fa-lock me-2"></i>Place Order
                            </button>
                            
                            <p class="text-muted small text-center mt-3">
                                <i class="fas fa-shield-alt me-1"></i>Secure checkout with Razorpay
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
document.getElementById('sameAsShipping').addEventListener('change', function() {
    document.getElementById('billingFields').style.display = this.checked ? 'none' : 'block';
});
</script>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
