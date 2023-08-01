<?php
    session_start();
    if(isset($_SESSION['regiserror'])){
        header("Refresh:20s; url=index.php?page=register");
        session_destroy();

    }
    if(isset($_SESSION['loginerror'])){
        header("Refresh:0; url=index.php?page=login");
        session_destroy();
    }
    include "config/connect.php";
    include "header.php";
    include "footer.php";
?>
