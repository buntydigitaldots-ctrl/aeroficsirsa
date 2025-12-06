<?php
class PageController extends Controller {
    public function about() {
        $aboutModel = new AboutSection();
        $sections = $aboutModel->active();
        
        $this->view('pages/about', [
            'sections' => $sections
        ]);
    }
    
    public function faq() {
        $faqModel = new FAQ();
        $faqs = $faqModel->pageFaqs();
        
        $this->view('pages/faq', [
            'faqs' => $faqs
        ]);
    }
}
