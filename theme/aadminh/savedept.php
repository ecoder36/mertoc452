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

            $result = dept_delete($_del);
            tinyf_db_close();
            if($result)
                     header("Location: department.php?deptdel=del");
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
           $user = dept_get_by_dept($_POST['dept']);
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
                         header("Location: department.php?beforeupdateget=you try to update ".$_POST['dept']." department and the ".$res->dept." is exist on the table");

                     die();
                   }
           }


         {
                       $result = dept_update($_id,$_POST['dept']);
                       tinyf_db_close();

                       if($result)
                            {

                             header("Location: department.php?deptu=".$_POST['dept']."");
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

                           if(!isset($_POST['dept'])  )
                           {
                               die('Problem');
                           }


                           $user = dept_get_by_dept($_POST['dept']);
                           if ($user != NULL)

                             {
                                       $rcount =@count($user);
                                          for($i = 0 ; $i < $rcount; $i++)
                                         {
                                            $res = $user [$i];
                                         }
                                     tinyf_db_close();


                                    header("Location: department.php?beforeaddget=you try to add ".$_POST['dept']." department and the ".$res->dept." is exist on the table");
                                     die();
                           }
                         $result = dept_add($_POST['dept']);
                         tinyf_db_close();
                         $iiadd = $_POST['dept'] ;
                         if($result)
                             {
                                 header("Location: department.php?deptadd=$iiadd");
                             }
                         else

                         header("Location: department.php?adderro=Please fill In department");

         }

}

?>


</div>
