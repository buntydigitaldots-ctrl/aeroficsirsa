<?php
class AdminHomeController extends Controller {
    public function sliders() {
        Auth::requireAdmin();
        $sliderModel = new HomeSlider();
        $sliders = $sliderModel->all('slider_group, desktop_order');
        $this->adminView('sliders/index', ['sliders' => $sliders]);
    }
    
    public function createSlider() {
        Auth::requireAdmin();
        $this->adminView('sliders/create');
    }
    
    public function storeSlider() {
        Auth::requireAdmin();
        CSRF::check();
        
        $sliderModel = new HomeSlider();
        
        $imagePath = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = 'slider_' . time() . '.' . $ext;
            $imagePath = '/assets/uploads/sliders/' . $filename;
            move_uploaded_file($_FILES['image']['tmp_name'], PUBLIC_PATH . $imagePath);
        }
        
        $sliderModel->create([
            'slider_group' => $this->sanitize($_POST['slider_group']),
            'title' => $this->sanitize($_POST['title']),
            'subtitle' => $this->sanitize($_POST['subtitle']),
            'description' => $_POST['description'],
            'cta_text' => $this->sanitize($_POST['cta_text']),
            'cta_link' => $this->sanitize($_POST['cta_link']),
            'image_path' => $imagePath,
            'desktop_order' => (int)$_POST['desktop_order'],
            'is_active' => isset($_POST['is_active'])
        ]);
        
        Session::flash('success', 'Slider created successfully');
        $this->redirect('/admin/sliders');
    }
    
    public function editSlider($id) {
        Auth::requireAdmin();
        $sliderModel = new HomeSlider();
        $slider = $sliderModel->find($id);
        
        if (!$slider) {
            Session::flash('error', 'Slider not found');
            $this->redirect('/admin/sliders');
            return;
        }
        
        $this->adminView('sliders/edit', ['slider' => $slider]);
    }
    
    public function updateSlider($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $sliderModel = new HomeSlider();
        $slider = $sliderModel->find($id);
        
        if (!$slider) {
            Session::flash('error', 'Slider not found');
            $this->redirect('/admin/sliders');
            return;
        }
        
        $data = [
            'slider_group' => $this->sanitize($_POST['slider_group']),
            'title' => $this->sanitize($_POST['title']),
            'subtitle' => $this->sanitize($_POST['subtitle']),
            'description' => $_POST['description'],
            'cta_text' => $this->sanitize($_POST['cta_text']),
            'cta_link' => $this->sanitize($_POST['cta_link']),
            'desktop_order' => (int)$_POST['desktop_order'],
            'is_active' => isset($_POST['is_active'])
        ];
        
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = 'slider_' . time() . '.' . $ext;
            $imagePath = '/assets/uploads/sliders/' . $filename;
            move_uploaded_file($_FILES['image']['tmp_name'], PUBLIC_PATH . $imagePath);
            $data['image_path'] = $imagePath;
        }
        
        $sliderModel->update($id, $data);
        Session::flash('success', 'Slider updated successfully');
        $this->redirect('/admin/sliders');
    }
    
    public function deleteSlider($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $sliderModel = new HomeSlider();
        $sliderModel->delete($id);
        
        Session::flash('success', 'Slider deleted successfully');
        $this->redirect('/admin/sliders');
    }
    
    public function sections() {
        Auth::requireAdmin();
        $sectionModel = new HomeSection();
        $sections = $sectionModel->all('sort_order');
        $this->adminView('sections/index', ['sections' => $sections]);
    }
    
    public function editSection($id) {
        Auth::requireAdmin();
        $sectionModel = new HomeSection();
        $section = $sectionModel->find($id);
        
        if (!$section) {
            Session::flash('error', 'Section not found');
            $this->redirect('/admin/sections');
            return;
        }
        
        $this->adminView('sections/edit', ['section' => $section]);
    }
    
    public function updateSection($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $sectionModel = new HomeSection();
        
        $sectionModel->update($id, [
            'title' => $this->sanitize($_POST['title']),
            'subtitle' => $this->sanitize($_POST['subtitle']),
            'content_html' => $_POST['content_html'],
            'sort_order' => (int)$_POST['sort_order'],
            'is_active' => isset($_POST['is_active'])
        ]);
        
        Session::flash('success', 'Section updated successfully');
        $this->redirect('/admin/sections');
    }
}
