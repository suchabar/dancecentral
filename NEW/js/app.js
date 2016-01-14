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
showClear: false});

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
$("#signUpButton").click(function showAlert() 
{
     $("#success-alert").show();
     $.when($("#success-alert").fadeOut(2500)).done(function() 
     {
        window.location.href = "index.php";
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

//Make 'li' elements active in nav bar
var selectorA = '.nav li';
$(selectorA).on('click', function(event)
{
    $(selectorA).removeClass('active');
    $(this).addClass('active');
});

function getQueryVariable(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split('&');
    for (var i = 0; i < vars.length; i++)
     {
        var pair = vars[i].split('=');
        if (decodeURIComponent(pair[0]) == variable)
         {
            return decodeURIComponent(pair[1]);
        }
    }
}

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

