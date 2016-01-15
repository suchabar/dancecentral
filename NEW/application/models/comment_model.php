<?php 
    class Comment_model extends CI_Model
    {
        function getComments($idVideo)
        {
            $data = array();
            $this->db->select('*');
            $this->db->where('id_video', $idVideo);
            $q = $this->db->get('comments');
            if($q->num_rows() > 0)
            {
                foreach($q->result() as $row)
                {
                    $data[] = $row;
                }
            }
            return $data;
        }
    
        function addComment($newComment)
        {
            $this->db->insert('comments', $newComment);
            /*
            //NEW COMMENT from form
        if (isset($_POST["new-comment"])) 
        {
            $sql = $db->prepare(
                "INSERT INTO comments (id_user, id_video, text, date)
                VALUES (?, ?, ?, NOW())");
            $sql->execute([$video["id_user"], $videoId, $_POST["text"]]);
        }
            */
        }
        
        function deleteComment($commentId)
    {
            $this->db->where('id', $commentId);
            $this->db->delete('comments');
        }
        
        function rateComment($value, $commentId)
        {
            $this->db->select('*');
            $this->db->where('id_comment', $commentId);
            $this->db->where('ip_address', $this->input->ip_address());
            $q = $this->db->get('thumbs');
            if($q->num_rows() == 0) 
            {
                $this->db->where('id', $commentId);
                $this->db->set('ratings', 'ratings+'.$value, FALSE);
                $this->db->update('comments');
                
                $newThumb = array(
                'id_comment' => $commentId,
                'ip_address' => $this->input->ip_address() );
                $this->db->insert('thumbs', $newThumb);
                return true;
            }        
            else return false;
        }
    
    }
    
    