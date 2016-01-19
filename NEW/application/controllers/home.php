<?php
/**
 *   Controller Home is used to display different views including main_view, about_view[1-4] (according to danceStyle), how_to_start_view[1-4] 
*   (according to danceStyle), music_view[1-4] (according to danceStyle) and manage operations such as loading the videos for main page including
*   filtering and arranging these videos.
 *   @package Controllers
 */ 
class Home extends CI_Controller
{    
    /**
     *  Sets default session data and calls function loadVideos just below to load all the videos and sets the pageContent to main_view. 
     *  @return void
     */
    function index()
    {
        $this->setSessionData();
        $this->loadVideos();
    }
    /**
     *  Calls function from Video_model to load all the videos according to specific dance style, arrangement, order and with specific offset.
     *  After it sets the pageContent of template file to main_view. 
     *  @return void
     */
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
    /**
     *  Sets session data used for loading of videos.
     *  @return void
     */
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
    /**
     *  Sets filtering condition - to get videos only of some specific dance style. After it loads videos and displays them.
     *  @return void
     */
    function filter()
    {
        $this->session->set_userdata('danceStyle', $this->uri->segment(3));
        $this->loadVideos();
    }
    /**
     * Sets arrangement condition - to get videos arranged by some specification. After it loads videos and displays them like that.
     * @return void
     */
    function arrangement()
    {
	/*
		$this->uri->segment(3) = according to what
		$this->uri->segment(4) = DESC/ASC
	    1 - Date added (newest > oldest)
        2 - Date added (oldest > newest)
        3 - Best rated
        4 - Worst rated
      */
         $sessionData = array(
            'arrangement'  => $this->uri->segment(3),
            'order' => $this->uri->segment(4),
            'orderTitle' => $this->getOrder($this->uri->segment(3), $this->uri->segment(4))
        );
        $this->session->set_userdata($sessionData);
        $this->loadVideos();
    }
    /**
     * Help function to construct right title of arrangement
     * @param string $a According to what we want to arrange videos
     * @param string $b DESC/ASC order
     * @return string specific title for arrangement drop-down select 
     */
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
    /**
     * Sets offset condition. After it loads these videos with this specific offset and if there are any, it displays them .
     * @return void
     */
    function page()
    {
        $this->session->set_userdata('page', $this->uri->segment(3));
        $this->loadVideos();
    }
     /**
      * Sets greater-offset condition. After it loads these videos with this specific offset and if there are any, it displays them .
      * @return void
      */
    function offset()
    {
        $oldOffset = $this->session->offset;
        $newOffset = ($this->uri->segment(3)*5) + $oldOffset;
        if($newOffset >= 0)$this->session->set_userdata('offset', $newOffset);
        $this->loadVideos();
    }
    /**
     * Sets the pageContent of template file to about_view for specific dance style.
     * @return void
     */
    function about()
    {
        $data['pageContent'] = 'parts/about_view'.$this->session->danceStyle;
        $this->load->view('includes/template', $data);
    }
    /**
     * Sets the pageContent of template file to how_to_start_view for specific dance style.
     * @return void
     */
    function how_to_start()
    {
        $data['pageContent'] = 'parts/how_to_start_view'.$this->session->danceStyle;
        $this->load->view('includes/template', $data);
    }
    /**
     *  Sets the pageContent of template file to music_view for specific dance style.
     *  @return void
     */
    function music()
    {
        $data['pageContent'] = 'parts/music_view'.$this->session->danceStyle;
        $this->load->view('includes/template', $data);
    }
}

