<?php
session_start();
require_once('db_con.php');


if(isset($_GET['email'])){
    $email=$_GET['email'];
    $sql="SELECT email from user where email='$email'";
    if(mysqli_query($conn,$sql)){
        $result=$conn->query($sql);
        if($result -> num_rows > 0){
            echo '此email已註冊';
            echo '<script language="javascript">
                    document.getElementById("valid").style.color="red";
                </script>';
        }else{
            echo '此email尚未註冊';
        }
    }
    else{
        echo 'SQL_con error';
    }
}else
    echo 'ckacc not exist.';

?>