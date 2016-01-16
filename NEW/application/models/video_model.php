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
        //SELECT `id_video`, AVG(ratings) AS average FROM `ratings` GROUP BY id_video
        //SELECT videos.id,name, AVG(ratings.ratings) AS ratings FROM videos RIGHT OUTER JOIN ratings ON ratings.id_video = videos.id GROUP BY videos.id
        function getVideoDetail($videoId)
        {
            $this->incrementVideoViews($videoId);
            //QUERY BUILDER SAVE US FROM SQL INJECTIONS
            $this->db->select('*');
            $this->db->where('id', $videoId);
            $q = $this->db->get('videos');
            if($q->num_rows() == 1) $data = $q->result()[0];
            //GET RATINGS
            $this->db->select_avg('ratings');
            $this->db->where('id_video', $videoId);
            $query_ratings = $this->db->get('ratings');
            if($query_ratings->num_rows() == 1)$data->ratings = $query_ratings->result()[0]->ratings;
            else $data->ratings = 0;
            //GET COUNT OF RATINGS 
            $this->db->where('id_video', $videoId);
            $this->db->from('ratings');
            $data->ratings_count = $this->db->count_all_results();  
            return $data;
        }
        
        function incrementVideoViews($id)
        {
            $this->db->where('id', $id);
            $this->db->set('views', 'views+1', FALSE);
            $this->db->update('videos');
        }
        
        function rateVideo($value, $videoId)
        {
            $this->db->select('*');
            $this->db->where('id_video', $videoId);
            $this->db->where('ip_address', $this->input->ip_address());
            $q = $this->db->get('ratings');
            if($q->num_rows() == 0) 
            {
                $newRating = array(
                'id_video' => $videoId,
                'ip_address' => $this->input->ip_address(),
                'ratings' =>  $value);
                $this->db->insert('ratings', $newRating);
                return true;
            }        
            else
            {
                $this->db->where('id_video', $videoId);
                $this->db->where('ip_address', $this->input->ip_address());
                $this->db->set('ratings', $value, FALSE);
                $this->db->update('ratings');
                return false;
            } 
        }
    }