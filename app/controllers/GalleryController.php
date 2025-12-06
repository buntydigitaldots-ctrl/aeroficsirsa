<?php
class GalleryController extends Controller {
    public function index() {
        $galleryModel = new GalleryItem();
        $items = $galleryModel->pageGallery();
        
        $this->view('gallery/index', [
            'items' => $items
        ]);
    }
}
