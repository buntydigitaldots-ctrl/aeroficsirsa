<?php
class CategoryController extends Controller {
    public function index() {
        $categoryModel = new Category();
        $categories = $categoryModel->active();
        
        $this->view('category/index', [
            'categories' => $categories
        ]);
    }
    
    public function show($slug) {
        $categoryModel = new Category();
        $category = $categoryModel->findBySlug($slug);
        
        if (!$category) {
            http_response_code(404);
            $this->view('errors/404');
            return;
        }
        
        $page = (int)($this->input('page', 1));
        $productModel = new Product();
        $products = $productModel->byCategory($category['id'], $page);
        
        $segmentModel = new Segment();
        $segment = $category['segment_id'] ? $segmentModel->find($category['segment_id']) : null;
        
        $this->view('category/show', [
            'category' => $category,
            'segment' => $segment,
            'products' => $products['items'],
            'pagination' => [
                'total' => $products['total'],
                'pages' => $products['pages'],
                'current' => $products['current']
            ]
        ]);
    }
}
