<?php

require('connect.inc.php');
require('function.inc.php');

if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') 
{

}
else
{
    header('location:login.php');
    die();
}

$catagories_id=get_safe_val($con,$_POST['catagories_id']);
$s_cat_id=get_safe_val($con,$_POST['s_cat_id']);
$res=mysqli_query($con,"select * from sub_catagories where catagories_id ='$catagories_id' and status='1'");

if(mysqli_num_rows($res)>0)
{
    $html='';
    while($row=mysqli_fetch_assoc($res))
    {
        if($s_cat_id==$row['id'])
        {
            $html.="<option value=".$row['id']." selected>".$row['sub_catagories']."</option>";
        }else{
            $html.="<option value=".$row['id'].">".$row['sub_catagories']."</option>";
        }
        
    }
    echo $html;
}else{
    echo "<option>No sub catagories found</option>";
}


?>