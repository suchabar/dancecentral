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

$('.video-rating').on('rating.change', function(event, value, caption)
{
    $.ajax({
        method: 'POST',
        url: window.location.origin + '/dancecentral/index.php/video/rateVideo/',
        data: { rating: value }, 
        success:function(first_time_rated) 
        {
            if(first_time_rated == 0)
            {
                var count = parseInt($('#ratings_count').text()) + 1;
                $('#ratings_count').html(count);
            }
            parse$('#ratings').text()
        }  
    });
});

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

//Use of promise() when invoking alert
$("#signUp").click(function showAlert() 
{
     $("#success-alert").show();
     $.when($("#success-alert").fadeOut(2500)).done(function() 
     {
        window.location.href = "home/";
     });
});

$('.dropdown-menu a').click(function(){
    $('#selected').text($(this).text());
});


// DELETE


//Login user
function login()
{
    $("#notLoggedIn").hide();
    $("#loggedIn").show();
}

//Logout user
function logout()
{
    $("#notLoggedIn").show();
    $("#loggedIn").hide();
}



//^^ DELETE


//Use of promise() when invoking alert
$("#accountChangesButton").click(function showAlert() 
{
     $("#success-alert").show();
     $.when($("#success-alert").fadeOut(2500)).done(function() 
     {
        window.location.href = "index.php";
     });
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

