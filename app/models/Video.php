<?php
class Video extends Model {
    protected $table = 'videos';
    
    public function homeVideos() {
        return $this->where("is_active = true AND show_on_home = true", [], 'sort_order ASC');
    }
    
    public function pageVideos() {
        return $this->where("is_active = true AND show_on_video_page = true", [], 'sort_order ASC');
    }
}
