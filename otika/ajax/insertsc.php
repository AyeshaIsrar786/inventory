<?php 
include_once('../include/conn.php');

    $mc=mysqli_real_escape_string($conn,$_POST['mc']);
    $scname=mysqli_real_escape_string($conn,$_POST['scname']);
    $scdate=date("d-m-y");

    if($mc=="" || $scname==""){
      echo "Empty Data";
    }
    else{
      $dup=mysqli_query($conn,"SELECT * FROM `subcategory` WHERE scname='$scname'");
      if(mysqli_num_rows($dup)>0){
        echo "Duplicate Rows";
      }
      else{
    $sql="INSERT INTO `subcategory`(`mc`, `scname`, `scdate`)  VALUES ('$mc','$scname','$scdate')";
    $run=mysqli_query($conn,$sql);
    if ($run) {
      echo "DATA HASE BEEN INSERTED SUCCESSFULY";
    }
    else{
        $msg="DATA HAS NOT INSERTED";
     }
    }
  }

?>