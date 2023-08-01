
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contract.css">
    <title>ห้องพักบุญเรือน</title>
</head>
<body>
    <?php
    require_once "config/connect.php";
    session_start();
    $room = $_POST['room'];
    $datebooking = $_POST['datebooking'];
    $datein = $_POST['datein'];
    ?>
    <div class="content">
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 1  ผู้เช่าตกลงเช่าและผู้ให้เช่าตกลงให้เช่าห้องพักอาศัยห้องเลขที่ <?php echo $room; ?>
 ชั้นที่ 1 ของ ห้องเช่าบุญเรือน ซึ่งตั้งอยู่ที่ 33 ถนนพุทธมนฑลสาย 3 ซอย 18 ตำบล/แขวง   
ศาลาธรรมสพน์ อำเภอ/เขต ทวีวัฒนา จังหวัด กรุงเทพมหานครเพื่อใช้เป็น
ที่พักอาศัย ในอัตราค่าเช่าเดือนละ 1,500.00 บาท  (หนึ่งพันห้าร้อยบาท) ค่าเช่านี้ไม่รวมถึงค่าไฟฟ้า
ค่าน้ำประปา ค่าโทรศัพท์ ซึ่งผู้เช่าต้องชำระแก่ผู้ให้เช่าตามอัตราที่กำหนดไว้ในสัญญาข้อ ๔ <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 2  ผู้เช่าตกลงเช่าห้องพักอาศัยตามสัญญาข้อ ๑ มีกำหนดเวลา 1 ปี นับตั้งแต่วันที่ <?php echo $datein; ?> ถึงวันที่……………………..<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 3  การชำระค่าเช่า ผู้เช่าตกลงจะชำระค่าเช่าแก่ผู้ให้เช่าเป็นการล่วงหน้า โดยชำระภายในวันที่ 5 ของทุกเดือนตลอดเวลาอายุการเช่า<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 4  ผู้ให้เช่าคิดค่าไฟฟ้า ค่าน้ำประปา ในอัตราดังนี้<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1) ค่าไฟฟ้ายูนิตละ 10.00 บาท<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(2) ค่าน้ำประปาลูกบาศก์เมตรละ 15.00 บาท<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 5  ผู้เช่าต้องชำระค่าไฟฟ้า ค่าน้ำประปา ตามจำนวนหน่วยที่ใช้ในแต่ละเดือนและต้องชำระพร้อมกับการชำระค่าเช่าของเดือนถัดไป<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 6  เพื่อเป็นการปฏิบัติตามสัญญาเช่า ผู้เช่าตกลงมอบเงินประกันแก่ผู้ให้เช่าไว้เป็นจำนวน 1,000.00 บาท (หนึ่งพันบาท) เงินประกันนี้ผู้ให้เช่าจะคืนให้แก่ผู้เช่าเมื่อผู้เช่ามิได้
ผิดสัญญา และมิได้ค้างชำระเงินต่างๆ ตามสัญญานี้<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 7 ผู้เช่าต้องเป็นผู้ดูแลรักษาความสะอาดบริเวณทางเดินส่วนกลางหน้าห้องพัก อาศัยของผู้เช่าและผู้เช่าจะต้องไม่นำสิ่งของใดๆมาวางไว้ในบริเวณทางเดินดังกล่าว<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 8  ผู้เช่าต้องดูแลห้องพักอาศัยและทรัพย์สินต่างๆในห้องพักดังกล่าว เสมือนเป็นทรัพย์สินของตนเอง และต้องรักษาความสะอาดตลอดจนรักษาความสงบเรียบร้อย ไม่ก่อให้เกิดเสียงให้เป็นที่เดือดร้อนรำคาญแก่ผู้อยู่ห้องพักอาศัยข้างเคียง<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 9  ผู้เช่าต้องเป็นผู้รับผิดชอบในบรรดาความสูญหาย เสียหาย หรือบุบสลายอย่างใดๆ อันเกิดแก่ห้องพักอาศัยและทรัพย์สินต่างๆ ในห้องพักดังกล่าว<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 10  ผู้เช่าต้องยอมให้ผู้ให้เช่า หรือตัวแทนของผู้ให้เช่าเข้าตรวจดูห้องพักอาศัยได้เป็นครั้งคราวในระยะเวลาอันสมควร<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 11  ผู้เช่าต้องไม่ทำการดัดแปลง ต่อเติม หรือรื้อถอนห้องพักอาศัยและทรัพย์สินต่างๆ ในห้องพักดังกล่าว ไม่ว่าทั้งหมดหรือบางส่วน หากฝ่าฝืนผู้ให้เช่าจะเรียกให้ผู้เช่าทำทรัพย์สินดังกล่าว ให้กลับคืนสู่สภาพเดิม และเรียกให้ผู้เช่ารับผิดชดใช้ค่าเสียหายอันเกิดความสูญหาย เสียหาย หรือบุบสลายใดๆ อันเนื่องมาจากการดัดแปลง ต่อเติม หรือรื้อถอนดังกล่าว<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 12  ผู้เช่าต้องไม่นำบุคคลอื่นนอกจากบุคคลในครอบครัวของผู้เช่าเข้ามาพักอาศัย ในห้องพักอาศัย<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 13  ผู้เช่าสัญญาว่าจะปฏิบัติตามระเบียบข้อบังคับของอพาร์ตเม้นต์ท้ายสัญญานี้ ซึ่งคู่สัญญาทั้งสองฝ่ายให้ถือว่าระเบียบข้อบังคับดังกล่าวเป็นส่วนหนึ่งแห่งสัญญาเช่านี้ด้วย หากผู้เช่าละเมิดแล้วผู้ให้เช่าย่อมให้สิทธิตามข้อ 17 และข้อ 18 แห่งสัญญานี้ได้<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 14  ผู้ให้เช่าไม่ต้องรับผิดชอบในความสูญหายหรือความเสียหายอย่างใดๆ อันเกิดขึ้นแก่รถยนต์รวมทั้งทรัพย์สินต่างๆ ในรถยนต์ของผู้เช่า ซึ่งได้นำมาจอดไว้ในที่จอดรถยนต์ ที่ผู้ให้เช่าจัดไว้ให้<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 15  ผู้เช่าตกลงว่าการผิดสัญญาเช่าเครื่องเรือนซึ่งผู้เช่าได้ทำไว้กับผู้ให้เช่าต่างหากจาก สัญญานี้ ถือว่าเป็นการผิดสัญญานี้ด้วย และโดยนัยเดียวกันการผิดสัญญานี้ย่อมถือเป็นการผิดสัญญาเช่า เครื่องเรือนด้วย<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 16  หากผู้เช่าประพฤติผิดสัญญาข้อหนึ่งข้อใด หรือหลายข้อก็ดี ผู้เช่าตกลงให้ผู้ให้เช่า ใช้สิทธิดังต่อไปนี้ ข้อใดข้อหนึ่งหรือหลายข้อรวมกันก็ได้ คือ<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1) บอกเลิกสัญญาเช่า<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(2) เรียกค่าเสียหาย<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(3) บอกกล่าวให้ผู้เช่าปฏิบัติตามข้อกำหนดในสัญญาภายในกำหนดเวลา ที่ผู้ให้เช่าเห็นสมควร<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(4) ตัดกระแสไฟฟ้า น้ำประปา ได้ในทันที โดยไม่จำเป็น ต้องบอกกล่าวแก่ผู้เช่าเป็นการล่วงหน้า<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อ 17 ในกรณีที่สัญญาเช่าระงับสิ้นลง ไม่ว่าด้วยเหตุใดๆ ก็ตาม ผู้เช่าต้องส่งมอบห้องพักอาศัยคืนแก่ผู้ให้เช่าทันที หากผู้เช่าไม่ปฏิบัติ ผู้ให้เช่าสิทธิกลับเข้าครอบครองห้องพักอาศัยที่ให้เช่า และขนย้ายบุคคลและทรัพย์สินของผู้เช่าออกจากห้องพักดังกล่าวได้ โดยผู้เช่าเป็นผู้รับผิดชอบ ในความสูญหายหรือความเสียหายอย่างใดๆ อันเกิดขึ้นแก่ทรัพย์สินของผู้เช่า ทั้งผู้ให้เช่ามีสิทธิริบเงิน ประกันการเช่า ตามที่ระบุไว้ในสัญญาข้อ 6 ได้ด้วย<br></p>
    </div>
    <div class="check">
    <form action="config/function.php" method="post">
        <div class="flex">
            <div class="boxs">
                <label for="">บัตรประชาชน</label>
