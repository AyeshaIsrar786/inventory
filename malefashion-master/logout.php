<?php 
include_once('../otika/include/conn.php');
session_start();
session_destroy();

header("location:login.php");

?>