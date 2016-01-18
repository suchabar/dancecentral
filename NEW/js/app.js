//STAR RATING INITIALIZATION
var myCaptions = 
{
    0: 'Not Rated',
    1: 'Looser',
    2: 'Ok',
    3: 'Good',
    4: 'Great moves',
    5: 'Just wow!'
};

$(".my-rating").rating({min:0, max:5, step:1, size:'xs', starCaptions: myCaptions, 
showClear: false, readonly: true});
$(".video-rating").rating({min:0, max:5, step:1, size:'xs', starCaptions: myCaptions, 
showClear: false});

//AJAX REQUESTS HANDLING
$('.video-rating').on('rating.change', function(event, value, caption)
{
    $.ajax({
        method: 'POST',
        url: window.location.origin + '/dancecentral/index.php/video/rateVideo/',
        data: { rating: value }, 
        success:function(response) 
        {
            try
            {
                var json = $.parseJSON(response);
                var count = parseInt($('#ratings_count').text()) + 1;
                if(json['first_time_rated'])$('#ratings_count').html(count);
                $('#ratings').text(json['rating']);
            }
            catch (e){alert(response);}
        }  
    });
});


$('#new_comment').submit(function(event)
{
    var text = $("#comment_text").val();
    event.preventDefault();
    $.ajax({
        method: 'POST',
        url: window.location.origin + '/dancecentral/index.php/video/comment/',
        data: { comment_text: text}, 
        success:function(response) 
        {
            //REMOVE SUBMITTED TEXT IN TEXTAREA
            $("#comment_text").val('');
            //APPEND NEW COMMENT
            $('.new-comment-header').before(response);     
        }
        
    });   
});

function deleteComment(commentId)
{
    event.preventDefault();
    $.ajax({
        method: 'POST',
        url: window.location.origin + '/dancecentral/index.php/video/deleteComment/'+commentId,
        success:function(response) 
        {
            console.log(response);
            //DETACH VIDEO
            $('.comment' + commentId).detach();  
        }
        
    });   
}

$('.delete_video').submit(function(event)
{
    event.preventDefault();
    var videoId = $(this).attr('id');
    $.ajax({
        method: 'POST',
        url: window.location.origin + '/dancecentral/index.php/video/deleteVideo/'+videoId,
        success:function(response) 
        {
            //DETACH VIDEO
            $('.video' + videoId).detach();  
        },
        
    });   
    
});

function thumbs(commentId, thumb)
{
    event.preventDefault();
    $.ajax({
        method: 'POST',
        url: window.location.origin + '/dancecentral/index.php/video/thumbs/',
        data: { ratingValue: thumb,
                commentId : commentId
        }, 
        success:function(msg) 
        {
            if(msg.length > 3)alert(msg)
            else 
            {
                var value = parseInt($('.votes' + commentId).text()) + parseInt(thumb);
                $('.votes' + commentId).html(value>0 ? '+' + value: value);
            }
        }
        });   
}  

//JQUERY DYNAMIC VALIDATIONS OF SIGN UP FORM 
$('.password').keyup(function()
{
    if($("#passwordInput").val().length > 3)
    {
        $("#passwordField").addClass("has-success has-feedback");
        $("#passwordSpan").addClass("glyphicon glyphicon-ok");
        if($("#passwordInput").val() == $("#passwordInput2").val())
        {
            //THEY MATCH
            $("#passwordField2").addClass("has-success has-feedback");
            $("#passwordSpan2").addClass("glyphicon glyphicon-ok");
        }
        else
        {
            //THEY ARE DIFFERENT
            $("#passwordField2").removeClass("has-success has-feedback");
            $("#passwordSpan2").removeClass("glyphicon glyphicon-ok");
        }
    }
    else
    {
        $("#passwordField").removeClass("has-success has-feedback");
        $("#passwordSpan").removeClass("glyphicon glyphicon-ok");
    }
});

$('#email').keyup(function()
{
    if(isEmail($("#email").val()))
    {
        $("#emailField").addClass("has-success has-feedback");
        $("#emailSpan").addClass("glyphicon glyphicon-ok");
    }
    else
    {
        $("#emailField").removeClass("has-success has-feedback");
        $("#emailSpan").removeClass("glyphicon glyphicon-ok");
    }
});

function isEmail(email) 
{
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

$('#username').keyup(function()
{
    if($("#username").val().length > 1)
    {
        $("#usernameField").addClass("has-success has-feedback");
        $("#usernameSpan").addClass("glyphicon glyphicon-ok");
    }
    else
    {
        $("#usernameField").removeClass("has-success has-feedback");
        $("#usernameSpan").removeClass("glyphicon glyphicon-ok");
    }
});

$("#link").keyup(function()
{
    if($("#link").val().length == 11)
    {
        $("#linkField").addClass("has-success has-feedback");
        $("#linkSpan").addClass("glyphicon glyphicon-ok");
    }
    else
    {
        $("#linkField").removeClass("has-success has-feedback");
        $("#linkSpan").removeClass("glyphicon glyphicon-ok");
    }
});

$("#nameOfVideo").keyup(function()
{
    if($("#nameOfVideo").val().length > 5)
    {
        $("#nameOfVideoField").addClass("has-success has-feedback");
        $("#nameOfVideoSpan").addClass("glyphicon glyphicon-ok");
    }
    else
    {
        $("#nameOfVideoField").removeClass("has-success has-feedback");
        $("#nameOfVideoSpan").removeClass("glyphicon glyphicon-ok");
    }
});

$('.filter-dropdown a').click(function(){
    $('#selected').text($(this).text());
});

//Play and stop music
function playMusic(id)
{
    var audio = document.getElementById(id);
    var spanIcon = document.getElementById(id + "_icon");
    if(spanIcon.classList.contains('glyphicon-play'))
    {
       audio.play();
       spanIcon.classList.remove('glyphicon-play');
       spanIcon.classList.add('glyphicon-stop');
    }
    else
    {
        audio.pause();
        audio.currentTime = 0;
        spanIcon.classList.remove('glyphicon-stop');
        spanIcon.classList.add('glyphicon-play');
    }
}

