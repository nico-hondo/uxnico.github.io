<?php
    include_once('./Model/koneksi.php');
    include_once('./Controller/helper.php');

    $nim_var = isset($_GET['nim']) ? $_GET['nim'] : false;

    $nim = "";
    $nama = "";
    $email = "";
    $status = "";
    $kode_jurusan = "";
    $button = "Add";

    if($nim_var){
        $queryNim = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE nim='$nim_var'");
        $row = mysqli_fetch_assoc($queryNim);

        $nim = $row['nim'];
        $nama = $row['nama_mhs'];
        $email = $row['email'];
        $status = $row['status'];
        $kode_jurusan = $row['kode_jurusan'];
        $button = "Update";
    }

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
        <div style="padding: 0px 300px">
            <h4 class="update-title text-center">Edit Data</h4>

            <form action="<?php echo BASE_URL."Controller/proses_update.php?nim=$nim";?>" class="form-horizontal" method="POST">
                <div class="form-group">
                    <label for="inputId" class="col-form-label col-form-label-sm label-input">NIM</label>
                    <input type="text" class="form-control" id="inputId" placeholder="Masukkan Nim Mahasiswa" name="nim" value="<?php echo $nim; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputNama" class="col-form-label col-form-label-sm label-input">Nama</label>
                    <input type="text" class="form-control" id="inputNama" placeholder="Masukkan Nama Mahasiswa" name="nama" value="<?php echo $nama; ?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail" class="col-form-label col-form-label-sm label-input">Email</label>
                        <input type="text" class="form-control" id="inputEmail" placeholder="Masukkan Email Mahasiswa" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputStatus" class="col-form-label col-form-label-sm label-input">Status</label>
                        <select id="inputStatus" class="form-control" name="status" >
                            <option <?php if($status == "Aktif"){?> selected <?php } ?>>Aktif</option>
                            <option <?php if($status == "Tidak Aktif"){?> selected <?php } ?>>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    
                    <div class="form-group col-md-6">
                        <?php 
                            $jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
                        ?>
                        <label for="inputJurusan" class="col-form-label col-form-label-sm label-input">Kode Jurusan</label>
                        <select id="inputJurusan" class="form-control" name="kode_jur" onchange= "jurusan()">
                            <option disabled selected>-- Pilih Data --</option>
                            <?php
                                while($fetchjurusan = mysqli_fetch_assoc($jurusan)){
                            ?>
                            <option 
                            <?php 
                                if($kode_jurusan === $fetchjurusan['kode_jurusan'])
                                {
                            ?> 
                                selected
                            <?php 
                                } 
                            ?>  
                                value="<?php echo $fetchjurusan['kode_jurusan'] ?>"><?php echo $fetchjurusan['kode_jurusan'] ?>
                            </option>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                    
                        <label for="inputId" class="col-form-label col-form-label-sm label-input">Nama Jurusan</label>
                        <input type="text" class="form-control" id="cobaInput" name="nama_jurusan" readonly 
                            <?php 
                                if($kode_jurusan)
                                {
                                    $queryJurusan = mysqli_query($koneksi, "SELECT * FROM jurusan where kode_jurusan='$kode_jurusan'");
                                    $fetchNJurusan = mysqli_fetch_assoc($queryJurusan);


                                    $dataNama = $fetchNJurusan['nama_jurusan'];
                            ?> 
                                value="<?php echo $dataNama ?>" 
                            <?php 
                                } 
                            ?>
                        />
                    </div>
            
                </div>
                
                <button type="submit" class="btn btn-primary" name="button" value="<?php echo $button; ?>">Submit</button>
            </form>
        </div>

        <script type="text/javascript">
            
            function jurusan(){
                var data = document.getElementById('inputJurusan').value;
                // console.log(data);

                <?php 
                    $coba = mysqli_query($koneksi, "SELECT * FROM jurusan");
                    $datacoba = mysqli_fetch_assoc($coba);
                    if(data === $datacoba['kode_jurusan']){
                        
                    }
                ?>

                // if(data == "211"){
                //     var nilaitetap = "Sistem Informasi";
                // }else if(data == "111"){
                //     var nilaitetap = "Teknik Informatika"
                    
                // }
                // console.log(nilaitetap);
                
                document.getElementById('cobaInput').value = nilaitetap;
            }
        </script>
    </body>
</html>
