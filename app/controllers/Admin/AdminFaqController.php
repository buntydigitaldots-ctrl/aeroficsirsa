<?php
class AdminFaqController extends Controller {
    public function index() {
        Auth::requireAdmin();
        $model = new FAQ();
        $items = $model->all('sort_order');
        $this->adminView('faqs/index', ['items' => $items]);
    }
    
    public function create() {
        Auth::requireAdmin();
        $this->adminView('faqs/create');
    }
    
    public function store() {
        Auth::requireAdmin();
        CSRF::check();
        
        $model = new FAQ();
        $model->create([
            'question' => $this->sanitize($_POST['question']),
            'answer_html' => $_POST['answer_html'],
            'category' => $this->sanitize($_POST['category'] ?? ''),
            'show_on_home' => isset($_POST['show_on_home']),
            'show_on_faq_page' => isset($_POST['show_on_faq_page']),
            'sort_order' => (int)$_POST['sort_order'],
            'is_active' => isset($_POST['is_active'])
        ]);
        
        Session::flash('success', 'FAQ added successfully');
        $this->redirect('/admin/faqs');
    }
    
    public function edit($id) {
        Auth::requireAdmin();
        $model = new FAQ();
        $item = $model->find($id);
        
        if (!$item) {
            Session::flash('error', 'FAQ not found');
            $this->redirect('/admin/faqs');
            return;
        }
        
        $this->adminView('faqs/edit', ['item' => $item]);
    }
    
    public function update($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $model = new FAQ();
        $model->update($id, [
            'question' => $this->sanitize($_POST['question']),
            'answer_html' => $_POST['answer_html'],
            'category' => $this->sanitize($_POST['category'] ?? ''),
            'show_on_home' => isset($_POST['show_on_home']),
            'show_on_faq_page' => isset($_POST['show_on_faq_page']),
            'sort_order' => (int)$_POST['sort_order'],
            'is_active' => isset($_POST['is_active'])
        ]);
        
        Session::flash('success', 'FAQ updated successfully');
        $this->redirect('/admin/faqs');
    }
    
    public function delete($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $model = new FAQ();
        $model->delete($id);
        
        Session::flash('success', 'FAQ deleted');
        $this->redirect('/admin/faqs');
    }
}
