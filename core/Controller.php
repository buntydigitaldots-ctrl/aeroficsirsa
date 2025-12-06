<?php
class Controller {
    protected $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    protected function view($view, $data = []) {
        extract($data);
        $viewFile = APP_ROOT . '/app/views/' . $view . '.php';
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            throw new Exception("View not found: $view");
        }
    }
    
    protected function adminView($view, $data = []) {
        extract($data);
        $viewFile = APP_ROOT . '/app/views/admin/' . $view . '.php';
        $layoutFile = APP_ROOT . '/app/views/admin/layouts/main.php';
        
        if (file_exists($viewFile)) {
            ob_start();
            include $viewFile;
            $content = ob_get_clean();
            
            if (file_exists($layoutFile)) {
                include $layoutFile;
            } else {
                echo $content;
            }
        } else {
            throw new Exception("Admin view not found: $view");
        }
    }
    
    protected function redirect($url) {
        header("Location: $url");
        exit;
    }
    
    protected function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    
    protected function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    
    protected function input($key, $default = null) {
        return $_POST[$key] ?? $_GET[$key] ?? $default;
    }
    
    protected function sanitize($value) {
        return htmlspecialchars(strip_tags(trim($value)), ENT_QUOTES, 'UTF-8');
    }
}
