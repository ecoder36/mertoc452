<div align="center" style=" width: 90%  ;position: relative ;text-align:center;  margin: 0 auto ;height: 400px;">
<?php
require_once('db.php');
require_once('uiAPI.php');
//$type,$model,$dno,$floor,$dept,$section,$ename,$note,$name,$date
                           if(!isset($_POST['type']) || (!isset($_POST['model'])) || (!isset($_POST['dno'])) || (!isset($_POST['floor'])) || (!isset($_POST['dept']))  )
                           {
                               die('Problem');
                           }

                           $user = in_get_by_devno($_POST['dno']);
                           if ($user != NULL)

                             {
                                       $rcount =@count($user);
                                          for($i = 0 ; $i < $rcount; $i++)
                                         {
                                            $res = $user [$i];
                                         }
                                     tinyf_db_close();

                                     header("Location: inventoryform.php?beforadd=YOU TRY TO ADD ".$_POST['dno']." AND THIS DEVICE NO IS EXIST IN THE TABLE AS ".$res->dno." IN MODEL ".$res->model."");
                                  
                                     die();
                           }


                         $result = in_add($_POST['type'],$_POST['model'],$_POST['dno'],$_POST['floor'],$_POST['dept'],$_POST['section'],$_POST['ename'],$_POST['ext'],$_POST['note'],$_POST['name']);
                         tinyf_db_close();
                         if($result)
                             {
                                 // header("Location: inventorytable.php?done=123");
                                  header("Location: inventoryform.php?done=123");
                             }
                         else
                         header("Location: inventoryform.php?error=1");

?>
</div>
