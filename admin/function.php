<?php
require_once "../config/connect.php";
$strDate = date('Y-m-d');
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
$time = "$strDay $strMonthThai $strYear";

function showuserroom($conn){
    try{
        $sql = $conn->prepare("SELECT * FROM users WHERE Class = 'user' AND Status = 'active' ORDER BY Room ASC");
        $sql->execute();
        $numrow = $sql->rowCount();
        $num = 14;
        for($i=0;$i<$num;$i++){
            if($i < $numrow){
                $row = $sql->fetch(PDO::FETCH_NUM);
        echo '<tr>
            <td><i class="fa-solid fa-square success"></i></td>
            <td>';
        echo $row[14];
        echo '</td>
            <td>';
        echo  $row[1]; 
        echo '</td>
            <td>';
        echo $row[2];
        echo '</td>
            <td><a href="';
        echo 'config.php?idser=';
        echo $row[0];
        echo '"><i class="fa-solid fa-magnifying-glass search"></i></a></td>
            <td><a href="config.php?iddel=';
        echo $row[0];
        echo '" onclick="return confirm(`คุณต้องการลบหรือไม่ ถ้ากด <OK> ข้อมูลผู้เช่าจะย้ายไปผู้เช่าเก่าแทน`)"><i class="fa-solid fa-circle-minus delete"></i></a></td>
        </tr>';
            }else{
                echo '<tr>
            <td><i class="fa-solid fa-square"></i></td>
            <td>';
        echo "ยังไม่มีผู้เช่า";
        echo '</td>
            <td>';
        echo  "ยังไม่มีผู้เช่า"; 
        echo '</td>
            <td>';
        echo "ยังไม่มีผู้เช่า";
        echo '</td>
            <td><i class="fa-solid fa-circle-xmark"></i></td>
            <td><i class="fa-solid fa-circle-xmark"></i></td>
        </tr>';
            }
        }
    }catch(PDOEXCEPTION $e){
        $e->getMessage();
    }
}

