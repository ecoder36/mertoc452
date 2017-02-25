 <div style=" width: 90%  ;position: relative ;text-align:center;  margin-bottom: 10px ;height: 400px;"> 
 <link rel="icon" href="pic/inventory_icon.png" type="image/x-icon"/>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<?php

if(!isset($_GET['id']))
die('Bad Access 1');

$_id = (int)$_GET['id'];

if($_id == 0)
    die('Bad Access 2');


if(!isset($_POST['uname']) || (!isset($_POST['name'])) || (!isset($_POST['password'])) || (!isset($_POST['eid'])))
{
    die('Bad Access 3'); 
}

require_once('db.php');
require_once('usersAPI.php');

$user = store_users_get_by_uname($_POST['uname']);
if (($user != NULL) && ($user->id != $_id))
  {
  tinyf_db_close();
 
    echo ('User Name Exist') ;
    echo '  
      <br /><br /><br />
<button onclick="goBack()" id="navigation" style="width: 250px; height: 50px; color:black; font-size: large" align=\"center\" >Go Back</button> 
<br /><br /><br /><br />
<script>
function goBack() {
    window.history.back();
}
</script>

' ;
 
 
  die();
}

$user = store_users_get_by_name($_POST['name']);
if (($user != NULL) && ($user->id != $_id))
  {
  tinyf_db_close();
 
    echo ('Name Exist') ;
    echo '  
      <br /><br /><br />
<button onclick="goBack()" id="navigation" style="width: 250px; height: 50px; color:black; font-size: large" align=\"center\" >Go Back</button> 
<br /><br /><br /><br />
<script>
function goBack() {
    window.history.back();
}
</script>

' ;
 
 
  die();

}

$user = store_users_get_by_eid($_POST['eid']);
if (($user != NULL) && ($user->id != $_id))
  {
  tinyf_db_close();
  echo ('ID Exist') ;
    echo '  
      <br /><br /><br />
<button onclick="goBack()" id="navigation" style="width: 250px; height: 50px; color:black; font-size: large" align=\"center\" >Go Back</button> 
<br /><br /><br /><br />
<script>
function goBack() {
    window.history.back();
}
</script>

' ;
 
 
  die();
}

$pass = trim($_POST['password']);

if (strlen($pass) == 0)
    $pass = NULL;


$result = store_users_update($_id,$_POST['name'],$_POST['uname'],$_POST['eid'],$pass,$_POST['isadmin']);

tinyf_db_close();

if($result)
	echo	"<script type='text/javascript'>
     window.close();
	  window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
</script>";
    // header("Location: ndadmin.php");   
else 
    die('Failure');


?>
 </div>