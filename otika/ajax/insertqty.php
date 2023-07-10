<?php 
include_once('../include/conn.php');

    $qweight=mysqli_real_escape_string($conn,$_POST['qweight']);
    $qdes=mysqli_real_escape_string($conn,$_POST['qdes']);
    $qdate=date("d-m-y");

    if($qweight=="" || $qdes==""){
      echo "<script>alert('Empty Data')</script>";
    }
    else{
      $dup=mysqli_query($conn,"SELECT * FROM `quantity` WHERE qweight='$qweight'");
      if(mysqli_num_rows($dup)>0){
        echo "Duplicate Rows";
      }
      else{
    $sql="INSERT INTO `quantity`(`qweight`, `qdes`, `qdate`) VALUES ('$qweight','$qdes','$qdate')";
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