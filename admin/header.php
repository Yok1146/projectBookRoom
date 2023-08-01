<?php
    require_once "../config/connect.php";
    require_once "function.php";


    if(isset($_POST['exite'])){
        if($_POST['num'] == 1){
            session_start();
            $username = $_SESSION['Username'];
            $admin = $_SESSION['ADMIN'];
            session_destroy();
            session_start();
            $_SESSION['Username'] = $username;
            $_SESSION['ADMIN'] = $admin;
            header("location:index.php?manager=1");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin.css">
    <title>Document</title>
</head>
<body>
    <header>
        <i class="fa-solid fa-gears"></i>
        <h1>ห้องพักบุญเรือน</h1>
        <a href="../index.php"><i class="fa-solid fa-x" style="font-size:40px; color:white;"></i></a>
    </header>
    <div class="container">
        <div class="menu">
            <div class="header_menu">
                <div class="room_manage">
                    <h3>จัดการห้อง</h3>
                    <a href="index.php?manager=1">จัดการห้องพัก</a>
                    <!-- <a href="index.php?costs=1">จัดการค่าน้ำค่าไฟ</a> -->
                </div>
                <div class="user_manage">
                    <h3>จัดการผู้ใช้งาน</h3>
                <a href="index.php?deposit=1">จอง-มัดจำ</a>
                <a href="index.php?insertuser=1">จัดการผู้ใช้งาน</a>
                <a href="index.php?cost=1">ค่าห้อง-ค่าน้ำ-ค่าไฟ</a>
                </div>
                <div class="report">
                    <h3>รายงาน</h3>
                    <a href="index.php?out=1">ย้ายออก</a>
                    <!-- <a href="#"><i class="fa-solid fa-envelope"></i>  เรื่องร้องเรียน</a> -->
                </div>
            </div>
            <div class="footer_menu">

            </div>
        </div>  
        <div class="content">
            <?php
                if(isset($_GET['manager'])){require_once "room.php";}
            ?>
            <?php
                if(isset($_GET['cost'])){require_once "cost.php";}
            ?>
            <?php
                if(isset($_GET['insertuser'])){require_once "insertuser.php";}
            ?>
            <?php
                if(isset($_GET['deposit'])){require_once "deposit.php";}
            ?>
            <?php
                if(isset($_GET['costs'])){require_once "costs.php";}
            ?>
            <?php
                if(isset($_GET['out'])){require_once "reportout.php";}
            ?>
        </div>


    </div>
