<?php
    session_start();
    include 'function.php';
    // 我是修改消息
    if($_SESSION['w']==4 || $_SESSION['w']==6){
      $time = $_POST['date'];
      $new_intro = $_POST['new_intro'];
      $article = $_POST['article'];
      echo $time,$new_intro,$article;
    }
    
      if($_SESSION['w']==4){
        $id=$_POST['id'];
        update_new($id,$time,$new_intro,$article);
      }
      if($_SESSION['w']==6){
        insert_new($time,$new_intro,$article);
      }
?>