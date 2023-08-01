<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>ห้องพักบุญเรือน</title>
</head>
<body>
    <header>
        <div class="header_first">
            <a href="index.php"><h1>ห้องพักบุญเรือน</h1></a>
        </div>
        <div class="header_second">
            <i class="fa-solid fa-phone"></i>
            <p>02-888-0073 // คุณบุญเรือน แพพวก</p>
            <?php
                if(isset($_SESSION['ADMIN']) && isset($_SESSION['Username'])){
            ?>
                
                <a href="admin/index.php?manager=1" class="loginn"><i class="fa-solid fa-user-gear"></i></a>
                <!-- <a href="index.php?user=<?php echo $_SESSION['Username'] ?>" class="loginn" style="color:black; font-size:12px; margin-left:20px;"><i class="fa-solid fa-user" style="font-size:3rem; color:black;"></i>ดูข้อมูล</a> -->
                <a href="config/function.php?exite=exite" class="loginnn" style="color:black; font-size:12px;"><i class="fa-solid fa-right-from-bracket" style="font-size:3rem; color:black;"></i>ออกจากระบบ</a>
            <?php
                }if(!isset($_SESSION['Username']) && !isset($_SESSION['ADMIN'])){
            ?>
                <a href="index.php?page=login" class="loginnnn" style="color:black; border-right: 2px solid black; padding:0 10px 0 0;">เข้าสู่ระบบ</a>
                <a href="index.php?page=register" style="color:black; padding:0 0 0 10px;">สมัครสมาชิก</a>
            <?php
                }else if(isset($_SESSION['Username']) && !isset($_SESSION['ADMIN'])){
            ?>
                <a href="index.php?user=<?php echo $_SESSION['Username'] ?>" class="loginn" style="color:black; font-size:12px;"><i class="fa-solid fa-user" style="font-size:3rem; color:black;"></i>ดูข้อมูล</a>
                <a href="index.php?checkout=<?php echo $_SESSION['Username'] ?>" class="loginn" style="color:black; font-size:12px; margin:0 0 0 20px;"><i class="fa-solid fa-person-walking" style="font-size:3rem; color:red;"></i>ย้ายออก</a>
                <a href="config/function.php?exite=exite" class="loginnn" style="color:black; font-size:12px;"><i class="fa-solid fa-right-from-bracket" style="font-size:3rem; color:black;"></i>ออกจากระบบ</a>
            <?php
                }
            ?>
        </div>
    </header>





    <?php
        if(!isset($_GET['page'])){
    ?>
    <div class="container">
        <div class="content">
            <h1 id="detail">ห้องพักบุญเรือน</h1>
            <p>ห้องพักบุญเรือนเป็นธุรกิจห้องเช่าที่เปิดให้บริการมาแล้วกว่า 10 ปี</p>
            <p>มีห้องพักให้เช่า 14 ห้อง</p>
            <p>ตั้งอยู่ที่ ถนนพุทธมนฑลสาย 3 ซอย 18 แขวงศาลาธรรมสพน์ เขตทวีวัฒนา กรุงเทพมหานคร</p>
            <!-- <p>เปิดให้บริการมาแล้วกว่า 10 ปี</p>
            <p>ที่อยู่ ถนนพุทธมนฑลสาย 3 ซอย 18 แขวงศาลาธรรมสพน์ เขตทวีวัฒนา กรุงเทพมหานคร</p> -->
        </div>
        <?php
            if(isset($_SESSION['Username'])){
            $gmail = $_SESSION['Username'];
            $sql2 = $conn->prepare("SELECT * FROM users WHERE Email = :gmail");
            $sql2->bindParam(":gmail",$gmail);
            $sql2->execute();
            $row2 = $sql2->fetch(PDO::FETCH_NUM);
            if($row2[14] == 'none'){
        ?>

                                <div class="booking">
                                    <h1>จองห้องพัก</h1>
                                    <form action="contract.php" method="post">
                                        <div class="text" style="display:flex;"><p style="margin-right:10px;">จองวันที่</p><?php if(isset($_SESSION['dateerror'])){
                                            echo "<p style='font-size:14px; color:red;'>";
                                            echo $_SESSION['dateerror'];
                                            echo "</p>"; 
                                            session_destroy();
                                            } ?></div>
                                        <input type="date" name="datebooking" id="" min="<?php echo date('Y-m-d');?>" required="required">
                                        <div class="text" style="display:flex;"><p style="margin-right:10px;">วันที่จะเข้าพัก</p><?php if(isset($_SESSION['dateerror'])){
                                            echo "<p style='font-size:14px; color:red;'>";
                                            echo $_SESSION['dateerror'];
                                            echo "</p>"; 
                                            session_destroy();
                                            } ?></div>
                                        <input type="date" name="datein" id="" min="<?php echo date('Y-m-d');?>" required="required">
                                        <!-- <div class="text" style="display:flex;"><p style="margin-right:10px;">ชื่อ</p><?php if(isset($_SESSION['firstnameerror'])){
                                            echo "<p style='font-size:14px; color:red;'>";
                                            echo $_SESSION['firstnameerror'];
                                            echo "</p>"; 
                                            session_destroy();
                                            } ?></div>
                                        <input type="text" name="firstname" id="" required="required">
                                        <div class="text" style="display:flex;"><p style="margin-right:10px;">นายสกุล</p><?php if(isset($_SESSION['lastnameerror'])){
                                            echo "<p style='font-size:14px; color:red;'>";
                                            echo $_SESSION['lastnameerror'];
                                            echo "</p>"; 
                                            session_destroy();
                                            } ?></div>
                                        <input type="text" name="lastname" id="" required="required"> -->
                                        <!-- <div class="text" style="display:flex;"><p style="margin-right:10px;">เบอร์โทร</p><?php if(isset($_SESSION['tellerror'])){
                                            echo "<p style='font-size:14px; color:red;'>";
                                            echo $_SESSION['tellerror'];
                                            echo "</p>"; 
                                            session_destroy();
                                            } ?></div>
                                        <input type="tel" name="tell" id="" required="required"> -->
                                        <p>เลือกห้องพัก</p>
                                        <select name="room" id="">
                                            <?php

                                                    $sql3 = $conn->prepare("SELECT * FROM room WHERE Status = 'default'");
                                                    $sql3->execute();
                                                    $numrow = $sql3->rowCount();
                                                    for($ir=0;$ir<$numrow;$ir++){
                                                        $roww = $sql3->fetch(PDO::FETCH_NUM);

                                            ?>
                                                    <option value="<?php echo $roww[2] ?>"><?php echo $roww[2] ?></option>
                                            <?php

                                                    }
                                            ?>
                                        </select>
                                        <?php if(isset($_SESSION['Username'])){ ?><button name="addbooking">จองห้องพัก</button><?php }else{ ?><a href="index.php?page=login" class="button">โปรดเข้าสู่ระบบ</a>  <?php } ?>
                                    </form>
                                </div>


            <?php } ?>
        <?php
            }else{
        ?>
                                <div class="booking">
                                    <h1>จองห้องพัก</h1>
                                    <form action="config/function.php" method="post">
                                        <div class="text" style="display:flex;"><p style="margin-right:10px;">จองวันที่</p><?php if(isset($_SESSION['dateerror'])){
                                            echo "<p style='font-size:14px; color:red;'>";
                                            echo $_SESSION['dateerror'];
                                            echo "</p>"; 
                                            session_destroy();
                                            } ?></div>
                                        <input type="date" name="datebooking" id="" min="<?php echo date('Y-m-d');?>" required="required">
                                        <div class="text" style="display:flex;"><p style="margin-right:10px;">วันที่จะเข้าพัก</p><?php if(isset($_SESSION['dateerror'])){
                                            echo "<p style='font-size:14px; color:red;'>";
                                            echo $_SESSION['dateerror'];
                                            echo "</p>"; 
                                            session_destroy();
                                            } ?></div>
                                        <input type="date" name="datein" id="" min="<?php echo date('Y-m-d');?>" required="required">
                                        <!-- <div class="text" style="display:flex;"><p style="margin-right:10px;">ชื่อ</p><?php if(isset($_SESSION['firstnameerror'])){
                                            echo "<p style='font-size:14px; color:red;'>";
                                            echo $_SESSION['firstnameerror'];
                                            echo "</p>"; 
                                            session_destroy();
                                            } ?></div>
                                        <input type="text" name="firstname" id="" required="required">
                                        <div class="text" style="display:flex;"><p style="margin-right:10px;">นายสกุล</p><?php if(isset($_SESSION['lastnameerror'])){
                                            echo "<p style='font-size:14px; color:red;'>";
                                            echo $_SESSION['lastnameerror'];
                                            echo "</p>"; 
                                            session_destroy();
                                            } ?></div>
                                        <input type="text" name="lastname" id="" required="required"> -->
                                        <!-- <div class="text" style="display:flex;"><p style="margin-right:10px;">เบอร์โทร</p><?php if(isset($_SESSION['tellerror'])){
                                            echo "<p style='font-size:14px; color:red;'>";
                                            echo $_SESSION['tellerror'];
                                            echo "</p>"; 
                                            session_destroy();
                                            } ?></div>
                                        <input type="tel" name="tell" id="" required="required"> -->
                                        <p>เลือกห้องพัก</p>
                                        <select name="room" id="">
                                            <?php

                                                    $sql3 = $conn->prepare("SELECT * FROM room WHERE Status = 'default'");
                                                    $sql3->execute();
                                                    $numrow = $sql3->rowCount();
                                                    for($ir=0;$ir<$numrow;$ir++){
                                                        $roww = $sql3->fetch(PDO::FETCH_NUM);

                                            ?>
                                                    <option value="<?php echo $roww[2] ?>"><?php echo $roww[2] ?></option>
                                            <?php

                                                    }
                                            ?>
                                        </select>
                                        <?php if(isset($_SESSION['Username'])){ ?><button name="addbooking">จองห้องพัก</button><?php }else{ ?><a href="index.php?page=login" class="button">โปรดเข้าสู่ระบบ</a>  <?php } ?>
                                    </form>
                                </div>
        <?php } ?>
        
                                
            
    </div>
            <div class="user_room_guid">
                <div class="squres green"></div>
                <p>ห้องยังว่างอยู่</p>
                <div class="squres yellow"></div>
                <p>ถูกจองแล้ว</p>
                <div class="squres reds"></div>
                <p>ห้องไม่ว่าง</p>
            </div>
            <div class="user_room">
                <?php

                    $sql3 = $conn->prepare("SELECT * FROM room");
                    $sql3->execute();
                    $numrow = $sql3->rowCount();
                    for($ir=0;$ir<$numrow;$ir++){
                        $roww = $sql3->fetch(PDO::FETCH_NUM);
                        if($roww[3] == "default"){
                    ?>
                    <div class="room <?php echo $roww[2] ?>"><h4><?php echo $roww[2] ?></h4></div>  
                    <?php
                        }else if($roww[3] == "active"){
                    ?>
                    <div class="room <?php echo $roww[2] ?> red"><h4><?php echo $roww[2] ?></h4></div>
                    <?php
                        }else if($roww[3] == "waite"){
                    ?>
                    <div class="room <?php echo $roww[2] ?> yellow"><h4><?php echo $roww[2] ?></h4></div>
                    <?php
                        }
                    }
                ?>
                <p class="text">| ทางเข้า</p>
            </div>
            <div class="user_room_guid"></div>
    <div class="content_show">
        <div class="map">
            <div class="detail_room">
                <img src="image/309473123_494524946021186_2242331597240374583_n.jpg" alt="">
                <h1>ภายในห้องพัก</h1>
                <ul style="font-family: none;">
                    <li>ห้องพักมีพื้นที่ 30 ตารางเมตร</li>
                    <li>มีปลั๊กไฟ 2 จุด</li>
                    <li>ค่าไฟ 10บาท/หน่วย</li>
                </ul>
            </div>
            <div class="detail_room">
                <img src="image/310172075_838012063995754_53764028695965869_n.jpg" alt="">
                <h1>ห้องน้ำ</h1>
                <ul style="font-family: none;">
                    <li>มีโถส้วม</li>
                    <li>มีฝักบัว</li>
                    <li>มีอ่างล้างหน้า</li>
                    <li>ค่าน้ำ 15บาท/ลบ.ม.</li>
                </ul>
            </div>
            <!-- <div class="detail_room">
                <h1>ค่าห้องพัก</h1>
                <h3>1500.00 บาท/เดือน</h3>
                <hr>
                <h1>ค่ามัดจำ</h1>
                <h3>ค่ามัดจำของห้องเช่าคิดอยู่ที่ 1000.00 บาท</h3>
            </div> -->
        </div>
    </div>
            <div class="user_room_guid"></div>
    <div class="content_show">
        <div class="map">
            <div class="detail_map">
                <h1>ที่อยู่</h1>
                <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ห้องพักบุญเรือน ตั้งอยู่ที่ถนนพุทธมนฑลสาย 3 ซอย 18 แขวงศาลาธรรมสพน์ เขตทวีวัฒนา กรุงเทพมหานคร</p>
                <h1>สถานที่ใกล้เคียง</h1>
                <ul style="font-family: none;">
                    <li>ตลาดนัดสาย 3</li>
                    <li>โรงเรียนนวมินทราชินูทิศ สตรีวิทยา พุทธมณฑล</li>
                    <li>โรงเรียนคลองบางพรหม</li>
                    <li>โรงเรียนสารสาสน์ วิเทศธนบุรี</li>
                    <li>โรงเรียน กสิณ ธร อาคาเดมี่</li>
                    <li>ศูนย์การแพทย์กาญจนาภิเษก</li>
                    <li>โรงพยาบาลธนบุรี 2</li>
                </ul>
            </div>
            <img src="image/position.png" width="1000px">
        </div>
    </div>
    <div class="user_room_guid"></div>
    <?php
        }else if($_GET['page'] == 'login'){
    ?>
        <div class="container_login">
            <div class="login">
                <form action="config/function.php" method="post">
                    <h1>เข้าสู่ระบบ</h1>
                    <p style='color:red; line-height:0px;'><?php if(isset($_SESSION['loginerror'])){ echo $_SESSION['loginerror']; } ?></p>
                    <label for="">อีเมล</label>
                    <input type="text" name="email" id="" required="required">
                    <label for="">รหัสผ่าน</label>
                    <input type="password" name="password" id="" required="required">
                    <button type="submit" name="login">เข้าสู่ระบบ</button>
                </form>
            </div>
        </div>
    <?php
        }else if($_GET['page'] == 'register'){
    ?>
        <div class="container_login">
            <div class="register">
                <form action="config/function.php" method="post">
                    <h1>สมัครสมาชิก</h1>
                    <p style='color:red; line-height:0px;'><?php if(isset($_SESSION['regiserror'])){ echo $_SESSION['regiserror']; } ?></p>
                    <div class="flex">
                        <div class="box">
                            <label for="">ชื่อ</label>
                            <input type="text" name="firstname" id="" required="required">
                        </div>
                        <div class="box">
                            <label for="">นามสกุล</label>
                            <input type="text" name="lastname" id="" required="required">
                        </div>
                    </div>
                    <!-- <div class="flex">
                    <div class="box">
                        <label for="">บัตรประชาชน</label>
                        <input type="number" name="idnumber" id="" required="required">
                    </div>
                    <div class="box">
                        <label for="">เบอร์โทร</label>
                        <input type="text" name="tell"  id="tbNum" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" title="โปรดกรอกเบอร์โทรศัพท์ของคุณให้ถูกต้อง เช่น 012-345-6789"  maxLength="10" value="" onkeyup="addHyphen(this)" required="required">
                            <script>
                                function addHyphen (element) {
                                let ele = document.getElementById(element.id);
                                ele = ele.value.split('-').join('');  

                                let finalVal = ele.replace(/(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d)/, '$1$2-$3$4$5$6-$7$8$9$10')
                                document.getElementById(element.id).value = finalVal;
                                }
                            </script>
                    </div>
                    </div> -->
                    <div class="flex">
                        <div class="box">
                            <label for="">อีเมล</label>
                            <input type="email" name="email" id="" required="required">
                        </div>
                        <div class="box">
                        <label for="">เบอร์โทร</label>
                        <input type="text" name="tell"  id="tbNum" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" title="โปรดกรอกเบอร์โทรศัพท์ของคุณให้ถูกต้อง เช่น 012-345-6789"  maxLength="10" value="" onkeyup="addHyphen(this)" required="required">
                            <script>
                                function addHyphen (element) {
                                let ele = document.getElementById(element.id);
                                ele = ele.value.split('-').join('');  

                                let finalVal = ele.replace(/(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d)/, '$1$2-$3$4$5$6-$7$8$9$10')
                                document.getElementById(element.id).value = finalVal;
                                }
                            </script>
                    </div>
                        <!-- <div class="box">
                            <label for="">ที่อยู่เลขที่</label>
                            <input type="text" name="numberhome" id="" required="required">
                        </div> -->
                    </div>
                    <!-- <div class="flex">
                        <div class="box">
                            <label for="">ถนน</label>
                            <input type="text" name="road" id="" required="required">
                        </div>
                        <div class="box">
                            <label for="">ซอย</label>
                            <input type="text" name="soi" id="">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="box">
                            <label for="">จังหวัด</label>
                            <select name="country" id="" class="country" required="required">
                                <option value="">โปรดเลือกจังหวัด</option>
                                <?php
                                    $sql10 = $conn->prepare("SELECT Distinct ProvinceThai FROM province");
                                    $sql10->execute();
                                    $num10 = $sql10->rowCount();
                                    for($i10=0;$i10<$num10;$i10++){
                                        $row10 = $sql10->fetch(PDO::FETCH_NUM);
                                ?>
                                <option value="<?php echo $row10[0] ?>" id="<?php echo $row10[0] ?>" ><?php echo $row10[0] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="box">
                            <label for="">อำเภอ</label>
                            <select name="district" id="" class="district" required="required">
                                <option value="">โปรดเลือกอำเภอ</option>
                                <?php
                                    $sql11 = $conn->prepare("SELECT Distinct DistrictThaiShort,ProvinceThai FROM province");
                                    $sql11->execute();
                                    $num11 = $sql11->rowCount();
                                    for($i11=0;$i11<$num11;$i11++){
                                        $row11 = $sql11->fetch(PDO::FETCH_NUM);
                                ?>
                                <option value="<?php echo $row11[0] ?>" id="<?php echo $row11[1] ?>" class="districts"><?php echo $row11[0] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="box">
                            <label for="">ตำบล</label>
                            <select name="tambon" id=""  class="tambon" required="required">
                                <option value="">โปรดเลือกตำบล</option>
                                <?php
                                    $sql12 = $conn->prepare("SELECT Distinct TambonThaiShort,DistrictThaiShort FROM province");
                                    $sql12->execute();
                                    $num12 = $sql12->rowCount();
                                    for($i12=0;$i12<$num12;$i12++){
                                        $row12 = $sql12->fetch(PDO::FETCH_NUM);
                                ?>
                                <option value="<?php echo $row12[0] ?>" id="<?php echo $row12[1] ?>" class="tambons"><?php echo $row12[0] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="box">
                            <label for="">รหัสไปรษณี</label>
                            <select name="postcode" id="" class="postcode" required="required">
                                <option value="">โปรดเลือกรหัสไปรษณี</option>
                                <?php
                                    $sql13 = $conn->prepare("SELECT Distinct PostCode,TambonThaiShort FROM province");
                                    $sql13->execute();
                                    $num13 =  $sql13->rowCount();
                                    for($i13=0;$i13<$num13;$i13++){
                                        $row13 = $sql13->fetch(PDO::FETCH_NUM);
                                ?>
                                <option value="<?php echo $row13[0] ?>" id="<?php echo $row13[1] ?>" class="postcodes"><?php echo $row13[0] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div> -->
                    <div class="flex">
                        <div class="box">
                            <label for="">รหัสผ่าน</label>
                            <input type="password" name="password" id="" required="required">
                        </div>
                        <div class="box">
                            <label for="">ยืนยันรหัสผ่าน</label>
                            <input type="password" name="password1" id="" required="required">
                        </div>
                    </div>
                    <button type="submit" name="register">สมัครสมาชิก</button>
                </form>
            </div>
        </div>
    <?php } ?>



<script src="js/index.js"></script>