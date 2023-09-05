<?php
       
        include_once '../Model/koneksi.php';
        include_once 'helper.php';

        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $jenis_kel = $_POST['jenis_kel'];
        $status = $_POST['status'];
        $pass = $_POST['pass'];
        $kode_jurusan = $_POST['kode_jurusan'];

        unset($_POST['pass']);

        $dataForm = http_build_query($_POST);

        $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
        
        if(mysqli_num_rows($query) == 1){
            header("location: ".BASE_URL."index.php?page=datamahasiswa&notif=email&$dataForm");
        }else{
            $pass = md5($pass);
            mysqli_query($koneksi, "INSERT INTO mahasiswa (nim,nama_mhs,email,jenis_kel,status,password,kode_jurusan) VALUES ('$nim','$nama','$email','$jenis_kel','$status','$pass','$kode_jurusan')");

            echo "<meta http-equiv='refresh' content='0'>"; //untuk refresh halaman yang mau dituju yaitu header bawah
            header("location: ".BASE_URL."index.php?page=datamahasiswa");
        }
        