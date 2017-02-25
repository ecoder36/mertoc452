
<?php
require_once('logsession.php');
?>


<?php
if($_SESSION['user_info'] != false ){

?>
        <!-- BEGIN HEADER -->
<!-- BEGIN PAGE TITLE -->
           <?php $title="InventoryTable" ?><!-- END PAGE TITLE -->
              <?php require_once ("require/header.php") ; ?>
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
        <?php $InventoryTable="active open " ?>
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
                                <a href="">Inventory Table</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="">Inventory</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Datatables</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Inventory Datatables
                        <small></small>

                    </h3>
                    <?php
                    if(isset($_GET['done'])){echo ' <div class="alert alert-success ">
                                            <button class="close" data-close="alert"></button> successful! </div>';}
                     ?>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                     <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Inventory Table </div>
                                    <div class="tools"> </div>
                                </div>

                                <div class="portlet-body">
                                             <?php
                                            require_once('db.php');
                                            require_once('uiAPI.php');

                                            $users = in_get();
                                            if($users == NULL)
                                                echo ('');

                                            $ucount = @count($users);

                                            if($ucount == 0)
                                                echo ('');

                                            ?>

                                    <table class="sample_2 table table-striped table-hover table-bordered dt-responsive1 " >
                                        <thead>
                                            <tr>
                                                <th> id             </th>
                                                <th >type           </th>
                                                <th >model             </th>
                                                <th >dno      </th>
                                                <th >floor        </th>
                                                <th >dept        </th>
                                                <th >section        </th>
                                                <th >ename        </th>
                                                <th >ext        </th>
                                                <th >note        </th>
                                                <th >name        </th>
                                                <th class="">date           </th>
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
										    <td> $user->model   </td>
												<td> $user->dno </td>
												<td> $user->floor </td>
												<td> $user->dept </td>
                        <td> $user->section </td>
												<td> $user->ename </td>
                        <td> $user->ext </td>
												<td> $user->note </td>
                        <td> $user->name </td>
												<td> $user->date </td>
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
       <script src="require/js/inventorytable.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>

</html>
<?php  }
if($_SESSION['user_info'] == false ){
	header("Location: login.php");
}
?>
