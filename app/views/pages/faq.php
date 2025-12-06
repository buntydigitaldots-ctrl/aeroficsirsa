<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<section class="page-header py-5 bg-gradient-primary text-white">
    <div class="container">
        <h1 class="display-5 fw-bold">Frequently Asked Questions</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item active text-white">FAQ</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php if (!empty($faqs)): ?>
                <div class="accordion" id="faqAccordion">
                    <?php $i = 0; foreach ($faqs as $faq): $i++; ?>
                    <div class="accordion-item border-0 mb-3 rounded-3 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?= $i > 1 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?= $faq['id'] ?>">
                                <?= htmlspecialchars($faq['question']) ?>
                            </button>
                        </h2>
                        <div id="faq<?= $faq['id'] ?>" class="accordion-collapse collapse <?= $i == 1 ? 'show' : '' ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?= $faq['answer_html'] ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <div class="text-center py-5">
                    <p class="text-muted">No FAQs available at the moment.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h3 class="fw-bold mb-4">Still have questions?</h3>
                <p class="text-muted mb-4">Can't find the answer you're looking for? Please reach out to our customer support team.</p>
                <a href="/contact" class="btn btn-primary btn-lg rounded-pill px-5">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
