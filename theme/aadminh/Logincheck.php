<div style=" width: 100%  ;position: relative ;text-align:center;  margin-bottom: 10px ;height: 400px;">
<link rel="icon" href="pic/inventory_icon.png" type="image/x-icon"/>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<style><?php require_once ('logsession.php'); ?> </style>
<?php

if(!isset($_POST['username']) || (!isset($_POST['password'])))
{
   die('Bad Access');
}

include_once('db.php');
require_once('uAPI.php');

if(empty($_POST['username']) || empty($_POST['password']))
{
   tinyf_db_close();
  header("Location: login.php?empty=Enter Username and Password.");
   die();
}

$user = users_get_by_uname($_POST['username']);

if(!$user) {
 //  die('No User');
header("Location: login.php?user=No User OR Wrong User Info.");



 die();
}
$pass = @md5(@mysql_real_escape_string(strip_tags($_POST['password']),$tf_handle));
tinyf_db_close();
if(strcmp($pass,$user->password)!= 0) {
       //die('Bad User');
//header('Location: newdata.php');
header("Location: login.php?pass=Wrong Password.");

die();
}

$user->password = 0;
$_SESSION['user_info'] = $user;
if($_SESSION['user_info'] != false && $_SESSION['user_info']->isadmin == 1){
 header('Location: inventoryform.php');
}else
header('Location: inventoryform.php');
?>
</div>
