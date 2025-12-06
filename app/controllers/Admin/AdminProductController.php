<?php
class AdminProductController extends Controller {
    public function index() {
        Auth::requireAdmin();
        $productModel = new Product();
        $page = (int)($this->input('page', 1));
        $products = $productModel->paginate($page, 20, '1=1', [], 'created_at DESC');
        $this->adminView('products/index', [
            'products' => $products['items'],
            'pagination' => $products
        ]);
    }
    
    public function create() {
        Auth::requireAdmin();
        $segmentModel = new Segment();
        $categoryModel = new Category();
        
        $this->adminView('products/create', [
            'segments' => $segmentModel->active(),
            'categories' => $categoryModel->active()
        ]);
    }
    
    public function store() {
        Auth::requireAdmin();
        CSRF::check();
        
        $productModel = new Product();
        $slug = $this->createSlug($_POST['name']);
        
        $productId = $productModel->create([
            'segment_id' => (int)$_POST['segment_id'] ?: null,
            'category_id' => (int)$_POST['category_id'] ?: null,
            'name' => $this->sanitize($_POST['name']),
            'slug' => $slug,
            'article_code' => $this->sanitize($_POST['article_code'] ?? ''),
            'sku' => $this->sanitize($_POST['sku'] ?? ''),
            'short_description' => $_POST['short_description'] ?? '',
            'long_description' => $_POST['long_description'] ?? '',
            'mrp' => (float)$_POST['mrp'],
            'selling_price' => (float)$_POST['selling_price'],
            'size_text' => $this->sanitize($_POST['size_text'] ?? ''),
            'is_featured' => isset($_POST['is_featured']),
            'is_new' => isset($_POST['is_new']),
            'show_on_home' => isset($_POST['show_on_home']),
            'status' => $_POST['status'] ?? 'active',
            'meta_title' => $this->sanitize($_POST['meta_title'] ?? ''),
            'meta_description' => $this->sanitize($_POST['meta_description'] ?? '')
        ]);
        
        if (isset($_FILES['images'])) {
            $isPrimary = true;
            foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
                if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                    $ext = pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION);
                    $filename = 'prod_' . $productId . '_' . time() . '_' . $key . '.' . $ext;
                    $imagePath = '/assets/uploads/products/' . $filename;
                    move_uploaded_file($tmpName, PUBLIC_PATH . $imagePath);
                    $productModel->addImage($productId, $imagePath, $isPrimary, $key);
                    $isPrimary = false;
                }
            }
        }
        
        Session::flash('success', 'Product created successfully');
        $this->redirect('/admin/products');
    }
    
    public function edit($id) {
        Auth::requireAdmin();
        $productModel = new Product();
        $product = $productModel->find($id);
        
        if (!$product) {
            Session::flash('error', 'Product not found');
            $this->redirect('/admin/products');
            return;
        }
        
        $segmentModel = new Segment();
        $categoryModel = new Category();
        
        $this->adminView('products/edit', [
            'product' => $product,
            'images' => $productModel->getImages($id),
            'segments' => $segmentModel->active(),
            'categories' => $categoryModel->active()
        ]);
    }
    
    public function update($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $productModel = new Product();
        $product = $productModel->find($id);
        
        if (!$product) {
            Session::flash('error', 'Product not found');
            $this->redirect('/admin/products');
            return;
        }
        
        $productModel->update($id, [
            'segment_id' => (int)$_POST['segment_id'] ?: null,
            'category_id' => (int)$_POST['category_id'] ?: null,
            'name' => $this->sanitize($_POST['name']),
            'article_code' => $this->sanitize($_POST['article_code'] ?? ''),
            'sku' => $this->sanitize($_POST['sku'] ?? ''),
            'short_description' => $_POST['short_description'] ?? '',
            'long_description' => $_POST['long_description'] ?? '',
            'mrp' => (float)$_POST['mrp'],
            'selling_price' => (float)$_POST['selling_price'],
            'size_text' => $this->sanitize($_POST['size_text'] ?? ''),
            'is_featured' => isset($_POST['is_featured']),
            'is_new' => isset($_POST['is_new']),
            'show_on_home' => isset($_POST['show_on_home']),
            'status' => $_POST['status'] ?? 'active',
            'meta_title' => $this->sanitize($_POST['meta_title'] ?? ''),
            'meta_description' => $this->sanitize($_POST['meta_description'] ?? '')
        ]);
        
        if (isset($_FILES['images'])) {
            $existingImages = count($productModel->getImages($id));
            foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
                if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                    $ext = pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION);
                    $filename = 'prod_' . $id . '_' . time() . '_' . $key . '.' . $ext;
                    $imagePath = '/assets/uploads/products/' . $filename;
                    move_uploaded_file($tmpName, PUBLIC_PATH . $imagePath);
                    $productModel->addImage($id, $imagePath, $existingImages == 0, $existingImages + $key);
                }
            }
        }
        
        Session::flash('success', 'Product updated successfully');
        $this->redirect('/admin/products');
    }
    
    public function delete($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $productModel = new Product();
        $productModel->delete($id);
        
        Session::flash('success', 'Product deleted successfully');
        $this->redirect('/admin/products');
    }
    
    private function createSlug($text) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text), '-'));
        return $slug . '-' . substr(uniqid(), -4);
    }
}
