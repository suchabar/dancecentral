<?php 

class Home extends CI_Controller
{
    public $data;
    
     function __construct()
     {
        parent::__construct();
        $this->data = array(
            'danceStyle' => 0,
            'page' => 0
        );
    }    
    
    function index()
    {
        $data = $this->data;
        //GET VIDEOS
        $this->load->model('video_model');
        $data['videos'] = $this->video_model->getVideos($data['danceStyle'], $data['page']);
        //GENERATE PAGE
        $data['pageContent'] = 'main_view';
        $this->load->view('includes/template', $data);
        
    }
    
    function style()
    {
        $this->load->model('video_model');
        $data['danceStyle'] = $this->uri->segment(3);
        $data['videos'] = $this->video_model->getVideos($data['danceStyle'], $this->data['page']);
        //GENERATE PAGE
        $data['pageContent'] = 'main_view';
        $this->load->view('includes/template', $data);
    }
    
    function page()
    {
        $this->load->model('video_model');
        $data['danceStyle'] = $this->uri->segment(3);
        $data['videos'] = $this->video_model->getVideos($data['danceStyle'], $this->data['page']);
        //GENERATE PAGE
        $data['pageContent'] = 'main_view';
        $this->load->view('includes/template', $data);
    }
    
    function video_detail()
    {
        //GET VIDEO DETAILS 
        $this->load->model('video_model');
        $data['video'] = $this->video_model->getVideoDetail();
        
        $this->load->model('comment_model');
        $data['comments'] = $this->comment_model->getComments();
        
        //GENERATE PAGE
        $data['pageContent'] = 'video_view';
        $this->load->view('includes/template', $data);
    }
    
    function about()
    {
        //GENERATE PAGE
        $data['pageContent'] = 'parts/about_view'.$this->uri->segment(3);
        $this->load->view('includes/template', $data);
    }
    
    function how_to_start()
    {
        //GENERATE PAGE
        $data['pageContent'] = 'parts/how_to_start_view'.$this->uri->segment(3);
        $this->load->view('includes/template', $data);
    }
    
    function music()
    {
        //GENERATE PAGE
        $data['pageContent'] = 'parts/music_view'.$this->uri->segment(3);
        $this->load->view('includes/template', $data);
    }
}




