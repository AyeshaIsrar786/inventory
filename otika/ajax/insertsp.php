<?php 
include_once('../include/conn.php');

    $sname=mysqli_real_escape_string($conn,$_POST['sname']);
    $semail=mysqli_real_escape_string($conn,$_POST['semail']);
    $snum=mysqli_real_escape_string($conn,$_POST['snum']);
    $sdate=date("d-m-y");

    if($sname=="" || $semail==""){
      echo "Empty Data";
    }
    else{
      $dup=mysqli_query($conn,"SELECT * FROM `supplier` WHERE sname='$sname'");
      if(mysqli_num_rows($dup)>0){
        echo "Duplicate Rows";
      }
      else{
    $sql="INSERT INTO `supplier`(`sname`, `semail`, `snum`, `sdate`) VALUES ('$sname','$semail','$snum','$sdate')";
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