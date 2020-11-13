<?php

    $host = "localhost";
    $db   = "3daw"; 
    $user = "rodrigovalente";
    $pass = "12345678"; 

    $conn = mysqli_connect($host, $user, $pass, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>