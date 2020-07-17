<?php
    $host     = "localhost";
    $username = "root";
    $password = "";
    $database = "uas";
    $conn  = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Koneksi Gagal" . mysqli_connect_error());
    } else {
    	
    }
?>
