<?php
session_start();

if(@$_SESSION['user_info'] != false ){
$uname = $_SESSION['user_info']->name;
$usname=$_SESSION['user_info']->uname;
$ids=$_SESSION['user_info']->id;
}
if(!isset($_SESSION['user_info']))
    $_SESSION['user_info'] = false ;
?>
