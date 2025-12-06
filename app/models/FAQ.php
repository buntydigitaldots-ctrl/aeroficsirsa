<?php
class FAQ extends Model {
    protected $table = 'faqs';
    
    public function homeFaqs() {
        return $this->where("is_active = true AND show_on_home = true", [], 'sort_order ASC');
    }
    
    public function pageFaqs() {
        return $this->where("is_active = true AND show_on_faq_page = true", [], 'sort_order ASC');
    }
}
