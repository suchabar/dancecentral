<?php 

class Account extends CI_Controller
{
    function index()
    {
        //GENERATE PAGE OF LOGED USER
        //$data['pageContent'] = 'account_view';
        //$this->load->view('includes/template', $data);
    }
    
    function validate_credentials()
    {
        $this->load->model('account_model');
        $isValidated = $this->account_model->validate();
        if($isValidated)
        {
            $user = $this->account_model->getAccount($this->input->post('login'));
            $sessionData = array(
            'username'  => $user->username,
            'skin' => $user->skin,
            'userRole' => $user->role,
            'hasAvatar' => $user->hasAvatar
            );
            $this->session->set_userdata($sessionData);
            set_cookie('isLoggedIn', '0', 60 * 60);
            redirect('home/');
            //redirect('account/videos/');
        }
        else 
        {
             $this->session->set_userdata('username', $this->input->post("login"));
             redirect('home/');
        }
    }
    
    function logout()
    {
        $this->session->sess_destroy();
        delete_cookie('isLoggedIn');
        redirect('home/');
    }
    
    function signup()
    {
        $data['pageContent'] = 'register_view';
        $this->load->view('includes/template', $data);
    }
    
    function register()
    {
        //VALIDATION OF FORM 
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password2', 'Second password', 'trim|required|matches[password]');
        
        if($this->form_validation->run() == FALSE)
        {
            $data['displayError'] = true;
            $data['pageContent'] = 'register_view';
            $this->load->view('includes/template', $data);
        }
        else
        {
            $this->load->model('account_model');
            if($result = $this->account_model->addUser())redirect('/account/successfull_registration');
            else
            {
                $data['displayError'] = true;
                $data['pageContent'] = 'register_view';
                $this->load->view('includes/template', $data);
            }
        }
    }
    
    function successfull_registration()
    {
        $data['pageContent'] = 'successfull_registration_view';
        $this->load->view('includes/template', $data);
    }
}