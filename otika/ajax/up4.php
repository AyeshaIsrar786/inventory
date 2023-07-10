<?php
include_once('../include/conn.php');
$upid=$_POST['id'];
$getsql="SELECT * FROM `product` WHERE `pid`='$upid'";
$exe1=mysqli_query($conn,$getsql);
$row=mysqli_fetch_assoc($exe1);

    //$pid=mysqli_real_escape_string($conn,$_POST['pid']);
    $mc=mysqli_real_escape_string($conn,$_POST['mc']);
    $sc=mysqli_real_escape_string($conn,$_POST['sc']);
    $sup=mysqli_real_escape_string($conn,$_POST['sup']);
    $pcode=mysqli_real_escape_string($conn,$_POST['pcode']);
    $pname=mysqli_real_escape_string($conn,$_POST['pname']);
    $pdes=mysqli_real_escape_string($conn,$_POST['pdes']);
    $srp=mysqli_real_escape_string($conn,$_POST['srp']);
    $up=mysqli_real_escape_string($conn,$_POST['up']);
    $qty=mysqli_real_escape_string($conn,$_POST['qty']);
    $stock=mysqli_real_escape_string($conn,$_POST['stock']);
    $ppic=$_FILES['ppic']['name'];
    $pstatus=mysqli_real_escape_string($conn,$_POST['pstatus']);
    $pdate=date("d-m-y");

    if (!empty($spic)) {
    $p=array();
	foreach($ppic as $sp){
    $exe=strtolower(pathinfo($sp,PATHINFO_EXTENSION));
    $arr=array("png","jpg","jpeg");
    $name=rand(10000,11000);
    $myimg="$name"."$exe";
    if (in_array($exe,$arr)) {
    $p[]=$myimg;
    $msg="Image is right";
    }
    else{
    $msg="Image is not right";
    break;
    }
}
    }
    //$ppic=serialize($p);

    if($mc=="" || $sc=="" || $pcode=="" || $pname=="" || $pdes=="" || $srp=="" || $up=="" || $qty=="" || $stock=="" || $ppic=="" || $pstatus==""){
    echo "Empty Data";
    }
    else{
      $dup=mysqli_query($conn,"SELECT * FROM `product` WHERE pname='$pname' && sc='$sc' && mc='$mc'");
    if(mysqli_num_rows($dup)>0){
        echo "Duplicate Rows";
    }
    else{
        $dup1=mysqli_query($conn,"SELECT * FROM `product` WHERE pcode='$pcode'");
    if(mysqli_num_rows($dup1)>0){
        echo "Duplicate Rows";
    }
    else{
    $sql="UPDATE `product` SET `mc`='$mc',`sc`='$sc',`sup`='$sup',`pcode`='$pcode',`pname`='$pname',`pdes`='$pdes',`srp`='$srp',`up`='$up',`qty`='$qty',`stock`='$stock',`ppic`='$ppic',`pstatus`='$pstatus',`pdate`='$pdate' WHERE `pid`='$upid'";
    $run=mysqli_query($conn,$sql);
    if($run) {
    move_uploaded_file($_FILES['ppic']['tmp_name'],"../pic/".$ppic);
        echo 1;
    }
    else{
        echo 2;
    }
    }
}
}

?>