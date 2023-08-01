<?php
require_once "connect.php";

if(isset($_POST['addbooking'])){
    session_start();
    $name = $_SESSION['Username'];
    $date = $_POST['datebooking'];
    $datein = $_POST['datein'];
    $room = $_POST['room'];

    $idnumber = $_POST['idnumber'];
    $numberhome = $_POST['numberhome'];
    $road = $_POST['road'];
    $soi = $_POST['soi'];
    $country = $_POST['country'];
    $district = $_POST['district'];
    $tambon = $_POST['tambon'];
    $postcode = $_POST['postcode'];
    $address = $numberhome." ".$road." ".$soi." อำเภอ".$district." จังหวัด".$country." ".$postcode;
    
    checkinput($name,$date,$datein,$room,$idnumber,$address,$numberhome,$road,$soi,$country,$district,$tambon,$postcode,$conn);
}

function checkinput($name,$date,$datein,$room,$idnumber,$address,$numberhome,$road,$soi,$country,$district,$tambon,$postcode,$conn){

    function DateThai($strDate)
			{
				$strYear = date("Y",strtotime($strDate))+543;
				$strMonth= date("n",strtotime($strDate));
				$strDay= date("j",strtotime($strDate));
				$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
				$strMonthThai=$strMonthCut[$strMonth];
				return "$strDay $strMonthThai $strYear";
			}		
            // $date = $_POST['date'];

	// $strDate = $date;
    $date = DateThai("$date");
    $datein = DateThai("$datein");
    echo $date;
    echo $datein;
    $home = $numberhome." ".$road." ".$soi;
    updatedatauser($name,$date,$datein,$room,$idnumber,$address,$home,$country,$district,$tambon,$postcode,$conn);

}


function updatedatauser($name,$date,$datein,$room,$idnumber,$address,$home,$country,$district,$tambon,$postcode,$conn){
    // session_start();
    try{
    $sqll = $conn->prepare("SELECT * FROM users WHERE Email = :name");
    $sqll->bindParam(":name",$name);
    $sqll->execute();
    $row = $sqll->fetch(PDO::FETCH_NUM);
    $email = $row[4];
    $status = "wait";
    $firstname = $row[1];
    $lastname = $row[2];
    $sql = $conn->prepare("UPDATE users SET Address = :address,Idnumber = :Idnumber,Book_date = :book_date, In_date = :in_date,Room = :room, Status = :status,Home = :home,Tambon = :tambon,District = :district,Province = :province WHERE Email = :email");
    $sql->bindParam(":address",$address);
    $sql->bindParam(":Idnumber",$idnumber);
    $sql->bindParam(":book_date",$date);
    $sql->bindParam(":in_date",$datein);
    $sql->bindParam(":room",$room);
    $sql->bindParam(":status",$status);
    $sql->bindParam(":home",$home);
    $sql->bindParam(":tambon",$tambon);
    $sql->bindParam(":district",$district);
    $sql->bindParam(":province",$country);
    $sql->bindParam(":email",$email);
    echo $email;
    if($sql->execute()){
        updateorder($firstname,$lastname,$datein,$room,$conn);
        updatedata($email,$firstname,$lastname,$room,$conn);
    }else{
        echo "มีข้อผิดพลาดดดดดดดดดดดดดดดด..!";
    }
    }catch(PDOexception $e){
        $e->getMessage();
    }
}

function updateorder($firstname,$lastname,$datein,$room,$conn){

    $sql = $conn->prepare("INSERT INTO orders(Room,Firstname,Lastname,Month,Roomrate,Cost_water_mitor,Cost_electric_mitor,Cost_water,Cost_electric,Total,slip,Status) VALUES(:room, :firstname, :lastname, :month, 1000, 0, 0, 0, 0, 1000, 'none', 'ยังไม่ชำระ')");
    $sql->bindParam(':room',$room);
    $sql->bindParam(':firstname',$firstname);
    $sql->bindParam(':lastname',$lastname);
    $sql->bindParam(':month',$datein);
    $sql->execute();

    $sql1 = $conn->prepare("UPDATE users SET Roomrate = 1000 WHERE Room = :room AND Status = 'wait'");
    $sql1->bindParam(":room",$room);
    $sql1->execute();
}



