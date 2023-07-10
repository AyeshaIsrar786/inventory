<?php 
include_once('../include/conn.php');


    $cname=mysqli_real_escape_string($conn,$_POST['cname']);
    $cdes=mysqli_real_escape_string($conn,$_POST['cdes']);
    $cdate=date("d-m-y");

    if($cname=="" || $cdes==""){
      echo "<script>alert('Empty Data')</script>";
    }
    else{
      $dup=mysqli_query($conn,"SELECT * FROM `category` WHERE cname='$cname'");
      if(mysqli_num_rows($dup)>0){
        echo "<script>alert('Duplicate Rows')</script>";
      }
      else{
    $sql="INSERT INTO `category`(`cname`, `cdes`,`cdate`) VALUES ('$cname','$cdes','$cdate')";
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