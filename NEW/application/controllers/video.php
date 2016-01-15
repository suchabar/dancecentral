<?php 

class Video extends CI_Controller
{
    function index()
    {
        $this->setSessionData();
        //GET VIDEO DETAILS 
        $this->load->model('video_model');
        $data['video'] = $this->video_model->getVideoDetail($this->session->videoId);
        //GET COMMENTS
        $this->load->model('comment_model');
        $data['comments'] = $this->comment_model->getComments($this->session->videoId);
        
        //GENERATE PAGE
        $data['pageContent'] = 'video_view';
        $this->load->view('includes/template', $data);
        
    }
    
    function setSessionData()
    {
        $sessionData = array(
            'danceStyle'  => 0,
            'videoId'=> $this->uri->segment(3)
        );
        $this->session->set_userdata($sessionData);
    }
    
    function detail()
    {
        $this->index();        
    }
    
    function rateVideo()
    {
        $rating = $this->input->post('rating');
        $this->load->model('video_model');
        $first_time_rated = $this->video_model->rateVideo($rating, $this->session->videoId);
        if(!$first_time_rated)echo true;
        else echo false;
    }
    
    function thumbs()
    {
        //GET INFO FROM AJAX POST
        $commentId = $this->input->post('commentId');
        $ratingsValue = $this->input->post('ratingValue');
        
        $this->load->model('comment_model');
        $is_result_successfull = $this->comment_model->rateComment($ratingsValue, $commentId);
        if(!$is_result_successfull)echo 'You have already voted!';
    }
    
}