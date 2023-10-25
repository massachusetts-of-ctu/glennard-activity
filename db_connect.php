<?php
    $host = "localhost";
    $root = "root";
    $password = "";
    $db = "masashutes";
    
    $conn = mysqli_connect($host, $root, $password, $db);

    if(!$conn){
        echo "Not connected to database!";
    }
?>