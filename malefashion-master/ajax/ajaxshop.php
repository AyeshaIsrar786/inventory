<?php 
// echo 1;
// ===========================ADD TO CART========================== 
include_once('../include/conn.php');
session_start();
@$email=$_SESSION['email'];

if((@$_POST['pcode']!="")){
    if($email==""){
        echo 10;
    }
    else{
        $pname = mysqli_escape_string( $conn,$_POST['pname']);
        $pcode = mysqli_real_escape_string( $conn,$_POST['pcode']);
        $srp = mysqli_real_escape_string( $conn,$_POST['srp']);  
        $ppic = mysqli_real_escape_string( $conn,$_POST['ppic']);
        $qty=1;
        $pdate=mysqli_real_escape_string( $conn,date("d-m-y"));
        $ptime=mysqli_real_escape_string( $conn,date("h-i-sa"));
    
        $query = "SELECT * FROM `cart` WHERE `pcode`='$pcode' && `pemail`='$email' ";
            $run = mysqli_query($conn,$query);
            if(mysqli_num_rows($run)>0){
            echo 4;
            }
            else{
            $qry="INSERT INTO `cart` (`pname`, `pcode`, `tprice`, `rprice`, `pic`, `cqty`, `pemail`, `pdate`, `ptime`) VALUES  ('$pname','$pcode','$srp','$srp','$ppic','$qty','$email','$pdate','$ptime')";
            $run=mysqli_query($conn,$qry);
            if($run)
            {
            echo 1;       
            }		
            else{
            echo 2;
            }
    }
        }   
    }
// ===========================NUMBER OF ROWS IN CART==========================

if(@$_POST['cartrow']){
$query = "SELECT * FROM `cart` WHERE `pemail`='$email'";
$run = mysqli_query($conn,$query);

$row=mysqli_num_rows($run);
echo $row;

}
// ===========================CART PRICE==========================

if(isset($_POST['cartprice'])){
$query1 = "SELECT * FROM `cart` WHERE `pemail`='$email'";
$run1 = mysqli_query($conn,$query1);
$row1=mysqli_num_rows($run1);
$pkr=0;
if($row1>0){

while($get=mysqli_fetch_array($run1)){
    $pkr=$pkr+$get['rprice'];
}
    echo $pkr;
}else{
    echo $pkr;
} 
}

// ===========================DELETE==========================
    if(isset($_POST['mydel'])){
    $del=$_POST['mydel'];
    $qry="DELETE FROM `cart` WHERE `cartid`='$del'";
    $exe_qry = mysqli_query($conn,$qry);
    if($exe_qry){
        echo 3;
    }
    else{
        echo 6;
    }
}

// ===========================EMPTY==========================

if(isset($_POST['myempty'])){
$qry1="DELETE FROM `cart` WHERE `pemail`='$email'";
$exe_qry1 = mysqli_query($conn,$qry1);
if($exe_qry1){
    echo 5;
}
else{
    echo 7;
}
}

// ===========================TPRICE==========================

if(isset($_POST['rprice'])){
    $rprice = mysqli_real_escape_string( $conn,$_POST['rprice']);
    $cqty = mysqli_real_escape_string( $conn,$_POST['cqty']);  
    $cartid = mysqli_real_escape_string( $conn,$_POST['cartid']);
    
    $nt=$cqty*$rprice;

    $qry1= "UPDATE `cart` SET `tprice`='$nt', `cqty`='$cqty' WHERE `cartid`='$cartid'";
    $exe_qry1 = mysqli_query($conn,$qry1);
    if($exe_qry1){
        echo 10;
    }
    else{
        echo 11;
    }
    }
?>


