<?php
class Model {
    protected $db;
    protected $table;
    protected $primaryKey = 'id';

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function all($orderBy = 'id DESC') {
        return $this->db->fetchAll("SELECT * FROM {$this->table} ORDER BY $orderBy");
    }

    public function find($id) {
        return $this->db->fetch("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ?", [$id]);
    }

    public function findBy($column, $value) {
        return $this->db->fetch("SELECT * FROM {$this->table} WHERE $column = ?", [$value]);
    }

    public function where($condition, $params = [], $orderBy = '') {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE {$condition}";
            if ($orderBy) {
                $sql .= " ORDER BY {$orderBy}";
            }
            return $this->db->fetchAll($sql, $params);
        } catch (Exception $e) {
            error_log("Database error in where(): " . $e->getMessage());
            return [];
        }
    }

    public function create($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        $this->db->update($this->table, $data, "{$this->primaryKey} = ?", [$id]);
    }

    public function delete($id) {
        $this->db->delete($this->table, "{$this->primaryKey} = ?", [$id]);
    }

    public function count($conditions = '1=1', $params = []) {
        $result = $this->db->fetch("SELECT COUNT(*) as count FROM {$this->table} WHERE $conditions", $params);
        return $result['count'] ?? 0;
    }

    public function paginate($page = 1, $perPage = 12, $conditions = '1=1', $params = [], $orderBy = 'id DESC') {
        $offset = ($page - 1) * $perPage;
        $total = $this->count($conditions, $params);
        $items = $this->db->fetchAll(
            "SELECT * FROM {$this->table} WHERE $conditions ORDER BY $orderBy LIMIT $perPage OFFSET $offset",
            $params
        );
        return [
            'items' => $items,
            'total' => $total,
            'pages' => ceil($total / $perPage),
            'current' => $page
        ];
    }
}