<?php
	if (!isset($_SESSION["danceStyle"])) $_SESSION["danceStyle"] = 0;
    // TO REMEMBER WHICH DANCE STYLE WAS CLICKED
    // VAR INFLUENCING SUB NAV-BAR VISIBILITY
    
    $isVisible = '';
    if (isset($_GET['style']))
    {
        $_SESSION["danceStyle"] = intval($_GET['style']);
        $isVisible = 'visible';
        //todo here >> LOAD VIDEOS ACCORDING TO $danceStyle
    }
    else 
    {
        $_SESSION["danceStyle"] = 0;
        $isVisible = 'hidden';
    }
    function isSelected($danceStyle)
    {
        if (isset($_SESSION["danceStyle"]))
        {
            if($_SESSION["danceStyle"] == $danceStyle)
            {
                return 'active';
            }
        }
        return '';
    }

?>