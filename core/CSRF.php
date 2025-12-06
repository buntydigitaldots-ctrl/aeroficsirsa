<?php
class CSRF {
    public static function generateToken() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public static function token() {
        return self::generateToken();
    }

    public static function validateToken($token) {
        if (!isset($_SESSION['csrf_token'])) {
            return false;
        }
        return hash_equals($_SESSION['csrf_token'], $token);
    }
    
    public static function check() {
        $token = $_POST['csrf_token'] ?? '';
        if (!self::validateToken($token)) {
            http_response_code(403);
            die('Invalid CSRF token');
        }
    }
}