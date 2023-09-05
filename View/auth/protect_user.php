<?php
    if($nim){
        $page = isset($_GET['page']) ? $_GET['page'] : false;
    }else{
        header("location: ".BASE_URL."index.php");
    }
?>
