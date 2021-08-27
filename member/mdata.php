<div class="mdata">
<!-- <span class="title col-12">&nbsp;<?php $_SESSION['email'];?>&nbsp;</span> -->

    <div class="user_data col-6">
        <div>
            <p>使用者:<?php echo $_SESSION["name"]?></p>
            <p>密碼:<?php echo $_SESSION["password"]?></p>
            <p>性別:<?php echo $_SESSION["sex"]?></p>
            <p>生日:<?php echo $_SESSION["birth"]?></p>
            <p>市話:<?php echo $_SESSION["tel"]?></p>
            <p>手機:<?php echo $_SESSION["phone"]?></p>
            <p>地址:<?php echo $_SESSION["address"]?></p>
            <p>創建時間:<?php echo date('Y.M.d_h:i',strtotime($_SESSION['time']))?></p>
        </div>
        
    </div>
    <hr>
    <div class="update_log col-5">
        <form class="col-12" action="index.php" method="post">
            <?php
                static $email =null;
                include 'function.php';

                if(!isset($_POST["register"]) || isset($_POST["register_update"])){
                    echo '<form action="mdata.php" method="post">
                            <a href="backend/index.php" class="btn_in">後臺登入</a><br>
                            <label for="account">帳號&nbsp;</label><input type="email" id="account" name="re_email" required><br>
                            <input type="submit" name="register" value="送出">
                          </form>';
                }
                else if($_POST['re_email']==$_SESSION['email']){
                    echo
                        '<form action="mdata.php" method="post">
                            <label for="name" class="red">姓名&nbsp;</label><input type="text" id="name" name="name"><br>
                            <label for="password">密碼&nbsp;</label><input type="password" id="password" name="password"><br>
                            性別&nbsp;
                            <label for="male"><input type="radio" id="male" name="sex" value="male">先生</label>  
                            <label for="female"><input type="radio" id="female" name="sex" value="female">女士</label></br>
                            <label for="birthday">生日&nbsp;</label><input type="date" id="birthday" name="birthday"><br>
                            <label for="tel">電話&nbsp;</label><input type="text" id="tel" name="tel"><br>
                            <label for="phone">手機&nbsp;</label><input type="text" id="phone" name="phone"><br>
                            <label for="address">地址&nbsp;</label><input type="text" id="address" name="address">
                            <input type="submit" name="register_update" value="送出">
                        </form>';
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