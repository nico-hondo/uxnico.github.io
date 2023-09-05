<?php

    include_once "helper.php";
    include_once "../Model/koneksi.php";

    $nim = $_POST['nim'];
    $pass = md5($_POST['pass']);

    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa where nim = '$nim' AND password = '$pass' AND status = 'Aktif'");

    if(mysqli_num_rows($query) == 0){
        header("location: ".BASE_URL."index.php?page=login&notif=true");
    }else{
        $row = mysqli_fetch_assoc($query);
        
        session_start();

        $_SESSION['nim'] = $row['nim'];
        $_SESSION['nama_mhs'] = $row['nama_mhs'];

        header("location: ".BASE_URL."index.php?page=my_profile&module=user&action=list");
    }