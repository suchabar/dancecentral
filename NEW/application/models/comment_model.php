<?php 
	/**
	 * 	Model Comment is used for the direct communication and operations over tables "comments" and "thumbs" in database. Models are generally returning the specific data from database to Controllers or just changing the content of database somehow. Specifically this model gets all comments for specific video, adds new comment, deletes comment and rates comment.
	 * 	@package Models
	 */ 
    class Comment_model extends CI_Model
    {
		/**
		 * Gets all comments for specific video.
		    @param int $idVideo Id of video
		 *  @return array Array of comments for specific video 
		 */
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
		/**
		 *  Adds new comment.
		 *  @return array Array representing new comment to be added 
		 */
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
        /**
		 *  Deletes specific comment.
		 */
        function deleteComment()
        {
            $this->db->where('id', $this->uri->segment(3));  
            $this->db->delete('comments');
        }
        
		/**
		 *  Adds rating for specific comment by value +1/-1.
		 *  @param int $value +1/-1 value
		 *  @param int $commentId Id of video
		 *  @return bool If we have already rated or not 
		 */
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
    
    