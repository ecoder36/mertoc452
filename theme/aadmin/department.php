

<?php
require_once('logsession.php');
?>

<?php

require_once('db.php');
require_once('uiAPI.php');

if(isset($_GET['deptdel']))
{
//die($_GET['del']);
           $_deptdel = (int)$_GET['deptdel'];
           if($_deptdel == 0)
               die('Bad Access 22'); 

            $result = dept_delete($_deptdel);
            tinyf_db_close();
            if($result)
                     header("Location:?depdel=del");
                  //die('Success');
            else {
                     die('Failure delete');
                 }
             die();
}

if(isset($_GET['departmentid']))
{
         //die($_GET['id']);

         $_id = (int)$_GET['departmentid'];

         if($_id != 0)
           //die($_POST['ext']);
           //  die('Bad Access 2');

{
           $user = dept_get_by_dept($_POST['dept']);
           echo $_id;
           if (($user != NULL))
             {
                       $rcount =@count($user);
                          for($i = 0 ; $i < $rcount; $i++)
                         {
                            $res = $user [$i];
                         }
                     tinyf_db_close();

                       if (($res->id != $_id))
                       {
                         header("Location: ?beforeupdateget=you try to update ".$_POST['dept']." department and the ".$res->dept." is exist on the table");

                     die();
                   }
           }
         {
                       $result = dept_update($_id,$_POST['dept']);
                       tinyf_db_close();

                       if($result)
                            {

                             header("Location:?deptu=".$_POST['dept']."");
                           }
                       else {
                          //  header("Location: mfProfile.php?id=$_id");
                           die('Update Failure ');
                        }
                        die();
         }
   }

       if($_id == 0)
         {

                           if(!isset($_POST['dept'])  )
                           {
                               die('Problem');
                           }


                           $user = dept_get_by_dept($_POST['dept']);
                           if ($user != NULL)

                             {
                                       $rcount =@count($user);
                                          for($i = 0 ; $i < $rcount; $i++)
                                         {
                                            $res = $user [$i];
                                         }
                                     tinyf_db_close();


                                    header("Location: ?beforeaddget=you try to add ".$_POST['dept']." department and the ".$res->dept." is exist on the table");
                                     die();
                           }
                         $result = dept_add($_POST['dept']);
                         tinyf_db_close();
                         $iiadd = $_POST['dept'] ;
                         if($result)
                             {
                                 header("Location: ?deptadd=$iiadd");
                             }
                         else

                         header("Location: ?adderro=Please fill In department");
         }
}



if(isset($_GET['del']))
{
//die($_GET['del']);
            $_del = (int)$_GET['del'];
            if($_del == 0)
                die('Bad Access 2');

             $result = items_delete($_del);
             tinyf_db_close();
             if($result)
                      header("Location: ?itemdel=del");
                   //die('Success');
             else {
                      die('Failure delete');
                  }
              die();
}

if(isset($_GET['id']))
{
          //die($_GET['id']);

          $_id = (int)$_GET['id'];

          if($_id != 0)
            //die($_POST['ext']);
            //  die('Bad Access 2');

{
            $user = items_get_by_typemodel($_POST['type'],$_POST['model']);
            echo $_id;
            if (($user != NULL))
              {
                        $rcount =@count($user);
                           for($i = 0 ; $i < $rcount; $i++)
                          {
                             $res = $user [$i];
                          }
                      tinyf_db_close();

                        if (($res->id != $_id))
                        {

                      header("Location: ?beforupdatemodel=YOU TRY TO UPDATE ".$_POST['model']." MODEL IT IS EXIST IN THE TABLE AS ".$res->type." ".$res->model."");

                      die();
                    }
            }


          {
                        
                                 $resulti = in_items_update($_POST['type'],$_POST['model'],$_GET['type'],$_GET['model']);
                                 if($resulti)
                                 {
                                      items_update($_id,$_POST['type'],$_POST['model']);
                                      tinyf_db_close();
                                     header("Location: ?typeu=".$_POST['type']." model ".$_POST['model']."");
                                 }else{ 
                                     die('Update Failure');
                                     }
                                     
                                 die();    
                                    
         
                        /*
                        $result = items_update($_id,$_POST['type'],$_POST['model']);
                        tinyf_db_close();
                        $typeu = $_POST['type']  ;
                        if($result)
                            {
                                     header("Location: tadmin.php?typeu=$typeu model ".$_POST['model']."");
                             }
                        else {
                           //  header("Location: mfProfile.php?id=$_id");
                            die('Update Failure ');
                            }

                         die();
                         
                         */
          }
    }

        if($_id == 0)
          {

                            if(!isset($_POST['type']) || (!isset($_POST['model'])) )
                            {
                                die('Problem');
                            }


                            $user = items_get_by_typemodel($_POST['type'],$_POST['model']);
                            if ($user != NULL)

                              {
                                $rcount =@count($user);
                                   for($i = 0 ; $i < $rcount; $i++)
                                  {
                                     $res = $user [$i];
                                  }
                              tinyf_db_close();
                              header("Location: ?beforaddmodel=YOU TRY TO ADD ".$_POST['model']." MODEL IT IS EXIST IN THE TABLE AS ".$res->type." ".$res->model."");
                              die();
                            }
                          $result = items_add($_POST['type'],$_POST['model']);
                          tinyf_db_close();
                          $iiadd = $_POST['type'] ;
                          if($result)
                              {
                                  header("Location: ?itemadd=$iiadd");
                              }
                          else
                          header("Location: ?erroradd=Please fill In Type and Model");
          }

}

