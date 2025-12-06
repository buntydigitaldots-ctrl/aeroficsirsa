<?php
class Segment extends Model {
    protected $table = 'segments';
    
    public function active() {
        return $this->where("is_active = true", [], 'sort_order ASC');
    }
    
    public function menuSegments() {
        return $this->where("is_active = true AND show_in_menu = true", [], 'sort_order ASC');
    }
    
    public function homeSegments() {
        return $this->where("is_active = true AND show_on_home = true", [], 'sort_order ASC');
    }
    
    public function findBySlug($slug) {
        return $this->findBy('slug', $slug);
    }
}
