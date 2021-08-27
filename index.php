<?php $title = "My Shop"; session_start()?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>

    <link href="css/style.css?ver=0826-3" rel="stylesheet">
    <script src="https://kit.fontawesome.com/963a842412.js" crossorigin="anonymous"></script>
</head>

<body>
    <header id="header">
        <section class="header col-6" id="header_1">
            <img src="ICON.png" alt="">
            <h1>汪汪喵寵物店</h1>
        </section>
        <section class="btn col-6" id="btn">
                <?php 
                    $cart_num=0;
                    if(isset($_SESSION['email'])){
                        $_SESSION['login']=1;
                        echo '<a href="backend/index.php" class="btn_in">後台</a>';
                        echo '<a href="member/log_out.php" class="btn_out" onclick="";>登出</a><br>';
                            
                        if(isset($_SESSION['cart']))
                            $cart_num=count($_SESSION['cart']);

                            // foreach($_SESSION['qty'] as $num){
                                // $cart_num+=$num;
                            //  print_r($_SESSION['cart'][1]);
                            // }
                    // print_r($_SESSION['cart']);
                    }else{
                        $_SESSION['login']=0;
                        echo '<a href="member/landing.php" class="btn_in">登入</a>|';
                        echo '<a href="member/register.php" class="btn_in">註冊</a>';
                        if($_SESSION['login']==0)
                            session_unset();
                    }
                    echo '&nbsp;<a href="frontend/cartlist.php"><i class="fa fa-shopping-cart" aria-hidden="true" >('.$cart_num.')</i></a></section>'
                ?>
        </section>
        <section class="menu col-12" id="menu">
            <ul class="col-12">
                <li><a href="">關於我們</a></li>
                <li><a href="">流浪動物議題</a></li>
                <li><a href="">大家捐愛心</a></li>
            </ul>
        </section>
        
    </header>
    <main>
        <section class="col-7 col-s-12">  
            <?php include('frontend/news.php'); ?>
        </section>
        <section class="col-5 col-s-12">
            <h2>商品展示</h2>
            <?php include ('frontend/product.php');?>
        </section>
    </main>
    <footer class="col-12 col-s-12">
        <div class="footer col-10 col-s-12">
            <div class="info col-6 col-s-12">
                <h1>汪汪喵寵物店</h1>
                <p>電話:06-3522478</p>
                <p>地址:台南市安南去勝利路勝利巷勝利號</p>
            </div>
            <div class="col-6 col-s-12">
<pre>

台南貓舍 　·　台南寵物店 　·　台南|高雄|台中幼犬買賣汪汪喵寵物店 
版權所有 © Copyright 2021 .All Rights Reserved.
瀏覽人數：0

</pre>
            </div>
        </div>
    </footer>
</body>
</html>

<script src="script.js?ver=0810-2"></script>