
<?php
require_once('logsession.php');
?>


<?php
if($_SESSION['user_info'] != false ){
?>
        <!-- BEGIN HEADER -->
        <!-- BEGIN PAGE TITLE -->
                   <?php $title="Items Table" ?><!-- END PAGE TITLE -->
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
        <?php $InventorySystem="active open " ?>
        <?php $TypeTable="active open " ?>
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
                              <span></span>
                          </li>
                      </ul>

                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Items Table
                        <small></small>
                    </h3>
                    <?php
                    if(isset($_GET['typeu'])){echo '<div class="alert alert-success ">
                                            <button class="close" data-close="alert"></button><strong>Success! </strong>The '.$_GET['typeu'].' has been updated successfully! </div>';}
                    if(isset($_GET['itemadd'])){echo '<div class="alert alert-success ">
                                            <button class="close" data-close="alert"></button><strong>Success! </strong>The New '.$_GET['itemadd'].' has been Added successfully! </div>';}
                    if(isset($_GET['itemdel'])){echo '<div class="alert alert-success ">
                                            <button class="close" data-close="alert"></button><strong>Success! </strong>The Item has been deleted successfully! </div>';}
                    if(isset($_GET['beforupdatemodel'])){echo '<div class="alert alert-danger ">
                                    <button class="close" data-close="alert"></button><strong>Error! </strong> '.$_GET['beforupdatemodel'].'</div>';}
                    if(isset($_GET['beforaddmodel'])){echo '<div class="alert alert-danger ">
                                    <button class="close" data-close="alert"></button><strong>Error! </strong> '.$_GET['beforaddmodel'].'</div>';}
                    if(isset($_GET['erroradd'])){echo ' <div class="alert alert-danger ">
                    <button class="close" data-close="alert"></button><strong>Error! </strong> '.$_GET['erroradd'].'</div>';}



                     ?>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">


                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">


                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Items Table</span>
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
                                            require_once('uiAPI.php');

                                            $users = items_get('ORDER BY `id` DESC');
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
                                                <th >id              </th>
                                                <th >type            </th>
                                                <th >model            </th>
                                                <th >Edit        </th>
                                              <!--  <th >Delete           </th> -->
                                            </tr>
                                        </thead>
                                        <tbody>

                                           <?php
                                          for($i = 0 ; $i < $ucount; $i++)
                                          {
                                              $user = $users[$i];
                                    echo  "<tr>
                                                  <td> $user->id   </td>
                                                  <td> $user->type   </td>
                                                  <td  > $user->model   </td>
                                                  <td> <a class=\"edit btn green btn-sm\" href=\"javascript:;\"> <i class='fa fa-edit'> Edit</i> </a> <a class=\"delete1 btn red btn-sm\" href=\"savetype.php?del=$user->id&5945\" onclick=\"return confirm('Are you sure to delete this row ($user->model) ?')\"> <i class='fa fa-trash'></i> </a></td>

                                                <!--  <td> <a class=\"delete1 btn red btn-sm\" href=\"savetype.php?del=$user->id&5945\" onclick=\"return confirm('Are you sure to delete this row ($user->model) ?')\"> <i class='fa fa-trash'></i> </a> </td>-->
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
        <script src="require/js/tadmin.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>

</html>
<?php  }
if($_SESSION['user_info'] == false ){
	header("Location: login.php");
}

?>
