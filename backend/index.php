<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後端管理系統</title>
    <link href="css/style.css?ver=0810-2" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>@import url('https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@200&display=swap');</style>
</head>
<body>
    <div class="container">
        <header class="col-12">
            <p>後端作業系統</p>
            <a href="../index.php" class="btn"><?php $_SESSION?>回購物網</a>
        </header>
        <hr>
        <div class="container-1 col-12">
        <aside class="col-2">
            <nav>
                <ul>
                    <li><a href="index.php?select=1">會員管理</a></li>
                    <li><a href="index.php?select=2">購物車管理</a></li>
                    <li><a href="index.php?select=3">消息管理</a></li>
                </ul>
            </nav>
        </aside>
        <main class="col-10">
            
            <?php
                if(isset($_GET['select'])){
                    switch($_GET['select']){
                        case 1:
                            include('member.php');
                            break;
                        case 2:
                            include('product.php');
                            break;
                        case 3:
                            include('new.php');
                            break;
                        default:
                            return 'none';
                    }
                }
            ?>
        </main>
        </div>
        <footer class="col-12">Copyright &copy; 2021 葉健偉 All rights reserved.版權所有 &copy 2021 葉健偉</footer>
    </div>
</body>
</html>