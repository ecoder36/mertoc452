       
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-reversed">
    <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class=" page-logo pull-right"> 
                  <a href="inventorytable.php" style=" text-decoration: none;">
                  <font class="logo-default" style="font-family : Verdana;font-size: 600%;  font-size: 2.5vh; " color="white">  نظام <font color="#32c5d2"> الجرد </font></font>
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
                <div class="top-menu pull-left">
                    <ul class="nav navbar-nav pull-left">
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="logout.php" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li>
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <!--<img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg" />-->
                                <span class="username username-hide-on-mobile"> <?php echo  @$uname; ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="changepassword.php?id=<?php echo $ids; ?>">
                                        <i class="icon-lock"></i> تغيير كلمة المرور </a>
                                </li>
                                <li>
                                    <a href="logout.php">
                                        <i class="icon-key"></i> تسجيل الخروج </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                       <!-- <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="logout.php" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li> -->
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
                <div class="page-sidebar navbar-collapse collapse text-right" >  
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


                        <li class="heading" >
                            <h3 class="uppercase" >القائمة</h3>
                        </li>





                        <li class="nav-item <?php  echo @ $InventorySystem; ?> ">
                              <a href="javascript:;" class="nav-link nav-toggle">
                                <!--  <i class="icon-briefcase"></i> -->
                                   <i class="fa fa-power-off"></i>
                                  <span class="title">نظام الجرد</span>
                                  <span class="selected"></span>
                                  <span class="arrow open"></span>
                              </a>
                              <ul class="sub-menu">
                                  <li class="nav-item <?php  echo @ $InventoryForm; ?> ">
                                      <a href="inventoryformar.php" class="nav-link ">
                                          <span class="title">جديد</span>
                                      </a>
                                  </li>
                                  <li class="nav-item <?php  echo @ $InventoryTable; ?> ">
                                      <a href="inventorytable.php" class="nav-link ">
                                          <span class="title">جدول الجرد</span>
                                      </a>
                                  </li>
                                  <li class="nav-item <?php  echo @ $TypeTable; ?> ">
                                      <a href="tadminar.php" class="nav-link ">
                                          <span class="title">جدول الأصناف  </span>
                                      </a>
                                  </li>
                                  <li class="nav-item <?php  echo @ $dept; ?> ">
                                      <a href="department.php" class="nav-link ">
                                          <span class="title">جدول الأقسام</span>
                                      </a>
                                  </li>
                              </ul>
                          </li>
  <?php if($_SESSION['user_info'] != false && $_SESSION['user_info']->isadmin == 1){ ?>
                          <li class="nav-item <?php  echo @ $InventorySystemAdmin; ?> ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                  <!--  <i class="icon-briefcase"></i> -->
                                     <i class="fa fa-user-secret"></i>
                                    <span class="title">إدارة نظام الجرد</span>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item <?php  echo @ $UsersAdmin; ?> ">
                                        <a href="UsersAdmin.php" class="nav-link ">
                                            <span class="title">إدارة المستخدمين</span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php  echo @ $InventoryTableAdmin; ?> ">
                                        <a href="table_datatables_editable.php" class="nav-link ">
                                            <span class="title">تعديل الجرد</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
<?php } ?>


            
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
