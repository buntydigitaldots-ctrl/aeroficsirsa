<?php
class AdminAuthController extends Controller {
    public function dashboard() {
        if (!Auth::isAdmin()) {
            $this->redirect('/admin/login');
            return;
        }
        $this->redirect('/admin/dashboard');
    }

    public function loginForm() {
        if (Auth::isAdmin()) {
            $this->redirect('/admin/dashboard');
            return;
        }
        $this->adminView('login');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/login');
            return;
        }

        $email = trim($this->input('email'));
        $password = $this->input('password');

        if (empty($email) || empty($password)) {
            Session::flash('error', 'Please enter both email and password');
            $this->redirect('/admin/login');
            return;
        }

        $userModel = new User();
        $user = $userModel->findBy('email', $email);

        if ($user && password_verify($password, $user['password']) && $user['role'] === 'super_admin' && $user['is_active']) {
            Auth::login($user);

            // Redirect to intended page or dashboard
            $redirect = $_SESSION['redirect_after_login'] ?? '/admin/dashboard';
            unset($_SESSION['redirect_after_login']);
            $this->redirect($redirect);
        } else {
            Session::flash('error', 'Invalid credentials or account not active');
            $this->redirect('/admin/login');
        }
    }

    public function logout() {
        Auth::logout();
        $this->redirect('/admin/login');
    }
}