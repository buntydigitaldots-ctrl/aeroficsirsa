<?php
class AdminGalleryController extends Controller {
    public function index() {
        Auth::requireAdmin();
        $model = new GalleryItem();
        $items = $model->all('sort_order');
        $this->adminView('gallery/index', ['items' => $items]);
    }
    
    public function create() {
        Auth::requireAdmin();
        $this->adminView('gallery/create');
    }
    
    public function store() {
        Auth::requireAdmin();
        CSRF::check();
        
        $model = new GalleryItem();
        
        $imagePath = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = 'gallery_' . time() . '.' . $ext;
            $imagePath = '/assets/uploads/gallery/' . $filename;
            move_uploaded_file($_FILES['image']['tmp_name'], PUBLIC_PATH . $imagePath);
        }
        
        $model->create([
            'title' => $this->sanitize($_POST['title']),
            'description' => $_POST['description'] ?? '',
            'image_path' => $imagePath,
            'show_on_home' => isset($_POST['show_on_home']),
            'show_on_gallery_page' => isset($_POST['show_on_gallery_page']),
            'sort_order' => (int)$_POST['sort_order'],
            'is_active' => isset($_POST['is_active'])
        ]);
        
        Session::flash('success', 'Gallery item added');
        $this->redirect('/admin/gallery');
    }
    
    public function delete($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $model = new GalleryItem();
        $model->delete($id);
        
        Session::flash('success', 'Gallery item deleted');
        $this->redirect('/admin/gallery');
    }
}
