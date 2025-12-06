<?php
class Cart extends Model {
    protected $table = 'carts';
    
    public function getOrCreate($userId = null, $sessionId = null) {
        if ($userId) {
            $cart = $this->findBy('user_id', $userId);
        } else {
            $cart = $this->findBy('session_id', $sessionId);
        }
        
        if (!$cart) {
            $id = $this->create([
                'user_id' => $userId,
                'session_id' => $sessionId
            ]);
            $cart = $this->find($id);
        }
        
        return $cart;
    }
    
    public function getItems($cartId) {
        return $this->db->fetchAll(
            "SELECT ci.*, p.name, p.slug, p.mrp, p.selling_price 
             FROM cart_items ci 
             JOIN products p ON ci.product_id = p.id 
             WHERE ci.cart_id = ?",
            [$cartId]
        );
    }
    
    public function addItem($cartId, $productId, $quantity = 1, $price = 0) {
        $existing = $this->db->fetch(
            "SELECT * FROM cart_items WHERE cart_id = ? AND product_id = ?",
            [$cartId, $productId]
        );
        
        if ($existing) {
            $this->db->query(
                "UPDATE cart_items SET quantity = quantity + ? WHERE id = ?",
                [$quantity, $existing['id']]
            );
            return $existing['id'];
        }
        
        return $this->db->insert('cart_items', [
            'cart_id' => $cartId,
            'product_id' => $productId,
            'quantity' => $quantity,
            'price' => $price
        ]);
    }
    
    public function updateItem($itemId, $quantity) {
        if ($quantity <= 0) {
            $this->db->delete('cart_items', 'id = ?', [$itemId]);
        } else {
            $this->db->query("UPDATE cart_items SET quantity = ? WHERE id = ?", [$quantity, $itemId]);
        }
    }
    
    public function removeItem($itemId) {
        $this->db->delete('cart_items', 'id = ?', [$itemId]);
    }
    
    public function clearCart($cartId) {
        $this->db->delete('cart_items', 'cart_id = ?', [$cartId]);
    }
    
    public function getTotal($cartId) {
        $result = $this->db->fetch(
            "SELECT COALESCE(SUM(ci.quantity * ci.price), 0) as total 
             FROM cart_items ci WHERE ci.cart_id = ?",
            [$cartId]
        );
        return $result['total'] ?? 0;
    }
    
    public function getItemCount($cartId) {
        $result = $this->db->fetch(
            "SELECT COALESCE(SUM(quantity), 0) as count FROM cart_items WHERE cart_id = ?",
            [$cartId]
        );
        return $result['count'] ?? 0;
    }
}