if(isset($_POST['add_cost'])){
    $room = $_POST['Room'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $month = $_POST['month'];
    $cost_room = $_POST['cost_room'];
    $cost_water = $_POST['cost_water'];
    $cost_waters=$cost_water*15;
    $cost_electric = $_POST['cost_electric'];
    $cost_electrics= $cost_electric*10;
    $cost = $_POST['cost'];
    $total = $cost_waters+$cost_electrics+$cost_room;
    $slip = "none";
    $status = "ยังไม่ชำระ";
    echo $total,"<br>";
    echo $cost_electric,"<br>";
    echo $cost_water,"<br>";
    echo $room,"<br>";
    echo $firstname,"<br>";
    echo $lastname,"<br>";
    echo $month,"<br>";
    echo $status,"<br>";
    echo $balanc,"<br>";

    $sql = $conn->prepare("INSERT INTO orders(Room,Firstname,Lastname,Month,Roomrate,Cost_water_mitor,Cost_electric_mitor,Cost_water,Cost_electric,Total,slip,Status) VALUES(:room, :firstname, :lastname, :month, :Roomrate, :Cost_water_mitor, :Cost_electric_mitor, :cost_water, :cost_electric,:total,:slip,:status)");
    $sql->bindParam(":room",$room);
    $sql->bindParam(":firstname",$firstname);
    $sql->bindParam(":lastname",$lastname);
    $sql->bindParam(":month",$month);
    $sql->bindParam(":Roomrate",$cost_room);
    $sql->bindParam(":Cost_water_mitor",$cost_water);
    $sql->bindParam(":Cost_electric_mitor",$cost_electric);
    $sql->bindParam(":cost_water",$cost_waters);
    $sql->bindParam(":cost_electric",$cost_electrics);
    $sql->bindParam(":total",$total);
    $sql->bindParam(":slip",$slip);
    $sql->bindParam(":status",$status);
    if($sql->execute()){
        updatecost($room,$cost_room,$cost_waters,$cost_electrics,$conn,$cost);
    }else{
        echo "มีข้อผิดพลาดดดดดดดดดดดดดดดด..!";
    }

}


function updatecost($room,$cost_room,$cost_waters,$cost_electrics,$conn,$cost){
    $active = "active";
    $sqll = $conn->prepare("SELECT Roomrate,Cost_water,Cost_electric FROM users WHERE Room = :room AND Status = :active");
    $sqll->bindParam(":room",$room);
    $sqll->bindParam(":active",$active);
    $sqll->execute();
    $row = $sqll->fetch(PDO::FETCH_NUM);
    $cost_room+=$row[0];
    $cost_waters+=$row[1];
    $cost_electrics+=$row[2];

    $sql = $conn->prepare("UPDATE users SET Roomrate = :Roomrate,Cost_water = :cost_water,Cost_electric = :cost_electric WHERE Room = :room AND Status = :active");
    $sql->bindParam(":Roomrate",$cost_room);
    $sql->bindParam(":cost_water",$cost_waters);
    $sql->bindParam(":cost_electric",$cost_electrics);
    $sql->bindParam(":room",$room);
    $sql->bindParam(":active",$active);
    if($sql->execute()){
        header("location:index.php?cost=$cost");
    }else{
        echo "มีข้อผิดพลาดดดดดดดดดดดดดดดด..!";
    }
}

if(isset($_GET['checkin'])){
    $id = $_GET['checkin'];
    $sql = $conn->prepare("UPDATE users SET Status = 'active' WHERE Id = :id");
    $sql->bindParam(":id",$id);

    $sql1 = $conn->prepare("SELECT * FROM users WHERE Id = :id");
    $sql1->bindParam(":id",$id);
    $sql1->execute();
    $row1 = $sql1->fetch(PDO::FETCH_NUM);

    $room = $row1[14];
    $sql2 = $conn->prepare("UPDATE room SET Status = 'active' WHERE Room = :room");
    $sql2->bindParam(":room",$room);
    $sql2->execute();

    if($sql->execute()){
        header("location:index.php?insertuser=1");
    }else{
        echo "มีข้อผิดพลาดดดดดดดดดดดดดดดด..!";
    }
}


if(isset($_GET['checkout'])){
    $id = $_GET['checkout'];
    $sql = $conn->prepare("UPDATE users SET Status = 'old',Out_date = :date,Room = 'none' WHERE Id = :id");
    $sql->bindParam(":id",$id);
    $sql->bindParam(":date",$time);
    $sqll = $conn->prepare("SELECT Room FROM users WHERE Id = :id");
    $sqll->bindParam(":id",$id);
    $sqll->execute();
    $row = $sqll->fetch(PDO::FETCH_NUM);
    $room = $row[0];
    if($sql->execute()){
        updatecheckout($room,$conn);
    }else{
        echo "มีข้อผิดพลาดดดดดดดดดดดดดดดด..!";
    }
}

function updatecheckout($room,$conn){
    $sql = $conn->prepare("UPDATE room SET Name = 'User',Status = 'default' WHERE Room = :room");
    $sql->bindParam(":room",$room);
    if($sql->execute()){
        header("location:index.php?insertuser=1");
    }else{
        echo "มีข้อผิดพลาดดดดดดดดดดดดดดดด..!";
    }
}


if(isset($_GET['checkslip'])){
    $id = $_GET['checkslip'];
    $sql = $conn->prepare("UPDATE orders SET Status = 'ชำระเสร็จสิ้น' WHERE Id = :id");
    $sql->bindParam(":id",$id);
    $sql->execute();
    $sqll = $conn->prepare("SELECT Room,Roomrate,Cost_water,Cost_electric FROM orders WHERE Id = :id");
    $sqll->bindParam(":id",$id);
    $sqll->execute();
    $row = $sqll->fetch(PDO::FETCH_NUM);
    $room = $row[0];
    $roomrate = $row[1];
    $cost_water = $row[2];
    $cost_electric = $row[3];

    if($sqll->execute()){
        // header("location:index.php?cost=1");
        updateroomrate($room,$roomrate,$cost_water,$cost_electric,$conn);
    }else{
        echo "มีข้อผิดพลาดดดดดดดดดดดดดดดด..!";
    }
}


function updateroomrate($room,$roomrate,$cost_water,$cost_electric,$conn){
    $sql = $conn->prepare("SELECT * FROM users WHERE Room = :room AND Status = 'active'");
    $sql->bindParam(":room",$room);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_NUM);
    $roomrate = $row[11]- $roomrate;
    $cost_water = $row[12]-$cost_water;
    $cost_electric = $row[13]-$cost_electric;
    $sql1 = $conn->prepare("UPDATE users SET Roomrate = :roomrate,Cost_water = :cost_water,Cost_electric = :cost_electric WHERE Room = :room AND Status = 'active'");
    $sql1->bindParam(":roomrate",$roomrate);
    $sql1->bindParam(":cost_water",$cost_water);
    $sql1->bindParam(":cost_electric",$cost_electric);
    $sql1->bindParam(":room",$room);
    if($sql1->execute()){
        header("location:index.php?cost=1");
    }else{
        echo "มีข้อผิดพลาดดดดดดดดดดดดดดดด..!";
    }
}


if(isset($_GET['errorslip'])){
    $id = $_GET['errorslip'];
    $sql = $conn->prepare("UPDATE orders SET Status = 'ส่งคืน',slip = 'สลิปผิดพลาด' WHERE Id = :id");
    $sql->bindParam(":id",$id);
    if($sql->execute()){
        header("location:index.php?cost=1");
    }else{
        echo "มีข้อผิดพลาดดดดดดดดดดดดดดดด..!";
    }
}

if(isset($_GET['deleteslip'])){
    $id = $_GET['deleteslip'];
    $sql = $conn->prepare("DELETE FROM orders WHERE Id = :id");
    $sql->bindParam(":id",$id);
    if($sql->execute()){
        header("location:index.php?cost=1");
    }else{
        echo "มีข้อผิดพลาดดดดดดดดดดดดดดดด..!";
    }
}


if(isset($_GET['output'])){
    $id = $_GET['output'];
    echo $id;
}
?>