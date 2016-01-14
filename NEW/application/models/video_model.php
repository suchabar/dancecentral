<?php 
    class Video_model extends CI_Model
    {
        function getVideos($danceStyle, $pagination, $arrangement = 'date_of_upload', $order = 'desc')
        {
            //LOAD ALL VIDEOS (of specific style) for specific page in specific order
            //SAFE CONDITION AGAINST SQL INJECTION + $this->db->escape METHODS 
            $danceStyleCondition = ($danceStyle < 5 && $danceStyle > 0) ? "WHERE dance_style = " . $this->db->escape($danceStyle) : '';
            $paginationCondition = ($pagination != 0) ? 9*$pagination : 0;
            $q = $this->db->query("SELECT videos.*, COALESCE(AVG(ratings.ratings),0) AS ratings FROM videos LEFT OUTER JOIN 
                    ratings ON ratings.id_video = videos.id " . $danceStyleCondition . " GROUP BY videos.id " 
                    . " ORDER BY " . $arrangement . " " . $order ." LIMIT 9 OFFSET ". $paginationCondition);  
            if($q->num_rows() > 0)
            {
                foreach($q->result() as $row)
                {
                    $data[] = $row;
                }
            }
            return $data;
        }
        
        function getVideoDetail()
        {
            //QUERY BUILDER SAVE US FROM SQL INJECTIONS
            $this->db->select('*');
            $this->db->where('id', $this->uri->segment(3));
            $this->db->get('videos');
            $q = $this->db->query("SELECT * FROM videos WHERE id = " . $this->uri->segment(3));
            
            if($q->num_rows() == 1)
            {
                return $q->result()[0];
            }
        }
        
        function getRatingsAvg($id)
        {
            $this->db->select('id_video, AVG(ratings) AS average');
            //SELECT `id_video`, AVG(ratings) AS average FROM `ratings` GROUP BY id_video
            $this->db->where('id_video', $id);
            //$this->db->group_by('id_video');
            $q-> $this->db->get('ratings'); 
            if($q->num_rows() == 1)
            {
                return $q->result()[0];
            }
            
            //SELECT videos.id,name, AVG(ratings.ratings) AS ratings FROM videos RIGHT OUTER JOIN ratings ON ratings.id_video = videos.id GROUP BY videos.id
            
        }
    }