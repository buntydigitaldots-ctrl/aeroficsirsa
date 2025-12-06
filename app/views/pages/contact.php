<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="page-header py-5 bg-gradient-primary text-white">
    <div class="container">
        <h1 class="display-5 fw-bold">Contact Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item active text-white">Contact</li>
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
            <div class="col-lg-4 mb-4">
                <div class="contact-info">
                    <div class="info-card bg-light rounded-4 p-4 mb-4">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-primary text-white rounded-circle p-3 me-3">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Address</h6>
                                <p class="mb-0 small">Near Jio-BP Petrol Pump, Dabwali Road, Sirsa-125055, Haryana, India</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-card bg-light rounded-4 p-4 mb-4">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-primary text-white rounded-circle p-3 me-3">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Phone</h6>
                                <p class="mb-0"><a href="tel:+919996100970" class="text-decoration-none">+91 99961 00970</a></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-card bg-light rounded-4 p-4 mb-4">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-primary text-white rounded-circle p-3 me-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Email</h6>
                                <p class="mb-0"><a href="mailto:info@arofic.com" class="text-decoration-none">info@arofic.com</a></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="social-links">
                        <h6 class="fw-bold mb-3">Follow Us</h6>
                        <a href="https://www.facebook.com/people/Arofic-Bathware/100063761630116/" target="_blank" class="btn btn-outline-primary me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/aroficbathware/" target="_blank" class="btn btn-outline-primary"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Send us a Message</h4>
                        <form action="/contact" method="post">
                            <input type="hidden" name="csrf_token" value="<?= CSRF::token() ?>">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Your Name *</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Subject *</label>
                                    <input type="text" name="subject" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Message *</label>
                                    <textarea name="message" class="form-control" rows="5" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="map-container rounded-4 overflow-hidden shadow">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.5!2d75.0!3d29.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sSirsa%2C%20Haryana!5e0!3m2!1sen!2sin!4v1" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
