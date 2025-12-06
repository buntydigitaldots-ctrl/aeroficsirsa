<?php
class BlogPost extends Model {
    protected $table = 'blog_posts';
    
    public function published() {
        return $this->where("is_published = true", [], 'published_at DESC');
    }
    
    public function findBySlug($slug) {
        return $this->findBy('slug', $slug);
    }
    
    public function recent($limit = 3) {
        return $this->db->fetchAll("SELECT * FROM blog_posts WHERE is_published = true ORDER BY published_at DESC LIMIT ?", [$limit]);
    }
}
