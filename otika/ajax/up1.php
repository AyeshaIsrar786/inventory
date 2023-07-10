<?php

    include_once('../include/conn.php');

    $subid=mysqli_real_escape_string($conn,$_POST['subid']);
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
    $sql="UPDATE `subcategory` SET `mc`='$mc',`scname`='$scname',`scdate`='$scdate' WHERE `subid`='$subid'";
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