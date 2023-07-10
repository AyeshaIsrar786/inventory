<?php 
include_once('../include/conn.php');

session_start();
@$mail= $_SESSION['id'];
    
    $uinvoice = mysqli_escape_string( $conn,$_POST['uinvoice']);
    $u_name = mysqli_escape_string( $conn,$_POST['u_name']);
    $uph = mysqli_escape_string( $conn,$_POST['uph']);
    $t_price = mysqli_escape_string( $conn,$_POST['t_price']);
    $ustatus = mysqli_escape_string( $conn,$_POST['ustatus']);
    $udate=mysqli_real_escape_string( $conn,date("d-m-y"));


    if($uinvoice=="" || $u_name=="" || $uph=="" || $t_price=="" || $ustatus==""){
        echo 0;
    }
    else{
        $oqry="INSERT INTO `pos_info` (`uinvoice`, `u_name`, `uph`, `t_price`, `ustatus`,`udate`,`email`) VALUES ('$uinvoice','$u_name','$uph','$t_price','$ustatus','$udate','$mail') ";
        $orun=mysqli_query($conn,$oqry);
        if($orun){
            $msg= "run";
        }
        else{
            $msg= "not run";
        }

        if($msg=="run"){
            $cqry="SELECT * FROM `pos_cart` WHERE `posemail`='$mail'";
            $crun=mysqli_query($conn,$cqry);
            if(mysqli_num_rows($crun)){
                while($crow=mysqli_fetch_array($crun)){
                    $pcode= $crow['pcode'];
                    $pname= $crow['pname'];
                    $rprice= $crow['rprice'];
                    $qty= $crow['qty'];
                    $stock= $crow['stock'];
                    $tprice= $crow['tprice'];
                    $oidate=date("d-m-y");
                    $email=$mail;

            $qry="INSERT INTO `pos_orderinfo`(`pcode`,`pname`,  `rprice`,`qty`, `stock`, `tprice`,`uinvoice`,`oidate`,`email`) VALUES ('$pcode','$pname','$rprice','$qty','$stock','$tprice','$uinvoice','$oidate','$mail')";
            $run=mysqli_query($conn,$qry);
            if($run){
                $msg1 ="run";
            }
            else{
                $msg1="not run";
            }

            if($msg1=="run"){
            $del="DELETE FROM `pos_cart` WHERE `posemail`='$mail'";
            $run = mysqli_query($conn,$del);
            if($run){
            echo 5;
            }
            else{
            echo 7;
            }

            }
                }
            }
        }
    }

?>