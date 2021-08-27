<?php
    include 'db_con.php';
    session_start();
    include 'function.php';
    
    //value=加到購物車 有無值
    if(isset($_POST['addToCart'])){ 
        // 登入->帳號密碼->session['email']=資料庫$row，POST form
        if(isset($_SESSION['email'])){
            // 這些資料都是剛建立的新資料
            if(!isset($_SESSION['cart'])){
                // 我不再故我用IF創
                $_SESSION['cart']=array();
                // $_SESSION['no']=array();
                // $_SESSION['size']=array();
                // $_SESSION['qty']=array();
            }
            //加到陣列
            array_push($_SESSION['cart'],[$_GET['id'],$_POST['size'],$_POST['quantity']]);
            // array_push($_SESSION['no'],$_GET['id']);
            // array_push($_SESSION['size'],$_POST['size']);
            // array_push($_SESSION['qty'],$_POST['quantity']);
            
            header('Location:../index.php');
        }
        else{
            header('Location:../member/landing.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品</title>
    <link rel="stylesheet" href="../css/product_show.css?ver=0810-2">
</head>
<body>
    <header>
        <h1>寵物購買區</h1>
        <img src="../ICON.png" alt="">
    </header>
    <div class="col-12">
        <?php if(isset($_GET['id'])){product_show($_GET['id']);}?>
    </div>
    
</body>
</html>
