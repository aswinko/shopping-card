<?php 

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'store';
    
    $conn = mysqli_connect($host, $username, $password, $db_name);

    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

?>