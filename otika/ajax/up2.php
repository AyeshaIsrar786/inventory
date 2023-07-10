<?php

    include_once('../include/conn.php');

    $upid=$_POST['sid'];
    $getsql="SELECT * FROM `supplier` WHERE `sid`='$upid'";
    $exe1=mysqli_query($conn,$getsql);
    $row=mysqli_fetch_assoc($exe1);

    $sid=mysqli_real_escape_string($conn,$_POST['sid']);
    $sname=mysqli_real_escape_string($conn,$_POST['sname']);
    $semail=mysqli_real_escape_string($conn,$_POST['semail']);
    $snum=mysqli_real_escape_string($conn,$_POST['snum']);
    $sdate=date("d-m-y");

    if($sname=="" || $semail==""){
    echo "Empty Data";
    }
    else{
      $dup=mysqli_query($conn,"SELECT * FROM `supplier` WHERE `sname`='$sname'");
    if(mysqli_num_rows($dup)>0){
        echo "Duplicate Rows";
    }
    else{
    $sql="UPDATE `supplier` SET `sname`='$sname',`semail`='$semail',`snum`='$snum',`sdate`='$sdate' WHERE `sid`='$upid'";
    $run=mysqli_query($conn,$sql);
    if ($run) {
        echo 1;
        }
    else{
        echo 2;
    }
    }
}

?>
