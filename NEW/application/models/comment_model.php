<?php 
    class Comment_model extends CI_Model
    {
        function getComments()
        {
            $q = $this->db->query("SELECT * FROM comments WHERE id_video = " . $this->uri->segment(3));
            if($q->num_rows() > 0)
            {
                foreach($q->result() as $row)
                {
                    $data[] = $row;
                }
                return $data;
            }
        }
    
        function addComment()
        {
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
            $q = $this->db->query("SELECT * FROM comments WHERE id_video = " . $this->uri->segment(3));
            if($q->num_rows() > 0)
            {
                foreach($q->result() as $row)
                {
                    $data[] = $row;
                }
                return $data;
            }
        }
    
    }
    
    