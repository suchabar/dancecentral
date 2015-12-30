<?php
    $dsn = 'mysql:dbname=suchabar;host=127.0.0.1';
    $user = 'suchabar';
    $password = 'aaa'; 

    try 
    {
        $db = new PDO($dsn, $user, $password);
    } 
    catch (PDOException $e) 
    {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>