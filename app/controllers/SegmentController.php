<?php
class SegmentController extends Controller {
    public function index() {
        $segmentModel = new Segment();
        $segments = $segmentModel->active();
        
        $this->view('segment/index', [
            'segments' => $segments
        ]);
    }
    
    public function show($slug) {
        $segmentModel = new Segment();
        $segment = $segmentModel->findBySlug($slug);
        
        if (!$segment) {
            http_response_code(404);
            $this->view('errors/404');
            return;
        }
        
        $categoryModel = new Category();
        $categories = $categoryModel->bySegment($segment['id']);
        
        $page = (int)($this->input('page', 1));
        $productModel = new Product();
        $products = $productModel->bySegment($segment['id'], $page);
        
        $this->view('category/segment', [
            'segment' => $segment,
            'categories' => $categories,
            'products' => $products['items'],
            'pagination' => [
                'total' => $products['total'],
                'pages' => $products['pages'],
                'current' => $products['current']
            ]
        ]);
    }
}
