<?php
class GalleryItem extends Model {
    protected $table = 'gallery_items';
    
    public function homeGallery() {
        return $this->where("is_active = true AND show_on_home = true", [], 'sort_order ASC');
    }
    
    public function pageGallery() {
        return $this->where("is_active = true AND show_on_gallery_page = true", [], 'sort_order ASC');
    }
}
