
<?php

$tf_host = 'localhost';
$tf_dbname = 'phone';
$tf_username = 'root';
$tf_password = '';

$tf_handle = @mysql_connect($tf_host,$tf_username,$tf_password);

if(!$tf_handle)
    die('Connection problem ..');

$tf_db_result = @mysql_select_db($tf_dbname);
if(!$tf_db_result )
    {
        @mysql_close($tf_handle);
        die('selection problem..');
        
    }

//die('ok good');
//@mysql_close($tf_handle);
    
@mysql_query("SET NAMES 'utf8'");

function tinyf_db_close()
{
    global $tf_handle;
    $GLOBALS['tf_handle'];
   
}
//tinyf_db_close();



?>