<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "db_mhs";

$koneksi = mysqli_connect($server, $username, $password, $database) or die(header("location: ".BASE_URL."index.php?page=koneksi_deactive&notif=delete"));