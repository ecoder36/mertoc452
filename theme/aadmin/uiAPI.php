<?php

//Users APIs


function in_get($extra = '')
{
    global $tf_handle;
    //$ex = strip_tags($extra);
    $query = sprintf("SELECT * FROM `record` %s ",$extra);
    $qresult =@mysql_query($query);
    if(!$qresult)
        return null;

    $rcount = @mysql_num_rows($qresult);
    if($rcount == 0)
        return null;

    $users = array();
    for($i=0; $i < $rcount; $i++)
        $users[@count($users)] = @mysql_fetch_object($qresult);


    @mysql_free_result($qresult);

    return $users;

}

function items_get($extra = '')
{
    global $tf_handle;
    //$ex = strip_tags($extra);
    $query = sprintf("SELECT * FROM `item` %s ",$extra);
    $qresult =@mysql_query($query);
    if(!$qresult)
        return null;

    $rcount = @mysql_num_rows($qresult);
    if($rcount == 0)
        return null;

    $users = array();
    for($i=0; $i < $rcount; $i++)
        $users[@count($users)] = @mysql_fetch_object($qresult);

    @mysql_free_result($qresult);

    return $users;
}

function dept_get($extra = '')
{
    global $tf_handle;
    //$ex = strip_tags($extra);
    $query = sprintf("SELECT * FROM `department` %s ",$extra);
    $qresult =@mysql_query($query);
    if(!$qresult)
        return null;

    $rcount = @mysql_num_rows($qresult);
    if($rcount == 0)
        return null;

    $users = array();
    for($i=0; $i < $rcount; $i++)
        $users[@count($users)] = @mysql_fetch_object($qresult);

    @mysql_free_result($qresult);

    return $users;
}

function dept_get_by_id($uid)
{
    $id = (int)$uid;
    if($id ==0)
        return null;

    $result = dept_get('where `id` ='.$id);
    if($result == null)
        return null;

    $user = $result[0];
    return $user;
}

function dept_get_by_dept($dept)
{
    global $tf_handle;
    $n_dept    = @mysql_real_escape_string(strip_tags($dept),$tf_handle);
    $result = dept_get("WHERE `dept` = '$n_dept'");
    if ($result != NULL)
       // $user = $result[0]; //
        $user = $result;
    else
        $user = NULL;
    return $user ;
}

function dept_add($dept)
{

    global $tf_handle;
    if ( (empty($dept))    )
        return false;

     $n_dept        = @mysql_real_escape_string(strip_tags($dept),$tf_handle);
    $query = sprintf("INSERT INTO `department` VALUE(NULL,'%s')",$n_dept);
    //echo $query;
    $qresult = @mysql_query($query);
    if (!$qresult)
        return false;

    return true;
}

function dept_delete($uid)
{
     $id = (int)$uid;
    if($id == 0)
        return false;

    $query = sprintf("DELETE FROM `department` WHERE `id` = %d",$id);
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;

    return true;

}

function dept_update($uid,$dept = null )
{
   global $tf_handle;
    $id = (int)$uid;
    if($id == 0)
        return false;
    $user = dept_get_by_id($id);
    if(!$user)
        return false ;

if (empty($dept) )
        return false;

$fields = array();
$query = 'UPDATE `department` SET ';

if (!empty($dept))
{
    $n_dept = @mysql_real_escape_string(strip_tags($dept),$tf_handle);
    $fields[@count($fields)] = "`dept` = '$n_dept'";
}

$fcount = @count($fields) ;
if($fcount == 1)
{
    $query .= $fields[0].' WHERE `id` = '.$id;
    //echo $query;
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    else
        return true;
}
    for($i = 0; $i < $fcount; $i++)
    {
        $query .= $fields[$i];
        if($i != ($fcount - 1))
                $query .=' , ';
    }
    $query .= ' WHERE `id` = '.$id;
    //echo $query;
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    else
        return true;
}

function items_get_by_id($uid)
{
    $id = (int)$uid;
    if($id ==0)
        return null;

    $result = items_get('where `id` ='.$id);
    if($result == null)
        return null;

    $user = $result[0];
    return $user;
}

function items_geta($extraa = '')
{
    global $tf_handle;
    //$ex = strip_tags($extra);
    $query = sprintf("SELECT DISTINCT `type` FROM `item` %s ",$extraa);
    $qresult =@mysql_query($query);
    if(!$qresult)
        return null;
    $rcount = @mysql_num_rows($qresult);
    if($rcount == 0)
        return null;
    $users = array();
    for($i=0; $i < $rcount; $i++)
        $users[@count($users)] = @mysql_fetch_object($qresult);
    @mysql_free_result($qresult);
    return $users;

}

function items_get_by_type($type)
{
    global $tf_handle;
    $n_type    = @mysql_real_escape_string(strip_tags($type),$tf_handle);
    $result = items_get("WHERE `type` = '$n_type'");
    if ($result != NULL)
       // $user = $result[0]; //
        $user = $result;
    else
        $user = NULL;
    return $user ;
}

