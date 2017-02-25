

<?php
require_once('logsession.php');
?>

<?php
@require_once('db.php');
@require_once('uiAPI.php');
//$type,$model,$dno,$floor,$dept,$section,$ename,$note,$name,$date
                        //   if(!isset($_POST['type']) || (!isset($_POST['model'])) || (!isset($_POST['dno'])) || (!isset($_POST['floor'])) || (!isset($_POST['dept']))  )
                        //   {
                               //die('Problem');
                        //   }

                           $user = in_get_by_devno(@$_POST['dno']);
                           if ($user != NULL)

                             {
                                       $rcount =@count($user);
                                          for($i = 0 ; $i < $rcount; $i++)
                                         {
                                            $res = $user [$i];
                                         }
                                     tinyf_db_close();

@$error.=" <br /> This device is added in the inventory before";
                                    // die();
                           }

if(@$error) {
		$result='<div class="alert alert-danger"><strong>There were error(s) in your form: </strong>'.$error.'</div>';
		} else {
                         @$result = in_add($_POST['type'],$_POST['model'],$_POST['dno'],$_POST['floor'],$_POST['dept'],$_POST['section'],$_POST['ename'],$_POST['ext'],$_POST['note'],$_POST['name']);
                         tinyf_db_close();
                         if($result)
                             {
                                 // header("Location: inventorytable.php?done=123");
                                  header("Location: ?done=123");
                             }
                      //   else{
                      //   header("Location: inventoryform.php?error=1");
                      //   }
	        	}
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

                                    <form id="form_sample_3" method="post" class="form-horizontal">
                                    <?php
                                  if(isset($_GET['done'])){echo ' <div class="alert alert-success ">
                                   <button class="close" data-close="alert"></button><strong>Success! </strong> The Item has been added successfully! </div>';}
                                 if(isset($_GET['beforadd'])){echo ' <div class="alert alert-danger ">
                                 <button class="close" data-close="alert"></button><strong>Error! </strong>'.$_GET['beforadd'].'</div>';}
                                 if(isset($_GET['error'])){echo ' <div class="alert alert-danger ">
                                 <button class="close" data-close="alert"></button><strong>Error! </strong> </div>';}

                                 if(@$error) {
		echo '<div class="alert alert-danger"><button class="close" data-close="alert"></button><strong>There were error(s) in your form: </strong></div>';
		}
                                 ?>
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                          <!--  <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div> -->



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
                                           echo "<form method='post'>
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
                                        echo "<form method='post'>
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

                              ";
                               echo "<option value=".@$_POST['model']." > ".@$_POST['model']."</option> ";
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
                                                    <input type="text" value="<?php echo @$_POST['dno']; ?>" name="dno" data-required="1" class="form-control" />
                                                    <span class="help-block"> e.g: 12345 </span>
                                                                           <?php     if(@$error) {
		echo '<div class="alert alert-danger"><button class="close" data-close="alert"></button><strong>Error: </strong>'.$error.'</div>';
		}?>
                                                  </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3">floor
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control select2me" name="floor">
                                                        <option value="<?php echo @$_POST['floor']; ?>"><?php echo @$_POST['floor']; ?></option>
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
                                         <option value=".@$_POST['dept']." > ".@$_POST['dept']." &nbsp;  </option>
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
                                                    <input value="<?php echo @$_POST['section']; ?>" type="text" name="section" data-required="1" class="form-control" />
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
                                                    <input type="text" value="<?php echo @$_POST['ename']; ?>" name="ename" data-required="1" class="form-control" />
                                                  <!--</div>-->
                                                  <span class="help-block"> first & last name </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">ext
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" value="<?php echo @$_POST['ext']; ?>" name="ext" data-required="1" class="form-control" />
                                                    <span class="help-block"> e.g: 8555 </span>
                                                  </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">note
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea type="text" value="<?php echo @$_POST['note']; ?>" name="note" data-required="1" class="form-control" ><?php echo @$_POST['note']; ?></textarea> </div>
                                            </div>

                                                    <input type="hidden" name="name" data-required="1" class="form-control" value="<?php echo $uname; ?>" />
                                                    <input type="hidden" name="date" data-required="1" class="form-control" />



                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn default">Cancel</button>
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
