<h1>商品管理</h1>
<nav>
    <ul>
        <li><a href="index.php?select=2&w=3">+新增資料</a></li>
    </ul>
</nav>
<div class="col-12" style="padding:1% 0 0 1%">
    <?php
        include 'db_con.php';
    
        include 'function.php';

        if(isset($_GET['w'])){
            switch($_GET['w']){
                case 1:
                    edit_data($_GET['id']);
                    break;
                case 2:
                    del_data($_GET['id']);
                    $text="";
                    break;
                case 3:
                    new_data();
                    break;
                default:
                    break;
                }
        }else{
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
                        <th>庫存</th>
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
                        
                        <td><a href="index.php?select=2&w=1&id='.$row['id'].'">修改</a></td>
                        <td><a href="index.php?select=2&w=2&id='.$row['id'].'">刪除</a></td>
                      </tr>';
            }

            echo '</table>';
        }
        }
    ?>
</div>