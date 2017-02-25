

        <!-- BEGIN HEADER -->
<!-- BEGIN PAGE TITLE -->
           <?php $title="Phone EXT" ?><!-- END PAGE TITLE -->
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
        <?php $Users="active open " ?>
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
                                <a href="">Phone System</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="">Users</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Datatables</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Phone Datatables
                        <small> </small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">




                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">


                                     <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Phones </div>
                                    <div class="tools"> </div>
                                </div>





                                <div class="portlet-body">



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

                                    <table class="sample_2 table table-striped table-hover table-bordered dt-responsive1 " >
                                        <thead>
                                            <tr>
                                                <th> no.             </th>
                                                <th  >name            </th>
                                                <th >ext             </th>
                                                <th >department      </th>
                                                <th >position        </th>
                                                <th class="">bleeb           </th>
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
										    	<td> $user->ext   </td>
												<td> $user->dept </td>
												<td> $user->position </td>
												<td> $user->bleeb </td>
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
       <script src="../assets/pages/scripts/table-datatables-colreorder.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>

</html>
