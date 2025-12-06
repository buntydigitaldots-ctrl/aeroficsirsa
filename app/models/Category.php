<?php
class Category extends Model {
    protected $table = 'categories';
    
    public function active() {
        return $this->where("is_active = true", [], 'sort_order ASC');
    }
    
    public function menuCategories() {
        return $this->where("is_active = true AND show_in_menu = true", [], 'sort_order ASC');
    }
    
    public function homeCategories() {
        return $this->where("is_active = true AND show_on_home = true", [], 'sort_order ASC');
    }
    
    public function findBySlug($slug) {
        return $this->findBy('slug', $slug);
    }
    
    public function bySegment($segmentId) {
        return $this->where("segment_id = ? AND is_active = true", [$segmentId], 'sort_order ASC');
    }
    
    public function productCount($categoryId) {
        $result = $this->db->fetch("SELECT COUNT(*) as count FROM products WHERE category_id = ? AND status = 'active'", [$categoryId]);
        return $result['count'] ?? 0;
    }
}
