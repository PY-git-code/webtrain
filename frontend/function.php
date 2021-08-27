<?php
//顯示Details,addToCart
function product_show($id){
    include 'db_con.php';
    $product_id=$id;
    $sql="select * from product where id='$product_id'";
    $result = $conn ->query($sql);

    if($result->num_rows>0){
        $i=0;
        while($row = $result -> fetch_assoc()){
            echo '
                <form action="product_show.php?id='.$id.'" method="post" class="buy">
                <img src="../backend/img/'.$row['product_img'].'">
                <div class="details_left">
                    <div class="txt">'.$row['product_name'].'</div>
                    <div class="price">原價:'.$row['product_price'].'</div>
                    <div calss="txt">特價:'.$row['product_price']*$row['product_disc'].'</div><br>
                    <div class="right">
                        大小:
                        <input type="radio" id="ssize" name="size" value="small" required>
                        <label for="ssize">小奶貓<label>
                        <input type="radio" id="msize" name="size" value="middle" required>
                        <label for="ssize">幼貓<label>
                        <input type="radio" id="lsize" name="size" value="large" required>
                        <label for="ssize">成貓<label><br>
                        <label for="quantity">庫存量(between 1 and '.$row['product_qty'].'):</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="'.$row['product_qty'].'" required><br>
                        <input type="submit" name="addToCart" value="加到購物車">
                    </div>     
                </div>           

                </from>';  
        }
    }else{
        echo 'alert(show_product error);';
    }
}



?>