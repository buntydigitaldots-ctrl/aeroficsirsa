<?php
class DashboardController extends Controller {
    public function index() {
        Auth::requireAdmin();

        $orderModel = new Order();
        $productModel = new Product();
        $userModel = new User();
        $contactModel = new ContactQuery();

        try {
            $stats = [
                'total_orders' => $orderModel->count(),
                'pending_orders' => $orderModel->count("status = 'pending'"),
                'total_products' => $productModel->count(),
                'total_users' => $userModel->count("role = 'customer'"),
                'pending_enquiries' => $contactModel->count("is_read = 0")
            ];

            $recentOrders = $orderModel->all('created_at DESC LIMIT 5');
        } catch (Exception $e) {
            error_log("Dashboard error: " . $e->getMessage());
            $stats = [
                'total_orders' => 0,
                'pending_orders' => 0,
                'total_products' => 0,
                'total_users' => 0,
                'pending_enquiries' => 0
            ];
            $recentOrders = [];
        }

        $this->adminView('dashboard/index', [
            'stats' => $stats,
            'recentOrders' => $recentOrders
        ]);
    }
}