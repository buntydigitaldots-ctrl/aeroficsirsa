<?php
class SearchController extends Controller {
    public function index() {
        $query = $this->input('q', '');
        $page = (int)($this->input('page', 1));
        
        $productModel = new Product();
        $products = $productModel->search($query, $page);
        
        $this->view('category/search', [
            'query' => $query,
            'products' => $products['items'],
            'pagination' => [
                'total' => $products['total'],
                'pages' => $products['pages'],
                'current' => $products['current']
            ]
        ]);
    }
}
