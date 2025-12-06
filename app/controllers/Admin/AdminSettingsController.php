<?php
class AdminSettingsController extends Controller {
    public function index() {
        Auth::requireAdmin();
        $settingModel = new Setting();
        $settings = $settingModel->getAll();
        $this->adminView('settings/index', ['settings' => $settings]);
    }
    
    public function update() {
        Auth::requireAdmin();
        CSRF::check();
        
        $settingModel = new Setting();
        
        foreach ($_POST as $key => $value) {
            if ($key !== 'csrf_token') {
                $settingModel->set($key, $value);
            }
        }
        
        Session::flash('success', 'Settings updated successfully');
        $this->redirect('/admin/settings');
    }
}
