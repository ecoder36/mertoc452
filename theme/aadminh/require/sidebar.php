
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
                                  <li class="nav-item <?php  echo @ $TypeTable; ?> ">
                                      <a href="tadmin.php" class="nav-link ">
                                          <span class="title">Items Table</span>
                                      </a>
                                  </li>
                                  <li class="nav-item <?php  echo @ $dept; ?> ">
                                      <a href="department.php" class="nav-link ">
                                          <span class="title">department Table</span>
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
