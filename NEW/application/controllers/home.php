<?php 

class Home extends CI_Controller
{    
    function index()
    {
        $this->setSessionData();
        $this->loadVideos();
    }
    
    function loadVideos()
    {
        //GET VIDEOS
        $this->load->model('video_model'); 
        $data['videos'] = $this->video_model->getVideos($this->session->danceStyle, $this->session->offset + $this->session->page, 
                                                      $this->session->arrangement, $this->session->order);  
        //GENERATE PAGE
        $data['pageContent'] = 'main_view';
        $this->load->view('includes/template', $data);
    }
    
    function setSessionData()
    {
        $sessionData = array(
            'danceStyle'  => 0,
            'page' => 0,
            'offset' => 0,
            'arrangement'  => 'date_of_upload',
            'order' => 'desc',
            'orderTitle' => 'Date added (newest > oldest)'
        );
        $this->session->set_userdata($sessionData);
    }
    
    function filter()
    {
        $this->session->set_userdata('danceStyle', $this->uri->segment(3));
        $this->loadVideos();
    }
    //LOAD VIDEOS AND RETURN ARRANGED ACCORDING TO $this->uri->segment(3)
    /*
        1 - Date added (newest > oldest)
        2 - Date added (oldest > newest)
        3 - Best rated
        4 - Worst rated
    */
    function arrangement()
    {
         $sessionData = array(
            'arrangement'  => $this->uri->segment(3),
            'order' => $this->uri->segment(4),
            'orderTitle' => $this->getOrder($this->uri->segment(3), $this->uri->segment(4))
        );
        $this->session->set_userdata($sessionData);
        $this->loadVideos();
    }
    
    function getOrder($a, $b)
    {
        if($a == 'date_of_upload')
        {
            if($b == 'desc')return 'Date added (newest > oldest)';
            else return 'Date added (oldest > newest)';
        }
        else
        {
            if($b == 'desc')return 'Best rated';
            else return 'Worst rated';
        }
    }
    
    function page()
    {
        $this->session->set_userdata('page', $this->uri->segment(3));
        $this->loadVideos();
    }
    function offset()
    {
        $oldOffset = $this->session->offset;
        $newOffset = ($this->uri->segment(3)*5) + $oldOffset;
        if($newOffset >= 0)$this->session->set_userdata('offset', $newOffset);
        $this->loadVideos();
    }
    
    //CHANGE OF "PAGECONTENT" IN TEMPLATE
    function about()
    {
        $data['pageContent'] = 'parts/about_view'.$this->session->danceStyle;
        $this->load->view('includes/template', $data);
    }
    
    function how_to_start()
    {
        $data['pageContent'] = 'parts/how_to_start_view'.$this->session->danceStyle;
        $this->load->view('includes/template', $data);
    }
    
    function music()
    {
        $data['pageContent'] = 'parts/music_view'.$this->session->danceStyle;
        $this->load->view('includes/template', $data);
    }
}




