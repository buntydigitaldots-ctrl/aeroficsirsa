<?php
class AdminTestimonialController extends Controller {
    public function index() {
        Auth::requireAdmin();
        $model = new Testimonial();
        $items = $model->all('sort_order');
        $this->adminView('testimonials/index', ['items' => $items]);
    }
    
    public function create() {
        Auth::requireAdmin();
        $this->adminView('testimonials/create');
    }
    
    public function store() {
        Auth::requireAdmin();
        CSRF::check();
        
        $model = new Testimonial();
        $model->create([
            'name' => $this->sanitize($_POST['name']),
            'designation' => $this->sanitize($_POST['designation'] ?? ''),
            'company' => $this->sanitize($_POST['company'] ?? ''),
            'message' => $_POST['message'],
            'rating' => (int)$_POST['rating'],
            'show_on_home' => isset($_POST['show_on_home']),
            'show_on_page' => isset($_POST['show_on_page']),
            'sort_order' => (int)$_POST['sort_order'],
            'is_active' => isset($_POST['is_active'])
        ]);
        
        Session::flash('success', 'Testimonial added successfully');
        $this->redirect('/admin/testimonials');
    }
    
    public function edit($id) {
        Auth::requireAdmin();
        $model = new Testimonial();
        $item = $model->find($id);
        
        if (!$item) {
            Session::flash('error', 'Testimonial not found');
            $this->redirect('/admin/testimonials');
            return;
        }
        
        $this->adminView('testimonials/edit', ['item' => $item]);
    }
    
    public function update($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $model = new Testimonial();
        $model->update($id, [
            'name' => $this->sanitize($_POST['name']),
            'designation' => $this->sanitize($_POST['designation'] ?? ''),
            'company' => $this->sanitize($_POST['company'] ?? ''),
            'message' => $_POST['message'],
            'rating' => (int)$_POST['rating'],
            'show_on_home' => isset($_POST['show_on_home']),
            'show_on_page' => isset($_POST['show_on_page']),
            'sort_order' => (int)$_POST['sort_order'],
            'is_active' => isset($_POST['is_active'])
        ]);
        
        Session::flash('success', 'Testimonial updated successfully');
        $this->redirect('/admin/testimonials');
    }
    
    public function delete($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $model = new Testimonial();
        $model->delete($id);
        
        Session::flash('success', 'Testimonial deleted');
        $this->redirect('/admin/testimonials');
    }
}
