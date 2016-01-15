<?php 

class Account extends CI_Controller
{
    function index()
    {
        //GENERATE PAGE OF LOGED USER
        $data['pageContent'] = 'account_view';
        $this->load->view('includes/template', $data);
    }
    
    function signup()
    {
        $data['pageContent'] = 'register_view';
        $this->load->view('includes/template', $data);
        // $this->load->model('video_model');
        // $data['danceStyle'] = $this->uri->segment(3);
        // $data['videos'] = $this->video_model->getVideos($data['danceStyle'], $this->data['page']);
        // //GENERATE PAGE
        // $data['pageContent'] = 'main_view';
        // $this->load->view('includes/template', $data);
    }
    
    function register()
    {
        $newUser = array(
            'email' => $this->input->post('inputEmail'),
            'username'=> $this->input->post('inputUsername'),
            'password'=> $this->getSaltedPassword($this->input->post('inputPassword')),
            
            'date_of_registration'=> date(),
            'role'=> 1,
            'dance_style'=> $this->input->post('dance_style'),
            'skin'=> 0
        );
        //'avatar'=> $this->base_url() . "img/avatars/". $this->input->post('username'),
        $this->load->model('account_model');
        $this->account_model->addUser($newUser);
        $this->index();
    }
}