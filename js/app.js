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

var selector = '.nav li';

$(selector).on('click', function()
{
    $(selector).removeClass('active');
    $(this).addClass('active');
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

//Use of promise()
$("#signUpButton").click(function showAlert() 
{
     $("#success-alert").show();
     $.when($("#success-alert").fadeOut(2500)).done(function() 
     {
        window.location.href = "../index.html";
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

