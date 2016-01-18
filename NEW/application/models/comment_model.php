<?php 
    class Comment_model extends CI_Model
    {
        function getComments($idVideo)
        {
            $data = array();
            $this->db->select('comments.*, users.hasAvatar, users.avatar');
            $this->db->from('comments');
            $this->db->where('id_video', $idVideo);
            $this->db->join('users', 'comments.id_user = users.username');
            $q = $this->db->get();
            if($q->num_rows() > 0)
            {
                foreach($q->result() as $row)
                {
                    $data[] = $row;
                }
            }
            return $data;
        }
    
        function addComment()
        {
            $newComment = array(
                'id'   => '',
                'text' => $this->input->post('comment_text'),
                'date' => date("Y-m-d H:i:s"),
                'ratings' => 0,
                'id_user' => $this->session->username,
                'id_video' => $this->session->videoId);
            $this->db->insert('comments', $newComment);
            $newComment['id'] = $this->db->insert_id();
            return $newComment;
        }
        
        function deleteComment()
        {
            $this->db->where('id', $this->uri->segment(3));  
            $this->db->delete('comments');
        }
        
        function rateComment($value, $commentId)
        {
            $this->db->select('*');
            $this->db->where('id_comment', $commentId);
            $this->db->where('id_user', $this->session->username);
            $q = $this->db->get('thumbs');
            
            if($q->num_rows() == 0) 
            {
                $this->db->where('id', $commentId);
                $this->db->set('ratings', 'ratings+'.$value, FALSE);
                $this->db->update('comments');                
                $newThumb = array(
                'id_comment' => $commentId,
                'id_user' => $userId = $this->session->username);
                $this->db->insert('thumbs', $newThumb);
                return true;
            }        
            else return false;
        }
    
    }
    
    