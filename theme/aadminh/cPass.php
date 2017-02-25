 <div style=" width: 100%  ;position: relative ;text-align:center;  margin-bottom: 10px ;height: 350px;">
 <link rel="icon" href="pic/inventory_icon.png" type="image/x-icon"/>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<?php
if(!isset($_GET['id']))
die('Bad Access 1');

$_id = (int)$_GET['id'];

if($_id == 0)
    die('Bad Access 2');

if( (!isset($_POST['uname'])) || (!isset($_POST['pass'])) || (!isset($_POST['password'])))
{
    die('Bad Access 3');
}
require_once('db.php');
require_once('uAPI.php');

$user = users_get_by_pass($_POST['pass'],$_POST['uname']);
if  (!$user)
  {
  tinyf_db_close();
  header("Location: changepassword.php?id=".$_id."&wpass= Wrong Current Password ");
  die();
}
if ($_POST['password'] == $_POST['rpassword']){
$pass = trim($_POST['password']);

if (strlen($pass) == 0)
    $pass = NULL;
$result = users_update($_id,0,0,$pass);
tinyf_db_close();

if($result)
{
    header("Location: changepassword.php?id=".$_id."&upass= your password has been updated successfully ");
}
else
    die('Failure');
  }
  else {
    header("Location: changepassword.php?id=".$_id."&rpass= Wrong in New Password and Re-type New Password ");
    die();
  }
?>
</div>