function updatedata($email,$firstname,$lastname,$room,$conn){
    session_start();
    try{
        $name = $firstname;
        $sql = $conn->prepare("UPDATE room SET Name = :name,Status = 'waite' WHERE Room = :room");
        $sql->bindParam(":name",$name);
        $sql->bindParam(":room",$room);
        if($sql->execute()){
            session_start();
            header("location:../index.php?user=$email");

        }else{
            echo "มีข้อผิดพลาดดดดดดดดดดดดดดดด..!";
        }
    }catch(PDOexception $e){
        $e->getMessage();
    }
}



// if(isset($_POST["username"])){
//     session_start();
//     $room = $_POST["username"];
//     $password = $_POST["password"];

//     if(empty($room)){
//         $_SESSION['login'] = 1;
//         header("location:../index.php?login=กรุณาป้อนชื่อห้อง");
//         exit();
//     }else if(empty($password)){
//         $_SESSION['login'] = 1;
//         header("location:../index.php?login=กรุณาป้อนเบอร์โทร");
//         exit();
//     }else if($room == "admin@gmail.com" && $password == "ADMIN"){
//         $_SESSION["ADMIN"] = $room;
//         header("location:../admin/index.php");
//     }else{
//         insertdata($room,$password,$conn);
//     }
// }

function insertdata($room,$password,$conn){
    $sql = $conn->prepare("SELECT * FROM users WHERE Room = :room AND Password = :password AND Status != 'old'");
    $sql->bindParam(":room",$room);
    $sql->bindParam(":password",$password);
    $sql->execute();
    // $fetch = $sql->fetch(PDO::FETCH_ASSOC);
    $num = $sql->rowCount();
    if($num == 1){
        $_SESSION["Username"] = $room;
        header("location:../index.php");
    }else{
        $_SESSION['login'] = 1;
        header("location:function.php?emailerror=อีเมลย์หรือรหัสผ่านไม่ถูกต้อง");
    }
}



if(isset($_GET['exite'])){
    session_start();
    session_destroy();
    header("location:../index.php");
}


if(isset($_POST['change'])){
    $room = $_POST['room'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $tell = $_POST['tell'];
    $id = $_POST['id'];
    $sql = $conn->prepare("UPDATE users SET Firstname = :firstname,Lastname = :lastname,Tell = :tell WHERE Id = :id");
    $sql->bindParam(":firstname",$firstname);
    $sql->bindParam(":lastname",$lastname);
    $sql->bindParam(":tell",$tell);
    $sql->bindParam(":id",$id);
    if($sql->execute()){
        header("location:../index.php?user=$room");
    }else{
        echo "มีข้อผิดพลาดดดดดดดดดดดดดดดด..!";
    }
}

if(isset($_POST['pay'])){
    $room = $_POST['room'];
    $filename = $_FILES['image']['name'];
    $filetmp = $_FILES['image']['tmp_name'];
    $locate_img ="../image/".$filename;
    $imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
    move_uploaded_file($filetmp,$locate_img);
    $id = $_POST['id'];

    $sql = $conn->prepare("UPDATE orders SET slip = :slip,Status = 'ยังไม่ชำระ' WHERE Id = :id");
    $sql->bindParam(":slip",$locate_img);
    $sql->bindParam(":id",$id);
    if($sql->execute()){
        header("location:../index.php?user=$room");
    }else{
        echo "มีข้อผิดพลาดดดดดดดดดดดดดดดด..!";
    }
}




if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $idnumber = $_POST['idnumber'];
    $tell = $_POST['tell'];

    // $numberhome = $_POST['numberhome'];
    // $road = $_POST['road'];
    // $soi = $_POST['soi'];
    // $country = $_POST['country'];
    // $district = $_POST['district'];
    // $tambon = $_POST['tambon'];
    // $postcode = $_POST['postcode'];
    // $address = $numberhome." ".$road." ".$soi." อำเภอ".$district." จังหวัด".$country." ".$postcode;


    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];

    checkinputregister($firstname,$lastname,$tell,$email,$password,$password1,$conn);
}



