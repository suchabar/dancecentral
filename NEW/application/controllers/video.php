<?php 

class Video extends CI_Controller
{
    function index()
    {
        //GET VIDEO DETAILS 
        $this->load->model('video_model');
        $data['video'] = $this->video_model->getVideoDetail($this->session->videoId);
        //GET COMMENTS
        $this->load->model('comment_model');
        $data['comments'] = $this->comment_model->getComments($this->session->videoId);
        //GET ACCOUNT OF UPLOADING PERSON
        $this->load->model('account_model');
        $data['uploadingUser'] = $this->account_model->getAccount($data['video']->id_user);
        
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
        $this->setSessionData();
        $this->index();        
    }
    
    function rateVideo()
    {
        $rating = $this->input->post('rating');
        $this->load->model('video_model');
        $first_time_rated = $this->video_model->rateVideo($rating, $this->session->videoId);
        $data['video'] = $this->video_model->getVideoDetail($this->session->videoId);
        $jsonResponse = array(
            'first_time_rated' => $first_time_rated,
            'rating' => $data['video']->ratings
        );
        $json = json_encode($jsonResponse);
        echo $json;
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
    
    function comment()
    {
         $this->load->model('comment_model');
         $this->comment_model->addComment();
         redirect('/video/detail/'.$this->session->videoId);
    }
    
}