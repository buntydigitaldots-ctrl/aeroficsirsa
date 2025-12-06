<?php
class AccountController extends Controller {
    public function loginForm() {
        if (Auth::check()) {
            $this->redirect('/account');
            return;
        }
        $this->view('account/login');
    }
    
    public function login() {
        if (!$this->isPost()) {
            $this->redirect('/login');
            return;
        }
        
        CSRF::check();
        
        $email = $this->sanitize($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        
        $userModel = new User();
        $user = $userModel->findByEmail($email);
        
        if ($user && Auth::verifyPassword($password, $user['password'])) {
            Auth::login($user);
            Session::flash('success', 'Welcome back, ' . $user['name'] . '!');
            $this->redirect('/account');
        } else {
            Session::flash('error', 'Invalid email or password');
            $this->redirect('/login');
        }
    }
    
    public function registerForm() {
        if (Auth::check()) {
            $this->redirect('/account');
            return;
        }
        $this->view('account/register');
    }
    
    public function register() {
        if (!$this->isPost()) {
            $this->redirect('/register');
            return;
        }
        
        CSRF::check();
        
        $validator = new Validator($_POST);
        $validator->required('name')
                  ->required('email')
                  ->email('email')
                  ->required('password')
                  ->min('password', 6);
        
        if ($validator->fails()) {
            Session::flash('error', $validator->firstError());
            $this->redirect('/register');
            return;
        }
        
        $userModel = new User();
        
        if ($userModel->findByEmail($_POST['email'])) {
            Session::flash('error', 'Email already registered');
            $this->redirect('/register');
            return;
        }
        
        $userId = $userModel->createUser([
            'name' => $this->sanitize($_POST['name']),
            'email' => $this->sanitize($_POST['email']),
            'phone' => $this->sanitize($_POST['phone'] ?? ''),
            'password' => $_POST['password'],
            'role' => 'customer'
        ]);
        
        $user = $userModel->find($userId);
        Auth::login($user);
        
        Session::flash('success', 'Account created successfully!');
        $this->redirect('/account');
    }
    
    public function logout() {
        Auth::logout();
        Session::flash('success', 'You have been logged out');
        $this->redirect('/');
    }
    
    public function dashboard() {
        Auth::requireAuth();
        
        $orderModel = new Order();
        $orders = $orderModel->byUser(Auth::id());
        
        $this->view('account/dashboard', [
            'user' => Auth::user(),
            'orders' => array_slice($orders, 0, 5)
        ]);
    }
    
    public function orders() {
        Auth::requireAuth();
        
        $orderModel = new Order();
        $orders = $orderModel->byUser(Auth::id());
        
        $this->view('account/orders', [
            'orders' => $orders
        ]);
    }
    
    public function orderDetail($id) {
        Auth::requireAuth();
        
        $orderModel = new Order();
        $order = $orderModel->find($id);
        
        if (!$order || $order['user_id'] != Auth::id()) {
            http_response_code(404);
            $this->view('errors/404');
            return;
        }
        
        $items = $orderModel->getItems($id);
        
        $this->view('account/order-detail', [
            'order' => $order,
            'items' => $items
        ]);
    }
}