function checkinputregister($firstname,$lastname,$tell,$email,$password,$password1,$conn){
    session_start();
    $sql = $conn->prepare("SELECT * FROM users WHERE Email = :email");
    $sql->bindParam(":email",$email);
    $sql->execute();
    $num = $sql->rowCount();
    if($num > 0){
        $_SESSION['regiserror'] = "อีเมลนี้เคยสมัครแล้ว ต้องการเข้าสู่ระบบ ? <a href='index.php?page=login'>เข้าสู่ระบบ</a>";
        header("location:../index.php?page=register");
    }else if(strlen($tell) < 11){
        $_SESSION['regiserror'] = "เบอร์โทรศัพท์ไม่ถูกต้อง";
        header("location:../index.php?page=register");
    }else if(strlen($tell) > 12){
        $_SESSION['regiserror'] = "เบอร์โทรศัพท์ไม่ถูกต้อง";
        header("location:../index.php?page=register");
    }else if($password != $password1){
        $_SESSION['regiserror'] = "รหัสผ่านไม่ตรงกัน";
        header("location:../index.php?page=register");
    }else{
        $password = md5($password);
        insertregis($firstname,$lastname,$tell,$email,$password,$conn);
    }
}


function insertregis($firstname,$lastname,$tell,$email,$password,$conn){
    try{
    $sql = $conn->prepare("INSERT INTO users(Firstname, Lastname, Tell, Email, Password, Address, Idnumber, Book_date, In_date, Out_date, Roomrate, Cost_water, Cost_electric, Room, Status, Class, Home, Tambon, District, Province, Checkout_date) 
    VALUES(:Firstname, :Lastname, :Tell, :Email, :Password, 'ไม่ระบุ', 'ไม่ระบุ', 'ไม่ระบุ', 'ไม่ระบุ', 'ไม่ระบุ', 0, 0, 0, 'none', 'ไม่ระบุ', 'user', 'ไม่ระบุ', 'ไม่ระบุ', 'ไม่ระบุ', 'ไม่ระบุ', 'ไม่ระบุ')");
    $sql->bindParam(":Firstname",$firstname);
    $sql->bindParam(":Lastname",$lastname);
    $sql->bindParam(":Tell",$tell);
    $sql->bindParam(":Email",$email);
    $sql->bindParam(":Password",$password);
    if($sql->execute()){
        header("location:../index.php?page=login");
    }else{
        $_SESSION['regiserror'] = "เกิดข้อผิดพลาดโปรดติดต่อเจ้าของห้องโดยตรง";
        header("location:../index.php?page=register");
    }
    }catch(PDOexception $e){
        $e->getMessage();
    }
}


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = md5($password);
    session_start();
    try{
    $sql = $conn->prepare("SELECT * FROM users WHERE Email = :email AND Password = :password");
    $sql->bindParam(":email",$email);
    $sql->bindParam(":password",$password1);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_NUM);
    $name = $row[1];
    $status = $row[16];
    $num = $sql->rowCount();
    if($num > 0){
        if($status == 'user'){
            session_start();
            $_SESSION['Username'] = $email;
            header("location:../index.php");
        }else{
            session_start();
            $_SESSION['ADMIN'] = $name;
            $_SESSION['Username'] = $email;
            header("location:../index.php");
        }
    }else{
        $_SESSION['loginerror'] = "อีเมลหรือรหัสผ่านผิด";
        header("location:../index.php?page=login");
    }
    }catch(PDOexception $e){
        $e->getMessage();
    }
}



if(isset($_POST['checkmoveout'])){
    function DateThai($strDate)
			{
				$strYear = date("Y",strtotime($strDate))+543;
				$strMonth= date("n",strtotime($strDate));
				$strDay= date("j",strtotime($strDate));
				$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
				$strMonthThai=$strMonthCut[$strMonth];
				return "$strDay $strMonthThai $strYear";
			}		
    $gmail = $_POST['gmail'];
    $date = $_POST['date'];
    $indate = date('y-m-d');
    $indate = DateThai($indate);
    $date = DateThai($date);
    // echo $gmail;

    $sql = $conn->prepare("UPDATE users SET Out_date = :out_date,Checkout_date = :checkout_date WHERE Email = :email");
    $sql->bindParam(":out_date",$date);
    $sql->bindParam(":checkout_date",$indate);
    $sql->bindParam(":email",$gmail);
    if($sql->execute()){
        header("location:..//index.php?checkout=$gmail");
    }else{
        // $_SESSION['regiserror'] = "เกิดข้อผิดพลาดโปรดติดต่อเจ้าของห้องโดยตรง";
        // header("location:../index.php?page=register");
    }
}




?>