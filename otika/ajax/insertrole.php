<?php
include("../include/conn.php");

$rname = mysqli_escape_string($conn, $_POST['rname']);
$raccess = mysqli_escape_string($conn, $_POST['raccess']);
@$category = $_POST['mc'];
@$subcatagory = $_POST['sc'];
@$supplier = $_POST['s'];
@$quantity = $_POST['qty'];
@$product = $_POST['p'];
@$order = $_POST['order'];
@$user = $_POST['user'];
@$pos = $_POST['pos'];
@$usermanagent = $_POST['u_management'];

@$rmcat = serialize($category);
@$rsubcat = serialize($subcatagory);
@$rsup = serialize($supplier);
@$rqty = serialize($quantity);
@$rpro = serialize($product);
@$rorder = serialize($order);
@$ruser = serialize($user);
@$rpos = serialize($pos);
@$rrole = serialize($usermanagent);
@$rdate = date("Y/m/d");

$sql = "INSERT INTO `u_management`(`rname`, `raccess`, `rmcat`, `rsubcat`, `rsup`, `rqty`, `rpro`, `rorder`, `ruser`, `rpos`, `rrole`, `rdate`) VALUES ('$rname','$raccess','$rmcat','$rsubcat','$rsup','$rqty','$rpro','$rorder','$ruser','$rpos','$rrole','$rdate')";
$exe = mysqli_query($conn,$sql);
if ($exe) {
    echo 1;
} else {
    echo 2;
}
