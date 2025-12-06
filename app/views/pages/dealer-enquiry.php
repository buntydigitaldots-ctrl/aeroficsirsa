<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="page-header py-5 bg-gradient-primary text-white">
    <div class="container">
        <h1 class="display-5 fw-bold">Become a Dealer</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item active text-white">Dealer Enquiry</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <?php if (Session::hasFlash('success')): ?>
        <div class="alert alert-success"><?= Session::flash('success') ?></div>
        <?php endif; ?>
        <?php if (Session::hasFlash('error')): ?>
        <div class="alert alert-danger"><?= Session::flash('error') ?></div>
        <?php endif; ?>
        
        <div class="row">
            <div class="col-lg-5 mb-4">
                <h2 class="fw-bold mb-4">Partner With Arofic</h2>
                <p class="lead mb-4">Join our network of 200+ channel partners across India and grow your business with quality products.</p>
                
                <div class="benefits">
                    <div class="d-flex mb-3">
                        <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Premium Quality Products</h6>
                            <p class="text-muted small mb-0">Access to our complete range of bathware products</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Competitive Margins</h6>
                            <p class="text-muted small mb-0">Attractive dealer margins and pricing</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Marketing Support</h6>
                            <p class="text-muted small mb-0">POS materials, catalogues, and promotional support</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Training & Support</h6>
                            <p class="text-muted small mb-0">Product training and dedicated relationship manager</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Dealer Application Form</h4>
                        <form action="/dealer-enquiry" method="post">
                            <input type="hidden" name="csrf_token" value="<?= CSRF::token() ?>">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Your Name *</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Company Name *</label>
                                    <input type="text" name="company_name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number *</label>
                                    <input type="tel" name="phone" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Business Address *</label>
                                    <textarea name="address" class="form-control" rows="2" required></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">City *</label>
                                    <input type="text" name="city" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">State *</label>
                                    <input type="text" name="state" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">PIN Code *</label>
                                    <input type="text" name="pincode" class="form-control" required pattern="[0-9]{6}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">GST Number</label>
                                    <input type="text" name="gst_number" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">PAN Number</label>
                                    <input type="text" name="pan_number" class="form-control">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">Submit Application</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
