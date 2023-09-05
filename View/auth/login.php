<!-- untuk protect agar user yang sudah login tidak bisa kembali kehalaman login -->
<?php
    if($nim){
        header("location: ".BASE_URL."index.php?page=home");
    }
?> 


<div class="login-page" style="padding: 0px 300px">
    <h3 class="title-login mb-3" style="text-align: center">Login</h3>
    <hr width="200"/>
    <form action="<?php echo BASE_URL."Controller/auth_login.php"?>" method="POST">

    <?php
        $notif = isset ($_GET['notif']) ? $_GET['notif'] : false;

        if($notif === true){
            
            echo "<div class='notif mb-3' style='text-align: center; font-size:14px;'>
                    <div style='padding: 0px 80px 0px 80px'>
                        <div class='bg-warning' style='border-radius: 4px 4px 0px 0px; font-weight:550'>Error Human</div>
                        <div style='padding: 10px 5px; border-radius: 0px 0px 4px 4px; background-color: #DEDDD6'>Maaf, Nim atau Password yang kamu masukkan tidak sesuai!!
                            <div class='progress mt-3'>
                                <div class='progress-bar progress-bar-striped bg-info' role='progressbar' style='width: 40%' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100'></div>
                            </div>
                        </div>
                    </div>
                </div>";
           
        }
    ?>
        <div class="form-group">
            <label for="inputnim" class="col-form-label col-form-label-sm">Nim</label>
            <input type="text" class="form-control" id="inputnim" placeholder="Masukkan Nim anda" name="nim">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="inputPass" class="col-form-label col-form-label-sm">Password</label>
            <input type="password" class="form-control" id="inputPass" placeholder="Masukkan Password anda" name="pass">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>