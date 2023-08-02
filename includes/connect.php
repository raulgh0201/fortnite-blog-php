<?php
    // Connect to the database
    $connection = mysqli_connect('localhost', 'admin', 'administrator', 'blog');

    // Check if the connection is correct
    if(mysqli_connect_errno()){
        echo 'The connection is wrong established' . mysqli_connect_error();
    }else{
        echo 'Connected successfully <br>';
    }

    mysqli_query($connection, "SET NAMES 'utf8'");
