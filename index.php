<?php

session_start();

include_once("Controller/helper.php");

$page = isset($_GET['page']) ? $_GET['page'] : false;

include_once("router.php"); //untuk mengambil nilai router nya yang berguna untuk penggunaan ?page

$nim = isset($_SESSION['nim']) ? $_SESSION['nim'] : false;
$nama_mhs = isset($_SESSION['nama_mhs']) ? $_SESSION['nama_mhs'] : false;
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
    <link rel="stylesheet" href="Assets/style.css">
</head>

<body>
    <div class="container">
        <header class="__header">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <h3 class="navbar-brand">Univ. Wind of Nature</h3>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <?php
                        if ($nim) {

                            echo "
                            <a class='nav-item nav-link' href='" . BASE_URL . "index.php?page=home '>Home<span class='sr-only'>(current)</span></a>
                            <a class='nav-item nav-link' href='" . BASE_URL . "index.php?page=berita'>Berita</a>
                            <a class='nav-item nav-link' href='" . BASE_URL . "index.php?page=datamahasiswa'>Data Mahasiswa</a>
                            <li class='nav-item dropdown float-right'>
                                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16'>
                                        <path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z'/>
                                    </svg>
                                </a>
                                <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                    <a class='dropdown-item' href='" . BASE_URL . "index.php?page=my_profile' enabled>Hi <b>$nama_mhs</b></a>
                                    <a class='dropdown-item' href='" . BASE_URL . "logout.php'>LogOut</a>
                                </div>
                            </li>
                        ";
                        }
                        ?>
                    </div>
                </div>

            </nav>
        </header>

        <div class="__content">

            <?php
            $filename = "$call.php";

            if (file_exists($filename)) {
                include_once($filename);
            } else {
                echo "Maaf File tidak tersedia";
            }
            ?>
        </div>

        <footer class="__footer">
            <section class="bg-info">
                <h5 class="__footer-desc">Universitas Wind of Nature Copyright @ 2022</h5>
            </section>
        </footer>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>