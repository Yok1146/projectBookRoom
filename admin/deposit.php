<?php
    $sql1 = $conn->prepare("SELECT * FROM users WHERE Status = 'wait' AND Class = 'user'");
    $sql1->execute();
    $num1 = $sql1->rowCount();
?>
<div class="insert_content">
    <div class="deposit">
        <table>
            <thead>
                <tr>
                    <td width="5%">#</td>
                    <td width="5%">ห้อง</td>
                    <td width="10%">ชื่อ</td>
                    <td width="10%">นามสกุล</td>
                    <td width="10%">เบอร์โทร</td>
                    <td width="40%">ที่อยู่</td>
                    <td width="10%">สลิป</td>
                    <td width="10%">ตรวจสอบ</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i=0;$i<$num1;$i++){
                        $row = $sql1->fetch(PDO::FETCH_NUM);
                        $room = $row[14];
                        $firstname = $row[1];
                        $lastname = $row[2];
                        $sql = $conn->prepare("SELECT * FROM orders WHERE Room = :room AND Firstname = :firstname AND Lastname = :lastname");
                        $sql->bindParam(":room",$room);
                        $sql->bindParam(":firstname",$firstname);
                        $sql->bindParam(":lastname",$lastname);
                        $sql->execute();
                        $num = $sql->rowCount();
                        $row1 = $sql->fetch(PDO::FETCH_NUM);
                        // echo $num;
                ?>
                <tr>
                    <td><?php echo $row[0] ?></td>
                    <td><?php echo $row[14] ?></td>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?></td>
                    <td><?php echo $row[6] ?></td>
                    <td><?php if($row1[11] == 'none'){ ?>ไม่พบ <?php }else{ ?><p class="button showdiv" id="<?php echo $row1[0] ?>">ดูสลิป</p> <?php } ?></td>
                    <td>ตรวจสอบ</td>
                </tr>
                <tr class="div" id="<?php echo $row1[0] ?>">
                    <td colspan="6" rowspan="7"><img src="<?php echo $row1[11] ?>" width="500px" height="750px"></td>

                    <td style="text-align:left;">ที่ต้องชำระ</td>
                    <td><?php echo number_format($row1[10],2) ?> บาท</td>
                </tr>
                <tr class="div" id="<?php echo $row1[0] ?>">
   
                    <td style="text-align:left;">ชำระวันที่</td>
                    <td><?php echo $row1[4] ?></td>
                </tr>
                <tr class="div" id="<?php echo $row1[0] ?>">
   
                    <td style="text-align:left;">นำผู้เช้าเข้าห้อง</td>
                    <td><a href="function.php?checkin=<?php echo $row1[0] ?>" onclick="return confirm('คุณต้องการย้ายไปยังผู้เช่าหรือไม่')">นำเข้า</a></td>
                </tr>
                <tr class="div" id="<?php echo $row1[0] ?>">

                    <td style="text-align:left;">นำผู้เช่าออก</td>
                    <td><a href="function.php?output=<?php echo $row1[0] ?>" onclick="return confirm('คุณต้องการย้ายไปยังผู้เช่าหรือไม่')">ออก</a></td>
                </tr>
                <tr class="div" id="<?php echo $row1[0] ?>">

                    <td>.</td>
                    <td></td>
                </tr>
                <tr class="div" id="<?php echo $row1[0] ?>">
 
                    <td>.</td>
                    <td></td>
                </tr>
                <tr class="div" id="<?php echo $row1[0] ?>">

                    <td>.</td>
                    <td></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <script>
            // const showdiv = 
        </script>
    </div>
</div>