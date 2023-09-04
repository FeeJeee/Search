<?php
    $servername = "localhost";
    $database = "search_posts";
    $username = "root";
    $password = "password";

    $connection = mysqli_connect($servername, $username, $password, $database);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
