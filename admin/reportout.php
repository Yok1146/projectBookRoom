<?php
    $sql1 = $conn->prepare("SELECT * FROM users WHERE Out_date != 'ไม่ระบุ' AND Class = 'user' AND Status = 'active'");
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
                    <td width="10%">วันที่ทำเรื่องย้ายออก</td>
                    <td width="10%">วันย้ายออก</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i=0;$i<$num1;$i++){
                        $row = $sql1->fetch(PDO::FETCH_NUM);
                        $room = $row[16];
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
                    <td><?php echo $row[21] ?></td>
                    <td><?php echo $row[10] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <script>
            // const showdiv = 
        </script>
    </div>
</div>