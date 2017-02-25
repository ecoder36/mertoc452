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

             $result = items_delete($_del);
             tinyf_db_close();
             if($result)
                      header("Location: tadmin.php?itemdel=del");
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
            $user = items_get_by_typemodel($_POST['type'],$_POST['model']);
            echo $_id;
            if (($user != NULL))
              {
                        $rcount =@count($user);
                           for($i = 0 ; $i < $rcount; $i++)
                          {
                             $res = $user [$i];
                          }
                      tinyf_db_close();

                        if (($res->id != $_id))
                        {

                      header("Location: tadmin.php?beforupdatemodel=YOU TRY TO UPDATE ".$_POST['model']." MODEL IT IS EXIST IN THE TABLE AS ".$res->type." ".$res->model."");

                      die();
                    }
            }


          {
                        $result = items_update($_id,$_POST['type'],$_POST['model']);
                        tinyf_db_close();
                        //u_db_close();
$typeu = $_POST['type']  ;
                        if($result)
                             {

                              header("Location: tadmin.php?typeu=$typeu model ".$_POST['model']."");
                            }
                        else {
                           //  header("Location: mfProfile.php?id=$_id");
                            die('Update Failure ');
                         }

                         die();
          }
    }

        if($_id == 0)
          {

                            if(!isset($_POST['type']) || (!isset($_POST['model'])) )
                            {
                                die('Problem');
                            }


                            $user = items_get_by_typemodel($_POST['type'],$_POST['model']);
                            if ($user != NULL)

                              {
                                $rcount =@count($user);
                                   for($i = 0 ; $i < $rcount; $i++)
                                  {
                                     $res = $user [$i];
                                  }
                              tinyf_db_close();
                              header("Location: tadmin.php?beforaddmodel=YOU TRY TO ADD ".$_POST['model']." MODEL IT IS EXIST IN THE TABLE AS ".$res->type." ".$res->model."");
                              die();
                            }
                          $result = items_add($_POST['type'],$_POST['model']);
                          tinyf_db_close();
                          $iiadd = $_POST['type'] ;
                          if($result)
                              {
                                  header("Location: tadmin.php?itemadd=$iiadd");
                              }
                          else
                          header("Location: tadmin.php?erroradd=Please fill In Type and Model");
          }

}

?>



 </div>
