<?php
class HomeController extends Controller {
    public function index() {
        $sliderModel = new HomeSlider();
        $sectionModel = new HomeSection();
        $segmentModel = new Segment();
        $categoryModel = new Category();
        $productModel = new Product();
        $testimonialModel = new Testimonial();
        $faqModel = new FAQ();
        $galleryModel = new GalleryItem();
        $videoModel = new Video();
        
        $data = [
            'sliders' => $sliderModel->heroSliders(),
            'slider2' => $sliderModel->byGroup('hero-2'),
            'slider3' => $sliderModel->byGroup('hero-3'),
            'sections' => $sectionModel->active(),
            'segments' => $segmentModel->homeSegments(),
            'categories' => $categoryModel->homeCategories(),
            'featuredProducts' => $productModel->featured(),
            'homeProducts' => $productModel->homeProducts(),
            'testimonials' => $testimonialModel->homeTestimonials(),
            'faqs' => $faqModel->homeFaqs(),
            'gallery' => $galleryModel->homeGallery(),
            'videos' => $videoModel->homeVideos()
        ];
        
        $this->view('home/index', $data);
    }
}
