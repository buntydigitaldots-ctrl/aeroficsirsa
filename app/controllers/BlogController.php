<?php
class BlogController extends Controller {
    public function index() {
        $blogModel = new BlogPost();
        $posts = $blogModel->published();
        
        $this->view('blog/index', [
            'posts' => $posts
        ]);
    }
    
    public function show($slug) {
        $blogModel = new BlogPost();
        $post = $blogModel->findBySlug($slug);
        
        if (!$post || !$post['is_published']) {
            http_response_code(404);
            $this->view('errors/404');
            return;
        }
        
        $this->view('blog/show', [
            'post' => $post
        ]);
    }
}
