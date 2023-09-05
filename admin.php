<?php
include_once("Controller/helper.php");

$page = isset($_GET['page']) ? $_GET['page'] : false;

include_once("routerAdm.php");

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
    <link rel="stylesheet" href="Assets/styleAdmin.css" type="text/css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="__header col-md-3 mh-100% bg-info">
                <div class="__header-icon">
                    <div class="img-nav pb-4 pt-3">
                        <img src="./Assets/img/Admin-img.png" alt="Logo Admin" class="__admin-logo" style="border-radius: 50%; ">
                    </div>
                    <div class="__header-nameofadmin">
                        <h5>Admin 1</h5>
                        <hr width="50px" height="0.8px" style="color:dark; border: 0.5px solid; margin-top:0px; ">
                    </div>
                </div>
                <div class="__coba pb-4">Ini menu tab nya</div>
                <div class="pb-4">ini menu tab nya</div>
                <div class="pb-4">ini menu tab nya</div>
                <div class="pb-4">ini menu tab nya</div>
                <div class="pb-4">ini menu tab nya</div>
                <div class="pb-4">ini menu tab nya</div>
                <div class="pb-4">ini menu tab nya</div>
                <div class="pb-4">ini menu tab nya</div>
                <div class="pb-4">ini menu tab nya</div>
                <div class="pb-4">ini menu tab nya</div>
                <div class="pb-4">ini menu tab nya</div>
                <div class="pb-4">ini menu tab nya</div>

            </div>
            <div class="__material col-md-9">
                <div class="__material-nav w-75 mh-100">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="#">Dashboard</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link text-right" href="#">logout <span class="sr-only">(current)</span></a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="__material-content">
                    <?php
                    $filename = "$call.php";

                    if (file_exists($filename)) {
                        include_once($filename);
                    } else {
                        echo "Maaf File tidak tersedia";
                    }
                    ?>
                </div>
                <div class="__footer w-75">
                    <section class="footer-section">
                        <h5 class="__footer-desc">Universitas Wind of Nature Copyright @ 2022</h5>
                    </section>
                </div>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>