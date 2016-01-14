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
    
    function filter()
    {
        $this->load->model('video_model');
        $data['danceStyle'] = $this->uri->segment(3);
        $data['videos'] = $this->video_model->getVideos($data['danceStyle'], $this->data['page']);
        //GENERATE PAGE
        $data['pageContent'] = 'main_view';
        $this->load->view('includes/template', $data);
    }
    
    function arrangement()
    {
        //LOAD VIDEOS AND RETURN ARRANGED ACCORDING TO $this->uri->segment(3)
        /*
            1 - Date added (newest > oldest)
            2 - Date added (oldest > newest)
            3 - Best rated
            4 - Worst rated
        */
        $data['danceStyle'] = $this->uri->segment(5);
        $this->load->model('video_model'); 
        $data['videos'] = $this->video_model->getVideos($this->uri->segment(5), $this->data['page'], 
                                                        $this->uri->segment(3), $this->uri->segment(4));
        
        //GENERATE PAGE
        $data['pageContent'] = 'main_view';
        $this->load->view('includes/template', $data);
    }
    
    function page()
    {
        // $this->load->model('video_model');
        // $data['danceStyle'] = $this->uri->segment(3);
        // $data['videos'] = $this->video_model->getVideos($data['danceStyle'], $this->data['page']);
        // //GENERATE PAGE
        // $data['pageContent'] = 'main_view';
        // $this->load->view('includes/template', $data);
    }
    
    
    
    //CHANGE OF "PAGECONTENT" IN TEMPLATE
    
    function video_detail()
    {
        //DANCE STYLE INFO
        $data = $this->data;
        //GET VIDEO DETAILS 
        $this->load->model('video_model');
        $data['video'] = $this->video_model->getVideoDetail();
        //GET COMMENTS
        $this->load->model('comment_model');
        $data['comments'] = $this->comment_model->getComments();
        
        //GENERATE PAGE
        $data['pageContent'] = 'video_view';
        $this->load->view('includes/template', $data);
    }
    
    function about()
    {
        $data['pageContent'] = 'parts/about_view'.$this->uri->segment(3);
        $this->load->view('includes/template', $data);
    }
    
    function how_to_start()
    {
        $data['pageContent'] = 'parts/how_to_start_view'.$this->uri->segment(3);
        $this->load->view('includes/template', $data);
    }
    
    function music()
    {
        $data['pageContent'] = 'parts/music_view'.$this->uri->segment(3);
        $this->load->view('includes/template', $data);
    }
}




