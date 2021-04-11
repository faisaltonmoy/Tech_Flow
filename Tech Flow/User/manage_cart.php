<?php
require('connect.php');
require('function.php');
require('add_to_cart.inc.php');

$pid=get_safe_val($con,$_POST['pid']);
$qty=get_safe_val($con,$_POST['qty']);
$type=get_safe_val($con,$_POST['type']);
	

$obj=new add_to_cart();

if($type=='add'){
	$obj->add_product($pid,$qty);
}

if($type=='remove'){
	$obj->remove_product($pid);
}

if($type=='update'){
	$obj->update_product($pid,$qty);
}

echo $obj->total_product();
?>