<script>
					function addHyphen (element) {
    				let ele = document.getElementById(element.id);
       				ele = ele.value.split('-').join('');  

        			let finalVal = ele.replace(/(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d)/, '$1$2-$3$4$5$6-$7$8$9$10')
        			document.getElementById(element.id).value = finalVal;
    				}
				</script>
				<input type="text" name="idnumber" required placeholder="โปรดกรอกรหัสบัตรประชาชน 13 หลักของคุณ" class="" pattern="[0-9]{13}" maxLength="13" title="โปรดกรอกเลขบัตรประชาชนให้ครบ 13 หลัก">
            </div>
            <div class="boxs">
                            <label for="">ที่อยู่เลขที่</label>
                            <input type="text" name="numberhome" id="" required="required">
                        </div>
        </div>

            <div class="flex">
            <div class="boxs">
                            <label for="">ถนน</label>
                            <input type="text" name="road" id="" required="required">
                        </div>
                        <div class="boxs">
                            <label for="">ซอย</label>
                            <input type="text" name="soi" id="">
                        </div>
            </div>
                        <div class="flex">
                        <div class="boxs">
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
                        <div class="boxs">
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
                        <div class="boxs">
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
                        <div class="boxs">
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
                    </div>
            <div class="box">
                <input type="checkbox" name="re" id="" required="required"> ข้าพเจ้าได้อ่านสัญญาและยอมรับสัญญาทั้งหมด
                <input type="text" name="room" id="" value="<?php echo $room ?>" style="display:none;">
                <input type="text" name="datebooking" id="" value="<?php echo $datebooking ?>" style="display:none;">
                <input type="text" name="datein" id="" value="<?php echo $datein ?>" style="display:none;">
            </div>
            <div class="colum">
                <a href="index.php" class="ahref">ยกเลิก</a>
                <button name="addbooking" type="submit">จองห้องพัก</button>
            </div>
        </form>
    </div>
</body>
<script src="js/index.js"></script>
</html>