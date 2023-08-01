<div class="cost_cotent">
    <div class="user_room">
        <?php 
        // $id = 15;
        // function utf8_strlen($s) {
        //     $c = strlen($s); $l = 0;
        //     for ($i = 0; $i < $c; ++$i)
        //     if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
        //     return $l;
        // }
        try{
            $sql = $conn->prepare("SELECT * FROM users WHERE Status ='active' AND Class = 'user'");
            $sql->execute();
            $row = $sql->rowCount();
        }catch(PDOexception $e){
            $e->getMessage();
        }
        $e =14;
        for($i=1;$i<=$e;$i++){
            $sql1 = $conn->prepare("SELECT * FROM users WHERE Status ='active' AND Class = 'user'");
            $sql1->execute();
            $ie = str_pad($i,2,"0",STR_PAD_LEFT);
            $room = $ie;
            if($row == 0){?>
                <div class="room_dafault 01"><h4><?php echo $room ?></h4><p>ไม่มีคนอยู่</p></div>
            <?php
            }else{
            for($q=1;$q<=$row;$q++){
                $num = $sql1->fetch(PDO::FETCH_NUM);
                if($room == $num[14]){ 
                    if($num[11] > 0 || $num[12] > 0 || $num[13] > 0){
                    ?>    
                        <a href="index.php?cost=<?php echo $num[0];?>" style="color:black;"><div class="room 01" style="cursor:pointer; background-color:rgb(255, 151, 31); flex-direction: column;"><h4><?php echo $num[11]+$num[12]+$num[13] ?></h4><p style="color:white; text-shadow:1px 1px 5px yellow;">ยังไม่ชำระเงิน</p></div></a>
                        <?php
                        break;
                    }else{
                        ?>
                        <a href="index.php?cost=<?php echo $num[0];?>" style="text-decoration: none;"><div class="room 01" style="cursor:pointer; background-color: rgb(20, 243, 0); flex-direction: column;"><h4><?php echo $num[14] ?></h4><p style="color:black; text-shadow:1px 1px 5px white;"><i class="fa-solid fa-circle-check"></i> ชำระเสร็จสิ้น</p></div></a>
                    <?php
                    break;
                        } 
                }else if($q == $row){?>
                    <div class="room_dafault 01"><h4><?php echo $room ?></h4><p>ไม่มีคนอยู่</p></div>
                    <?php
                    break;
                }
                }
            }
        }
        ?>
    </div>
    <?php
        if($_GET['cost'] != 1){
            $roomname = $_GET['cost'];
            $sql10 = $conn->prepare("SELECT * FROM users WHERE Room = :room");
            $sql10->bindParam(":room",$roomname);
            $sql10->execute();
            $num1 = $sql10->fetch(PDO::FETCH_NUM);
        }
    ?>
    <div class="room_cost_show">
        <div class="room_cost_table">
            <table>
                <thead>
                    <tr style="text-align: center;">
                        <td>เลขห้อง</td>
                        <td>ชื่อ</td>
                        <td>นามสกุล</td>
                        <td>เดือน</td>
                        <td>ค่าห้อง(บาท)</td>
                        <td>ค่าน้ำ(บาท)</td>
                        <td>ค่าไฟ(บาท)</td>
                        <td>รวม(บาท)</td>
                        <td>สลิป</td>
                        <td>สถานะ</td>
                        <td width="100px">อัพเดทสถานะ</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($_GET['cost'] > 1){
                            $id = $_GET['cost'];
                            $sqll1 = $conn->prepare("SELECT Firstname,Room FROM users WHERE Id = :id");
                            $sqll1->bindParam(":id",$id);
                            $sqll1->execute();
                            $roww = $sqll1->fetch(PDO::FETCH_NUM);
                            $name12 = $roww[0];
                            $room12 = $roww[1];
                            $sqll = $conn->prepare("SELECT * FROM orders WHERE Room = :room AND Firstname = :firstname");
                            $sqll->bindParam(":room",$room12);
                            $sqll->bindParam(":firstname",$name12);
                            $sqll->execute();
                            $numm1 = $sqll->rowCount();

                            for($ii=0;$ii<$numm1;$ii++){
                            $roww1 = $sqll->fetch(PDO::FETCH_NUM);
                    ?>   
                            <div class="img" id="<?php echo $roww1[0] ?>">
                                <img src="<?php echo $roww1[11] ?>" width="300px">
                                <a id="x" class="<?php echo $roww1[0] ?>"><i class="fa-solid fa-x"></i></a>
                            </div>
                    <tr>
                        <td><?php echo $roww1[1] ?></td>
                        <td><?php echo $roww1[2] ?></td>
                        <td><?php echo $roww1[3] ?></td>
                        <td><?php echo $roww1[4] ?></td>
                        <td style="text-align: right;"><?php echo number_format($roww1[5], 2) ?></td>
                        <td style="text-align: right;"><?php echo number_format($roww1[8], 2) ?></td>
                        <td style="text-align: right;"><?php echo number_format($roww1[9], 2) ?></td>
                        <td style="text-align: right;"><?php echo number_format($roww1[10], 2) ?></td>
                        <td>
                        <?php
                                if($roww1[11] == "none"){
                                    echo "ไม่มี";
                                }else if($roww1[11] == "สลิปผิดพลาด"){
                                    echo "<span style='color: orangered;'>ส่งคืนแล้ว</span>";
                            ?>
                            <?php }else{ ?>
                                <a style="color:red;" id="slip" class="<?php echo $roww1[0] ?>">ดูสลิป</a>
                            <?php } ?>
                        </td>
                        <td><?php echo $roww1[12] ?></td>
                        <td style="text-align:center;">
                        <?php
                            if($roww1[12] == "ยังไม่ชำระ"){
                        ?>
                        <a href="function.php?checkslip=<?php echo $roww1[0] ?>"class="button">ถูกต้อง</a>
                        <a href="function.php?errorslip=<?php echo $roww1[0] ?>"class="button orangered">ไม่ถูกต้อง</a>
                        <?php
                            }else if($roww1[12] == "ส่งคืน"){
                        ?>
                        <?php }else{ ?>
                            <i class="fa-solid fa-circle-check" style="color:green;"></i>
                        <?php } ?>
                        <a href="function.php?deleteslip=<?php echo $roww1[0] ?>"class="button red" onclick="return confirm('คุณต้องการลบหรือไม่')">ลบ</a>
                        </td>
                    </tr>                    
                    <?php
                            }
                        }else{
                    ?>
                   <h1 style="position:absolute; top:40%;">โปรดเลือกห้อง</h1>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="room_cost_show_form">
            <?php
                if($_GET['cost'] > 1){
                    $id = $_GET['cost'];
                    $sqll1 = $conn->prepare("SELECT * FROM users WHERE Id = :id");
                    $sqll1->bindParam(":id",$id);
                    $sqll1->execute();
                    $roww = $sqll1->fetch(PDO::FETCH_NUM);
            ?>
            <form action="function.php" method="post">
                <div class="box">
                    <label for="">ค่าห้อง ***</label>
                    <input type="number" name="cost_room" value="1500" required="required">
                </div>
                <div class="box">
                    <label for="">ค่าน้ำ หน่วย</label>
                    <input type="" name="cost_water" placeholder="โปรดใส่เฉพาะตัวเลข (ถ้าไม่มีให้ใส่ 0)" required="required">
                </div>
                <div class="box">
                    <label for="">ค่าไฟฟ้า หน่วย</label>
                    <input type="" name="cost_electric" placeholder="โปรดใส่เฉพาะตัวเลข (ถ้าไม่มีให้ใส่ 0)" required="required">
                </div>
                <input type="text" name="cost" style="display:none;" value="<?php echo $_GET['cost']; ?>">
                <input type="text" name="Room" style="display:none;" value="<?php echo $roww[14]; ?>">
                <input type="text" name="firstname" style="display:none;" value="<?php echo $roww[1]; ?>">
                <input type="text" name="lastname" style="display:none;" value="<?php echo $roww[2]; ?>">
                <label for="">เดือน/ปี</label>
                <input type="month" name="month" required="required">
                <button type="submit" name="add_cost">เสร็จสิ้น</button>
            </form>
            <?php  }else{ ?>
                <h1 style="position:absolute; top:40%;">โปรดเลือกห้อง</h1>
            <?php } ?>
        </div>
    </div>
</div>
