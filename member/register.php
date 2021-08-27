<?php
//接收資料
    if(isset($_POST['register'])){
        include 'function.php';
        insertdata();
    }
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊會員 Register Page</title>
    <link rel="stylesheet" href="../css/style.css?ver=0801-9">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <!-- action="表單送出要傳到哪" method="用什麼方式傳輸資料"
         裡面可以用Table/div去排 -->
    <form action="register.php" method="post">
    <div class="login">
        <i class="fa fa-id-card-o fa-5x" aria-hidden="true"></i>
        <h2>註冊會員</h2>
        <div class="login_table">
            <label for="email">帳號&nbsp;</label><input type="email" id="email" name="email" onkeyup="checkUserRepeat()" hidden="hidden" required><br>
            <label >是否被註冊:</label><label id="valid"></label><br>
        </div>
        <div class="login_table" id="ckacc"></div>



        <div style="padding:5vh 0 0 0 ">
            <i class="fa fa-google fa-2x" aria-hidden="true"></i>&nbsp;<i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
        </div>
        
        <p><a href="./member/register.php">註冊</a></p>
        <span><a href="#">忘記帳號</a>｜<a href="#">忘記密碼</a></span>
    </div>
</form>
</body>
</html>

<script>
    // 判斷帳號是否OK
    let acc=document.getElementById('email');
    let valid=document.getElementById('valid');
    let login=` <label for="password">密碼&nbsp;</label><input type="password" id="password" name="password"  required><br>
                <label for="name">姓名&nbsp;</label><input type="text" id="name" name="name" required ><br>
                性別:<input type="radio" id="gender" name="sex" value='male'>先生    
                <input type="radio" id="gender" name="sex" value='female'>女士
                <input type="radio" id="gender" name="sex" value="other">其他<br>
                <label for="birthday">生日&nbsp;</label><input type="date" id="birthday" name="birthday" required><br>
                <label for="tel">電話&nbsp;</label><input type="text" id="tel" name="tel" required><br>
                <label for="phone">手機&nbsp;</label><input type="text" id="phone" name="phone" required><br>
                <label for="address">地址&nbsp;</label><input type="text" id="address" name="address"required><br>
                <input type="submit" id="register" name="register" value="送出">
                `;

    document.getElementById('email').addEventListener('change',function(){
        valid=document.getElementById('valid').outerText;
        console.log(valid);
        if(valid=='此email尚未註冊'){
            document.getElementById('ckacc').innerHTML=login;
        }else{
            document.getElementById('ckacc').innerHTML=``;
        }
    });


    
    // 檢查帳號是否相同，採用AJAX技術!! 聽起來很厲害XD
    function checkUserRepeat(acc){
        acc=document.getElementById('email').value; //隨時刷新
        let xhr = new XMLHttpRequest();
        xhr.open('GET','checkaccpwd.php?email='+acc);
        xhr.onload = function(){
            let content = this.responseText;
            document.getElementById('valid').innerHTML=content;
            document.getElementById('valid').style.color='red';
        }
        xhr.send();
    }
    
    //  document.addEventListener("DOMContentLoaded", function(){
    //         let acc=document.getElementById('email').value;
    //         console.log(acc);
    //         document.getElementById('email').
    //         addEventListener('change',function(){checkUser(acc)});
    //         function checkUser(acc){
    //             let php = new XMLHttpRequest();
    //             php.open('GET','userfile.php?email='+acc,true);
    //             php.onload = function(){
    //                 let content = this.responseText
    //                 console.log(content);
    //                 document.getElementById('valid').innerHTML=content;
    //             }
    //             php.send();
    //         }
    //     });

</script>

