<?php 
    include 'function.php';
    if(isset($_POST["register_update"]) && isset($_SESSION['email'])){
        update_user($_SESSION['email'],$_POST['password'],$_POST['name'],$_POST['sex'],$_POST['birthday'],$_POST['tel'],$_POST['phone'],$_POST['address']);
        $_POST["register_update"]=null;
        outputdata();
    }
?>

<!-- <div class="title col-12">&nbsp;<?php  $_SESSION['email'];?>&nbsp;</div> -->
<div class="member col-12">
    <div class="user_data col-4">
        <ul>
        <li>使用者:<?php echo $_SESSION["name"]?></li>
        <li>密碼:<?php echo substr($_SESSION["password"],0,3).passwordhide(substr($_SESSION["password"],3));?></li>
        <li>性別:<?php echo $_SESSION["sex"]?></li>
        <li>生日:<?php echo $_SESSION["birth"]?></li>
        <li>市話:<?php echo $_SESSION["tel"]?></li>
        <li>手機:<?php echo $_SESSION["phone"]?></li>
        <li>地址:<?php echo $_SESSION["address"]?></li>
        <li>創建時間:<br><?php echo date('Y.M.d_h:i',strtotime($_SESSION['time']))?></li>
        </ul>
        
    </div>
    <hr>
    <div class="update_log col-7">
        <form class="col-8" action="index.php?select=1" method="post">
            <?php
                static $email =null;

                if(!isset($_POST["register"])){
                    echo ' <label for="account">帳號&nbsp;</label><input type="email" id="account" name="re_email" required><br>
                            <input type="submit" name="register" value="送出">';
                }
                else if($_POST['re_email']==$_SESSION['email']){
                    echo
                        '<label for="name">姓名&nbsp;</label><input type="text" id="name" name="name" value="'.$_SESSION['name'].'"><br>
                        <label for="password">密碼&nbsp;</label><input type="password" id="password" name="password" value="'.$_SESSION['password'].'"><br>
                        性別&nbsp;
                        <label for="male"><input type="radio" id="male" name="sex" value="male">先生</label>  
                        <label for="female"><input type="radio" id="female" name="sex" value="female">女士</label>
                        <label for="female"><input type="radio" id="female" name="sex" value="other">其他</label></br>
                        <label for="birthday">生日&nbsp;<input type="date" id="birthday" name="birthday" value="'.$_SESSION['birth'].'"></label><br>
                        <label for="tel">電話&nbsp;<input type="text" id="tel" name="tel" value="'.$_SESSION['tel'].'"></label><br>
                        <label for="phone">手機&nbsp;<input type="text" id="phone" name="phone" value="'.$_SESSION['phone'].'"></label><br>
                        <label for="address">地址&nbsp;<input type="text" id="address" name="address" value="'.$_SESSION['address'].'"></label>
                        <input type="submit" name="register_update" value="送出">';
                        
                        // 檢查email
                        if(isset($_POST['re_email']))
                            $email = $_POST['re_email'];
                        // if(isset($_POST["register_update"]))
                        //     echo $_POST['phone'];
                }
                else{
                    echo '帳號輸入錯誤';
                }
            ?>
            


        </from>
    </div>

</div>