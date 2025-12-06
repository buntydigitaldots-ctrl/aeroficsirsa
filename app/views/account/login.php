<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="py-5 bg-light min-vh-75 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold">Welcome Back</h3>
                            <p class="text-muted">Sign in to your account</p>
                        </div>
                        
                        <?php if (Session::hasFlash('error')): ?>
                        <div class="alert alert-danger"><?= Session::flash('error') ?></div>
                        <?php endif; ?>
                        <?php if (Session::hasFlash('success')): ?>
                        <div class="alert alert-success"><?= Session::flash('success') ?></div>
                        <?php endif; ?>
                        
                        <form action="/login" method="post">
                            <input type="hidden" name="csrf_token" value="<?= CSRF::token() ?>">
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control form-control-lg" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill">Sign In</button>
                        </form>
                        
                        <div class="text-center mt-4">
                            <p class="mb-0">Don't have an account? <a href="/register" class="text-primary">Create Account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
