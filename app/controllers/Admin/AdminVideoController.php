<?php
class AdminVideoController extends Controller {
    public function index() {
        Auth::requireAdmin();
        $model = new Video();
        $items = $model->all('sort_order');
        $this->adminView('videos/index', ['items' => $items]);
    }
    
    public function create() {
        Auth::requireAdmin();
        $this->adminView('videos/create');
    }
    
    public function store() {
        Auth::requireAdmin();
        CSRF::check();
        
        $model = new Video();
        
        $model->create([
            'title' => $this->sanitize($_POST['title']),
            'description' => $_POST['description'] ?? '',
            'video_type' => $this->sanitize($_POST['video_type']),
            'video_url' => $this->sanitize($_POST['video_url'] ?? ''),
            'show_on_home' => isset($_POST['show_on_home']),
            'show_on_video_page' => isset($_POST['show_on_video_page']),
            'sort_order' => (int)$_POST['sort_order'],
            'is_active' => isset($_POST['is_active'])
        ]);
        
        Session::flash('success', 'Video added');
        $this->redirect('/admin/videos');
    }
    
    public function delete($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $model = new Video();
        $model->delete($id);
        
        Session::flash('success', 'Video deleted');
        $this->redirect('/admin/videos');
    }
}
