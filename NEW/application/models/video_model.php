<?php 
    class Video_model extends CI_Model
    {
        function getVideos($danceStyle, $pagination, $arrangement, $order)
        {
            //LOAD ALL VIDEOS (of specific style) for specific page in specific order
            //SAFE CONDITION AGAINST SQL INJECTION - built in Query Builder for SQL
            $data = array();      
            $this->db->select('videos.*'); 
            $this->db->from('videos');
            $this->db->select('COALESCE(AVG(ratings.ratings),0) AS ratings'); 
            $this->db->join('ratings', 'ratings.id_video = videos.id', 'left');
            if($danceStyle > 0)$this->db->where('dance_style', $danceStyle);
            $this->db->group_by('videos.id'); 
            $this->db->order_by($arrangement, $order); 
            //PAGINATION
            $paginationCondition = ($pagination != 0) ? 9*$pagination : 0;
            $this->db->limit(9, $paginationCondition); 
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
        
        function getUserVideos($username)
        {
            $data = array();      
            $this->db->select('videos.*'); 
            $this->db->from('videos');
            $this->db->select('COALESCE(AVG(ratings.ratings),0) AS ratings'); 
            $this->db->join('ratings', 'ratings.id_video = videos.id', 'left');
            $this->db->where('videos.id_user', $username);
            $this->db->group_by('videos.id'); 
            $this->db->order_by('date_of_upload', 'desc'); 
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
        
       function getVideoDetail($videoId)
        {
            $this->incrementVideoViews($videoId);
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
            $this->db->where('id_user', $this->session->username);
            $q = $this->db->get('ratings');
            if($q->num_rows() == 0) 
            {
                $newRating = array(
                'id_video' => $videoId,
                'id_user' => $this->session->username,
                'ratings' =>  $value);
                $this->db->insert('ratings', $newRating);
                return true;
            }        
            else
            {
                $this->db->where('id_video', $videoId);
                $this->db->where('id_user', $this->session->username);
                $this->db->set('ratings', $value, FALSE);
                $this->db->update('ratings');
                return false;
            } 
        }
        
        function addVideo()
        {
             $newVideo = array(
                'name' => $this->input->post('nameOfVideo'),
                'date_of_upload' => date("Y-m-d H:i:s"),
                'link' => $this->input->post('link'),
                'i_am_on_video'=> $this->input->post('whoIsOnVideo'),
                'dance_style'=>$this->input->post('danceStyle'),
                'id_user' => $this->session->username,
                'views' => 0);
            $this->db->insert('videos', $newVideo);
        }
        
        function deleteVideo()
        {
            $this->db->where('id', $this->uri->segment(3));
            $this->db->delete('videos');
        }
    }