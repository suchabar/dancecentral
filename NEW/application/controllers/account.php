<?php
/**
 *   Controller Account is used to display different views including register_view, account_view and settings_view and manage operations around account such *  as editing of account information, login, logout and registration .
 *   @package Controllers
 */ 
class Account extends CI_Controller
{
    /**
     *  Calls Account_model function to get information about account of logged user and then
     *  sends these data into context of account_view which 
     *  @return void
     */
    function index()
    {
        $this->load->model('account_model');
        $data['userData'] = $this->account_model->getAccount($this->session->username);
        $data['pageContent'] = 'account_view';
        $this->load->view('includes/template', $data);
    }
    /**
     *  Replaces pageContent with register_view.
     *  @return void
     */
    function signup()
    {
        $data['pageContent'] = 'register_view';
        $this->load->view('includes/template', $data);
    }
    /**
     *  Calls Account_model function to get information about account of logged user and then
     *  sends these data into context of settings_view.
     *  @return void
     */
    function settings()
    {
        $this->load->model('account_model');
        $data['userData'] = $this->account_model->getAccount($this->session->username);
        $data['pageContent'] = 'settings_view';
        $this->load->view('includes/template', $data);
    }
    /**
     *  Replaces pageContent with successfull_registration_view.
     *  @return void
     */
    function successfull_registration()
    {
        $data['pageContent'] = 'successfull_registration_view';
        $this->load->view('includes/template', $data);
    }
    /**
     *  Replaces pageContent with successfull_changes_view.
     *  @return void
     */
    function successfull_changes()
    {
        $data['pageContent'] = 'successfull_changes_view';
        $this->load->view('includes/template', $data);
    }
    /**
     *  Calls function from Account_model to validate credentials. If validation is successfull we call Account model function 
     *  to get data about logged user and we save some of these information to session. We also set a cookie which represent the state, that user is logged 
     *  in. If validation fails, we set session variable 'username' to entered username - for keeping the username in Login field. 
     *  In any case we redirect then user to home page.
     *  @return void
     */
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
     /**
     *  We destroy session data and cookie with information if user is logged in or not. Afterwards we are redirect to home page.
     *  @return void
     */
    function logout()
    {
        $this->session->sess_destroy();
        delete_cookie('isLoggedIn');
        redirect('home/');
    }
    /**
     *  Validates all fields from registration form which we get from POST, if validation goes well we 
     *  call function from Account_model to actually add new User to database and then we redirect to "success page".
     *  If validation fails, we stay on the same page and send data into context - bool that validation failed.
     *  @return void
     */
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
    /**
     *  Validates new email which we get from POST from form, if validation goes well we 
     *  call function from Account_model to actually change the email and then we redirect to "success page".
     *  If validation fails, we stay on the same page and send data into context - bool that validation failed.
     *  @return void
     */
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
    /**
     *  Validates passwords which we get from POST from form, if validation goes well we 
     *  call function from Account_model to actually change the password and then we redirect to "success page".
     *  If validation fails, we stay on the same page.
     *  @return void
     */
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
    /**
     *  Calls Account_model function setSkin and redirect to successful page (nothing can go wrong).
     *  @return void
     */
    function setSkin()
    {
        $this->load->model('account_model');
        $this->account_model->setSkin();
        redirect('/account/successfull_changes');
    }
    /**
     *  Calls Account_model function uploadImage to upload new chosen avatar, if 
     *  all goes well, it load into template.php data - boolean if upload was successful or not.
     *  @return void
     */
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