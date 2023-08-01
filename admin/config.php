<?php
session_start();
require_once "../config/connect.php";
if(isset($_GET['idser'])){
    $idser = $_GET['idser'];
    $_SESSION['search'] = $idser;
    header("location:index.php?manager=1");
}


if(isset($_GET['iddel'])){
    
    try{
        $default = "Default";
        $iddel = $_GET['iddel'];
        $sql = $conn->prepare("UPDATE users set Class = :default WHERE Id = :id");
        $sql->bindParam(":default", $default);
        $sql->bindParam(":id", $iddel);
        $sql->execute();
        header("location:index.php?manager=1");
        echo "xxxxxxxxx";
    }catch(PDOEXCEPTION $e){
        $e->getMessage();
    }
}



if(isset($_POST["search"])){
    $user_id = $_POST["Id"];
    $user_room = $_POST["Room"];
    echo $user_id;
    echo $user_room;
}
?>