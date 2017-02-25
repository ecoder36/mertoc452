
 <div align="center" style=" width: 90%  ;position: relative ;text-align:center;  margin: 0 auto ;height: 400px;">


<?php


require_once('db.php');
require_once('uAPI.php');


if(isset($_GET['del']))
{
//die($_GET['del']);
            $_del = (int)$_GET['del'];
            if($_del == 0)
                die('Bad Access 2');

             $result = users_delete($_del);
             tinyf_db_close();
             if($result)
                      header("Location: UsersAdmin.php?del=d");
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
            $user = users_get_info($_POST['name'],$_POST['uname']);
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
                            header("Location: UsersAdmin.php?beforeupdategetinfo=".$_POST['name']."&".$res->name."&".$res->isadmin."");
                      die();
                    }
            }


          {
                        $result = users_update($_id,$_POST['name'],$_POST['uname'],$_POST['password']);
                        tinyf_db_close();
                        //u_db_close();
                        $un = $_POST['uname'];
                        if($result)
                             {
                              header("Location: UsersAdmin.php?userupdate=$un");
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

                            if(!isset($_POST['name']) || (!isset($_POST['uname'])) || (!isset($_POST['password']))  )
                            {
                                die('Problem');
                            }


                            $user = users_get_info($_POST['name'],$_POST['uname']);
                            if ($user != NULL)

                              {
                                        $rcount =@count($user);
                                           for($i = 0 ; $i < $rcount; $i++)
                                          {
                                             $res = $user [$i];
                                          }
                                      tinyf_db_close();

                                      header("Location: UsersAdmin.php?beforeaddgetinfo=".$_POST['name']."&".$res->name."");

                                      die();
                            }
                          $result = users_add($_POST['name'],$_POST['uname'],$_POST['password']);
                          tinyf_db_close();
                          if($result)
                              {
                                  header("Location: UsersAdmin.php?added=".$_POST['name']."");
                              }
                          else

                          header("Location: UsersAdmin.php?error=er");

          }

}

?>

<script>
  (function() {
    var updateButton = document.getElementById('updateDetails');
    var cancelButton = document.getElementById('cancel');
    var favDialog = document.getElementById('favDialog');
    // Update button opens a modal dialog
    updateButton.addEventListener('click', function() {favDialog.showModal();});
    // Form cancel button closes the dialog box
    cancelButton.addEventListener('click', function() {favDialog.close();});
  })();
</script>

 </div>
