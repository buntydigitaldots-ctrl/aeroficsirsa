<?php
class ProductController extends Controller {
    public function show($slug) {
        $productModel = new Product();
        $product = $productModel->findBySlug($slug);
        
        if (!$product) {
            http_response_code(404);
            $this->view('errors/404');
            return;
        }
        
        $productModel->incrementViews($product['id']);
        
        $images = $productModel->getImages($product['id']);
        $related = $productModel->related($product['id'], $product['category_id']);
        
        $categoryModel = new Category();
        $category = $product['category_id'] ? $categoryModel->find($product['category_id']) : null;
        
        $segmentModel = new Segment();
        $segment = $product['segment_id'] ? $segmentModel->find($product['segment_id']) : null;
        
        $this->view('product/show', [
            'product' => $product,
            'images' => $images,
            'related' => $related,
            'category' => $category,
            'segment' => $segment
        ]);
    }
}
