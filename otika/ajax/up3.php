<?php

    include_once('../include/conn.php');

    $qid=mysqli_real_escape_string($conn,$_POST['qid']);
    $qweight=mysqli_real_escape_string($conn,$_POST['qweight']);
    $qdes=mysqli_real_escape_string($conn,$_POST['qdes']);
    $qdate=date("d-m-y");

    if($qweight=="" || $qdes==""){
    echo "Empty Data";
    }
    else{
      $dup=mysqli_query($conn,"SELECT * FROM `quantity` WHERE qweight='$qweight'");
    if(mysqli_num_rows($dup)>0){
        echo "Duplicate Rows";
    }
    else{
    $sql="UPDATE `quantity` SET `qweight`='$qweight',`qdes`='$qdes',`qdate`='$qdate' WHERE 'qid'='$qid'";
    $run=mysqli_query($conn,$sql);
    if ($run) {
        echo 1;
        header("Refresh:0,url=viewquantity.php");
    }
    else{
        echo 2;
    }
    }
}

?>

