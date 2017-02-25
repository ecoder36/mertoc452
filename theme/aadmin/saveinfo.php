
 <div align="center" style=" width: 90%  ;position: relative ;text-align:center;  margin: 0 auto ;height: 400px;">


<?php


require_once('db.php');
require_once('uiAPI.php');


if(isset($_GET['del']))
{
//die($_GET['del']);
            $_del = (int)$_GET['del'];
            if($_del == 0)
                die('Bad Access 2');

             $result = in_delete($_del);
             tinyf_db_close();
             if($result)
                      header("Location: table_datatables_editable.php");
                   //die('Success');
             else {
                      die('Failure delete');
                  }


              die();
}



if(isset($_GET['id']))
{
          //die($_GET['id']);

          $_id = (int)$_GET['id'];

          if($_id != 0)
            //die($_POST['ext']);
            //  die('Bad Access 2');
          {
                        $result = in_update($_id,null,$_POST['model'],$_POST['dno'],$_POST['floor'],$_POST['dept'],$_POST['section'],$_POST['ename'],$_POST['ext']);
                        tinyf_db_close();
                        //u_db_close();

                        if($result)
                             {

                              header("Location: table_datatables_editable.php");
                            }
                        else {
                           //  header("Location: mfProfile.php?id=$_id");
                            die('Update Failure ');
                         }

                         die();
          }


}

?>


 </div>
