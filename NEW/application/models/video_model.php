<?php 
    class Video_model extends CI_Model
    {
        function getVideos($danceStyle, $pagination)
        {
             //LOAD ALL VIDEOS (of specific style) for specific page
            $conditionDanceStyle = ($danceStyle != 0) ? 'WHERE dance_style = ' . $danceStyle : '';
            $conditionPagination = ($pagination != 0) ? 'OFFSET ' . 9*$pagination : '';
            $q = $this->db->query("SELECT * FROM videos ". $conditionDanceStyle . " LIMIT 9 " . $conditionPagination);
            if($q->num_rows() > 0)
            {
                foreach($q->result() as $row)
                {
                    $data[] = $row;
                }
                return $data;
            }
        }
        
        function getVideoDetail()
        {
            $q = $this->db->query("SELECT * FROM videos WHERE id = " . $this->uri->segment(3));
            
            if($q->num_rows() > 0)
            {
                return $q->result()[0];
            }
        }
    }