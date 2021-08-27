<?php
    function edit_data($id){  
        $_SESSION['w']=$_GET['w'];  
        include 'db_con.php';
        $product_id=$id;
        $sql = "select * from product where id='$product_id'";
        $result = $conn->query($sql);    
        
        if($result -> num_rows > 0){
            echo '<form action="edit_data.php" method="post" enctype="multipart/form-data">';
            // echo '<tr><th>ID</th><th>商品編號</th><th>商品名稱</th><th>商品圖片</th><th>價格</th><th>折扣</th></tr><br>';
            while($row = $result->fetch_assoc()){
                echo '<label for name="id">編號:&nbsp;</label>';
                echo '<input type="text" name="id" value="'.$row['id'].'"><br>';
                echo '<label for name="product_no" value>商編:&nbsp;</label>';
                echo '<input type="text" name="product_no" value="'.$row['product_no'].'"><br>';
                echo '<label for name="product_name" value>品名:&nbsp;</label>';
                echo '<input type="text" name="product_name" value="'.$row['product_name'].'"><br>';
                echo '<label for name="product_disc" value>折扣:&nbsp;</label>';
                echo '<input type="text" name="product_disc" value="'.$row['product_disc'].'"><br>';
                echo '<label for name="product_cost" value>成本:&nbsp;</label>';
                echo '<input type="text" name="product_cost" value="'.$row['product_cost'].'"><br>';
                echo '<label for name="product_price" value>價格:&nbsp;</label>';
                echo '<input type="text" name="product_price" value="'.$row['product_price'].'"><br>';
                echo '<label for name="product_qty" value>庫存:&nbsp;</label>';
                echo '<input type="text" name="product_qty" value="'.$row['product_qty'].'"><br>';
                echo '<label for name="file" value>圖片:&nbsp;</label>';
                echo '<input type="text" name="img" value="'.$row['product_img'].'"><br>';

                // 上傳檔案
                // echo '<input type="file" name="imgfile" accept="image/png,image/jpeg">';                    
            }   
            echo'<input type="file" name="fileToUpload" id="fileToUpload" novalidate >
                <input type="submit" value="Upload Image" name="submit">
                </form>';
                
        }
        $conn ->close();
    }

    function del_data($id){
        include 'db_con.php';
        $product_id=$id;

        $del = "DELETE FROM product WHERE id='$id';";
        $conn->query($del);

        $sql = "SELECT * From product";
        $result= $conn->query($sql);

        if($result -> num_rows > 0){
            echo '<table>';
            echo '<tr>
                    <th>ID</th>
                    <th>商品編號</th>
                    <th>商品名稱</th>
                    <th>商品圖片</th>
                    <th>價格</th>
                    <th>折扣</th>
                    <th>庫存量</th>
                </tr>';
        while($row = $result->fetch_assoc()){
            echo '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['product_no'].'</td>
                    <td>'.$row['product_name'].'</td>
                    <td><img src=img/'.$row['product_img'].'></td>
                    <td>'.$row['product_price'].'</td>
                    <td>'.$row['product_disc'].'</td>
                    <td>'.$row['product_qty'].'</td>
                    
                    <td><a href="index.php?select=2&w=1&id='.$row['id'].'">修改</td>
                    <td><a href="index.php?select=2&w=2&id='.$row['id'].'">刪除</td>
                  </tr>';
        }

        echo '</table>';
                
        }
        
        $conn ->close();
    }

    function new_data(){
        $_SESSION['w']=$_GET['w'];
        echo '
            <form action="edit_data.php" method="post" enctype="multipart/form-data">
                <label for name="product_no" value>商編:&nbsp;</label>
                <input type="text" name="product_no"><br>
                <label for name="product_name" value>品名:&nbsp;</label>
                <input type="text" name="product_name"><br>
                <label for name="product_disc" value>折扣:&nbsp;</label>
                <input type="text" name="product_disc"><br>
                <label for name="product_cost" value>成本:&nbsp;</label>
                <input type="text" name="product_cost"><br>
                <label for name="product_price" value>價格:&nbsp;</label>
                <input type="text" name="product_price"><br>
                <label for name="product_qty" value>庫存:&nbsp;</label>;
                <input type="text" name="product_qty"><br>

                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>';
    }

    //輸入產品
    function insert_data($no,$name,$img,$disc,$cost,$price,$qty){
        include 'db_con.php';
        $sql = "INSERT INTO product (product_no,product_name,product_img,product_disc,product_cost,product_price,product_qty)
                VALUES ('$no','$name','$img','$disc','$cost','$price','$qty')";
        // $conn->query($sql);    
        
        if($conn->query($sql) === TRUE){
            echo 'insert_data() OK!';
            header('Location:index.php?select=2');
        }
        else
            echo'insert_data() error<br>'.$sql;

        $conn->close();
    }

    // 更新產品
    function update_product($id,$no,$name,$img,$disc,$cost,$price,$qty){
        include 'db_con.php';

        $sql = "UPDATE product 
                set id='$id', product_no='$no', product_name='$name',product_img='$img',product_disc='$disc',product_cost='$cost',product_price='$price',product_qty='$qty'
                WHERE id='$id'";

        if($conn->query($sql) === TRUE){
        echo "返回更新成功";
        header('Location:index.php?select=2');


        }else{
            echo "失敗";
            echo "<br>'.$sql.'<br>" ;
        }
        $conn->close();
    }

    //更新使用者資料
    function update_user($id,$pwd,$name,$sex,$birth,$tel,$phone,$address){
        include 'db_con.php';//連線資料庫
        if($sex=="")// 性別沒填則照舊
            $sex=$_SESSION['sex'];
        echo $pwd.'1<br>';
        $sql = "Update basic 
                SET name='$name', sex='$sex', birthday='$birth', tel='$tel', phone='$phone', address='$address'
                where basic.email='$id'";

        $sql_1="Update user
                set password='$pwd'
                where email='$id'";

        if($conn->query($sql) === TRUE){
            echo 'BASIC OK<br>';
            if($conn->query($sql_1) === TRUE)
                echo 'user OK<br>';
            else{
                echo 'sql_user error<br>';
                echo $sql_1.'<br>' ;
            }
        }else{
            echo "sql_basic error<br>";
            echo $sql.'<br>';
        }
        $conn->close();
    }
    //輸出資料
    function outputdata(){
        include 'db_con.php';
        $account = "";

        if(isset($_SESSION['email'])){
            $account= test_input($_SESSION['email']);
        }
        
            //檢測
        
            $sql = "SELECT user.email,user.password,basic.name,basic.sex,basic.birthday,basic.tel,basic.phone,basic.address,basic.time FROM user 
                    inner join basic 
                    on user.email=basic.email 
                    where user.email='$account'";
        
            //執行
            $result = $conn->query($sql);
            //判斷
            if($result -> num_rows>0){
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
                header('Location: index.php?select=1');
            }else{
                echo 'session doesnt OK';
            }
            $conn->close();
    }
    //去除空值
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // 密碼隱藏
    function passwordhide($pwd){
        $i=0;
        $str ="";

        if(strlen($pwd)==0)
            $str='*';
        while($i<strlen($pwd)){
            $str.='*';
            $i++;
        }
        return $str;
    }
    //修改消息
    function edit_new($id){  
        $_SESSION['w']=$_GET['w'];
        include 'db_con.php';
        $product_id=$id;
        $sql = "select * from new where id='$product_id'";
        $result = $conn->query($sql);    
        
        if($result -> num_rows > 0){
            echo '<form action="edit_new.php" method="post" enctype="multipart/form-data">';
            // echo '<tr><th>ID</th><th>商品編號</th><th>商品名稱</th><th>商品圖片</th><th>價格</th><th>折扣</th></tr><br>';
            while($row = $result->fetch_assoc()){
                echo '<label for name="id">編號:&nbsp;</label>';
                echo '<input type="text" name="id" value="'.$row['id'].'"><br>';
                echo '<label for name="date">發布時間:&nbsp;</label>';
                echo '</label><input type="date" name="date"value="'.$row['time'].'"><br>';
                echo '<label for name="new_intro" value>消息簡介:&nbsp;</label>';
                echo '<input type="text" name="new_intro" value="'.$row['new_intro'].'"><br>';
                echo '<label for name="article" value>文章:&nbsp;</label>';
                echo '<input type="text" name="article" value="'.$row['article'].'"><br>';
            }   
            echo'<input type="submit" value="edit new" name="submit">
                </form>';
                
        }
        $conn ->close();
    }
    // 刪除消息
    function del_new($id){
        include 'db_con.php';
        $product_id=$id;

        $del = "DELETE FROM new WHERE id='$id';";
        $conn->query($del);

        $sql = "SELECT * From new";
        $result= $conn->query($sql);
        
        if($result -> num_rows > 0){
            echo '<table>';
            echo '<tr>
                    <th>ID</th>
                    <th>發布時間</th>
                    <th>消息簡介</th>
                    <th>文章</th>
                </tr>';
        while($row = $result->fetch_assoc()){
            echo '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['time'].'</td>
                    <td>'.$row['new_intro'].'</td>
                    <td>'.$row['article'].'</td>
                    
                    <td><a href="index.php?select=3&w=4&id='.$row['id'].'">修改</a></td>
                    <td><a href="index.php?select=3&w=5&id='.$row['id'].'">刪除</a></td>
                  </tr>';
        }
        echo '</table>';
        }
        $conn ->close();
    }
    // 新增消息
    function new_new(){
        $_SESSION['w']=$_GET['w'];
        echo '<form action="edit_new.php" method="post" enctype="multipart/form-data">';
        echo '<label for name="date">發布時間:&nbsp;</label>';
        echo '</label><input type="date" name="date"><br>';
        echo '<label for name="new_intro" value>消息簡介:&nbsp;</label>';
        echo '<input type="text" name="new_intro"><br>';
        echo '<label for name="article" value>詳細文章:&nbsp;</label>';
        echo '<input type="textarea" name="article"><br>';
        echo'<input type="submit" value="new new" name="submit">
            </form>';
    }
    // 更新資料
    function update_new($id,$time,$new_intro,$article){
        include 'db_con.php';

        $sql = "UPDATE new 
                set id='$id', time='$time', new_intro='$new_intro',article='$article'
                WHERE id='$id'";

        if($conn->query($sql) === TRUE){
        echo "返回更新成功";
        header('Location:index.php?select=3');


        }else{
            echo "失敗";
            echo "<br>'.$sql.'<br>" ;
        }
        $conn->close();
    }
    // 輸入資料
    function insert_new($time,$new_intro,$article){
        include 'db_con.php';
        $sql = "INSERT INTO new (time,new_intro,article)
                VALUES ('$time','$new_intro','$article')";
        // $conn->query($sql);    
        
        if($conn->query($sql) === TRUE){
            echo 'insert_data() OK!';
            header('Location:index.php?select=3');
        }
        else
            echo'insert_data() error<br>'.$sql;

        $conn->close();
    }



?>