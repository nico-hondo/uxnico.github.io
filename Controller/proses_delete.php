<?php

    include_once "./Model/koneksi.php";
    include_once "helper.php";

    $nim_var = isset($_GET['nim']) ? $_GET['nim'] : false;

    
    $delete = "DELETE FROM mahasiswa WHERE nim='$nim_var'";
    if($koneksi->query($delete)===TRUE){
        echo "<meta http-equiv='refresh' content='0'>"; //untuk refresh halaman yang mau dituju yaitu header bawah
        header("location: ".BASE_URL."index.php?page=datamahasiswa");
    }else{
        header("location: ".BASE_URL."index.php?page=datamahasiswa&notif=delete");
    }
    
    