function items_get_by_typemodel($type,$model){

    global $tf_handle;
	   $n_type     = @mysql_real_escape_string(strip_tags($type),$tf_handle);
     $n_model    = @mysql_real_escape_string(strip_tags($model),$tf_handle);

     $result = items_get("WHERE `type` like '$n_type' AND `model` like '$n_model'  ");

     if ($result != NULL)
        $user = $result;
    else
        $user = NULL;

    return $user ;

}

function items_add($type,$model)
{

    global $tf_handle;
    if ( (empty($type))    )
        return false;

     $n_type        = @mysql_real_escape_string(strip_tags($type),$tf_handle);
     $n_model        = @mysql_real_escape_string(strip_tags($model),$tf_handle);
    $query = sprintf("INSERT INTO `item` VALUE(NULL,'%s','%s')",$n_type,$n_model);
    //echo $query;
    $qresult = @mysql_query($query);
    if (!$qresult)
        return false;

    return true;
}

function items_delete($uid)
{
     $id = (int)$uid;
    if($id == 0)
        return false;

    $query = sprintf("DELETE FROM `item` WHERE `id` = %d",$id);
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;


    return true;


  //  $result = tinyf_users_delete(7);
  //  if($result);
}



function items_update($uid,$type = null ,$model = null )
{
   global $tf_handle;
    $id = (int)$uid;
    if($id == 0)
        return false;
    $user = items_get_by_id($id);
    if(!$user)
        return false ;

if ((empty($type)) && (empty($model)) )
        return false;

$fields = array();
$query = 'UPDATE `item` SET ';

if (!empty($type))
{
    $n_type = @mysql_real_escape_string(strip_tags($type),$tf_handle);
    $fields[@count($fields)] = "`type` = '$n_type'";
}

if (!empty($model))
{
    $n_model = @mysql_real_escape_string(strip_tags($model),$tf_handle);
    $fields[@count($fields)] = "`model` = '$n_model'";
}
$fcount = @count($fields) ;
if($fcount == 1)
{
    $query .= $fields[0].' WHERE `id` = '.$id;
    //echo $query;
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    else
        return true;
}
    for($i = 0; $i < $fcount; $i++)
    {
        $query .= $fields[$i];
        if($i != ($fcount - 1))
                $query .=' , ';
    }
    $query .= ' WHERE `id` = '.$id;
    //echo $query;
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    else
        return true;
}

//$u = tinyf_users_get('id,name','where id = 10');

function in_get_by_id($uid)
{
    $id = (int)$uid;
    if($id ==0)
        return null;

    $result = in_get('where `id` ='.$id);
    if($result == null)
        return null;

    $user = $result[0];
    return $user;
}

function in_get_by_devno($devno)
{
    global $tf_handle;
    $n_devno    = @mysql_real_escape_string(strip_tags($devno),$tf_handle);
    $result = in_get("WHERE `dno` = '$n_devno'");
    if ($result != NULL)
       // $user = $result[0]; //
        $user = $result;
    else
        $user = NULL;
    return $user ;
}

function in_add($type,$model,$dno,$floor,$dept,$section,$ename,$ext,$note,$name)
{

    global $tf_handle;
    if((empty($type)) || (empty($model)) || (empty($dno)))
        return false;

    $n_type       = @mysql_real_escape_string(strip_tags($type),$tf_handle);
    $n_model       = @mysql_real_escape_string(strip_tags($model),$tf_handle);
    $n_dno       = @mysql_real_escape_string(strip_tags($dno),$tf_handle);
    $n_floor       = @mysql_real_escape_string(strip_tags($floor),$tf_handle);
    $n_dept       = @mysql_real_escape_string(strip_tags($dept),$tf_handle);
    $n_section       = @mysql_real_escape_string(strip_tags($section),$tf_handle);
    $n_ename       = @mysql_real_escape_string(strip_tags($ename),$tf_handle);
    $n_ext        = @mysql_real_escape_string(strip_tags($ext),$tf_handle);
    $n_note       = @mysql_real_escape_string(strip_tags($note),$tf_handle);
    $n_name       = @mysql_real_escape_string(strip_tags($name),$tf_handle);
    $date = date("j/n/Y D h:i A");
    $n_date       = @mysql_real_escape_string(strip_tags($date),$tf_handle);

    $query = sprintf("INSERT INTO `record` VALUE(NULL,'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",$n_type,$n_model,$n_dno,$n_floor,$n_dept,$n_section,$n_ename,$n_ext,$n_note,$n_name,$n_date);
    //echo $query;
    $qresult = @mysql_query($query);
    if (!$qresult)
        return false;


    return true;

}


function in_delete($uid)
{
     $id = (int)$uid;
    if($id == 0)
        return false;

    $query = sprintf("DELETE FROM `record` WHERE `id` = %d",$id);
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    return true;


  //  $result = tinyf_users_delete(7);
  //  if($result);
}

