<?php 
// ===========================ADD TO POS_CART========================== 
include_once('../include/conn.php');
session_start();
@$mail= $_SESSION['id'];
?>

<?php
if((@$_POST['pcode']!="")){
    
    $pid=mysqli_real_escape_string($conn,$_POST['pid']);
    $pcode=mysqli_real_escape_string($conn,$_POST['pcode']);
    $srp=mysqli_real_escape_string($conn,$_POST['srp']);
    $qty=mysqli_real_escape_string($conn,$_POST['qty']);

    $new_val = $qty*$srp;

    $pqry="SELECT * FROM `product` WHERE `pcode`='$pcode'";
    $prun = mysqli_query($conn,$pqry);
    if(mysqli_num_rows($prun)){
        while($row=mysqli_fetch_array($prun)){
            $pname= $row['pname'];
            $pcode= $row['pcode'];
            $srp= $row['srp'];
            $stock= $row['stock'];

            $qry="INSERT INTO `pos_cart`(`pcode`, `pname`, `rprice`, `qty`, `stock`, `tprice`,`posemail`) VALUES ('$pcode','$pname','$srp','$qty','$stock','$new_val','$mail')";
            $run=mysqli_query($conn,$qry);
            if($run){
                echo 1;
            }
            else{
                2;
            }
        }
    }
}

// ===========================DELETE==========================
if(isset($_POST['mydel'])){
    $del=$_POST['mydel'];
    $qry="DELETE FROM `pos_cart` WHERE `pcid`='$del'";
    $exe_qry = mysqli_query($conn,$qry);
    if($exe_qry){
        echo 3;
    }
    else{
        echo 6;
    }
}
// ===========================POS_CART TPRICE==========================

if(isset($_POST['rprice'])){
    $rprice = mysqli_real_escape_string( $conn,$_POST['rprice']);
    $qty = mysqli_real_escape_string( $conn,$_POST['qty']);  
    $pcid = mysqli_real_escape_string( $conn,$_POST['pcid']);
    
    $nt=$qty*$rprice;

    $qry1= "UPDATE `pos_cart` SET `tprice`='$nt', `qty`='$qty' WHERE `pcid`='$pcid'";
    $exe_qry1 = mysqli_query($conn,$qry1);
    if($exe_qry1){
        echo 10;
    }
    else{
        echo 11;
    }
    }



?>