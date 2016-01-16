<?php 

class Home extends CI_Controller
{    
    function index()
    {
        $this->setSessionData();
        //GET VIDEOS
        $this->load->model('video_model');
        $data['videos'] = $this->video_model->getVideos($this->session->danceStyle, $this->session->page);
        //GENERATE PAGE
        $data['pageContent'] = 'main_view';
        $this->load->view('includes/template', $data);
        
    }
    
     function setSessionData()
    {
        $sessionData = array(
            'danceStyle'  => 0,
            'page' => 0,
            'order' => 'Date added (newest > oldest)'
        );
        $this->session->set_userdata($sessionData);
    }
    
    function filter()
    {
        $this->load->model('video_model');
        $this->session->set_userdata('danceStyle', $this->uri->segment(3));
        $data['videos'] = $this->video_model->getVideos($this->session->danceStyle, $this->session->page);
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
        $this->session->set_userdata('order', $this->getOrder($this->uri->segment(3), $this->uri->segment(4)));
        $this->load->model('video_model'); 
        $data['videos'] = $this->video_model->getVideos($this->session->danceStyle, $this->session->page, 
                                                        $this->uri->segment(3), $this->uri->segment(4));       
        //GENERATE PAGE
        $data['pageContent'] = 'main_view';
        $this->load->view('includes/template', $data);
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
        // $this->load->model('video_model');
        // $data['danceStyle'] = $this->uri->segment(3);
        // $data['videos'] = $this->video_model->getVideos($data['danceStyle'], $this->data['page']);
        // //GENERATE PAGE
        // $data['pageContent'] = 'main_view';
        // $this->load->view('includes/template', $data);
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




