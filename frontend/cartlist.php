<?php session_start(); ?>

<?php
    if(isset($_POST['buy'])){   
        $_SESSION['cart']=array();
        echo '<script language="javascript">
                alert("下單成功，清除資料並跳轉首頁");
                
              </script>';
        header('refresh:5;url=../index.php');
    }
?>
                <!-- document.getElementById("buy").addEventListener("click",function(){changepage()});      -->
<!DOCTYPE html>
<html lang="en" id="html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>結帳</title>
    <link href="../css/style.css?ver=08010-5" rel="stylesheet">
    <link href="../css/style_cart.css?ver=0810-5" rel="stylesheet">
</head>

<body id="body">
<header>
    <h1>結帳頁面</h1>
    <div class="txt">
        <p>貓貓走進您心理，感謝您的購物</p>
        <p>認養代替購買<p>
    </div>
</header>
<hr>
<?php
    $total=0;
    include 'db_con.php';

    echo '<div class="checkout col-12">
            <form action="cartlist.php" method="post" class="col-12">
            <table class="col-8">
            <tr>
                <th>商品圖片</th>
                <th>商品名稱</th>
                <th>大小</th>
                <th>數量</th>
                <th>價格</th>
            </tr>';
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $num){
            // 挑選出每一項的資料
            $sql="select * from product where id='$num[0]'";
            // 連結資料並導入result

            $result=$conn->query($sql);
            if($result->num_rows>0){
                // 將資料透過fetch_assoc()"一組一組"丟出來
                $i=1;
                while($row = $result -> fetch_assoc()){
                    echo '<tr>
                            <td><img src="../backend/img/'.$row['product_img'].'"></td>
                            <td>'.$row['product_name'].'</td>
                            <td>'.$num[1].'</td>
                            <td>'.$num[2].'</td>
                            <td>'.$row['product_price']*$row['product_disc']*$num[2].'</td>
                          </tr>';
                    $total+=$row['product_price']*$row['product_disc']*$num[2];
                    $i++;
                }
                echo '<script>var z='.$i.'</script>';
            }
        }
        $conn->close();
    }else{
        // echo 'Cartlist doesnt anything';
    }

    echo '<tr>
            <td colspan="2">總金額</td>
            <td colspan="2" style="text-align">'.$total.'</td>
            <td><input type="submit" id="buy" name="buy" value="購買"></td>
          </tr>
         </table>
        </form>
    </div>'; 


    // for($i=0;$i<count($_SESSION['no']);$i++){三個陣列
    //     echo '<tr> 
    //             <td>'.$_SESSION['no'][$i].'</td>
    //             <td>'.$_SESSION['size'][$i].'</td>
    //             <td>'.$_SESSION['qty'][i].'</td>
    //         </tr>';                                            
    // }
?>
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
<script>
    if(z<3){

    }
    document.body.style.backgroundColor = "";
</script>