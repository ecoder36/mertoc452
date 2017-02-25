

<?php
require_once('logsession.php');
?>


<?php
if($_SESSION['user_info'] != false ){
?>
<?php require_once ("require/vheader.php") ; ?>
<!-- BEGIN SIDEBAR -->
    <?php $InventorySystem="active open " ?>
    <?php $InventoryForm="active open " ?>
    <?php require_once ("require/sidebar.php") ; ?>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->

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
                    <h3 class="page-title">Inventory Form
                        <small></small>
                    </h3>

                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->

                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Inventory Form</span>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->

                                    <form action="saveinventory.php" id="form_sample_3" method="post" class="form-horizontal">
                                    <?php
                                  if(isset($_GET['done'])){echo ' <div class="alert alert-success ">
                                   <button class="close" data-close="alert"></button><strong>Success! </strong> The Item has been added successfully! </div>';}
                                 if(isset($_GET['beforadd'])){echo ' <div class="alert alert-danger ">
                                 <button class="close" data-close="alert"></button><strong>Error! </strong>'.$_GET['beforadd'].'</div>';}
                                 if(isset($_GET['error'])){echo ' <div class="alert alert-danger ">
                                 <button class="close" data-close="alert"></button><strong>Error! </strong> </div>';}
                                 ?>
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                          <!--  <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div> -->

                                        <!--    <div class="form-group">
                                                <label class="control-label col-md-3">type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control select2me" name="type">
                                                        <option value="">Select...</option>
                                                        <option value="PC">PC</option>
                                                        <option value="Printer">Printer</option>
                                                        <option value="Scanner">Scanner</option>
                                                        <option value="Photocopier">Photocopier</option>
                                                        <option value="Monitor">Monitor</option>
                                                        <option value="Labtop">Labtop</option>
                                                    </select>
                                                </div>
                                            </div> -->

                                            <div class="form-group">
                                                <label class="control-label col-md-3">type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                      <?php
                                      require_once('db.php');
                                      require_once('uiAPI.php');
                                               $itypea =  items_geta('');
                                               tinyf_db_close();
                                               $ucount = @count($itypea);

                                               // if($itypea)
                                               if( !isset($_GET['type']) ){
                                           echo "<form action='inventoryform.php' method='post'>
                                           <select name=\"type\" class=\"form-control select2me\"
                                         onchange=\"location = this.options[this.selectedIndex].value;\"  >
                                            <option value='' > Chose Type &nbsp;  </option>
                                           ";
                                                for($i = 0 ; $i < $ucount; $i++)
                                               {
                                                  $resultu =  $itypea [$i];
                                                echo "  <option value=\"?type=$resultu->type#pitems\">$resultu->type</option>  ";
                                               }
                                             echo " </select></form>" ;
                                                  }
                                         //	die('');

                                         //die('Bad Access 4');

                                         if( isset($_GET['type']) ){
                                           $_typeaa = @$_GET['type'];
                                           $dtypeaa = $_typeaa ;
                                        echo "<form action='inventoryform.php' method='post'>
                                        <select name='type' class=\"form-control select2me\"
                                        onchange=\"location = this.options[this.selectedIndex].value;\"  >
                                        ";
                                        echo "<option value=\"$dtypeaa\" > $dtypeaa</option> ";
                                          for($i = 0 ; $i < $ucount; $i++)
                                         {
                                            $resultu =  $itypea [$i];
                                          echo "  <option value=\"?type=$resultu->type#pitems\"> $resultu->type &nbsp;  </option>  ";
                                         }
                                        echo " </select></form>" ;
                                            }

                                      ?>




                                </div>
                            </div>
                            <?php
                            if(isset($_GET['type']) ) {
                              ?>
                            <div class="newType form-group">
                                <label class="control-label col-md-3">model
                                    <span class="required"> * </span>
                                </label>
                                <div  class="col-md-4">
                            <?php

                            $_type = @$_GET['type'];
                            $itype = items_get_by_type($_type);
                            tinyf_db_close();
                            $ucount = @count($itype);
                            $dtype = $_type ;
                            if($itype){
                              //  foreach ($result as $key => $value)
                              echo "<select name='model' class=\"form-control select2me\">
                              <option value='' > Chose Type  </option>
                              ";
                                   for($i = 0 ; $i < $ucount; $i++)
                                  {
                                     $result = $itype [$i];
                                    //  $user = $users[$i];
                                   echo "
                                   <option value=\"$result->model\" >$result->model</option>
                                   ";
                                  }
                                echo " </select>" ;
                            }

                            ?>

                          </div>
                      </div>
                      <?php
                    }
                        ?>


                                           <div class="form-group">
                                                <label class="control-label col-md-3">device no.
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="dno" data-required="1" class="form-control" />
                                                    <span class="help-block"> e.g: 12345 </span>
                                                  </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3">floor
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control select2me" name="floor">
                                                        <option value="">Select...</option>
                                                        <option value="Basement">Basement { B }</option>
                                                        <option value="Ground">Ground { G }</option>
                                                        <option value="External Ground">External Ground { OUT }</option>
                                                        <option value="First">First { 1 }</option>
                                                        <option value="Second">Second { 2 }</option>
                                                        <option value="Third">Third { 3 }</option>
                                                        <option value="fourth">fourth { 4 }</option>
                                                    </select>
                                                </div>
                                            </div>

                                        <!--    <div class="form-group">
                                                <label class="control-label col-md-3">department
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control select2me" name="dept">
                                                        <option value="">Select...</option>
                                                        <option value="Follow-up And Administrative Development ">Follow-up And Administrative Development </option>
                                                        <option value="Education and Training">Education and Training</option>
                                                        <option value="Dental">Dental</option>
                                                        <option value="Library">Library</option>
                                                        <option value="Engineering">Engineering</option>
                                                        <option value="Emergency">Emergency</option>
                                                        <option value="Family & Community Medicine">Family & Community Medicine</option>
                                                        <option value="General Administration for Administrative and Financial Affairs">General Administration for Administrative and Financial Affairs</option>
                                                        <option value="High Medical Committee">High Medical Committee</option>
                                                        <option value="Housekeeping & Laundry">Housekeeping & Laundry</option>
                                                        <option value="Housing and Recreation">Housing and Recreation</option>
                                                        <option value="Human Resources">Human Resources</option>
                                                        <option value="Infection Control">Infection Control</option>
                                                        <option value="Information Technology">Information Technology</option>
                                                        <option value="Internal Medicine">Internal Medicine</option>
                                                        <option value="Laboratory and Blood Bank">Laboratory and Blood Bank</option>
                                                        <option value="Maintenance and Biomedical">Maintenance and Biomedical</option>
                                                        <option value="Materials Management">Materials Management</option>
                                                        <option value="Media & Public Relations Affair">Media & Public Relations Affair</option>
                                                        <option value="Medical Imaging and nuclear Medicine">Medical Imaging and nuclear Medicine</option>
                                                        <option value="Medical Record">Medical Record</option>
                                                        <option value="Medical Report and Translation">Medical Report and Translation</option>
                                                        <option value="Military Affairs Department">Military Affairs Department</option>
                                                        <option value="Mobile Hospital">Mobile Hospital</option>
                                                        <option value="Nephrology">Nephrology</option>
                                                        <option value="Nursing">Nursing</option>
                                                        <option value="Nutrition & Food Services">Nutrition & Food Services</option>
                                                        <option value="Obstetrics & Gynecology">Obstetrics & Gynecology</option>
                                                        <option value="Orthopedic">Orthopedic</option>
                                                        <option value="Patient Services">Patient Services</option>
                                                        <option value="Pediatric">Pediatric</option>
                                                        <option value="Pharmacy">Pharmacy</option>
                                                        <option value="Physiotherapy">Physiotherapy</option>
                                                        <option value="Quality Management">Quality Management</option>
                                                        <option value="Radiology">Radiology</option>
                                                        <option value="Religious Affairs">Religious Affairs</option>
                                                        <option value="Security and Safety">Security and Safety</option>
                                                        <option value="Support Services">Support Services</option>
                                                        <option value="Surgery">Surgery</option>
                                                        <option value="Transportation">Transportation</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>-->

                                            <div class="form-group">
                                                <label class="control-label col-md-3">department
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">

                                            <?php

                                            $itypea =  dept_get('');
                                            tinyf_db_close();
                                            $ucount = @count($itypea);

                                            // if($itypea)
                                            {
                                        echo "
                                        <select name='dept' class=\"form-control select2me\">
                                         <option value='' > Chose Type &nbsp;  </option>
                                        ";
                                             for($i = 0 ; $i < $ucount; $i++)
                                            {
                                               $resultu =  $itypea [$i];
                                             echo "  <option value=\"$resultu->dept\">$resultu->dept</option>  ";
                                            }
                                          echo " </select>" ;
                                               }
                                            ?>
                                          </div>
                                          </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">section
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="section" data-required="1" class="form-control" />
                                                    <span class="help-block"> e.g: technical support </span>
                                                  </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">employee name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                  <!--<div class="input-group">
                                                  <span class="input-group-addon">
                                                      <i class="fa fa-envelope"></i>
                                                  </span>-->
                                                    <input type="text" name="ename" data-required="1" class="form-control" />
                                                  <!--</div>-->
                                                  <span class="help-block"> first & last name </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">ext
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="ext" data-required="1" class="form-control" />
                                                    <span class="help-block"> e.g: 8555 </span>
                                                  </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">note
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea type="text" name="note" data-required="1" class="form-control" ></textarea> </div>
                                            </div>

                                                    <input type="hidden" name="name" data-required="1" class="form-control" value="<?php echo $uname; ?>" />
                                                    <input type="hidden" name="date" data-required="1" class="form-control" />



                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="reset" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <?php // require_once ("require/vqsidebar.php") ; ?>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
<?php require_once ("require/vfooter.php") ; ?>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="require/js/inventoryform.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<?php  }
if($_SESSION['user_info'] == false ){
	header("Location: login.php");
}
?>
