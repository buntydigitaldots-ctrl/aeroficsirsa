<?php
class HomeSlider extends Model {
    protected $table = 'home_sliders';
    
    public function byGroup($group) {
        return $this->where("slider_group = ? AND is_active = true", [$group], 'desktop_order ASC');
    }
    
    public function heroSliders() {
        return $this->byGroup('hero-1');
    }
}
