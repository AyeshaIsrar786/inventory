<?php
include_once('../include/conn.php');
$upid=$_POST['id'];
$getsql="SELECT * FROM `product` WHERE `pid`='$upid'";
$exe1=mysqli_query($conn,$getsql);
$row=mysqli_fetch_assoc($exe1);

$fname = mysqli_real_escape_string( $conn,$_POST['fname']);
$lname = mysqli_real_escape_string($conn,$_POST['lname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$country = mysqli_real_escape_string($conn,$_POST['country']);
$address1 = mysqli_real_escape_string( $conn,$_POST['address1']);
$address2 = mysqli_real_escape_string($conn,$_POST['address2']);
$state = mysqli_real_escape_string($conn,$_POST['state']);
$postalcode = mysqli_real_escape_string($conn,$_POST['postalcode']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
$gender = mysqli_real_escape_string($conn,$_POST['gender']);
$rdate=date("d-m-y");

if($fname="" || $lname=="" || $email=="" || $phone=="" || $country=="" || $address1=="" || $address2=="" || $postalcode=="" || $gender==""){
    echo 0;
}
else{
    $dup=mysqli_query($conn,"SELECT * FROM `register` WHERE fname='$fname' && lname='$lname'");
    if(mysqli_num_rows($dup)>0){
        echo "Duplicate Rows";
    }
    else{
        $dup1=mysqli_query($conn,"SELECT * FROM `register` WHERE postalcode='$postalcode'");
    if(mysqli_num_rows($dup1)>0){
        echo "Duplicate Rows";
    }
    else{
    $sql="UPDATE `register` SET `fname`='$fname',`lname`='$lname',`email`='$email',`country`='$country',`address1`='$address1',`address2`='$address2',`state`='$state' ,`postalcode`='$postalcode',`phone`='$phone',`password`='$password',`cpassword`='$cpassword',`gender`='$gender',`rdate`='$rdate' WHERE `id`='$upid'";
    $run=mysqli_query($conn,$sql);
    if($run) {
        echo 1;
    }
    else{
        echo 2;
    }
    }
}
}

?>