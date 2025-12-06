<?php
class CheckoutController extends Controller {
    public function index() {
        $cartModel = new Cart();
        $userId = Auth::id();
        $sessionId = session_id();
        $cart = $cartModel->getOrCreate($userId, $sessionId);
        
        $items = $cartModel->getItems($cart['id']);
        if (empty($items)) {
            Session::flash('error', 'Your cart is empty');
            $this->redirect('/cart');
            return;
        }
        
        $total = $cartModel->getTotal($cart['id']);
        
        $this->view('cart/checkout', [
            'items' => $items,
            'total' => $total,
            'razorpayKeyId' => RAZORPAY_KEY_ID
        ]);
    }
    
    public function process() {
        if (!$this->isPost()) {
            $this->redirect('/checkout');
            return;
        }
        
        CSRF::check();
        
        $cartModel = new Cart();
        $userId = Auth::id();
        $sessionId = session_id();
        $cart = $cartModel->getOrCreate($userId, $sessionId);
        
        $items = $cartModel->getItems($cart['id']);
        if (empty($items)) {
            $this->json(['error' => 'Cart is empty'], 400);
            return;
        }
        
        $subtotal = $cartModel->getTotal($cart['id']);
        $shipping = $subtotal >= 5000 ? 0 : 200;
        $total = $subtotal + $shipping;
        
        $orderModel = new Order();
        $orderId = $orderModel->create([
            'user_id' => $userId,
            'order_number' => $orderModel->generateOrderNumber(),
            'status' => 'pending',
            'payment_status' => 'pending',
            'subtotal' => $subtotal,
            'shipping_amount' => $shipping,
            'total_amount' => $total,
            'shipping_name' => $this->sanitize($_POST['name']),
            'shipping_phone' => $this->sanitize($_POST['phone']),
            'shipping_address' => $this->sanitize($_POST['address']),
            'shipping_city' => $this->sanitize($_POST['city']),
            'shipping_state' => $this->sanitize($_POST['state']),
            'shipping_pincode' => $this->sanitize($_POST['pincode'])
        ]);
        
        foreach ($items as $item) {
            $orderModel->addItem([
                'order_id' => $orderId,
                'product_id' => $item['product_id'],
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => $item['quantity'] * $item['price']
            ]);
        }
        
        if (RAZORPAY_KEY_ID && RAZORPAY_KEY_SECRET) {
            $razorpayOrderData = [
                'receipt' => 'order_' . $orderId,
                'amount' => $total * 100,
                'currency' => 'INR'
            ];
            
            $ch = curl_init('https://api.razorpay.com/v1/orders');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERPWD, RAZORPAY_KEY_ID . ':' . RAZORPAY_KEY_SECRET);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($razorpayOrderData));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            $result = curl_exec($ch);
            curl_close($ch);
            
            $razorpayOrder = json_decode($result, true);
            
            if (isset($razorpayOrder['id'])) {
                $orderModel->update($orderId, ['razorpay_order_id' => $razorpayOrder['id']]);
                
                $this->json([
                    'success' => true,
                    'orderId' => $orderId,
                    'razorpayOrderId' => $razorpayOrder['id'],
                    'amount' => $total * 100,
                    'currency' => 'INR'
                ]);
                return;
            }
        }
        
        $orderModel->update($orderId, ['payment_status' => 'cod']);
        $cartModel->clearCart($cart['id']);
        
        $this->json([
            'success' => true,
            'orderId' => $orderId,
            'redirect' => '/order/success/' . $orderId
        ]);
    }
    
    public function verify() {
        if (!$this->isPost()) {
            $this->json(['error' => 'Invalid request'], 400);
            return;
        }
        
        $orderId = (int)$this->input('order_id');
        $razorpayPaymentId = $this->input('razorpay_payment_id');
        $razorpayOrderId = $this->input('razorpay_order_id');
        $razorpaySignature = $this->input('razorpay_signature');
        
        $orderModel = new Order();
        $order = $orderModel->find($orderId);
        
        if (!$order) {
            $this->json(['error' => 'Order not found'], 404);
            return;
        }
        
        $expectedSignature = hash_hmac('sha256', $razorpayOrderId . '|' . $razorpayPaymentId, RAZORPAY_KEY_SECRET);
        
        if (hash_equals($expectedSignature, $razorpaySignature)) {
            $orderModel->update($orderId, [
                'payment_status' => 'paid',
                'status' => 'confirmed',
                'razorpay_payment_id' => $razorpayPaymentId,
                'razorpay_signature' => $razorpaySignature
            ]);
            
            $cartModel = new Cart();
            $userId = Auth::id();
            $sessionId = session_id();
            $cart = $cartModel->getOrCreate($userId, $sessionId);
            $cartModel->clearCart($cart['id']);
            
            $this->json([
                'success' => true,
                'redirect' => '/order/success/' . $orderId
            ]);
        } else {
            $this->json(['error' => 'Payment verification failed'], 400);
        }
    }
    
    public function success($id) {
        $orderModel = new Order();
        $order = $orderModel->find($id);
        
        if (!$order) {
            http_response_code(404);
            $this->view('errors/404');
            return;
        }
        
        $items = $orderModel->getItems($id);
        
        $this->view('cart/success', [
            'order' => $order,
            'items' => $items
        ]);
    }
}
