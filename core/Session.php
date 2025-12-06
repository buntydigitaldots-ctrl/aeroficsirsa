<?php
class Session {
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start([
                'cookie_lifetime' => 86400,
                'cookie_secure' => false,
                'cookie_httponly' => true,
                'cookie_samesite' => 'Lax'
            ]);
        }
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }

    public static function has($key) {
        return isset($_SESSION[$key]) && !empty($_SESSION[$key]);
    }

    public static function remove($key) {
        unset($_SESSION[$key]);
    }

    public static function flash($key, $message) {
        $_SESSION['flash'][$key] = $message;
    }

    public static function getFlash($key) {
        $message = $_SESSION['flash'][$key] ?? null;
        unset($_SESSION['flash'][$key]);
        return $message;
    }

    public static function hasFlash($key) {
        return isset($_SESSION['flash'][$key]) && !empty($_SESSION['flash'][$key]);
    }

    public static function destroy() {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }
}