?>


<?php
if($_SESSION['user_info'] != false ){
?>
        <!-- BEGIN HEADER -->
        <!-- BEGIN PAGE TITLE -->
                   <?php $title="department" ?><!-- END PAGE TITLE -->
        <?php  require_once ("require/header.php") ; ?>
                    <!-- END HEADER INNER -->
        <!-- BEGIN SIDEBAR -->
        <?php $InventorySystem="active open " ?>
        <?php $dept="active open " ?>
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
                    <h3 class="page-title"> Departments & Items Tables
                        <small></small>
                    </h3>
           
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-6 col-sm-12">


                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">


                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">departments Table</span>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <button id="sample_editable_11_new" class="btn green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                             <?php
                                            require_once('db.php');
                                            require_once('uiAPI.php');

                                            $users = dept_get('ORDER BY `id` DESC');
                                            if($users == NULL)
                                              //  die ('problem');
                                                  echo ('problem');
                                            $ucount = @count($users);

                                            if($ucount == 0)
                                          //      die ('No users');
                                                  echo ('No users');

                                            ?>

                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_11">
                                        
                                                 <?php
                    if(isset($_GET['deptu'])){echo '<div class="alert alert-success ">
                                            <button class="close" data-close="alert"></button><strong>Success! </strong>The '.$_GET['deptu'].' has been updated successfully! </div>';}
                    if(isset($_GET['deptadd'])){echo '<div class="alert alert-success ">
                                            <button class="close" data-close="alert"></button><strong>Success! </strong>The '.$_GET['deptadd'].' has been Added successfully! </div>';}
                    if(isset($_GET['depdel'])){echo '<div class="alert alert-success ">
                                            <button class="close" data-close="alert"></button><strong>Success! </strong>The department has been deleted successfully! </div>';}
                    if(isset($_GET['beforeaddget'])){echo ' <div class="alert alert-danger ">
                    <button class="close" data-close="alert"></button><strong>Error! </strong> '.$_GET['beforeaddget'].'</div>';}
                    if(isset($_GET['beforeupdateget'])){echo ' <div class="alert alert-danger ">
                    <button class="close" data-close="alert"></button><strong>Error! </strong> '.$_GET['beforeupdateget'].'</div>';}
                    if(isset($_GET['adderro'])){echo ' <div class="alert alert-danger ">
                    <button class="close" data-close="alert"></button><strong>Error! </strong> '.$_GET['adderro'].'</div>';}

                     ?>
                                        <thead>
                                            <tr>
                                                <th  class="col-md-2">id</th>
                                                <th>department </th>
                                                <th></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                           <?php
                                          for($i = 0 ; $i < $ucount; $i++)
                                          {
                                              $user = $users[$i];
                                    echo  "<tr>
                                                  <td> $user->id   </td>
                                                  <td> $user->dept   </td>
                                                  <td> 1   </td>
                                                 <!-- <td> <a class=\"edit btn green btn-sm\" href=\"javascript:;\"> Edit </a> 
                                                   <a class=\"delete1 btn red btn-sm\" href=\"?deptdel=$user->id&5945\" onclick=\"return confirm('Are you sure to delete this row ($user->dept) ?')\"> Delete </a> </td>-->
                                          </tr>";
                                          }
                                          ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        
                         <div class="col-md-6 col-sm-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-green"></i>
                                        <span class="caption-subject sbold font-green uppercase">Items Table</span>
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
                                          
                                          //  SELECT owner, COUNT(*) FROM pet;

                                            if($users == NULL)
                                              //  die ('problem');
                                                  echo ('problem');
                                            $ucount = @count($users);

                                            if($ucount == 0)
                                          //      die ('No users');
                                                  echo ('No users');

                                            ?>

                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
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
                                        <thead>
                                            <tr>
                                                <th >id              </th>
                                                <th >type            </th>
                                                <th >model            </th>
                                                <th ></th>
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
                                                  <td> 1 </td>
                                                  <!--<td><a class=\"edit \"><span class='label label-sm label-success btn green btn-sm'><i class='fa fa-edit'> Edit</i></span></a>
                                                  <a class=\"delete1 \" href=\"?del=$user->id&5945\" onclick=\"return confirm('Are you sure to delete this row ($user->model) ?')\"> <span class='label label-sm label-success btn red btn-sm'> <i class='fa fa-trash'></i></span> </a></td>-->
                                                
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
      
        <script src="require/js/department.js" type="text/javascript"></script>
        
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>

</html>
<?php  }
if($_SESSION['user_info'] == false ){
	header("Location: login.php");
}

?>
