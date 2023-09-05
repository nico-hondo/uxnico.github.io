<?php

    include_once '../Model/koneksi.php';
    include_once 'helper.php';

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $kode_jurusan = $_POST['kode_jur'];
    $button = $_POST['button'];

    

    if($button == "Add"){
        mysqli_query($koneksi, "INSERT into Mahasiswa(nama_mhs, email, status, kode_jurusan) VALUES ('$nama','$email','$status','$kode_jurusan')"); 
    }elseif ($button == "Update"){
        $nim = $_GET['nim'];
        mysqli_query($koneksi, "UPDATE mahasiswa set nama_mhs='$nama',email='$email',status='$status',kode_jurusan='$kode_jurusan' WHERE nim='$nim'");
        echo "<meta http-equiv='refresh' content='0'>"; //untuk refresh halaman yang mau dituju yaitu header bawah
        header("location: ".BASE_URL."index.php?page=datamahasiswa&$kode_jurusan");
    }
    
    