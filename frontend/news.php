<link rel="stylesheet" href="css/news_style.css?ver=0810-1">

<div class="new col-12 col-s-12">
    <div class="news col-10 col-s-10">
        <div class="news-top col-12 ">
            <h3 class="col-8 col-s-8">Lastest News 最新消息</h3>
            <button class="col-3 col-s-3" type="button">更多消息</button>
            <hr>
        </div>
<?php 
        include 'db_con.php';
        $sql = "select * from new";
        $result = $conn->query($sql);    
        
        if($result -> num_rows > 0){
            $i=0;
            while($row = $result->fetch_assoc()){
                 echo '<p>'.$row['time'].'&nbsp; '.$row['new_intro'].'</p>';
            
            if($i++<5)
                echo '<hr>';
            else 
                break;
            }
        }else
            echo "new error";
?>
    </div>
</div>


