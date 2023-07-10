<?php 
include_once('../include/conn.php');

    $mc=mysqli_real_escape_string($conn,$_POST['mc']);
    $sc=mysqli_real_escape_string($conn,$_POST['sc']);
    $sup=mysqli_real_escape_string($conn,$_POST['sup']);
    $pcode=mysqli_real_escape_string($conn,$_POST['pcode']);
    $pname=mysqli_real_escape_string($conn,$_POST['pname']);
    $pdes=mysqli_real_escape_string($conn,$_POST['pdes']);
    $srp=mysqli_real_escape_string($conn,$_POST['srp']);
    $up=mysqli_real_escape_string($conn,$_POST['up']);
    $qty=mysqli_real_escape_string($conn,$_POST['qty']);
    $qw=mysqli_real_escape_string($conn,$_POST['qw']);
    $stock=mysqli_real_escape_string($conn,$_POST['stock']);
    $ppic=$_FILES['ppic']['name'];
    $pstatus=mysqli_real_escape_string($conn,$_POST['pstatus']);
    $pdate=date("d-m-y");

    if($mc=="" || $sc=="" || $pcode=="" || $pname=="" || $pdes=="" || $srp=="" || $up=="" || $qty=="" || $stock=="" || $ppic=="" || $pstatus==""){
      echo "<script>alert('Empty Data')</script>";
    }
    else{
      $dup=mysqli_query($conn,"SELECT * FROM `product` WHERE pname='$pname' && sc='$sc' && mc='$mc'");
      if(mysqli_num_rows($dup)>0){
        echo "<script>alert('Duplicate Rows')</script>";
      }
      else{
        $dup1=mysqli_query($conn,"SELECT * FROM `product` WHERE pcode='$pcode'");
      if(mysqli_num_rows($dup1)>0){
        echo "<script>alert('Duplicate Rows')</script>";
      }
      else{
        $exe=strtolower(pathinfo($ppic,PATHINFO_EXTENSION));
        $arr=array("png","jpg","jpeg");
         if (in_array($exe,$arr)) {
          $name=rand(1000000,9000000);
        $myimg=$name.".".$exe;
         
            $msg="Image is right";
        }
        else{
            $msg="Image is not right";        
        }     
    }
     if($msg="Image is right"){   
    $sql="INSERT INTO `product`(`mc`, `sc`, `sup`, `pcode`, `pname`, `pdes`, `srp`, `up`, `qty`, `qw`, `stock`, `ppic`, `pstatus`, `pdate`) VALUES ('$mc','$sc','$sup','$pcode','$pname','$pdes','$srp','$up','$qty','$qw','$stock','$myimg','$pstatus','$pdate')";
    $run=mysqli_query($conn,$sql);
    if($run) {
      move_uploaded_file($_FILES['ppic']['tmp_name'],"../pic/".$myimg);
        echo 1;
    }
    else{
        echo 2;
     }
    }
   }
  }

?>