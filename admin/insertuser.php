<?php
    $sql = $conn->prepare("SELECT * FROM users WHERE Status = 'active' AND Class = 'user'");
    $sql->execute();
    $num = $sql->rowCount();
    $sql1 = $conn->prepare("SELECT * FROM users WHERE Status = 'wait' AND Class = 'user'");
    $sql1->execute();
    $num1 = $sql1->rowCount();
    $sql2 = $conn->prepare("SELECT * FROM users WHERE Status = 'old' AND Class = 'user'");
    $sql2->execute();
    $num2 = $sql2->rowCount();
?>
    <div class="insert_content">
        <div class="data_user">
            <div class="inroomuser" style="background-color:#058f23;">
                <div class="item_user_show">
                    <h1><?php echo $num ?></h1>
                    <p>จำนวนผู้เช่าในขณะนี้</p>
                </div>
                <i class="fa-solid fa-person-circle-check"></i>
            </div>
            <div class="bookinguser" style="background-color: rgba(0, 81, 255, 0.678);">
                <div class="item_user_show">
                    <h1><?php echo $num1 ?></h1>
                    <p>จำนวนคนจอง</p>
                </div>
                <i class="fa-solid fa-person-circle-plus"></i>
            </div>
            <div class="olduser" style="background-color: red;">
                <div class="item_user_show">
                        <h1><?php echo $num2 ?></h1>
                        <p>จำนวนผู้เช่าเก่า</p>
                    </div>
                    <i class="fa-solid fa-person-circle-minus"></i>
                </div>
        </div>
        <div class="content_user">
            <div class="inroom_show">
                <h1>ผู้เช่าในขณะนี้</h1>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <td>ห้อง</td>
                                <td>ชื่อ</td>
                                <td>นามสกุล</td>
                                <td>เบอร์โทร</td>
                                <td>เช็คเอาท์</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                for($i=0;$i<$num;$i++){
                                    $row = $sql->fetch(PDO::FETCH_NUM);
                            ?>
                            <tr>
                                <td><?php echo $row[14] ?></td>
                                <td><?php echo $row[1] ?></td>
                                <td><?php echo $row[2] ?></td>
                                <td><?php echo $row[3] ?></td>                           
                                <td><a href="function.php?checkout=<?php echo $row[0] ?>" onclick="return confirm('คุณต้องการย้ายไปยังผู้เช่าเก่าหรือไม่')">นำออก</a></td>                           
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="right_show">
                <div class="booking_show">
                    <h1>ผู้จอง</h1>
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <td>ห้อง</td>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>เบอร์โทร</td>
                                    <td>วันที่จะเข้าพัก</td>
                                    <td>เช็คอิน</td>
                                    <td>เอาออก</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                for($i1=0;$i1<$num1;$i1++){
                                    $row1 = $sql1->fetch(PDO::FETCH_NUM);
                            ?>
                            <tr>
                                <td style="font-size:10px;"><?php echo $row1[14] ?></td>
                                <td><?php echo $row1[1] ?></td>
                                <td><?php echo $row1[2] ?></td>
                                <td><?php echo $row1[3] ?></td>
                                <td><?php echo $row1[8] ?></td>                           
                                <td><a href="function.php?checkin=<?php echo $row1[0] ?>" onclick="return confirm('คุณต้องการย้ายไปยังผู้เช่าหรือไม่')">นำเข้า</a></td>    
                                <td><a href="function.php?output=<?php echo $row1[0] ?>" onclick="return confirm('คุณต้องการย้ายไปยังผู้เช่าหรือไม่')">ออก</a></td>                       
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="old_show">
                    <h1>ผู้เช่าเก่า</h1>
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <td>ห้อง</td>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>เบอร์โทร</td>
                                    <td>วันที่เข้าพัก</td>
                                    <td>วันที่ออก</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                for($i2=0;$i2<$num2;$i2++){
                                    $row2 = $sql2->fetch(PDO::FETCH_NUM);
                            ?>
                            <tr>
                                <td style="font-size:10px;"><?php echo $row2[14] ?></td>
                                <td><?php echo $row2[1] ?></td>
                                <td><?php echo $row2[2] ?></td>
                                <td><?php echo $row2[3] ?></td>
                                <td><?php echo $row2[8] ?></td>                           
                                <td><?php echo $row2[10] ?></td>                           
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>