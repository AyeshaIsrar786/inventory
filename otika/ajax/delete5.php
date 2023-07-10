<?php 
include_once('../include/conn.php');
$del=$_POST['mydel'];

$qry="DELETE FROM `register` WHERE `id`='$del'";
$exe_qry = mysqli_query($conn,$qry);
if($exe_qry){
    echo 1;
}
?>