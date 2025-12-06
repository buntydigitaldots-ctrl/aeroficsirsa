<?php
class ContactQuery extends Model {
    protected $table = 'contact_queries';
    
    public function recent($limit = 10) {
        return $this->db->fetchAll("SELECT * FROM contact_queries ORDER BY created_at DESC LIMIT ?", [$limit]);
    }
    
    public function newQueries() {
        return $this->where("status = 'new'", [], 'created_at DESC');
    }
    
    public function byType($type) {
        return $this->where("type = ?", [$type], 'created_at DESC');
    }
}
