<?php
require_once('logsession.php');
if($_SESSION['user_info'] != false)
  $_SESSION['user_info'] = false;
    header('Location: login.php');

?>
