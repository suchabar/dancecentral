<?php 
    class Account_model extends CI_Model
    {
        function getAccount($username)
        {
            //QUERY BUILDER SAVE US FROM SQL INJECTIONS
            $this->db->select('*');
            $this->db->where('username', $username);
            $q = $this->db->get('users');
            if($q->num_rows() == 1) return $q->result()[0];
        }
        
        function validate()
        {
            $this->db->where('username', $this->input->post('login'));
            $q = $this->db->get('users');
            if($q->num_rows() == 1)
            {
                $user = $q->result()[0];
                return $this->passwordVerify($this->input->post('password'), $user->password);
            }
            else return false;
        }
        
        function addUser()
        {
            $newUser = array(
                'username'=> $this->input->post('username'),
                'password'=> $this->getSaltedHash($this->input->post('password')),           
                'date_of_registration'=> date("Y-m-d H:i:s"),
                'email'=>$this->input->post('email'),
                'role'=> 1,
                'dance_style'=> $this->input->post('danceStyle'),
                'skin'=> 0,
                'hasAvatar' => 1
            );
            return $this->db->insert('users', $newUser);
        }
        
        public function uploadAvatar($fileName)
        {
                $config['upload_path']          = APPPATH.'../img/avatars/';
                $config['file_name']            = 'user'.$fileName.'jpeg';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = 3000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload()) 
                {
                        $error = array('error' => $this->upload->display_errors());
                        echo var_dump($error);
                        die();
                }
                else
                {
                        return true;
                }
        }
        
        function getSaltedHash($password)
        {
            return password_hash($password, PASSWORD_BCRYPT, array('cost' => 11));
        }
        
        function passwordVerify($password, $hashFromDb)
        {
	       return password_verify($password, $hashFromDb);
        }
	
        function updateAccount($account)
        { //SETTINGS NAPR
            $this->db->where('id', 14);
            $this->db->update('account', $account);
        }
        
        function banAccount()
        {
            
        }
        
    }