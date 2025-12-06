<?php
class Product extends Model {
    protected $table = 'products';
    
    public function active() {
        return $this->where("status = 'active'", [], 'created_at DESC');
    }
    
    public function featured() {
        return $this->where("status = 'active' AND is_featured = true", [], 'created_at DESC');
    }
    
    public function homeProducts() {
        return $this->where("status = 'active' AND show_on_home = true", [], 'created_at DESC');
    }
    
    public function byCategory($categoryId, $page = 1, $perPage = 12) {
        return $this->paginate($page, $perPage, "category_id = ? AND status = 'active'", [$categoryId], 'created_at DESC');
    }
    
    public function bySegment($segmentId, $page = 1, $perPage = 12) {
        return $this->paginate($page, $perPage, "segment_id = ? AND status = 'active'", [$segmentId], 'created_at DESC');
    }
    
    public function findBySlug($slug) {
        return $this->findBy('slug', $slug);
    }
    
    public function search($query, $page = 1, $perPage = 12) {
        $searchTerm = '%' . $query . '%';
        return $this->paginate($page, $perPage, "(name ILIKE ? OR short_description ILIKE ? OR sku ILIKE ?) AND status = 'active'", [$searchTerm, $searchTerm, $searchTerm], 'created_at DESC');
    }
    
    public function getImages($productId) {
        return $this->db->fetchAll("SELECT * FROM product_images WHERE product_id = ? ORDER BY sort_order, is_primary DESC", [$productId]);
    }
    
    public function getPrimaryImage($productId) {
        $image = $this->db->fetch("SELECT * FROM product_images WHERE product_id = ? ORDER BY is_primary DESC, sort_order LIMIT 1", [$productId]);
        return $image ? $image['image_path'] : '/assets/images/no-image.jpg';
    }
    
    public function addImage($productId, $imagePath, $isPrimary = false, $sortOrder = 0) {
        return $this->db->insert('product_images', [
            'product_id' => $productId,
            'image_path' => $imagePath,
            'is_primary' => $isPrimary,
            'sort_order' => $sortOrder
        ]);
    }
    
    public function related($productId, $categoryId, $limit = 4) {
        return $this->db->fetchAll(
            "SELECT * FROM products WHERE id != ? AND category_id = ? AND status = 'active' ORDER BY RANDOM() LIMIT ?",
            [$productId, $categoryId, $limit]
        );
    }
    
    public function incrementViews($id) {
        $this->db->query("UPDATE products SET view_count = view_count + 1 WHERE id = ?", [$id]);
    }
}
