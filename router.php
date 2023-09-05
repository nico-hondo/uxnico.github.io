<?php 

    if($page === "datamahasiswa"){
        $call = "./View/data_mhs";
    }elseif($page === "update"){
        $call = "./View/update";
    }elseif($page === "home"){
        $call = "./View/home";
    }elseif($page === "export"){
        $call = "./Controller/export_toxls";
    }elseif($page === "proses_delete"){
        $call = "./Controller/proses_delete";
    }elseif($page === "koneksi_deactive"){  
        $call = "./Model/koneksi_gagal";
    }elseif($page === "login"){
        $call = "./View/auth/login";
    }elseif($page === "my_profile"){
        $call = "./View/user/my_profile";
    }elseif($page === "admin"){
        $call = "./Admin/admin";
    }elseif($page === "berita"){
        $call = "./View/news";
    }elseif($page === false){
        $call = "./View/auth/login";
    }

?>