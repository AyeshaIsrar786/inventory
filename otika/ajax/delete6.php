<?php 
include_once('../include/conn.php');
$del=$_POST['mydel'];

$qry="DELETE FROM `user` WHERE `oid`='$del'";
$exe_qry = mysqli_query($conn,$qry);
if($exe_qry){
    echo 1;
}

if(isset($_POST['mydata'])){
    $ordnum= mysqli_escape_string($conn,$_POST['mydata']);
    $qry="UPDATE `user` set `op_status`='Completed' where `uorder`='$ordnum'";
    $statussql=mysqli_query($conn,"");
    if($statussql){
        // data is updated
        echo 1;
    }
    else{
        echo 2;
    }
}
?>