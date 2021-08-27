<?php include 'db_con.php'; session_start();?>
<?php
//接收資料
    if(isset($_POST['register'])){
        $name = test_input($_POST['name']); 
        $email = test_input($_POST['account']);
        $password = test_input($_POST['password']);
        $birth = test_input($_POST['birthday']);
        $tel = test_input($_POST['tel']);
        $phone = test_input($_POST['phone']);
        $address = test_input($_POST['address']);
        $sex = test_input($_POST['sex']);



        $sql = "INSERT INTO basic (email, name, sex, birthday, tel, phone, address,time)
                VALUES ( '$email', '$name', '$sex', '$birth', '$tel', '$phone', '$address',now())";

        if (mysqli_query($conn, $sql)) {
            echo "會員資料註冊成功<br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


        $sql2 = "INSERT into user (email,password)
                 values ('$email','$password')";
        
        if (mysqli_query($conn, $sql2)) {
            echo "帳密註冊成功<br>";
            header('refresh:5 ; url = ../index.php');
        } else {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員資料修改 Register Page</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <!-- action="表單送出要傳到哪" method="用什麼方式傳輸資料"
         裡面可以用Table/div去排 -->
    <form action="../member/register.php" method="post">
    <div class="login">
        <i class="fa fa-id-card-o fa-5x" aria-hidden="true"></i>
        <h2>更改會員資料</h2>
        <div>
            <label for="account">歡迎&nbsp; <?php $_SESSION['name'] ?>  </label><br>
            <label for="name">姓名&nbsp;</label><input type="text" id="name" name="name" required="required"><br>
            <label for="password">密碼&nbsp;</label><input type="password" id="password" name="password"  required="required"><br>
            性別<input type="radio" id="gender" name="sex" value='male'>先生    
            <input type="radio" id="gender" name="sex" value='female'>女士<br>
            <label for="birthday">生日&nbsp;</label><input type="date" id="birthday" name="birthday" required="required"><br>
            <label for="tel">電話&nbsp;</label><input type="text" id="tel" name="tel" required="required"><br>
            <label for="phone">手機&nbsp;</label><input type="text" id="phone" name="phone" required="required"><br>
            <label for="address">地址&nbsp;</label><input type="text" id="address" name="address"required="required"><br>
        </div>
        <input type="submit" name="register" value="送出">
        
        <div>
            <i class="fa fa-google fa-2x" aria-hidden="true"></i>&nbsp;<i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
        </div>
        
        <p><a href="../member/register.php">註冊</a></p>
        <span><a href="#">忘記帳號</a>｜<a href="#">忘記密碼</a></span>
    </div>
</form>
</body>
</html>

<?php 
    $conn->close();
    session_unset();
?>