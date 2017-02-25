 
 <div align="center" style=" width: 90%  ;position: relative ;text-align:center;  margin: 0 auto ;height: 400px;"> 


<?php


require_once('db.php');
require_once('APIphone.php');


if(isset($_GET['del']))
{
//die($_GET['del']);
            $_del = (int)$_GET['del'];
            if($_del == 0)
                die('Bad Access 2');

             $result = phone_delete($_del);
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
                        $result = phone_users_update($_id,$_POST['ext'],$_POST['name'],$_POST['dept'],$_POST['position'],$_POST['bleeb']);
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

          if($_id == 0)
          {

                            if(!isset($_POST['ext']) || (!isset($_POST['name'])) || (!isset($_POST['dept']))  )
                            {
                                die('Problem'); 
                            }


                            $user = phone_get_info($_POST['ext'],$_POST['name'],$_POST['dept']);
                            if ($user != NULL)

                              {
                                        $rcount =@count($user);
                                           for($i = 0 ; $i < $rcount; $i++)
                                          {
                                             $res = $user [$i];
                                          } 
                                      tinyf_db_close();
                                      
                                     
                                      echo '<br /><br /><br /><br /> ','<h2 align=\"center\">Error : This Ext exist in the table </h2><br /><h2 align=\"center\"> 
                                      You add : ',$_POST['ext'] ," ", $_POST['name']," ",$_POST['dept'],'</h2>' ;
                                      echo "<br /><h2 align=\"center\">
                                      In table : $res->ext $res->name $res->dept  </h2><br />";
                                      echo '  <br /><br /><br />
                                    <button onclick="goBack()" id="navigation" style="width: 250px; height: 50px; color:black; font-size: large" align=\"center\" >Go Back</button> 
                                    <br /><br /><br /><br />
                                    <script>
                                    function goBack() {
                                        window.history.back();
                                    }
                                    </script>' ; 
                                      die();
                            }
                          $result = phone_add($_POST['ext'],$_POST['name'],$_POST['dept'],$_POST['position'],$_POST['bleeb']);
                          tinyf_db_close();
                          if($result)
                              {
                              
                                  header("Location: table_datatables_editable.php");   
                              }
                          else 
                              echo '  <br /><br /><br /><br /> 
                                <h1 align=\"center\">Error : Please fill In ext , name and department </h1>
                                <br /><br /><br />
                              
                                    <div class="form-footer">
                                <button onclick="goBack()"  style="width: 250px; height: 50px; color:black; font-size: large" align=\"center\" name="button" type="submit" class="button button primary">
                                  <span>Go Back</span>

                          </button>    </div>
                          <script>
                          function goBack() {
                              window.history.back();
                          }
                          </script>

                          ' ;
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