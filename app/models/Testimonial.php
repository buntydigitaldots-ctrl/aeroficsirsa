<?php
class Testimonial extends Model {
    protected $table = 'testimonials';
    
    public function homeTestimonials() {
        return $this->where("is_active = true AND show_on_home = true", [], 'sort_order ASC');
    }
    
    public function pageTestimonials() {
        return $this->where("is_active = true AND show_on_page = true", [], 'sort_order ASC');
    }
}
