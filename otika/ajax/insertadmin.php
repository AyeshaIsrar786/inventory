<?php
include_once('../include/conn.php');
session_start();

	    $aname = mysqli_real_escape_string( $conn,$_POST['aname']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
        $arole = mysqli_real_escape_string($conn,$_POST['arole']);
        

	    $qry= "INSERT INTO `admin`(`aname`, `email`, `password`, `cpassword`,`arole`) VALUES ('$aname', '$email', '$password','$cpassword','$arole')";
		$run=mysqli_query($conn,$qry);

        $_SESSION['email']=$email;
        $_SESSION['arole']=$arole;
		
    if($run)
    {
    echo echo 1;       
    }		
	else{
	echo echo 2;
	} //else

?>