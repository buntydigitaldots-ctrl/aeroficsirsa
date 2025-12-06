<?php
class AboutSection extends Model {
    protected $table = 'about_sections';
    
    public function active() {
        return $this->where("is_active = true", [], 'sort_order ASC');
    }
}
