<?php

    $localhost = "localhost";
    $name = "root";
    $password = "";
    $data = "boonreuuan";
    try{
        $conn = new PDO("mysql:host={$localhost}; dbname={$data}",$name,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOEXCEPTION $e){
        $e->getMessage();
    }
    


?>