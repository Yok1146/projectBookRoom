
            <div class="Manage_users">
                <div class="user_room">
                    <div class="room 01"><h4>01</h4></div>
                    <div class="room 02"><h4>02</h4></div>
                    <div class="room 03"><h4>03</h4></div>
                    <div class="room 04"><h4>04</h4></div>
                    <div class="room 05"><h4>05</h4></div>
                    <div class="room 06"><h4>06</h4></div>
                    <div class="room 07"><h4>07</h4></div>
                    <div class="room 08"><h4>08</h4></div>
                    <div class="room 09"><h4>09</h4></div>
                    <div class="room 10"><h4>10</h4></div>
                    <div class="room 11"><h4>11</h4></div>
                    <div class="room 12"><h4>12</h4></div>
                    <div class="room 13"><h4>13</h4></div>
                    <div class="room 14"><h4>14</h4></div>
                </div>
                <div class="user_table">
                    <table>
                        <thead>
                            <tr>
                                <th>สถานะ</th>
                                <th>ห้อง</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>แก้ไข</th>
                                <th>เช็คเอาท์</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                showuserroom($conn);
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
                if(isset($_SESSION['search'])){
                    $ide = $_SESSION['search'];
                    $sql = $conn->prepare("SELECT * FROM users WHERE Id = $ide");
                    $sql->execute();
                    $row = $sql->fetch(PDO::FETCH_NUM);
            ?>
                <div class="edite_users">
                    <div class="form_user">
                        <form action="index.php" method="post">
                                <input type="number" name="num" value="1" style="display:none;">
                            <button name="exite">X</button>
                        </form>
                        <form action="config.php" method="post">
                            <select name="Id" class="hidden">
                                <option value="<?php echo $row[0]; ?>"></option>
                            </select>
                            <div class="div_form1">
                                <h1>ห้อง</h1>
                                <select name="Room" id="">
                                    <option value="<?php echo $row[14]; ?>"><?php echo $row[14]; ?></option>
                                    <option value="Room 01">Room 01</option>
                                    <option value="Room 02">Room 02</option>
                                    <option value="Room 03">Room 03</option>
                                    <option value="Room 04">Room 04</option>
                                    <option value="Room 05">Room 05</option>
                                    <option value="Room 06">Room 06</option>
                                    <option value="Room 07">Room 07</option>
                                    <option value="Room 08">Room 08</option>
                                    <option value="Room 09">Room 09</option>
                                    <option value="Room 10">Room 10</option>
                                    <option value="Room 11">Room 11</option>
                                    <option value="Room 12">Room 12</option>
                                    <option value="Room 13">Room 13</option>
                                    <option value="Room 14">Room 14</option>
                                </select>
                            </div>
                            <div class="div_form2">
                                <h3>เลขบัตรประชาชน</h3>
                                <input type="text" name="" id="" placeholder="<?php echo $row[7]; ?>" value="<?php echo $row[7]; ?>">
                            </div>
                            <div class="div_form3">
                                <h2>ชื่อ</h2>
                                <input type="text" name="" id="" placeholder="<?php echo $row[1]; ?>" value="<?php echo $row[1]; ?>">
                                <h2>นามสกุล</h2>
                                <input type="text" name="" id="" placeholder="<?php echo $row[2]; ?>" value="<?php echo $row[2]; ?>">
                            </div>
                            <div class="div_form3">
                                <h2>เบอร์โทร</h2>
                                <input type="tel" name="" id="" placeholder="<?php echo $row[3]; ?>" value="<?php echo $row[3]; ?>">
                            </div>
                            <div class="div_form3">
                                <h2>ที่อยู่</h2>
                                <input type="tel" name="" id="" placeholder="<?php echo $row[17]; ?>" value="<?php echo $row[17]; ?>">
                            </div>
                            <div class="div_form3">
                                <h2>ตำบล</h2>
                                <input type="tel" name="" id="" placeholder="<?php echo $row[17]; ?>" value="<?php echo $row[18]; ?>">
                            </div>
                            <div class="div_form3">
                                <h2>อำเภอ</h2>
                                <input type="tel" name="" id="" placeholder="<?php echo $row[17]; ?>" value="<?php echo $row[19]; ?>">
                            </div>
                            <div class="div_form3">
                                <h2>จังหวัด</h2>
                                <input type="tel" name="" id="" placeholder="<?php echo $row[17]; ?>" value="<?php echo $row[20]; ?>">
                            </div>
                            <button type="submit" name="search">แก้ไขข้อมูล</button>
                        </form>
                    </div>
                </div>
            <?php
                }
            ?>