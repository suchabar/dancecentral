<?php 

class Account extends CI_Controller
{
    function index()
    {
        $this->load->model('account_model');
        $data['userData'] = $this->account_model->getAccount($this->session->username);
        $data['pageContent'] = 'account_view';
        $this->load->view('includes/template', $data);
    }
    
    function signup()
    {
        $data['pageContent'] = 'register_view';
        $this->load->view('includes/template', $data);
    }
    
    function settings()
    {
        $this->load->model('account_model');
        $data['userData'] = $this->account_model->getAccount($this->session->username);
        $data['pageContent'] = 'settings_view';
        $this->load->view('includes/template', $data);
    }
    
    function successfull_registration()
    {
        $data['pageContent'] = 'successfull_registration_view';
        $this->load->view('includes/template', $data);
    }
    
    function successfull_changes()
    {
        $data['pageContent'] = 'successfull_changes_view';
        $this->load->view('includes/template', $data);
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
            'avatar'    => $user->avatar,
            'skin'      => $user->skin,
            'userRole' => $user->role,
            'hasAvatar' => $user->hasAvatar
            );
            $this->session->set_userdata($sessionData);
            set_cookie('isLoggedIn', '0', 60 * 60);
            redirect('home/');
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
    
    function register()
    {
        //VALIDATION OF FORM 
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[50]');
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
    
    function updateAccount()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run() == FALSE)
        {
            $data['displayError'] = true;
            $data['pageContent'] = 'account_view';
            $this->load->view('includes/template', $data);
        }
        else
        {
            $this->load->model('account_model');
            if($result = $this->account_model->updateAccount())redirect('/account/successfull_changes');
            else
            {
                $data['displayError'] = true;
                $data['pageContent'] = 'account_view';
                $this->load->view('includes/template', $data);
            }
        }
        
    }
    
    function changePassword()
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password2', 'Second password', 'trim|required|matches[password]');
        
        if($this->form_validation->run() == FALSE)
        {
            $data['pageContent'] = 'settings_view';
            $this->load->view('includes/template', $data);
        }
        else
        {
            $this->load->model('account_model');
            if($result = $this->account_model->changePassword())redirect('/account/successfull_changes');
            else
            {
                $data['pageContent'] = 'settings_view';
                $this->load->view('includes/template', $data);
            }
        }
    }
    
    function setSkin()
    {
        $this->load->model('account_model');
        $this->account_model->setSkin();
        redirect('/account/successfull_changes');
    }
    
    function changeAvatar()
    {
        $this->load->model('account_model');
        $result= $this->account_model->uploadImage();
        if(!array_key_exists('error',$result))
        {
            $data['displaySuccess'] = "Your avatar was successfully changed.";
            $data['userData'] = $this->account_model->getAccount($this->session->username);
            $data['pageContent'] = 'account_view';
            $this->load->view('includes/template', $data);
        }
        else
        {
            $data['displayError'] = $result['error'];
            $data['userData'] = $this->account_model->getAccount($this->session->username);
            $data['pageContent'] = 'account_view';
            $this->load->view('includes/template', $data);
        }
    }
}