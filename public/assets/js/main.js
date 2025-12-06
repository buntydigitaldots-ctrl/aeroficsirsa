document.addEventListener('DOMContentLoaded', function() {
    const heroSwiper = new Swiper('.hero-swiper', {
        loop: true,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        speed: 1000
    });

    const categoriesSwiper = new Swiper('.categories-swiper', {
        slidesPerView: 2,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        breakpoints: {
            480: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 5,
            },
            1200: {
                slidesPerView: 6,
            },
        }
    });

    const productsSwiper = new Swiper('.products-swiper', {
        slidesPerView: 1,
        spaceBetween: 25,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        breakpoints: {
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
        }
    });

    const testimonialsSwiper = new Swiper('.testimonials-swiper', {
        slidesPerView: 1,
        spaceBetween: 25,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.dataset.productId;
            const btn = this;
            
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            
            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `product_id=${productId}&quantity=1`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('cartCount').textContent = data.cartCount;
                    showToast('Product added to cart!', 'success');
                    btn.innerHTML = '<i class="fas fa-check"></i>';
                    setTimeout(() => {
                        btn.innerHTML = '<i class="fas fa-cart-plus"></i>';
                        btn.disabled = false;
                    }, 2000);
                } else {
                    showToast('Failed to add product', 'error');
                    btn.innerHTML = '<i class="fas fa-cart-plus"></i>';
                    btn.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred', 'error');
                btn.innerHTML = '<i class="fas fa-cart-plus"></i>';
                btn.disabled = false;
            });
        });
    });

    function showToast(message, type = 'success') {
        const bgClass = type === 'success' ? 'bg-success' : 'bg-danger';
        const toast = document.createElement('div');
        toast.className = 'position-fixed bottom-0 end-0 p-3';
        toast.style.zIndex = '9999';
        toast.innerHTML = `
            <div class="toast show align-items-center text-white ${bgClass} border-0 shadow-lg" role="alert" style="border-radius: 15px;">
                <div class="d-flex">
                    <div class="toast-body d-flex align-items-center gap-2">
                        <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        `;
        document.body.appendChild(toast);
        
        toast.querySelector('.toast').style.animation = 'slideIn 0.3s ease';
        
        setTimeout(() => {
            toast.querySelector('.toast').style.animation = 'slideOut 0.3s ease';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        gsap.utils.toArray('.scroll-reveal').forEach(elem => {
            gsap.fromTo(elem, 
                { opacity: 0, y: 50 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: elem,
                        start: 'top 85%',
                        toggleActions: 'play none none none'
                    }
                }
            );
        });

        gsap.utils.toArray('.counter').forEach(counter => {
            const text = counter.textContent.replace(/[^0-9]/g, '');
            const target = parseInt(text) || 0;
            const suffix = counter.textContent.replace(/[0-9,]/g, '');
            
            if (target > 0) {
                ScrollTrigger.create({
                    trigger: counter,
                    start: 'top 85%',
                    onEnter: () => {
                        gsap.fromTo(counter, 
                            { textContent: 0 },
                            {
                                textContent: target,
                                duration: 2,
                                ease: 'power2.out',
                                snap: { textContent: 1 },
                                onUpdate: function() {
                                    counter.textContent = Math.floor(counter.textContent).toLocaleString() + suffix;
                                }
                            }
                        );
                    },
                    once: true
                });
            }
        });
    }

    const quantityInputs = document.querySelectorAll('.quantity-selector');
    quantityInputs.forEach(selector => {
        const minusBtn = selector.querySelector('.qty-minus');
        const plusBtn = selector.querySelector('.qty-plus');
        const input = selector.querySelector('input');
        
        if (minusBtn && plusBtn && input) {
            minusBtn.addEventListener('click', () => {
                const value = parseInt(input.value) || 1;
                if (value > 1) {
                    input.value = value - 1;
                    input.dispatchEvent(new Event('change'));
                }
            });
            
            plusBtn.addEventListener('click', () => {
                const value = parseInt(input.value) || 1;
                const max = parseInt(input.max) || 999;
                if (value < max) {
                    input.value = value + 1;
                    input.dispatchEvent(new Event('change'));
                }
            });
        }
    });

    const thumbImages = document.querySelectorAll('.thumb-images img');
    const mainImage = document.querySelector('.main-image');
    
    if (thumbImages.length && mainImage) {
        thumbImages.forEach(thumb => {
            thumb.addEventListener('click', function() {
                thumbImages.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                mainImage.style.opacity = '0';
                setTimeout(() => {
                    mainImage.src = this.src;
                    mainImage.style.opacity = '1';
                }, 200);
            });
        });
    }

    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
});
