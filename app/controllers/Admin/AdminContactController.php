<?php
class AdminContactController extends Controller {
    public function index() {
        Auth::requireAdmin();
        $queryModel = new ContactQuery();
        $queries = $queryModel->all('created_at DESC');
        $this->adminView('enquiries/index', ['queries' => $queries]);
    }
    
    public function show($id) {
        Auth::requireAdmin();
        $queryModel = new ContactQuery();
        $query = $queryModel->find($id);
        
        if (!$query) {
            Session::flash('error', 'Enquiry not found');
            $this->redirect('/admin/enquiries');
            return;
        }
        
        $this->adminView('enquiries/view', ['query' => $query]);
    }
    
    public function update($id) {
        Auth::requireAdmin();
        CSRF::check();
        
        $queryModel = new ContactQuery();
        $queryModel->update($id, [
            'status' => $this->sanitize($_POST['status']),
            'notes' => $_POST['notes'] ?? ''
        ]);
        
        Session::flash('success', 'Enquiry updated');
        $this->redirect('/admin/enquiries');
    }
}
