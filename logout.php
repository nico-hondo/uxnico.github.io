<?php
    include_once "helper.php";

    session_start();

    unset($_SESSION['nim']);
    unset($_SESSION['nama_mhs']);

    header("location: index.php");

?>