<?php
class HomeSection extends Model {
    protected $table = 'home_sections';
    
    public function active() {
        return $this->where("is_active = true", [], 'sort_order ASC');
    }
    
    public function getByKey($key) {
        return $this->findBy('section_key', $key);
    }
}
