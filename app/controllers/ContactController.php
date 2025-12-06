<?php
class ContactController extends Controller {
    public function index() {
        $this->view('pages/contact');
    }
    
    public function submit() {
        if (!$this->isPost()) {
            $this->redirect('/contact');
            return;
        }
        
        CSRF::check();
        
        $validator = new Validator($_POST);
        $validator->required('name')
                  ->required('email')
                  ->email('email')
                  ->required('message');
        
        if ($validator->fails()) {
            Session::flash('error', $validator->firstError());
            $this->redirect('/contact');
            return;
        }
        
        $queryModel = new ContactQuery();
        $queryModel->create([
            'name' => $this->sanitize($_POST['name']),
            'email' => $this->sanitize($_POST['email']),
            'phone' => $this->sanitize($_POST['phone'] ?? ''),
            'subject' => $this->sanitize($_POST['subject'] ?? ''),
            'message' => $this->sanitize($_POST['message']),
            'type' => 'contact',
            'status' => 'new'
        ]);
        
        Session::flash('success', 'Thank you for contacting us! We will get back to you soon.');
        $this->redirect('/contact');
    }
    
    public function dealerEnquiry() {
        $this->view('pages/dealer-enquiry');
    }
    
    public function submitDealerEnquiry() {
        if (!$this->isPost()) {
            $this->redirect('/dealer-enquiry');
            return;
        }
        
        CSRF::check();
        
        $validator = new Validator($_POST);
        $validator->required('name')
                  ->required('email')
                  ->email('email')
                  ->required('phone')
                  ->required('message');
        
        if ($validator->fails()) {
            Session::flash('error', $validator->firstError());
            $this->redirect('/dealer-enquiry');
            return;
        }
        
        $queryModel = new ContactQuery();
        $queryModel->create([
            'name' => $this->sanitize($_POST['name']),
            'email' => $this->sanitize($_POST['email']),
            'phone' => $this->sanitize($_POST['phone']),
            'subject' => 'Dealer Enquiry - ' . $this->sanitize($_POST['company'] ?? ''),
            'message' => $this->sanitize($_POST['message']),
            'type' => 'dealer',
            'status' => 'new'
        ]);
        
        Session::flash('success', 'Thank you for your interest! Our team will contact you soon.');
        $this->redirect('/dealer-enquiry');
    }
}
