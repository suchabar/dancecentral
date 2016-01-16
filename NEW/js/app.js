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

//AJAX REQUEST HANDLING OF STAR RATING
$('.video-rating').on('rating.change', function(event, value, caption)
{
    $.ajax({
        method: 'POST',
        url: window.location.origin + '/dancecentral/index.php/video/rateVideo/',
        data: { rating: value }, 
        success:function(response) 
        {
            //console.log(response);
            var json = $.parseJSON(response);
            var count = parseInt($('#ratings_count').text()) + 1;
            if(json['first_time_rated'])$('#ratings_count').html(count);
            $('#ratings').text(json['rating']);
        }  
    });
});

//AJAX REQUEST HANDLING OF THUMBS UP/DOWN RATING
function thumbs(commentId, thumb)
{
    $.ajax({
        method: 'POST',
        url: window.location.origin + '/dancecentral/index.php/video/thumbs/',
        data: { ratingValue: thumb,
                commentId : commentId
        }, 
        success:function(msg) 
        {
                if(msg.substring(0, 3) === 'You')alert(msg)
                else 
                {
                    var value = parseInt($('.votes' + commentId).text()) + parseInt(thumb);
                    console.log(value);
                    $('.votes' + commentId).html(value>0 ? '+' + value: value);
                }
        }
        });   
}  

//JQUERY DYNAMIC VALIDATION OF SIGN UP FORM 
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

 

//Load image and display as avatar in sign up page
$(document).on('change', '.btn-file :file', function() 
{
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    
    document.getElementById("fileinput-new").innerHTML = label;
    
    var selectedFile = input.get(0).files[0];
    var reader = new FileReader();
    reader.onload = function(event) 
    {
        document.getElementById("avatar").src = event.target.result;
    };
    reader.readAsDataURL(selectedFile);    
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

