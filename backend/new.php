<h1>消息管理</h1>
<nav>
    <ul>
        <li><a href="index.php?select=3&w=6">+新增資料</a></li>
    </ul>
</nav>
<div class="col-12" style="padding:1% 0 0 1%">
    <?php
        include 'db_con.php';
    
        include 'function.php';

        if(isset($_GET['w'])){
            switch($_GET['w']){
                case 4:
                    edit_new($_GET['id']);
                    break;
                case 5:
                    del_new($_GET['id']);
                    $text="";
                    break;
                case 6:
                    new_new();
                    break;
                default:
                    break;
                }
        }else{
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
        }
    ?>
</div>