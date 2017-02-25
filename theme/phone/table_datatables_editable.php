
        <!-- BEGIN HEADER -->
        <!-- BEGIN PAGE TITLE -->
                   <?php $title="Phone Admin" ?><!-- END PAGE TITLE -->
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
        <?php $PhoneSystem="active open " ?>
        <?php $Admin="active open " ?>
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
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Tables</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Datatables</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Editable Datatables
                        <small>editable datatable samples</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">




                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">







                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Editable Table</span>
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
                                            require_once('APIphone.php');

                                            $users = phone_users_get();
                                            if($users == NULL)
                                                die ('problem');

                                            $ucount = @count($users);

                                            if($ucount == 0)
                                                die ('No users');

                                            ?>

                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>
                                                <th >id              </th>
                                                <th >name            </th>
                                                <th >ext             </th>
                                                <th >department      </th>
                                                <th >position      </th>
                                                <th >bleeb      </th>
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
                                                  <td class=\"center\" > $user->ext   </td>
                                                  <td class=\"center\" > $user->dept </td>
                                                  <td  > $user->position </td>
                                                  <td  > $user->bleeb </td>
                                                  <td> <a class=\"edit\" href=\"javascript:;\"> Edit </a> </td>
                                                  <td> <a class=\"delete1\" href=\"saveinfo.php?del=$user->id&5945\" onclick=\"return confirm('Are you sure to delete this row ($user->name) ?')\"> Delete </a> </td>
                                          </tr>";
                                          }
                                          ?>

                                            <tr>
                                                <td> 99999 </td>
                                                <td> Nick Roberts </td>
                                                <td> 62 </td>
                                                <td> 62 </td>
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
                                                <td> 62 </td>
                                                <td> 62 </td>
                                                <td class="center"> power user </td>
                                                <td>
                                                    <a class="edit" href="javascript:;"> Edit </a>
                                                </td>
                                                <td>
                                                    <a class="delete" href="javascript:;"> Delete </a>
                                                </td>
                                            </tr>
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
       <script src="../assets/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>

</html>
