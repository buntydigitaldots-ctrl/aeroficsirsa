<?php
class Order extends Model {
    protected $table = 'orders';
    
    public function generateOrderNumber() {
        return 'ARO' . date('Ymd') . strtoupper(substr(uniqid(), -6));
    }
    
    public function byUser($userId) {
        return $this->where("user_id = ?", [$userId], 'created_at DESC');
    }
    
    public function getItems($orderId) {
        return $this->db->fetchAll("SELECT * FROM order_items WHERE order_id = ?", [$orderId]);
    }
    
    public function addItem($data) {
        return $this->db->insert('order_items', $data);
    }
    
    public function recent($limit = 10) {
        return $this->db->fetchAll("SELECT * FROM orders ORDER BY created_at DESC LIMIT ?", [$limit]);
    }
    
    public function totalRevenue() {
        $result = $this->db->fetch("SELECT COALESCE(SUM(total_amount), 0) as total FROM orders WHERE payment_status = 'paid'");
        return $result['total'] ?? 0;
    }
}
