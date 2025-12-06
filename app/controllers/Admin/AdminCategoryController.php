<?php
class AdminCategoryController extends Controller {
    public function index() {
        Auth::requireAdmin();
        $categoryModel = new Category();
        $categories = $categoryModel->all('sort_order');
        $this->adminView('categories/index', ['categories' => $categories]);
    }
    
    public function create() {
        Auth::requireAdmin();
        $segmentModel = new Segment();
        $segments = $segmentModel->active();
        $this->adminView('categories/create', ['segments' => $segments]);
    }
    
    public function store() {
        Auth::requireAdmin();
        CSRF::check();
        
        $categoryModel = new Category();
        
        $imagePath = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = 'cat_' . time() . '.' . $ext;
            $imagePath = '/assets/uploads/products/' . $filename;
            move_uploaded_file($_FILES['image']['tmp_name'], PUBLIC_PATH . $imagePath);
        }
        
        $slug = $this->createSlug($_POST['name']);
        
        $categoryModel->create([
            'segment_id' => (int)$_POST['segment_id'] ?: null,
            'name' => $this->sanitize($_POST['name']),
            'slug' => $slug,
            'description' => $_POST['description'],
            'image_path' => $imagePath,
            'show_in_menu' => isset($_POST['show_in_menu']),
            'show_on_home' => isset($_POST['show_on_home']),
            'sort_order' => (int)$_POST['sort_order'],
            'is_active' => isset($_POST['is_active']),
            'meta_title' => $this->sanitize($_POST['meta_title'] ?? ''),
            'meta_description' => $this->sanitize($_POST['meta_description'] ?? '')
        ]);
        
        Session::flash('success', 'Category created successfully');
        $this->redirect('/admin/categories');
    }
    
    public function edit($id) {
        Auth::requireAdmin();
        $categoryModel = new Category();
        $category = $categoryModel->find($id);
        
        if (!$category) {
            Session::flash('error', 'Category not found');
            $this->redirect('/admin/categories');
            return;
        }
        
        $segmentModel = new Segment();
        $segments = $segmentModel->active();
        
        $this->adminView('categories/edit', [
            'category' => $category,
            'segments' => $segments
        ]);
    }
    
    public function update($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $categoryModel = new Category();
        $category = $categoryModel->find($id);
        
        if (!$category) {
            Session::flash('error', 'Category not found');
            $this->redirect('/admin/categories');
            return;
        }
        
        $data = [
            'segment_id' => (int)$_POST['segment_id'] ?: null,
            'name' => $this->sanitize($_POST['name']),
            'description' => $_POST['description'],
            'show_in_menu' => isset($_POST['show_in_menu']),
            'show_on_home' => isset($_POST['show_on_home']),
            'sort_order' => (int)$_POST['sort_order'],
            'is_active' => isset($_POST['is_active']),
            'meta_title' => $this->sanitize($_POST['meta_title'] ?? ''),
            'meta_description' => $this->sanitize($_POST['meta_description'] ?? '')
        ];
        
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = 'cat_' . time() . '.' . $ext;
            $imagePath = '/assets/uploads/products/' . $filename;
            move_uploaded_file($_FILES['image']['tmp_name'], PUBLIC_PATH . $imagePath);
            $data['image_path'] = $imagePath;
        }
        
        $categoryModel->update($id, $data);
        Session::flash('success', 'Category updated successfully');
        $this->redirect('/admin/categories');
    }
    
    public function delete($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $categoryModel = new Category();
        $categoryModel->delete($id);
        
        Session::flash('success', 'Category deleted successfully');
        $this->redirect('/admin/categories');
    }
    
    private function createSlug($text) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text), '-'));
        return $slug . '-' . substr(uniqid(), -4);
    }
}
