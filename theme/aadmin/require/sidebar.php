       
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo"> 
                  <a href="inventorytable.php" style=" text-decoration: none;">
                  <font class="logo-default" style="font-family : Verdana;font-size: 600%;  font-size: 2.5vh; " color="white" >InventorySystem<font color="#32c5d2" >ICT</font></font>
                  </a>
                  <!--   <a href="index.html">
                        <img src="../assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>-->
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div> 
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
               <!-- <div class="text-center">  <a href="inventorytable.php" style=" text-decoration: none;">
                  <font class="logo-default" style="font-family : Verdana;font-size: 600%;  font-size: 2.5vh; " color="white" >InventorySystem<font color="#32c5d2" >ICT</font></font>
                  </a></div>-->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <!--<img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg" />-->
                                <span class="username username-hide-on-mobile"> <?php echo  @$uname; ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="changepassword.php?id=<?php echo $ids; ?>">
                                        <i class="icon-lock"></i> Change Password </a>
                                </li>
                                <li>
                                    <a href="logout.php">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="logout.php" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul> 
                </div> 
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->

        <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
                <div class="page-container">
<!-- line 417 -->

    <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">  
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->


                        <li class="heading">
                            <h3 class="uppercase">LIST</h3>
                        </li>




                      <!--   <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">UI Features</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">

                                <li class="nav-item  ">
                                    <a href="ui_tree.html" class="nav-link ">
                                        <span class="title">Tree View</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">Page Progress Bar</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="../admin_1/ui_page_progress_style_1.html" class="nav-link "> Flash </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="../admin_1/ui_page_progress_style_2.html" class="nav-link "> Big Counter </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </li>  -->


                        <li class="nav-item <?php  echo @ $InventorySystem; ?> ">
                              <a href="javascript:;" class="nav-link nav-toggle">
                                <!--  <i class="icon-briefcase"></i> -->
                                   <i class="fa fa-power-off"></i>
                                  <span class="title">Inventory System</span>
                                  <span class="selected"></span>
                                  <span class="arrow open"></span>
                              </a>
                              <ul class="sub-menu">
                                  <li class="nav-item <?php  echo @ $InventoryForm; ?> ">
                                      <a href="inventoryform.php" class="nav-link ">
                                          <span class="title">InventoryForm</span>
                                      </a>
                                  </li>
                                  <li class="nav-item <?php  echo @ $InventoryTable; ?> ">
                                      <a href="inventorytable.php" class="nav-link ">
                                          <span class="title">Inventory Table</span>
                                      </a>
                                  </li>
                                  <li class="nav-item <?php  echo @ $dept; ?> ">
                                      <a href="department.php" class="nav-link ">
                                          <span class="title">Departments & Items Tables</span>
                                      </a>
                                  </li>
                              </ul>
                          </li>
  <?php if($_SESSION['user_info'] != false && $_SESSION['user_info']->isadmin == 1){ ?>
                          <li class="nav-item <?php  echo @ $InventorySystemAdmin; ?> ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                  <!--  <i class="icon-briefcase"></i> -->
                                     <i class="fa fa-user-secret"></i>
                                    <span class="title">Inventory System Admin</span>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item <?php  echo @ $UsersAdmin; ?> ">
                                        <a href="UsersAdmin.php" class="nav-link ">
                                            <span class="title">Users Admin</span>
                                        </a>
                                    </li>
                                     <li class="nav-item <?php  echo @ $TypeTable; ?> ">
                                      <a href="tadmin.php" class="nav-link ">
                                          <span class="title">Admin Tables</span>
                                      </a>
                                  </li>
                                    <li class="nav-item <?php  echo @ $InventoryTableAdmin; ?> ">
                                        <a href="table_datatables_editable.php" class="nav-link ">
                                            <span class="title">InventoryTable edit</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
<?php } ?>


              <!--          <li class="heading">
                            <h3 class="uppercase">Layouts</h3>
                        </li>




                        <li class="heading">
                            <h3 class="uppercase">Pages</h3>
                        </li>





                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-folder"></i>
                                <span class="title">Multi Level Menu</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-settings"></i> Item 1
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="javascript:;" target="_blank" class="nav-link">
                                                <i class="icon-user"></i> Arrow Toggle
                                                <span class="arrow nav-toggle"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="icon-power"></i> Sample Link 1</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="icon-paper-plane"></i> Sample Link 1</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-camera"></i> Sample Link 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-pointer"></i> Sample Link 3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:;" target="_blank" class="nav-link">
                                        <i class="icon-globe"></i> Arrow Toggle
                                        <span class="arrow nav-toggle"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-tag"></i> Sample Link 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-pencil"></i> Sample Link 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-graph"></i> Sample Link 1</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="icon-bar-chart"></i> Item 2 </a>
                                </li>
                            </ul>
                        </li>
                    </ul> -->
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
