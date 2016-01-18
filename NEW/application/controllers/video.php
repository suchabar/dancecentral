<?php 

class Video extends CI_Controller
{
    function index()
    {
        //GET VIDEO DETAILS 
        $this->load->model('video_model');
        $data['video'] = $this->video_model->getVideoDetail($this->session->videoId);
        //GET COMMENTS
        $this->load->model('comment_model');
        $data['comments'] = $this->comment_model->getComments($this->session->videoId);
        //GET ACCOUNT OF UPLOADING PERSON
        $this->load->model('account_model');
        $data['uploadingUser'] = $this->account_model->getAccount($data['video']->id_user);
        
        //GENERATE PAGE
        $data['pageContent'] = 'video_view';
        $this->load->view('includes/template', $data);
        
    }
    
    function setSessionData()
    {
        $sessionData = array(
            'danceStyle'  => 0,
            'videoId'=> $this->uri->segment(3)
        );
        $this->session->set_userdata($sessionData);
    }
    
    function userVideos()
    {
        //GET VIDEO DETAILS 
        $this->load->model('video_model');
        $data['videos'] = $this->video_model->getUserVideos($this->uri->segment(3));
        $data['uploadingUser'] = $this->uri->segment(3);
         //GENERATE PAGE
        $data['pageContent'] = 'user_videos_view';
        $this->load->view('includes/template', $data);
    }
    
    function newVideo()
    {
        //GENERATE PAGE
        $data['pageContent'] = 'upload_video_view';
        $this->load->view('includes/template', $data);
    }
    
    function detail()
    {
        $this->setSessionData();
        $this->index();        
    }
    
    function uploadVideo()
    {
        //VALIDATION OF FORM 
        $this->form_validation->set_rules('nameOfVideo', 'Name', 'trim|required|max_length[40]');
        $this->form_validation->set_rules('link', 'Youtube Video ID', 'trim|required|exact_length[11]');
        
        if($this->form_validation->run() == FALSE)
        {
            $data['displayError'] = true;
            $data['pageContent'] = 'upload_video_view';
            $this->load->view('includes/template', $data);
        }
        else
        {
            $this->load->model('video_model');
            $this->video_model->addVideo();
            redirect('video/userVideos/'.$this->session->username);
        }
    }
    
    function deleteVideo()
    {
        $this->load->model('video_model');
        $this->video_model->deleteVideo();
        if($this->input->is_ajax_request())
        {
            //echo nothing
        }
        else redirect('video/userVideos/'.$this->session->username);
    }
    
    function rateVideo()
    {
        if(get_cookie('isLoggedIn') == NULL)echo 'Only logged users can vote !';
        else
        {
            $rating = $this->input->post('rating');
            $this->load->model('video_model');
            $first_time_rated = $this->video_model->rateVideo($rating, $this->session->videoId);
            $data['video'] = $this->video_model->getVideoDetail($this->session->videoId);
            $jsonResponse = array(
                'first_time_rated' => $first_time_rated,
                'rating' => $data['video']->ratings
            );
            $json = json_encode($jsonResponse);
            echo $json;
        }
    }
    
    function deleteComment()
    {
        $this->load->model('comment_model');
        $this->comment_model->deleteComment();
        if($this->input->is_ajax_request())
        {
            //echo nothing
        }
        else redirect('video/detail/'.$this->session->videoId);
    }
    
    function thumbs()
    {
        //GET INFO FROM AJAX POST/FORM
        $newCommentId = $this->input->post('commentId');
        $ratingsValue = $this->input->post('ratingValue');
        $this->load->model('comment_model');
        $rated = $this->comment_model->rateComment($ratingsValue, $newCommentId);
        if($this->input->is_ajax_request())
        {
            if(!$rated)echo 'You have already voted!';
        }
        else redirect('video/detail/'.$this->session->videoId);
    }
    
    function comment()
    {
         $this->load->model('comment_model');
         $newComment = $this->comment_model->addComment();
         if($this->input->is_ajax_request())
         {
             echo $this->generateNewCommentHtml($newComment);
         }
         else redirect('/video/detail/'.$this->session->videoId);
    }
    
    function generateNewCommentHtml($newComment)
    {
        $imgSource = base_url() . 'img/avatars/'. (($this->session->hasAvatar == 0) ? $this->session->avatar: 'user.jpeg');
        $onclickThumbsUp = "thumbs(" . $newComment['id'] . "," . 1 .")";
        $onclickThumbsDown = "thumbs(" . $newComment['id'] . ",". -1 .")";
        $votesClass = "votes".$newComment['id'];
        $sign = ($newComment['ratings'] > 0)? "+" . $newComment['ratings']: $newComment['ratings'];
        $actionUrl = site_url("video/deleteComment/".$newComment['id']);
        $commentClass = ($this->session->userRole == 0)? '': 'hiddenElement';
        $trashSource = base_url() . "img/bin.png";
        $thumbsUpSource = base_url() . "img/thumbsup.png";
        $thumbsDownSource = base_url() . "img/thumbsdown.png";
        $thumbsAction = site_url("video/thumbs");
        
        return '<div class="row comment' . html_escape($newComment['id']) . ' ">
            <!--AVATAR of user-->
                <div class="col-md-2">
                    <img class="img-responsive img-rounded avatar" src=' . html_escape($imgSource) .
                     ' alt="Avatar of user who posted a comment" width="auto" height="auto">
                </div>
                <div class="col-md-4">
                    <h4>'. $newComment["id_user"] .' 
                        &nbsp;&nbsp;&nbsp;<span><small>'. date('d/m/Y', strtotime($newComment['date'])) .'</span>
                   </h4> 
                   <br>
                    <p>'
                         . $newComment['text'] . 
                   '</p>
                </div>
                 <div class="col-md-1">
                     <form action='. html_escape($thumbsAction) .' onsubmit=' . $onclickThumbsUp . ' method="post" accept-charset="utf-8">
                        <input type="image" name="submit" src='. html_escape($thumbsUpSource) .' class="btn thumbs-icon btn-link">
						<input type="hidden" name="commentId" value='. html_escape($newComment['id']) .'>
						<input type="hidden" name="ratingValue" value="1">
						</form>              
				</div>
                <div class="col-md-1">
                     <form action='. html_escape($thumbsAction) .' onsubmit=' . $onclickThumbsDown . ' method="post" accept-charset="utf-8">
                        <input type="image" name="submit" src='. html_escape($thumbsDownSource) .' class="btn thumbs-icon btn-link">
						<input type="hidden" name="commentId" value='. html_escape($newComment['id']) .'>
						<input type="hidden" name="ratingValue" value="-1">
						</form>              
				</div>
                <div class="col-md-1">
                    <h4>
                      <span class='.html_escape($votesClass).'>'.$sign.'</span>
                     </h4>
                </div> 
                <div class="col-md-offset-1 col-md-2">
                     <!--DELETE COMMENT-->
                    <form action='.html_escape($actionUrl).' id='.html_escape($newComment['id']).
                            ' onsubmit="deleteComment('.$newComment['id']. ')" class='.html_escape($commentClass).' method="post" accept-charset="utf-8">
                        <input type="image" name="submit" src='.html_escape($trashSource).' class="removeComment-icon">
                    </form> 
                </div>
            </div>';
    }
    
}