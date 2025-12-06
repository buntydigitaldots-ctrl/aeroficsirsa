<?php
class VideoController extends Controller {
    public function index() {
        $videoModel = new Video();
        $videos = $videoModel->pageVideos();
        
        $this->view('video/index', [
            'videos' => $videos
        ]);
    }
}
