<?php

//Users APIs


function phone_users_get($extra = '')
{
    global $tf_handle;
    //$ex = strip_tags($extra);
    $query = sprintf("SELECT * FROM `phone` %s ",$extra); 
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

//$u = tinyf_users_get('id,name','where id = 10');

function phone_users_get_by_id($uid)   
{
    $id = (int)$uid;  
    if($id ==0)
        return null;
    
    $result = phone_users_get('where `id` ='.$id);
    if($result == null) 
        return null;
    
    $user = $result[0];
    return $user;
}



function phone_get_info($ext,$name,$dept){
    
    global $tf_handle;
	 $n_ext    = @mysql_real_escape_string(strip_tags($ext),$tf_handle);
     $n_name    = @mysql_real_escape_string(strip_tags($name),$tf_handle);
     $n_dept    = @mysql_real_escape_string(strip_tags($dept),$tf_handle);

     $result = phone_users_get("WHERE `ext` like '$n_ext' AND `name` like '$n_name' AND `dept` like '$n_dept' ");
     
     if ($result != NULL)
        $user = $result;
    else 
        $user = NULL;
    
    return $user ;
    
}








function phone_add($ext,$name,$dept,$position,$bleeb) 
{
    
    global $tf_handle;
    if((empty($ext)) || (empty($name)) ||  (empty($dept)) ) 
        return false;
     
    
    $n_ext        = @mysql_real_escape_string(strip_tags($ext),$tf_handle);
    $n_name       = @mysql_real_escape_string(strip_tags($name),$tf_handle);
    $n_dept       = @mysql_real_escape_string(strip_tags($dept),$tf_handle);
    $n_position   = @mysql_real_escape_string(strip_tags($position),$tf_handle);
    $n_bleeb      = @mysql_real_escape_string(strip_tags($bleeb),$tf_handle);

    $query = sprintf("INSERT INTO `phone` VALUE(NULL,'%d','%s','%s','%s','%s')",$n_ext,$n_name,$n_dept,$n_position,$n_bleeb);
    //echo $query;
    $qresult = @mysql_query($query);  
  
    if (!$qresult) 
        return false;
    
        
    return true; 
      
}


function phone_delete($uid)
{
     $id = (int)$uid;
    if($id == 0)
        return false;
    
    $query = sprintf("DELETE FROM `phone` WHERE `id` = %d",$id);
    $qresult = @mysql_query($query);  
    if(!$qresult)
        return false; 
    
    
    return true; 
   

  //  $result = tinyf_users_delete(7);  
  //  if($result);
}

function phone_users_update($uid,$ext = 0,$name = 0,$dept = 0,$position = null,$bleeb = 0) 
{
    global $tf_handle; 
    $id = (int)$uid;  
    if($id == 0)  
        return false;
   
  
    
    $user = phone_users_get_by_id($id); 
    if(!$user) 
        return false ; 
    
if((empty($ext)) && (empty($name)) && (empty($dept)))     
    return false; 
       
$fields = array();
$query = 'UPDATE `phone` SET ';
 
if (!empty($ext))
{
    $n_ext = @mysql_real_escape_string(strip_tags($ext),$tf_handle);  
    $fields[@count($fields)] = "`ext` = '$n_ext'";
}
if (!empty($name))
{
    $n_name = @mysql_real_escape_string(strip_tags($name),$tf_handle); 
    $fields[@count($fields)] = "`name` = '$n_name'"; 
}
if (!empty($dept))
{
    $n_dept = @mysql_real_escape_string(strip_tags($dept),$tf_handle); 
    $fields[@count($fields)] = "`dept` = '$n_dept'"; 
}
if (!empty($position) || empty($position) )
{
    $n_position = @mysql_real_escape_string(strip_tags($position),$tf_handle); 
    $fields[@count($fields)] = "`position` = '$n_position'"; 
}
if (!empty($bleeb) || empty($bleeb))
{
    $n_bleeb = @mysql_real_escape_string(strip_tags($bleeb),$tf_handle); 
    $fields[@count($fields)] = "`bleeb` = '$n_bleeb'"; 
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


        
?>