function in_update($uid,$type = null,$model = null,$dno = null,$floor = null,$dept = null,$section = null,$ename = null,$ext = null,$note = null,$na= null)
{
    global $tf_handle;
    $id = (int)$uid;
    if($id == 0)
        return false;

    $user = in_get_by_id($id);
    if(!$user)
        return false ;

if((empty($model)) && (empty($dno)) && (empty($floor)))
        return false;

$fields = array();
$query = 'UPDATE `record` SET ';

if (!empty($type))
{
    $n_type = @mysql_real_escape_string(strip_tags($type),$tf_handle);
    $fields[@count($fields)] = "`type` = '$n_type'";
}
if (!empty($model))
{
    $n_model = @mysql_real_escape_string(strip_tags($model),$tf_handle);
    $fields[@count($fields)] = "`model` = '$n_model'";
}
if (!empty($dno))
{
    $n_dno = @mysql_real_escape_string(strip_tags($dno),$tf_handle);
    $fields[@count($fields)] = "`dno` = '$n_dno'";
}
if (!empty($floor))
{
    $n_floor = @mysql_real_escape_string(strip_tags($floor),$tf_handle);
    $fields[@count($fields)] = "`floor` = '$n_floor'";
}
if (!empty($dept))
{
    $n_dept = @mysql_real_escape_string(strip_tags($dept),$tf_handle);
    $fields[@count($fields)] = "`dept` = '$n_dept'";
}
if (!empty($section))
{
    $n_section = @mysql_real_escape_string(strip_tags($section),$tf_handle);
    $fields[@count($fields)] = "`section` = '$n_section'";
}
if (!empty($ename))
{
    $n_ename = @mysql_real_escape_string(strip_tags($ename),$tf_handle);
    $fields[@count($fields)] = "`ename` = '$n_ename'";
}
if (!empty($ext))
{
    $n_ext = @mysql_real_escape_string(strip_tags($ext),$tf_handle);
    $fields[@count($fields)] = "`ext` = '$n_ext'";
}
if (!empty($note))
{
    $n_note = @mysql_real_escape_string(strip_tags($note),$tf_handle);
    $fields[@count($fields)] = "`note` = '$n_note'";
}
if (!empty($name))
{
    $n_name = @mysql_real_escape_string(strip_tags($name),$tf_handle);
    $fields[@count($fields)] = "`name` = '$n_name'";
}


$fcount = @count($fields) ;
if($fcount == 1)
{
    $query .= $fields[0].' WHERE `id` = '.$id;
    //echo $query;
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    else
        return true;
}

    for($i = 0; $i < $fcount; $i++)
    {
        $query .= $fields[$i];
        if($i != ($fcount - 1))
                $query .=' , ';
    }

    $query .= ' WHERE `id` = '.$id;
    //echo $query;
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    else
        return true;
}

function in_items_update($type ,$model ,$otype = null,$omodel = null)
{
    global $tf_handle;
 /*   $id = (int)$uid;
    if($id == 0)
        return false;

    $user = in_get_by_id($id);
    if(!$user)
        return false ;

if( (empty($type)) && (empty($model)) )
        return false;*/
        $user = in_get("WHERE `type` = '$otype' AND `model` = '$omodel'");


$fields = array();
$query = 'UPDATE `record` SET ';

if (!empty($type))
{
    $n_type = @mysql_real_escape_string(strip_tags($type),$tf_handle);
    $fields[@count($fields)] = "`type` = '$n_type'";
}
if (!empty($model))
{
    $n_model = @mysql_real_escape_string(strip_tags($model),$tf_handle);
    $fields[@count($fields)] = "`model` = '$n_model'";
}


$fcount = @count($fields) ;
if($fcount == 1)
{
    $query .= $fields[0].' WHERE `type` = '.$otype.' AND `model` = '.$omodel;
    //echo $query;
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    else
        return true;
}

    for($i = 0; $i < $fcount; $i++)
    {
        $query .= $fields[$i];
        if($i != ($fcount - 1))
                $query .=' , ';
    }

    $query .= " WHERE `type` = '$otype' AND `model` = '$omodel' ";
    echo $query;
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    else
        return true;
}




function in_dept_update( $dep , $odep )
{
    global $tf_handle;

        $user = in_get("WHERE `dept` = '$odep' ");

$fields = array();
$query = 'UPDATE `record` SET ';

if (!empty($dep))
{
    $n_dep = @mysql_real_escape_string(strip_tags($dep),$tf_handle);
    $fields[@count($fields)] = " `dept` = '$n_dep' ";
}


$fcount = @count($fields) ;
if($fcount == 1)
{
    $query .= $fields[0]." WHERE `dept` = '$odep' " ;
    //echo $query;
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    else
        return true;
}

    for($i = 0; $i < $fcount; $i++)
    {
        $query .= $fields[$i];
        if($i != ($fcount - 1))
                $query .=' , ';
    }

    $query .= " WHERE `dept` = '$odep' ";
    echo $query;
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    else
        return true;
}

?>
