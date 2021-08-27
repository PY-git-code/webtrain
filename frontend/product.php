<?php
include 'db_con.php';

$sql = "select * from product";

$result = $conn-> query($sql);

if($result->num_rows>0){
    echo '<div class="pd_main col-12">';
    $i=0;
    while($row = $result -> fetch_assoc()){
        if($i++>5)break;//展現6個   
        echo '
            <div class="pd col-3">
                <a href="frontend/product_show.php?id='.$row['id'].'">
                <img src="backend/img/'.$row['product_img'].'">
                <p>'.$row['product_name'].'<p>
                <div class="price">原價:'.$row['product_price'].'</div>
                <div class="txt">特價:'.$row['product_price']*$row['product_disc'].'</div>
                </a>
            </div>';     
    }
    echo '</div>';
}