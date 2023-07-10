<?php 

include_once("include/conn.php");

session_start();
session_destroy();

header("location:./auth-login.php");

?>