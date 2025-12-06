<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/razorpay.php';
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/../core/Session.php';
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../core/CSRF.php';
require_once __DIR__ . '/../core/Validator.php';

foreach (glob(__DIR__ . '/../app/models/*.php') as $model) {
    require_once $model;
}

foreach (glob(__DIR__ . '/../app/controllers/*.php') as $controller) {
    require_once $controller;
}

foreach (glob(__DIR__ . '/../app/controllers/Admin/*.php') as $controller) {
    require_once $controller;
}

Session::start();

header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

$router = new Router();

$router->get('/', 'HomeController', 'index');
$router->get('/about', 'PageController', 'about');
$router->get('/contact', 'ContactController', 'index');
$router->post('/contact', 'ContactController', 'submit');
$router->get('/faq', 'PageController', 'faq');
$router->get('/gallery', 'GalleryController', 'index');
$router->get('/videos', 'VideoController', 'index');
$router->get('/blogs', 'BlogController', 'index');
$router->get('/blog/{slug}', 'BlogController', 'show');

$router->get('/segments', 'SegmentController', 'index');
$router->get('/segment/{slug}', 'SegmentController', 'show');
$router->get('/category', 'CategoryController', 'index');
$router->get('/category/{slug}', 'CategoryController', 'show');
$router->get('/product/{slug}', 'ProductController', 'show');
$router->get('/search', 'SearchController', 'index');

$router->get('/cart', 'CartController', 'index');
$router->post('/cart/add', 'CartController', 'add');
$router->post('/cart/update', 'CartController', 'update');
$router->post('/cart/remove', 'CartController', 'remove');
$router->get('/checkout', 'CheckoutController', 'index');
$router->post('/checkout', 'CheckoutController', 'process');
$router->post('/payment/verify', 'CheckoutController', 'verify');
$router->get('/order/success/{id}', 'CheckoutController', 'success');

$router->get('/login', 'AccountController', 'loginForm');
$router->post('/login', 'AccountController', 'login');
$router->get('/register', 'AccountController', 'registerForm');
$router->post('/register', 'AccountController', 'register');
$router->get('/logout', 'AccountController', 'logout');
$router->get('/account', 'AccountController', 'dashboard');
$router->get('/account/orders', 'AccountController', 'orders');
$router->get('/account/order/{id}', 'AccountController', 'orderDetail');

$router->get('/dealer-enquiry', 'ContactController', 'dealerEnquiry');
$router->post('/dealer-enquiry', 'ContactController', 'submitDealerEnquiry');

$router->get('/admin', 'AdminAuthController', 'dashboard');
$router->get('/admin/login', 'AdminAuthController', 'loginForm');
$router->post('/admin/login', 'AdminAuthController', 'login');
$router->get('/admin/logout', 'AdminAuthController', 'logout');

$router->get('/admin/dashboard', 'DashboardController', 'index');

$router->get('/admin/sliders', 'AdminHomeController', 'sliders');
$router->get('/admin/sliders/create', 'AdminHomeController', 'createSlider');
$router->post('/admin/sliders/store', 'AdminHomeController', 'storeSlider');
$router->get('/admin/sliders/edit/{id}', 'AdminHomeController', 'editSlider');
$router->post('/admin/sliders/update/{id}', 'AdminHomeController', 'updateSlider');
$router->post('/admin/sliders/delete/{id}', 'AdminHomeController', 'deleteSlider');

$router->get('/admin/sections', 'AdminHomeController', 'sections');
$router->get('/admin/sections/edit/{id}', 'AdminHomeController', 'editSection');
$router->post('/admin/sections/update/{id}', 'AdminHomeController', 'updateSection');

$router->get('/admin/segments', 'AdminSegmentController', 'index');
$router->get('/admin/segments/create', 'AdminSegmentController', 'create');
$router->post('/admin/segments/store', 'AdminSegmentController', 'store');
$router->get('/admin/segments/edit/{id}', 'AdminSegmentController', 'edit');
$router->post('/admin/segments/update/{id}', 'AdminSegmentController', 'update');
$router->post('/admin/segments/delete/{id}', 'AdminSegmentController', 'delete');

$router->get('/admin/categories', 'AdminCategoryController', 'index');
$router->get('/admin/categories/create', 'AdminCategoryController', 'create');
$router->post('/admin/categories/store', 'AdminCategoryController', 'store');
$router->get('/admin/categories/edit/{id}', 'AdminCategoryController', 'edit');
$router->post('/admin/categories/update/{id}', 'AdminCategoryController', 'update');
$router->post('/admin/categories/delete/{id}', 'AdminCategoryController', 'delete');

$router->get('/admin/products', 'AdminProductController', 'index');
$router->get('/admin/products/create', 'AdminProductController', 'create');
$router->post('/admin/products/store', 'AdminProductController', 'store');
$router->get('/admin/products/edit/{id}', 'AdminProductController', 'edit');
$router->post('/admin/products/update/{id}', 'AdminProductController', 'update');
$router->post('/admin/products/delete/{id}', 'AdminProductController', 'delete');

$router->get('/admin/orders', 'AdminOrderController', 'index');
$router->get('/admin/orders/view/{id}', 'AdminOrderController', 'show');
$router->post('/admin/orders/update-status/{id}', 'AdminOrderController', 'updateStatus');

$router->get('/admin/enquiries', 'AdminContactController', 'index');
$router->get('/admin/enquiries/view/{id}', 'AdminContactController', 'show');
$router->post('/admin/enquiries/update/{id}', 'AdminContactController', 'update');

$router->get('/admin/testimonials', 'AdminTestimonialController', 'index');
$router->get('/admin/testimonials/create', 'AdminTestimonialController', 'create');
$router->post('/admin/testimonials/store', 'AdminTestimonialController', 'store');
$router->get('/admin/testimonials/edit/{id}', 'AdminTestimonialController', 'edit');
$router->post('/admin/testimonials/update/{id}', 'AdminTestimonialController', 'update');
$router->post('/admin/testimonials/delete/{id}', 'AdminTestimonialController', 'delete');

$router->get('/admin/faqs', 'AdminFaqController', 'index');
$router->get('/admin/faqs/create', 'AdminFaqController', 'create');
$router->post('/admin/faqs/store', 'AdminFaqController', 'store');
$router->get('/admin/faqs/edit/{id}', 'AdminFaqController', 'edit');
$router->post('/admin/faqs/update/{id}', 'AdminFaqController', 'update');
$router->post('/admin/faqs/delete/{id}', 'AdminFaqController', 'delete');

$router->get('/admin/gallery', 'AdminGalleryController', 'index');
$router->get('/admin/gallery/create', 'AdminGalleryController', 'create');
$router->post('/admin/gallery/store', 'AdminGalleryController', 'store');
$router->post('/admin/gallery/delete/{id}', 'AdminGalleryController', 'delete');

$router->get('/admin/videos', 'AdminVideoController', 'index');
$router->get('/admin/videos/create', 'AdminVideoController', 'create');
$router->post('/admin/videos/store', 'AdminVideoController', 'store');
$router->post('/admin/videos/delete/{id}', 'AdminVideoController', 'delete');

$router->get('/admin/settings', 'AdminSettingsController', 'index');
$router->post('/admin/settings', 'AdminSettingsController', 'update');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$router->dispatch($uri, $method);