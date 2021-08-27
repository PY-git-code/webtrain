<?php  session_start();
  $_SESSION['img_error']=array();
include 'db_con.php';

$target_dir = "img/"; //路徑
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$fileimg = $_FILES["fileToUpload"]["name"];

// Check if image file is a actual image or fake image
if($fileimg==true){
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
    // img破口
  }
}
echo $_FILES["fileToUpload"]["name"];

  //設定變數取得值
  if($_SESSION['w']==1 || $_SESSION['w']==3 ){
    $no = $_POST['product_no'];
    $name = $_POST['product_name'];
    $disc = $_POST['product_disc'];
    $cost = $_POST['product_cost'];
    $price = $_POST['product_price'];
    $qty = $_POST['product_qty'];
    $img = $_POST['img'];
  }

  include 'function.php';
  session_start();
  // 我是修改產品
  if($_SESSION['w']==1){
    $id = $_POST['id'];
    if($check==true)
      update_product($id,$no,$name,$fileimg,$disc,$cost,$price,$qty);
    else
      update_product($id,$no,$name,$img,$disc,$cost,$price,$qty);
  }
  if($_SESSION['w']==3)
    insert_data($no,$name,$fileimg,$disc,$cost,$price,$qty);
  

 



  // $sql = "UPDATE product 
  //         set id='$id', product_no='$no', product_name='$name',product_img='$img',product_disc='$disc',product_cost='$cost',product_price='$price' WHERE id='$id'";

  //   if($conn->query($sql) === TRUE){
  //       echo "返回更新成功";
  //       header('Location:product.php?select=2');
  //   }else{
  //       echo "失敗";
  //       echo "<br>'.$sql.'<br>" ;
  //   }

}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 900000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;

}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>