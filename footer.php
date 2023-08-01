



<?php 
if(isset($_GET['login'])){
    include "login.php";
}
if(isset($_GET['user'])){
    if(isset($_SESSION['Username'])){
        $room = $_SESSION['Username'];   
    }else if(isset($_SESSION['ADMIN'])){
        $room = $_SESSION['Username'];        
    }
    include "user.php";
}
if(isset($_GET['checkout'])){
    $gmail = $_SESSION['Username'];
    $sql11 = $conn->prepare("SELECT Out_date FROM users WHERE Email = :gmail");
    $sql11->bindParam(":gmail",$gmail);
    $sql11->execute();
    $row11 = $sql11->fetch(PDO::FETCH_NUM);
?>
    <div class="checkback">
        <div class="checkout">
            <a href="index.php" style="position:absolute; top:10px; right:10px; color:black; font-size:24px;"><i class="fa-solid fa-x"></i></a>
            <h2>แจ้งขอย้ายออกจากห้องพัก</h2>
            <form action="config/function.php" method="post">
            <input type="text" name="gmail" value="<?php echo $_SESSION['Username'] ?>" style="display:none;" id="">
            <input type="date" name="date" min="<?php echo date('Y-m-d');?>" required="required">
            <button type="submit" name="checkmoveout">แจ้งขอย้ายออก</button>
            </form>
            <?php
                if($row11[0] != 'ไม่ระบุ'){ echo "<p>สถานะ : <span style='color:red;'>แจ้งขอย้ายออกสำเร็จ</span></p>";}
            ?>
            <p style="color:red;">**หากมีการขอย้ายออกโปรดแจ้งล่วงหน้าก่อนย้ายออก 1 เดือน</p>
            <!-- <p style="color:red;">*โปรดอย่าลืมชำระค่าห้องก่อนทำการย้ายออก</p> -->
        </div>
    </div>
<?php
}
?>




<!-- <footer>
    
</footer> -->


</body>
</html>