

<?php
require_once('logsession.php');
?>


<?php
if($_SESSION['user_info'] != false && $_SESSION['user_info']->isadmin == 1){
?>

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
                      header("Location: ?dele=".$_GET['del']."");
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

                              header("Location: ?upd=".$_POST['dno']."");
                            }
                        else {
                           //  header("Location: mfProfile.php?id=$_id");
                            die('Update Failure ');
                         }

                         die();
          }


}

?>

        <!-- BEGIN HEADER -->
        <!-- BEGIN PAGE TITLE -->
                   <?php $title="Inventory Admin" ?><!-- END PAGE TITLE -->
        <?php  require_once ("require/header.php") ; ?>
                    <!-- END HEADER INNER -->
        <!-- BEGIN SIDEBAR -->
        <?php $InventorySystemAdmin="active open " ?>
        <?php $InventoryTableAdmin="active open " ?>
        <?php require_once ("require/sidebar.php") ; ?>
        <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                   <?php require_once ("require/themepanel.php") ; ?>
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <span>Datatables</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">InventoryTable Admin
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">

                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Editable Table</span>
                                    </div>

                                </div>
                                <div class="portlet-body">




                                             <?php
                                            require_once('db.php');
                                            require_once('uiAPI.php');

                                            $users = in_get('ORDER BY `id` DESC');
                                            if($users == NULL)
                                                echo ('problem');

                                            $ucount = @count($users);

                                            if($ucount == 0)
                                                echo ('No users');

                                            ?>
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                                          <?php
                                                          
                     if(isset($_GET['upd'])){echo ' <div class="alert alert-success ">
                      <button class="close" data-close="alert"></button><strong>Success! </strong>The item '.$_GET['upd'].' has been updated successfully! </div>';}

                      if(isset($_GET['dele'])){echo ' <div class="alert alert-success ">
                       <button class="close" data-close="alert"></button><strong>Success! </strong>The item '.$_GET['dele'].' has been deleted successfully! </div>';}

                

                     ?>
                                        <thead>
                                            <tr>
                                                <th >id              </th>
                                                <th >model             </th>
                                                <th >no      </th>
                                                <th >floor      </th>
                                                <th >dept      </th>
                                                <th >section      </th>
                                                <th >ename      </th>
                                                <th >ext      </th>
                                                <th >Edit        </th>
                                                <th >Delete           </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                           <?php
                                          for($i = 0 ; $i < $ucount; $i++)
                                          {
                                              $user = $users[$i];
                                    echo  "<tr>
                                                  <td> $user->id   </td>
                                                  <td class=\"center\" > $user->model   </td>
                                                  <td class=\"center\" > $user->dno </td>
                                                  <td  > $user->floor </td>
                                                  <td  > $user->dept </td>
                                                  <td  > $user->section </td>
                                                  <td  > $user->ename </td>
                                                  <td  > $user->ext </td>
                                                  <td> <a class=\"edit\" href=\"javascript:;\"> Edit </a> </td>
                                                  <td> <a class=\"delete1\" href=\"?del=$user->id&5945\" onclick=\"return confirm('Are you sure to delete this row ($user->name) ?')\"> Delete </a> </td>
                                          </tr>";
                                          }
                                          ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

        </div>
        <!-- END CONTAINER -->
      <?php require_once ("require/footer.php") ; ?>
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
      <script src="require/js/table-datatables-editable.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>

</html>
<?php  }
if($_SESSION['user_info'] == false ){
	header("Location: login.php");
}
if($_SESSION['user_info']->isadmin == 0){
	header("Location: inventorytable.php");
}
?>
