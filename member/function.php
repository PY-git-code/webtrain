<!-- index區 -->
<?php
    function outputdata(){
        include 'db_con.php';
        $account = $password = "";

        if(isset($_POST['email']) && isset($_POST['password'])){
            $account= test_input($_POST['email']);
            $password= test_input($_POST['password']);
        }else{
            echo "POST['email']&&POST['password'] not have value";
        }
        
            //檢測
            $sql = "SELECT email,password From user 
                    where email='$account' and password = '$password'";
        
            $sql_1 = "SELECT user.email,user.password,basic.name,basic.sex,basic.birthday,basic.tel,basic.phone,basic.address,basic.time FROM user 
                    inner join basic 
                    on user.email=basic.email 
                    where user.email='$account' and user.password='$password'";
        
            //執行
            $result = $conn->query($sql_1);
            //判斷
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    $_SESSION['email']=$row['email'];
                    $_SESSION['password']=$row['password'];
                    $_SESSION['name']=$row['name'];
                    $_SESSION['phone']=$row['phone'];
                    $_SESSION["sex"]=$row['sex'];
                    $_SESSION["birth"]=$row['birthday'];
                    $_SESSION["tel"]=$row['tel'];
                    $_SESSION["phone"]=$row['phone'];
                    $_SESSION["address"]=$row['address'];
                    $_SESSION["time"]=$row['time'];
                }
                header('Location: ../index.php');
            }else{
                header('Location: register.php');
            }
            $conn->close();
    }
    
    function checknull($primary){
        include 'db.php';//連線資料庫
        
        $sql = "SELECT basic.email, basic.name, basic.sex, basic.birthday, basic.tel, basic.phone, basic.address From basic
                where basic.email=$primary";
        
        
        $conn->close();
    }
?>

<!-- 通用區 -->
<?php

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function test($name,$data){
        if($data==null){
            $data=$_SESSION[$name];
            return null;
        }
        else
            return $data;
    }
?>

<!-- member區 -->
<?php
    function insertdata(){
        include 'db_con.php';
        if(isset($_POST['register'])){
            $name = test_input($_POST['name']); 
            $email = test_input($_POST['email']);
            $password = test_input($_POST['password']);
            $birth = test_input($_POST['birthday']);
            $tel = test_input($_POST['tel']);
            $phone = test_input($_POST['phone']);
            $address = test_input($_POST['address']);
            $sex = test_input($_POST['sex']);
    
            $sql = "INSERT INTO basic (email, name, sex, birthday, tel, phone, address, time)
                    VALUES ( '$email', '$name', '$sex', '$birth', '$tel', '$phone', '$address',now())";
    
            if (mysqli_query($conn, $sql)) {
                echo "<br>會員資料註冊成功<br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
                
    
            $sql2 = "INSERT into user (email,password)
                     values ('$email','$password')";
            
            if (mysqli_query($conn, $sql2)) {
                echo "<script language='javascript'>alert('帳密註冊成功，按下確認後5秒，將導至登入畫面');</script><br>";
                // $_SESSION['email']=$email;
                // outputdata();//無法將SESSIONt傳到首頁
                header('refresh:5 ; url = landing.php');
            } else {
                echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
            }
        }
    }
?>