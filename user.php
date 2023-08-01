<?php
    $active = "old";
    $wait = "wait";
    $sql = $conn->prepare("SELECT * FROM users WHERE Email = :room");
    $sql->bindParam(":room",$room);
    // $sql->bindParam(":active",$active);
    // $sql->bindParam(":wait",$wait);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_NUM);
?>
<div class="user_container">
    <div class="user_content">
        <div class="user_profile">
            <div class="profile">
                <img src="image/room_pp.png" alt="">
                <div class="roomm">
                    <h2>ห้องพัก: </h2>
                    <h3><?php echo $row[14] ?></h3>
                </div>
                <div class="name">
                    <h2>ชื่อ: </h2>
                    <h3><?php echo $row[1]," ",$row[2] ?></h3>
                </div>
                <div class="tell">
                    <h2>เบอร์โทร: </h2>
                    <h3><?php echo $row[3] ?></h3>
                </div>
            </div>
            <div class="profile_config">
                <h1>สถานะผู้เช่า : </h1>
                <h2 style="margin:0 0 0 10px;"><?php if($row[16] == 'none'){ echo "ยังไม่ได้จอง";}else if($row[15] == 'wait'){ echo "กำลังรออนุมัติ"; }else if($row[15] == 'active'){ echo "อนุมัติแล้ว"; } ?></h2>
            </div>
            <div class="profile_form">
                <form action="config/function.php" method="post">
                    <h1>แก้ไขข้อมูล</h1>
                    <div class="box">
                        <label for="">ชื่อ: </label>
                        <input type="text" name="firstname" value="<?php echo $row[1] ?>">
                    </div>
                    <div class="box">
                        <label for="">นายสกุล: </label>
                        <input type="text" name="lastname" value="<?php echo $row[2] ?>">
                    </div>
                    <div class="box">
                        <label for="">เลขบัตรประชาชน:</label>
                        <input type="text" name="tell" value="<?php echo $row[7] ?>">
                    </div>
                    <div class="box">
                        <label for="">เบอร์โทร:</label>
                        <input type="text" name="tell" value="<?php echo $row[3] ?>">
                        <input type="text" name="id" value="<?php echo $row[0] ?>" style="display:none;">
                        <input type="text" name="room" value="<?php echo $_GET['user'] ?>" style="display:none;">
                    </div>
                    <div class="box">
                        <label for="">ที่อยู่:</label>
                        <input type="text" name="tell" value="<?php echo $row[6] ?>">
                    </div>
                    <button name="change">เปลี่ยน</button>
                </form>
            </div>
            <?php if($row[16] != 'none'){ ?>
            <div class="checkbox">
                <form action="sss.php" method="post">
                    <input type="text" name="email" id="" value="<?php echo $row[4] ?>" style="display:none;">
                    <button type="submit" name="contrack">ใบสัญญา</button>
                </form>
            </div>
            <?php } ?>
        </div>
        <?php
            if($row[9] == 'none'){
        ?>
            <div class="user_roomm">
            </div>
        <?php }else{ ?>
        <div class="user_roomm">
            <div class="user_room_cost">
                <div class="user_room_cost_header">
                    <div class="user_room_status">
                        <div class="user_room_status_show">
                            <?php   
                                if($row[11] == 0 && $row[12] == 0 && $row[13] == 0){
                            ?>
                            <h1>สถานะ:</h1>
                            <div class="square"></div>
                            <h3 style="margin-left:3%;">ไม่มีค่าค้างชำระ</h3>
                            <?php
                                }else{
                            ?>
                            <h1>สถานะ:</h1>
                            <div class="square red"></div>
                            <h3 style="margin-left:3%;">มียอดค้างชำระ</h3>
                            <?php } ?>
                        </div>
                        <div class="user_room_status_select">
                            <div class="costs_roomm">
                                <h4>ค่าไฟ 10 บาท/หน่วย <span style="color:red;">///</span> ค่าน้ำ 15 บาท/หน่วย</h4>
                            </div>
                            <div class="cost_roomm">
                                <h2>ค่าห้อง:</h2>
                                <h4><?php  echo number_format( $row[11], 2 ) ?> บาท</h4>
                            </div>
                            <div class="cost_water">
                                <h2>ค่าน้ำ:</h2>
                                <h4><?php echo number_format( $row[12], 2 ) ?> บาท</h4>
                            </div>
                            <div class="cost_electric">
                                <h2>ค่าไฟฟ้า:</h2>
                                <h4><?php  echo number_format( $row[13], 2 ) ?> บาท</h4>
                            </div>
                        </div>
                    </div>
                    <div class="img">
                        <img src="image/pormpay.png" alt="">
                    </div>
                </div>
                <div class="user_room_cost_content">
                    <table>
                        <tr>
                            <td>เดือน</td>
                            <td>รายการ</td>
                            <td>จำนวน</td>
                            <td>รวม</td>
                            <td width="100px">เลือกรูปสลิป</td>
                            <td>สถานะ</td>
                            <td>คำสั่ง</td>
                        </tr>
                        <?php
                            $rooms = $row[14];
                            $name = $row[1];
                            $lastname = $row[2];
                            $sqll = $conn->prepare("SELECT * FROM orders WHERE Lastname = :lastname AND Firstname = :name AND Room = :room");
                            $sqll->bindParam(":lastname",$lastname);
                            $sqll->bindParam(":name",$name);
                            $sqll->bindParam(":room",$rooms);
                            $sqll->execute();
                            $numm = $sqll->rowCount();
                            for($i=0;$i<$numm;$i++){
                                $roww = $sqll->fetch(PDO::FETCH_NUM);
                        ?>
                        <tr>
                            <form action="config/function.php" method="post" enctype="multipart/form-data">
                                <td style="font-size:15px;"><?php echo $roww[4] ?></td>
                                <td  style="font-size:15px;"><?php
                                if($roww[5] > 0 && $roww[8] == 0 && $roww[9] == 0){
                                    echo "ค่ามัดจำ";
                                }else if($roww[5] > 0 || $roww[8] > 0 || $roww[9] > 0){
                                    echo "ค่าห้อง-ค่าน้ำ-ค่าไฟ";
                                }
                                ?></td>
                                <td style="text-align:left; font-size:15px;"><?php
                                if($roww[5] > 0 && $roww[8] == 0 && $roww[9] == 0){
                                    echo "ค่าห้อง: ",number_format($roww[5], 2);
                                }else if($roww[5] > 0 || $roww[8] > 0 || $roww[9] > 0){
                                    echo "ค่าห้อง: ",number_format($roww[5], 2),"ค่าน้ำ: ",number_format($roww[8], 2),"/ค่าไฟฟ้า: ",number_format($roww[9], 2);
                                } ?></td>
                                <td style="text-align:right;"><?php echo number_format($roww[10], 2) ?> บาท</td>
                                <td style="text-align:left;"> <?php
                                if($roww[11] == "none"){
                                    echo '<input type="file" name="image" accept=".jpg,.png,.jpeg" required="required">';
                                }else if($roww[11] == "สลิปผิดพลาด"){
                                    echo '<input type="file" name="image" accept=".jpg,.png,.jpeg" required="required">';
                            ?>
                            <?php }else{ ?>
                                    ส่งแล้ว
                            <?php } ?></td>

                            
                            <td style="text-align:left;"> <?php
                                if($roww[11] == "none" && $roww[12] == "ยังไม่ชำระ"){
                                    echo '<span style="color:red;">ค้างชำระ</span>';
                                }else if($roww[11] == "สลิปผิดพลาด"){
                                    echo '<span style="color: orangered;">ถูกตีกลับ</span>';
                                }else if($roww[11] != "none" && $roww[12] == "ยังไม่ชำระ"){
                            ?>
                                <span style="color: blue;">รอตรวจสอบ</span>
                            <?php }else{ ?>
                                <span style="color: green;">ชำระแล้ว</span>
                            <?php } ?></td>
                                <input type="text" name="id" value="<?php echo $roww[0] ?>" style="display:none;">
                                <input type="text" name="room" value="<?php echo $_GET['user'] ?>" style="display:none;">


                            <td style="text-align:left; display: flex; align-items: center;"> <?php
                                if($roww[11] == "none"){
                                    echo '<button type="submit" name="pay">ชำระ</button>';
                                }else if($roww[11] == "สลิปผิดพลาด"){
                                    echo '<button type="submit" name="pay">ชำระ</button>';
                            ?>
                            <?php }else{ ?>
                                ส่งแล้ว
                            <?php } ?></td>
                            </form>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <?php } ?>
        <a href="index.php"><i class="fa-solid fa-x"></i></a>
    </div>
</div>