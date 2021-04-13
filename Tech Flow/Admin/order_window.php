<?php
    require('top.inc.php');
?>

    <main>
    <div class="container mt-5 min-vh-100">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">    
                            <div class="card-body">
                                <h4 class="box-title">Order List</h4>
                            </div>           
                            <div class="table-content table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th class="">Order ID</th>
                                            <th class="">Order Date</th>
                                            <th class="">Customer's Info</th>
                                            <th class="">Address</th>
                                            <th class="">Payment Type</th>
                                            <th class="">Payment Status</th>
                                            <th class="">Order Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
                                        $res=mysqli_query($con,"select order_user_info.*, after_order.status 
                                        from order_user_info INNER join after_order on after_order.id = order_user_info.order_status");
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                        ?>
											<tr>
												<td class="order-id"><a name="id" href="order_window_details.php?id=<?php echo $row['id']?>"><?php echo $row['id'] ?></a></td>
												<td class="time"><?php echo $row['time']?></td>
                                                <td class="customer_info">
                                                    <?php echo $row['name']?>,</br>
                                                    <?php echo $row['email']?>
                                                </td>
                                                <td class="address">
                                                    <?php echo $row['address']?>,</br>
                                                    <?php echo $row['city']?>,</br>
                                                    <?php echo $row['state']?>,</br>
                                                    <?php echo $row['zip']?>
                                                </td>
												<td class="ptype"><?php echo $row['payment_type']?></td>
                                                <td class="psts"><?php echo $row['payment_status']?></td>
                                                <td class="osts"><?php echo $row['status']?></td>
                                                
											</tr>
											<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                    </div>
                </div>
                
                </div>
            </div>
    </main>

<?php
    require('footer.inc.php');
?>