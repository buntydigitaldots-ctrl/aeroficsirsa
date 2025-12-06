<?php
class Setting extends Model {
    protected $table = 'settings';
    
    public function get($key, $default = null) {
        $setting = $this->findBy('setting_key', $key);
        return $setting ? $setting['setting_value'] : $default;
    }
    
    public function set($key, $value) {
        $existing = $this->findBy('setting_key', $key);
        if ($existing) {
            $this->update($existing['id'], ['setting_value' => $value]);
        } else {
            $this->create(['setting_key' => $key, 'setting_value' => $value]);
        }
    }
    
    public function getAll() {
        $settings = $this->all('setting_key ASC');
        $result = [];
        foreach ($settings as $s) {
            $result[$s['setting_key']] = $s['setting_value'];
        }
        return $result;
    }
    
    public function byGroup($group) {
        return $this->where("setting_group = ?", [$group], 'setting_key ASC');
    }
}
