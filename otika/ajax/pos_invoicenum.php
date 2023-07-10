<?php
include_once('../include/conn.php');

if(isset($_POST['invoicenum'])){
$qry1="SELECT * FROM `pos_info` ORDER BY `uinvoice`  DESC LIMIT 1";
$exe1 = mysqli_query($conn,$qry1);
if(mysqli_num_rows($exe1)>0){
    $get=mysqli_fetch_assoc($exe1);
    $uinvoice=$get['uinvoice'];
    $row= $uinvoice +1;
    echo $row;
}
else{
    echo 1;
}
}
?>