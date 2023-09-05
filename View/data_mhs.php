<?php

    include_once('./Model/koneksi.php');
    include_once('./Controller/helper.php');
    
    include_once("auth/protect_user.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Code</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./Assets/style.css">
    </head>
    <body>
        <div>
            
            <h1 class="text-center">Data Mahasiswa</h1>
            <hr class="pb-3" width="200"/>
            <?php
                $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

                if($notif === "delete"){
                    echo "<div class='notif' style='text-align: center; font-size:14px;'>
                    <div style='padding: 0px 80px 0px 80px'>
                        <div class='bg-warning' style='border-radius: 4px 4px 0px 0px; font-weight:550'>Error Human</div>
                        <div style='padding: 10px 5px; border-radius: 0px 0px 4px 4px; background-color: #DEDDD6'>Maaf, Kamu harus melengkapi form dibawah ini!!</div>
                    </div>
                    </div>";
                }
            ?>
            <div class="float-right mr-4 mb-3">
                <button id="addNewUser" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="border: 1px solid #fff; color: #fff; border-radius: 7px; height: 40px; width: 150px; font-weight: 500">Tambah Data</button>
            </div>  
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="text-align: center" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <?php
                    $data = mysqli_query($koneksi, "SELECT mahasiswa.nim, mahasiswa.nama_mhs, mahasiswa.jenis_kel, mahasiswa.email, mahasiswa.status, jurusan.kode_jurusan, jurusan.nama_jurusan FROM mahasiswa inner join jurusan ON mahasiswa.kode_jurusan = jurusan.kode_jurusan");
                    $no = 1;
                    while($fetch = mysqli_fetch_assoc($data)){
                ?>

                <tbody>
                    <tr>
                        <td><?php echo $no++.'.'; ?></td>
                        <td><?php echo $fetch['nim'] ?></td>
                        <td><?php echo $fetch['nama_mhs'] ?></td>
                        <td><?php echo $fetch['jenis_kel'] ?></td>
                        <td><?php echo $fetch['email'] ?></td>
                        <td><?php echo $fetch['nama_jurusan'] ?></td>
                        <td><?php echo $fetch['status'] ?></td>
                        <td width="100"><a href="<?php echo BASE_URL."index.php?page=update&nim=$fetch[nim]" ?>"><button type="button" class="btn btn-primary edit" style="margin-right: 10px; margin-left: 10px">Edit</button></a></td> 
                        <td width="100"><a href="<?php echo BASE_URL."index.php?page=proses_delete&nim=$fetch[nim]" ?>" class="btn btn-primary delete" >Delete</a></td>
                    </tr>
                </tbody>

                <?php
                    }
                ?>
            </table>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 100%">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo BASE_URL."Controller/proses_insertData.php"?>" class="form-horizontal" method="POST">
                        <?php
                            $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

                            if($notif === "email"){
                                echo "<div class='notif' style='text-align: center; font-size:14px;'>
                                <div style='padding: 0px 80px 0px 80px'>
                                    <div class='bg-warning' style='border-radius: 4px 4px 0px 0px; font-weight:550'>Error Human</div>
                                    <div style='padding: 10px 5px; border-radius: 0px 0px 4px 4px; background-color: #DEDDD6'>Maaf, Email yang kamu masukkan sudah ada!</div>
                                </div>
                                </div>";
                            }
                        ?>
                            <div class="form-group">
                                <label for="inputId" class="col-form-label col-form-label-sm">NIM</label>
                                <input type="text" class="form-control" id="inputId" placeholder="Masukkan Nim Mahasiswa" name="nim" >
                            </div>
                            <div class="form-group">
                                <label for="inputNama" class="col-form-label col-form-label-sm">Nama</label>
                                <input type="text" class="form-control" id="inputNama" placeholder="Masukkan Nama Mahasiswa" name="nama" >
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-form-label col-form-label-sm">Email</label>
                                <input type="text" class="form-control" id="inputEmail" placeholder="Masukkan Email Mahasiswa" name="email" >
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputJenisKel" class="col-form-label col-form-label-sm">Jenis Kelamin</label>
                                    <select id="inputJenisKel" class="form-control" name="jenis_kel" >
                                        <option selected >Pria</option>
                                        <option >Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6" style="margin-bottom: 0px">
                                    <label for="inputPass" class="col-form-label col-form-label-sm">Password</label>
                                    <input type="password" class="form-control" id="inputPass" placeholder="Masukkan default Password Mahasiswa" name="pass">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputStatus" class="col-form-label col-form-label-sm">Status</label>
                                    <select id="inputStatus" class="form-control" name="status" >
                                        <option selected >Aktif</option>
                                        <option >Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6" style="margin-bottom: 0px">
                                    <label for="inputKodeJurusan" class="col-form-label col-form-label-sm">Kode Jurusan</label>
                                    <input type="password" class="form-control " id="inputKodeJurusan" placeholder="Masukkan Kode Jurusan" name="kode_jurusan">
                                </div>
                        
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>

        
       <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </body>
</html>