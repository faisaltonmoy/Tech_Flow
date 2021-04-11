<?php
    require('header.php');
?>

    <main>
    <div class="container min-vh-100">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="">Products</th>
                                            <th class="">Name of products</th>
                                            <th class="">Price</th>
                                            <th class="">Quantity</th>
                                            <th class="">Total</th>
                                            <th class="">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										if(isset($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $key=>$val){
											$productArr=get_product($con,'','',$key);
											$pname=$productArr[0]['name'];
											$mrp=$productArr[0]['mrp'];
											$price=$productArr[0]['price'];
											$image=$productArr[0]['image'];
											$qty=$val['qty'];
											?>
											<tr>
												<td class="product-thumbnail"><a href="#"><img class="show_img" src="<?php echo '../Media/Products'.$image?>"  /></a></td>
												<td class="product-name"><a href="#"><?php echo $pname?></a>
													<ul  class="pro_prize mt-3">
														<s><li class="old_prize m-2"><?php echo $mrp?></li></s>
														<li class="new_prize"><?php echo $price?></li>
													</ul>
												</td>
												<td class="product-price"><span class="amount"><?php echo $price?></span></td>
												<td class="product-quantity"><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" />
												<br/><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update</a>
												</td>
												<td class="product-subtotal"><?php echo $qty*$price?></td>
												<td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="fa fa-trash" style="color:red"></i></a></td>
											</tr>
											<?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                    </div>
                </div>
                <div class="row mt-5">

                    <div class="col-50">
                    <button type="button" class="btn btn-outline-dark"><a href="home.php">Continue Shopping</a></button>
                    </div>

                    <div class="col-50 text-right">
                    <button type="button" class="btn btn-outline-dark"><a  href="Checkout.php">CheckOut</a></button>
                    </div>
                        
                    </div>
                </div>
            </div>
    </main>

<?php
    require('footer.php');
?>