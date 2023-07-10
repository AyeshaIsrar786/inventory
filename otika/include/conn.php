<?php 
  $conn=mysqli_connect("localhost","root","","inventory");

  if($conn){
    //echo "Connected";
  }else{
    //echo mysqli_error($conn);
    echo "not connected";
  }
?>