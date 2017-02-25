


<?php

if(!isset($_GET['id']))
die('Bad Access');

$_id = (int)$_GET['id'];

if($_id == 0)
    die('Bad Access');

require_once('db.php');
require_once('usersAPI.php');

$user = store_users_get_by_id($_id);
tinyf_db_close();

if($user == NULL)
    die('Bad User ID');

?>



<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="pic/inventory_icon.png" type="image/x-icon"/>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" href="css/libw3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="Create your Infinit account." />
    <meta property="og:description" content="Create your Infinit account." />
    <link rel="stylesheet" type="text/css" media="all" href="css/main.min.css" />
	

<meta content="ar-sa" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>change password <?php echo $user->name; ?></title>
</head>

<body>
<div>
<main class="content" >
<div align="center" class="register-form">
 <h2 > change password</h2>
<form action="cPass.php?id=<?php echo $_id; ?>" method="post" accept-charset="UTF-8">
	<br />
<div>
			<p>
			<input name="eid" value ="<?php echo $user->eid ; ?>" style="width: 302px" tabindex="1" type="text" readonly hidden />
	
		
		</p>	</div>
			<div>
			<p>
			<input name="pass" placeholder="Old Password" value ="" style="width: 220px" tabindex="1" original-title="Please enter OLD password" type="text" required />
	</p>	</div>
		</tr>
		<div>
			<p>
			<input name="password" placeholder="New Password" value ="" style="width: 220px" tabindex="2" original-title="Please enter NEW password" type="text" required />
	</p>	</div>
	
	<div>
			<p>
			<input name="saveuser" tabindex="4" type="submit" class="button" value="change password" />
		</p>	</div>
	
</form>
</div>
</main>
</div>

  <script src="css/jquery.min.js" type="text/javascript"></script>
  <script src="css/react-0.13.3.js" type="text/javascript"></script>

  <script src="css/scripts.min.js" type="text/javascript"></script>
  <script src="css/account_links.js" type="text/javascript"></script>

</div>
</body>

</html>
