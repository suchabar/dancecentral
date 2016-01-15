<?php 
    class Account_model extends CI_Model
    {
        function getAccount()
        {
            $data = array();
            $q = $this->db->query("SELECT * FROM comments WHERE id_video = " . $this->uri->segment(3));
            if($q->num_rows() > 0)
            {
                foreach($q->result() as $row)
                {
                    $data[] = $row;
                }
            }
            return $data;
        }
        
        function addUser($newUser)
        {
            $this->db->insert('users', $newUser);
        }
        
        function loginUser()
        {
            $this->db->where('id', 14);
        }
        
        function logoutUser()
        {
            $this->db->where('id', 14);
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