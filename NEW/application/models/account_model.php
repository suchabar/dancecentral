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
                'skin'=> 1,
                'hasAvatar' => 1
            );
            return $this->db->insert('users', $newUser);
        }
        
        public function uploadImage()
        {
            $config = array(
                'file_name'     => $this->session->username,
                'allowed_types' => 'jpg|jpeg|png',
                'upload_path' => "./img/avatars/",
                'max_size' => 4000,
                'overwrite'=> true
            );
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('newAvatar')) 
            {
                    $error = array('error' => $this->upload->display_errors());
                    return $error;
            }
            else
            {
                $img = $this->upload->data();
                $this->session->set_userdata('avatar', $img['file_name']);
                $this->db->set('avatar', $img['file_name']);
                $this->db->where('username', $this->session->username);
                $this->db->update('users');
                return $img;
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
	
        function updateAccount()
        {
            $this->db->set('email', $this->input->post('email'));
            $this->db->set('dance_style', $this->input->post('danceStyle'));
            $this->db->where('username', $this->session->username);
            return $this->db->update('users');
        }
        
        function changePassword()
        {
            $this->db->set('password', $this->getSaltedHash($this->input->post('password')));
            $this->db->where('username', $this->session->username);
            return $this->db->update('users');
        }
        
        function setSkin()
        {
            $this->db->set('skin', $this->input->post('skin'));
            $this->db->where('username', $this->session->username);
            $this->db->update('users');
            $this->session->set_userdata('skin', $this->input->post('skin'));
        }
        
        function banAccount()
        {
            
        }
        
    }