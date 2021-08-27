<?php
// 檢查帳號是否存在並且傳回首頁
    if(isset($_POST['email'])){ 
        session_start();   
        include 'function.php';
        outputdata();
    }
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入會員 Landing Page</title>
    <link rel="stylesheet" href="../css/style.css?ver=0801-4">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <!-- action="表單送出要傳到哪" method="用什麼方式傳輸資料"
         裡面可以用Table/div去排 -->
    <form action="landing.php" method="post">
    <div class="login">
        <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
        <h2>會員登入</h2>
        <div>
            <label for="email">帳號&nbsp;</label><input type="email" id="email" name="email" placeholder="email" required><br>
            <label for="password">密碼&nbsp;</label><input type="password" id="password" name="password" placeholder="password" required><br>
        </div>
        <input type="submit">

        <div>
            <i class="fa fa-google fa-2x" aria-hidden="true"></i>&nbsp;<i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
        </div>
        
        <p><a href="./member/register.php">註冊</a></p>
        <p><a href="#">忘記帳號</a>｜<a href="#">忘記密碼</a></p>
    </div>
    </form>
</body>
</html>

<script>
        // // document.addEventListener("DOMContentLoaded", function(){
        //     let acc=document.getElementById('email').value;
        //     document.getElementById('email').
        //     addEventListener('change',function(){checkUserRepeat(acc)});
            
        //     function checkUserRepeat(acc){
        //         acc=document.getElementById('email').value;
        //         let php = new XMLHttpRequest();
        //         php.open('GET','checkpassword.php?email='+acc);
        //         php.onload = function(){
        //             console.log(acc);
        //         }
        //         php.send();
        //     }
        // // });   

</script>