<?php 
include_once('../include/conn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$connected= @fsockopen("www.google.com", 80);

session_start();
@$email=$_SESSION['email'];


if($connected){
    
    $oname = mysqli_escape_string( $conn,$_POST['oname']);
    $olname = mysqli_escape_string( $conn,$_POST['olname']);
    $oemail = mysqli_escape_string( $conn,$_POST['oemail']);
    $oph = mysqli_escape_string( $conn,$_POST['oph']);
    $ocountry = mysqli_escape_string( $conn,$_POST['ocountry']);
    $ostate = mysqli_escape_string( $conn,$_POST['ostate']);
    $opcode = mysqli_escape_string( $conn,$_POST['opcode']);
    $oaddress1 = mysqli_escape_string( $conn,$_POST['oaddress1']);
    $oaddress2 = mysqli_escape_string( $conn,$_POST['oaddress2']);
    $uorder = rand(100000,900000);
    $op_method = mysqli_escape_string( $conn,$_POST['op_method']);
    $op_status = "Pending";
    $odate=mysqli_real_escape_string( $conn,date("d-m-y"));
    $otime=mysqli_real_escape_string( $conn,date("h-i-sa"));


    if($oname=="" || $olname=="" || $oemail=="" || $oph=="" || $ocountry=="" || $ostate=="" || $opcode=="" || $oaddress1=="" || $op_method==""){
        echo 0;
    }
    else{
        $oqry="INSERT INTO `user` (`oname`, `olname`, `oemail`, `oph`, `ocountry`, `ostate`, `opcode`, `oaddress1`, `oaddress2`, `uorder`, `op_method`, `op_status`, `odate`, `otime`) VALUES ('$oname','$olname','$oemail','$oph','$ocountry','$ostate','$opcode','$oaddress1','$oaddress2','$uorder','$op_method','$op_status','$odate','$otime') ";
        $orun=mysqli_query($conn,$oqry);
        if($orun){
            $msg= "run";
        }
        else{
            $msg= "not run";
        }
    }

        if($msg=="run"){
            $cqry="SELECT * FROM `cart` WHERE `pemail`='$oemail'";
            $crun=mysqli_query($conn,$cqry);
            if(mysqli_num_rows($crun)){
                while($crow=mysqli_fetch_array($crun)){
                    $pname= $crow['pname'];
                    $pcode= $crow['pcode'];
                    $rprice= $crow['rprice'];
                    $tprice= $crow['tprice'];
                    $cqty= $crow['cqty'];
                    $pic= $crow['pic'];
                    $pemail= $oemail;

            $qry="INSERT INTO `myorder`(`pname`, `pcode`, `rprice`, `tprice`, `mqty`, `ppic`, `uorder`, `oemail`, `odate`, `op_status`) VALUES ('$pname','$pcode','$rprice','$tprice','$cqty','$pic','$uorder','$pemail','$odate','$op_status')";
            $run=mysqli_query($conn,$qry);
            if($run){
                $pqry="SELECT * FROM `product` WHERE `pcode`='$pcode'";
                $prun=mysqli_query($conn,$pqry);
                $prow=mysqli_fetch_array($prun);
                    $pqty=$prow['qty'];
                    if($pqty>=$cqty){
                    $pqty=$pqty-$cqty;
                    $up="UPDATE `product` SET `qty`='$pqty' WHERE `pcode`='$pcode'";
                    $prun=mysqli_query($conn,$up);
                    if($prun){
                        $msg2="run";
                    }
                    else{
                        $msg2=" not run";
                    }
                }
            }
            else{
                echo 5;
            }
            }
            }
        }
            if($msg2="run"){

                require "PHPMailer/PHPMailer.php";
                require "PHPMailer/Exception.php";
                require "PHPMailer/SMTP.php";
                $name = "Male Fashion Inventory Store";
                $order = rand(100000,900000);
                $oemail="webdeveloper7861124@gmail.com";
                $mail = new PHPMailer(true);
        
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "ayeshaisrar089@gmail.com";
                $mail->Password = "dbkuopvuwjuxzpnq"; //gmail app psw
                $mail->Port = 465;
                $mail->SMTPSecure = "ssl";
                
                $mail->isHTML(true);
                $mail->setFrom("ayeshaisrar089@gmail.com","Ayesha Israr");
                $mail->addAddress($oemail);
                $mail->Subject = ("Male Fashion inventory Store Invoic ID");
                $mail->Body = "<h1>Your invoice ID is $order </h1> <p>Please use this invoice id to confirm your order when you receive your parcel from our courier service partner. <br> Thanks for shopping!</p>";
                
                if($mail->send()){
                    echo "MSG HAS BEEN SEND";
                }else{
                    echo "MSG HAS NOT BEEN SEND";
                }
            }
}

?>