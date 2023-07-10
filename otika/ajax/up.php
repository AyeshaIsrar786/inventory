<?php

    include_once('../include/conn.php');

    $cid=mysqli_real_escape_string($conn,$_POST['cid']);
    $cname=mysqli_real_escape_string($conn,$_POST['cname']);
    $cdes=mysqli_real_escape_string($conn,$_POST['cdes']);
    $cdate=date("d-m-y");

    $sql="UPDATE `category` SET `cname`='$cname',`cdes`='$cdes' WHERE `cid`='$cid'";
    $run=mysqli_query($conn,$sql);
    if ($run) {
        echo 1;
    }
    else{
        echo 2;
    }

?>

