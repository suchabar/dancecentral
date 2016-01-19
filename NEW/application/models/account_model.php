<?php 
	/**
	 * 	Model Account is used for the direct communication and operations over table "users" in database. Models are generally returning the specific data *from database to Controllers or just changing the content of database somehow. Specifically this model is getting information about account, validates *credentials after login, adding new user and updating user information.
	 * 	@package Models
	 */ 
    class Account_model extends CI_Model
    {
		/**
		 * Gets information about specific user according to its username.
		 *  @param string $username Username of specific user
		 *  @return object Data about specific user 
		 */
        function getAccount($username)
        {
            //QUERY BUILDER SAVE US FROM SQL INJECTIONS
            $this->db->select('*');
            $this->db->where('username', $username);
            $q = $this->db->get('users');
            if($q->num_rows() == 1) return $q->result()[0];
        }
        /**
		 * Checks if login process was successful.
		 * @return bool If credentials matches
		 */
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
         /**
		 * Add new user into database.
		 * @return bool If insertion of the new user was successful
		 */
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
         /**
		 * Creates or replaces existing image avatar of specific user.
		 * @return bool If upload of image was successful
		 */
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
        /**
		 * Help method which creates from password salted hashed password
		   @param string $password Inserted password of user
		 * @return string Salted hashed password
		 */
        function getSaltedHash($password)
        {
            return password_hash($password, PASSWORD_BCRYPT, array('cost' => 11));
        }
        /**
		 * Help method which verifies if two salted hashed passwords match
		 *  @param string $password Inserted password of user
		 *  @param string $hashFromDb Hashed password from database
		 * @return bool If passwords match
		 */
        function passwordVerify($password, $hashFromDb)
        {
	       return password_verify($password, $hashFromDb);
        }
		/**
		 *  Updates information about user.
		 *  @return bool If update of user was successful
		 */
        function updateAccount()
        {
            $this->db->set('email', $this->input->post('email'));
            $this->db->set('dance_style', $this->input->post('danceStyle'));
            $this->db->where('username', $this->session->username);
            return $this->db->update('users');
        }
        /**
		 *  Updates password of user.
		 *  @return bool If update of password was successful
		 */
        function changePassword()
        {
            $this->db->set('password', $this->getSaltedHash($this->input->post('password')));
            $this->db->where('username', $this->session->username);
            return $this->db->update('users');
        }
        /**
		 *  Updates selected skin of user and saves the information about new skin into session.
		 */
        function setSkin()
        {
            $this->db->set('skin', $this->input->post('skin'));
            $this->db->where('username', $this->session->username);
            $this->db->update('users');
            $this->session->set_userdata('skin', $this->input->post('skin'));
        }
        
    }