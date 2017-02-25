

<?php
require_once('logsession.php');
?>


<?php
if($_SESSION['user_info'] != false && $_SESSION['user_info']->isadmin == 1){
?>
        <!-- BEGIN HEADER -->
        <!-- BEGIN PAGE TITLE -->
                   <?php $title="UsersAdmin" ?><!-- END PAGE TITLE -->
        <?php  require_once ("require/header.php") ; ?>
                    <!-- END HEADER INNER -->

        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <?php $InventorySystemAdmin="active open " ?>
        <?php $UsersAdmin="active open " ?>
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
                                <span>Users Admin</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Users Admin
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <?php
                    if(isset($_GET['userupdate'])){echo ' <div class="alert alert-success ">
                    <button class="close" data-close="alert"></button><strong>Success! </strong>The user '.$_GET['userupdate'].' has been updated successfully! </div>';}

                     if(isset($_GET['added'])){echo ' <div class="alert alert-success ">
                      <button class="close" data-close="alert"></button><strong>Success! </strong>The user '.$_GET['added'].' has been Added successfully! </div>';}

                      if(isset($_GET['del'])){echo ' <div class="alert alert-success ">
                       <button class="close" data-close="alert"></button><strong>Success! </strong>The user has been deleted successfully! </div>';}

                     if(isset($_GET['error'])){echo ' <div class="alert alert-danger ">
                     <button class="close" data-close="alert"></button><strong>Error! </strong> Please fill In Name , UserName and Password </div>';}

                      if(isset($_GET['beforeaddgetinfo'])){echo ' <div class="alert alert-danger ">
                      <button class="close" data-close="alert"></button><strong>Error! </strong> This Name Or Username exist in the table</div>';}

                      if(isset($_GET['beforeupdategetinfo'])){echo ' <div class="alert alert-danger ">
                      <button class="close" data-close="alert"></button><strong>Error! </strong> This Name Or Username exist in the table</div>';}

                     ?>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">




                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">







                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Users Admin</span>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <button id="sample_editable_1_new" class="btn green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>




                                        </div>
                                    </div>



                                             <?php
                                            require_once('db.php');
                                            require_once('uAPI.php');

                                            $users = users_get('ORDER BY `id` DESC' );
                                            if($users == NULL)
                                              //  die ('problem');
                                                  echo ('problem');
                                            $ucount = @count($users);

                                            if($ucount == 0)
                                          //      die ('No users');
                                                  echo ('No users');

                                            ?>

                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>
                                                <th >Id              </th>
                                                <th >Name            </th>
                                                <th >UserName             </th>
                                                <th >Password     </th>
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
                                                  <td> $user->name   </td>
                                                  <td class=\"center\" > $user->uname   </td>
                                                  <td class=\"center\" >  </td>
                                                  <td> <a class=\"edit\" href=\"javascript:;\"> Edit </a> </td>
                                                  <td> <a class=\"delete1\" href=\"saveuser.php?del=$user->id&5945\" onclick=\"return confirm('Are you sure to delete this row ($user->name) ?')\"> Delete </a> </td>
                                          </tr>";
                                          }
                                          ?>

                                        <!--    <tr>
                                                <td> 99999 </td>
                                                <td> Nick Roberts </td>
                                                <td> 62 </td>

                                                <td class="center"> new user </td>
                                                <td>
                                                    <a class="edit" href="javascript:;"> Edit </a>
                                                </td>
                                                <td>
                                                    <a class="delete" href="javascript:;"> Delete </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> 99998 </td>
                                                <td> Alex Nilson </td>
                                                <td> 1234 </td>

                                                <td class="center"> power user </td>
                                                <td>
                                                    <a class="edit" href="javascript:;"> Edit </a>
                                                </td>
                                                <td>
                                                    <a class="delete" href="javascript:;"> Delete </a>
                                                </td>
                                            </tr>-->
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
        <script src="require/js/UsersAdmin.js" type="text/javascript"></script>
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
