<?php

    $id = $_GET['id'];
    // do some validation here to ensure id is safe

    $link = mysql_connect("localhost", "suchabar", "");
    mysql_select_db("dvddb");
    $sql = "SELECT avatar FROM users WHERE id=$id";
    $result = mysql_query("$sql");
    $row = mysql_fetch_assoc($result);
    mysql_close($link);

    header("Content-type: image/jpeg");
    echo $row['avatar'];
?>

<!--
    http://stackoverflow.com/questions/7793009/how-to-retrieve-images-from-mysql-database-and-display-in-an-html-tag
    http://stackoverflow.com/questions/13225726/i-need-my-php-page-to-show-my-blob-image-from-mysql-database-->