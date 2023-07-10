<?php
include_once('../include/conn.php');
session_start();

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
	
	    $search_query = "SELECT * FROM `register` WHERE `email`='$email'";
        $run_query = mysqli_query($conn,$search_query);
        $search_row=mysqli_fetch_array($run_query);

    if(@$search_row['email']==$email)
    {
    echo "<script>alert('Email already exists')</script>";
    }
    elseif(!$search_row=mysqli_fetch_array($run_query)&&($password == $cpassword))
	{
	    $qry= "INSERT INTO `register`(`fname`, `lname`, `email`, `country`, `address1`, `address2`, `state`, `postalcode`, `phone`, `password`, `cpassword`,`gender`, `rdate`) VALUES ('$fname','$lname','$email','$country','$address1','$address2','$state','$postalcode','$phone','$password','$cpassword','$gender','$rdate')";
		$run=mysqli_query($conn,$qry);
		
    if($run)
    {
    echo "<script>alert('User Has been Registered Succeessfully')</script>";       
    }		
	else{
	echo mysqli_error($conn);
	} //else
   } //elseif
?>