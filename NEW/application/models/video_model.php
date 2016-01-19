<?php 
	/**
	 * 	Model Video is used for the direct communication and operations over tables "videos" and "ratings" in database. Models are generally returning the *specific data from database to Controllers or just changing the content of database somehow. Specifically this model gets all videos according to *specific conditions, gets detail of video, increment video views, rates specific video, adds or deletes specific video.
	 * 	@package Models
	 */ 
    class Video_model extends CI_Model
    {
		/**
		 *  Gets all videos of specific dance style with specific offset in specific order
		 *  @param int $danceStyle Id of dance style - 1-4 (dnb step - 1, jumpstyle - 2, freestep - 3, cutting shapes - 4)
		*	@param int $pagination Offset when getting the videos
		 *  @param string $arrangement According to what we want to arrange the videos - date/ratings
		*	@param string $order DESC/ASC order
		 *  @return array Array of videos 
		 */
        function getVideos($danceStyle, $pagination, $arrangement, $order)
        {
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
        /**
		 *  Retrieves all videos of specific user
		*	@param string $username Username of user
		 *  @return array Array of videos 
		 */
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
        /**
		 *  Retrieves information about specific video including average from ratings.
		*	@param int $videoId Id of video
		 *  @return object Object containing the information about video
		 */
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
        /**
		 *  Updates the "views" field by value +1 for specific video
		*	@param int $id Id of video
		 */
        function incrementVideoViews($id)
        {
            $this->db->where('id', $id);
            $this->db->set('views', 'views+1', FALSE);
            $this->db->update('videos');
        }
        /**
		 *  Add ratings for specific video.
			@param int $value Ratings - 1-5 (stars)
			@param int $videoId Id of video
		 *  @return bool If user has rated first time for the specific video
		 */
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
        /**
		 *  Inserts new video into database.
		 */
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
        /**
		 *  Deletes specific video.
		 */
        function deleteVideo()
        {
            $this->db->where('id', $this->uri->segment(3));
            $this->db->delete('videos');
        }
    }