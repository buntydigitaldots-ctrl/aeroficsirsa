<?php
class Auth {
    public static function login($user) {
        Session::set('user_id', $user['id']);
        Session::set('user_email', $user['email']);
        Session::set('user_name', $user['name']);
        Session::set('user_role', $user['role'] ?? 'customer');
    }

    public static function logout() {
        Session::remove('user_id');
        Session::remove('user_email');
        Session::remove('user_name');
        Session::remove('user_role');
    }

    public static function check() {
        return Session::has('user_id');
    }

    public static function user() {
        if (!self::check()) return null;
        return [
            'id' => Session::get('user_id'),
            'email' => Session::get('user_email'),
            'name' => Session::get('user_name'),
            'role' => Session::get('user_role')
        ];
    }

    public static function id() {
        return Session::get('user_id');
    }

    public static function isAdmin() {
        $role = Session::get('user_role');
        return in_array($role, ['super_admin', 'admin', 'product_manager', 'content_manager', 'order_manager']);
    }

    public static function requireAuth() {
        if (!self::check()) {
            Session::flash('error', 'Please login to continue');
            header('Location: /login');
            exit;
        }
    }

    public static function requireAdmin() {
        if (!self::isAdmin()) {
            Session::flash('error', 'Access denied');
            header('Location: /admin/login');
            exit;
        }
    }

    public static function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }
}