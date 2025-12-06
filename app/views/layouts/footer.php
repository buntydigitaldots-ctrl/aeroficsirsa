    <footer class="footer py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <img src="/assets/images/logo.png" alt="Aerofic Bathware" class="footer-brand bg-white p-3 rounded-3 mb-4">
                    <p class="text-white-50 mb-4" style="line-height: 1.8;">Premium quality bath fittings, sanitaryware, pipes, fittings, and water storage tanks. Transforming bathrooms into luxurious spaces since 1995.</p>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/people/Aerofic-Bathware/100063761630116/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/aeroficbathware/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@aeroficbathware" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="https://twitter.com/aeroficbathware" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/company/aerofic" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="/"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="/about"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="/gallery"><i class="fas fa-chevron-right"></i> Gallery</a></li>
                        <li><a href="/faq"><i class="fas fa-chevron-right"></i> FAQs</a></li>
                        <li><a href="/contact"><i class="fas fa-chevron-right"></i> Contact</a></li>
                        <li><a href="/dealer-enquiry"><i class="fas fa-chevron-right"></i> Become Dealer</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5>Product Range</h5>
                    <ul class="footer-links">
                        <li><a href="/segment/bath-fittings"><i class="fas fa-chevron-right"></i> Bath Fittings</a></li>
                        <li><a href="/segment/sanitaryware"><i class="fas fa-chevron-right"></i> Sanitaryware</a></li>
                        <li><a href="/segment/pipes-fittings"><i class="fas fa-chevron-right"></i> Pipes & Fittings</a></li>
                        <li><a href="/segment/water-tanks"><i class="fas fa-chevron-right"></i> Water Tanks</a></li>
                        <li><a href="/segment/designer-collection"><i class="fas fa-chevron-right"></i> Designer Collection</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5>Contact Us</h5>
                    <div class="footer-contact">
                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Near Jio-BP Petrol Pump, Dabwali Road, Sirsa-125055, Haryana, India</span>
                        </p>
                        <p>
                            <i class="fas fa-phone"></i>
                            <a href="tel:+919996100970" class="text-white-50 text-decoration-none">+91 99961 00970</a>
                        </p>
                        <p>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:info@aerofic.com" class="text-white-50 text-decoration-none">info@aerofic.com</a>
                        </p>
                        <p>
                            <i class="fas fa-clock"></i>
                            <span>Mon - Sat: 9:00 AM - 7:00 PM</span>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-center text-lg-start mb-3 mb-lg-0">
                        <p>&copy; <?= date('Y') ?> Aerofic Bathware. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 text-center text-lg-end">
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-end gap-4">
                            <a href="/privacy-policy" class="text-white-50 text-decoration-none small">Privacy Policy</a>
                            <a href="/terms" class="text-white-50 text-decoration-none small">Terms of Service</a>
                            <a href="/sitemap" class="text-white-50 text-decoration-none small">Sitemap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <div class="whatsapp-float">
        <a href="https://wa.me/919996100970?text=Hello%20Aerofic!%20I%20am%20interested%20in%20your%20products." target="_blank" rel="noopener noreferrer" title="Chat with us on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });
        
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.getElementById('mainHeader');
            if (header) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 100) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }
                });
            }
            
            document.querySelectorAll('.scroll-reveal').forEach(function(el) {
                const observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('revealed');
                        }
                    });
                }, { threshold: 0.1 });
                observer.observe(el);
            });
        });
    </script>
    <script src="/assets/js/main.js"></script>
</body>
</html>
