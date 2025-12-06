<?php
class AdminOrderController extends Controller {
    public function index() {
        Auth::requireAdmin();
        $orderModel = new Order();
        $orders = $orderModel->all('created_at DESC');
        $this->adminView('orders/index', ['orders' => $orders]);
    }
    
    public function show($id) {
        Auth::requireAdmin();
        $orderModel = new Order();
        $order = $orderModel->find($id);
        
        if (!$order) {
            Session::flash('error', 'Order not found');
            $this->redirect('/admin/orders');
            return;
        }
        
        $items = $orderModel->getItems($id);
        
        $this->adminView('orders/view', [
            'order' => $order,
            'items' => $items
        ]);
    }
    
    public function updateStatus($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $orderModel = new Order();
        $orderModel->update($id, [
            'status' => $this->sanitize($_POST['status'])
        ]);
        
        Session::flash('success', 'Order status updated');
        $this->redirect('/admin/orders/view/' . $id);
    }
}
