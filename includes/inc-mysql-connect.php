<?php
    $link = mysqli_connect('localhost', 'root', '', 'mybookshelf');

    if (!$link) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

?>