<?php 
    $hostname = "localhost";
    $database_name = "resto_fundamental";
    $username = "root";
    $password = "";

    $db = mysqli_connect($hostname, $username, $password, $database_name);

    if(!$db) {
        echo "Koneksi database error";
        die();
    }