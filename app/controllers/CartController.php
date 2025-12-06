<?php
class CartController extends Controller {
    private function getCart() {
        $cartModel = new Cart();
        $userId = Auth::id();
        $sessionId = session_id();
        return $cartModel->getOrCreate($userId, $sessionId);
    }
    
    public function index() {
        $cart = $this->getCart();
        $cartModel = new Cart();
        $productModel = new Product();
        
        $items = $cartModel->getItems($cart['id']);
        foreach ($items as &$item) {
            $item['image'] = $productModel->getPrimaryImage($item['product_id']);
        }
        
        $total = $cartModel->getTotal($cart['id']);
        
        $this->view('cart/index', [
            'items' => $items,
            'total' => $total
        ]);
    }
    
    public function add() {
        if (!$this->isPost()) {
            $this->json(['error' => 'Invalid request'], 400);
            return;
        }
        
        $productId = (int)$this->input('product_id');
        $quantity = (int)($this->input('quantity', 1));
        
        $productModel = new Product();
        $product = $productModel->find($productId);
        
        if (!$product) {
            $this->json(['error' => 'Product not found'], 404);
            return;
        }
        
        $cart = $this->getCart();
        $cartModel = new Cart();
        $cartModel->addItem($cart['id'], $productId, $quantity, $product['selling_price']);
        
        $itemCount = $cartModel->getItemCount($cart['id']);
        
        $this->json([
            'success' => true,
            'message' => 'Product added to cart',
            'cartCount' => $itemCount
        ]);
    }
    
    public function update() {
        if (!$this->isPost()) {
            $this->json(['error' => 'Invalid request'], 400);
            return;
        }
        
        $itemId = (int)$this->input('item_id');
        $quantity = (int)$this->input('quantity');
        
        $cartModel = new Cart();
        $cartModel->updateItem($itemId, $quantity);
        
        $cart = $this->getCart();
        $total = $cartModel->getTotal($cart['id']);
        $itemCount = $cartModel->getItemCount($cart['id']);
        
        $this->json([
            'success' => true,
            'total' => $total,
            'cartCount' => $itemCount
        ]);
    }
    
    public function remove() {
        if (!$this->isPost()) {
            $this->json(['error' => 'Invalid request'], 400);
            return;
        }
        
        $itemId = (int)$this->input('item_id');
        
        $cartModel = new Cart();
        $cartModel->removeItem($itemId);
        
        $cart = $this->getCart();
        $total = $cartModel->getTotal($cart['id']);
        $itemCount = $cartModel->getItemCount($cart['id']);
        
        $this->json([
            'success' => true,
            'total' => $total,
            'cartCount' => $itemCount
        ]);
    }
}
