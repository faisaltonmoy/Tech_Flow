function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			if(type=='update' || type=='remove'){
				window.location.href=window.location.href;
			}
			jQuery('.htc_qua').html(result);
		}	
	});	
}

$(window).scroll(function(){
	if($(this).scrollTop()>400)
		{
			$('.goTop').fadeIn();
		}else{
			$('.goTop').fadeOut();
		}
});

$('.goTop').click(function(){
	$('html, body').animate({scrollTop:0},2000)
});

function sort_product_all(){
	var sort_product_id= jQuery('#sort_product_id_all').val();
	window.location.href="http://localhost/Tech%20Flow/User/catagories.php?id=any"+"&sort="+sort_product_id;
}
function sort_product_cat(cata_id){
	var sort_product_id= jQuery('#sort_product_id_cat').val();
	window.location.href="http://localhost/Tech%20Flow/User/catagories.php?id="+cata_id+"&sort="+sort_product_id;
}
function sort_product_sub(cata_id,s_cata_id){
	var sort_product_id= jQuery('#sort_product_id').val();
	window.location.href="http://localhost/Tech%20Flow/User/catagories.php?id="+cata_id+"&sub_catagories="+s_cata_id+"&sort="+sort_product_id;
}