<?php
require('top.inc.php');
$o_id = isset($_GET['id']) ? $_GET['id'] : '';
$id = mysqli_real_escape_string($con, $o_id);

if(isset($_POST['update_order_status'])){
	$update_order_status=$_POST['update_order_status'];
	if($update_order_status=='5'){
		mysqli_query($con,"update order_user_info set order_status='$update_order_status',payment_status='Success' where id='$id'");
	}else{
		mysqli_query($con,"update order_user_info set order_status='$update_order_status' where id='$id'");
	}
	
}
?>

<main>
    <div class="container mt-5 min-vh-100">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card-body">
                    <h4 class="box-title">Order Details</h4>
                </div>
                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="">Product ID</th>
                                <th class="">Product Image</th>
                                <th class="">Product Name</th>
                                <th class="">Quantity</th>
                                <th class="">Price</th>
                                <th class="">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $toral = 0;

                            $res = mysqli_query($con, "select DISTINCT(order_details.product_id),product.image,product.name,order_details.qty,order_details.price,order_details.time FROM order_details
                                         inner join product on order_details.product_id=product.id where order_details.order_id = '$id' ");
                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                                <tr>
                                    <td class="order-id"><a href="#"><?php echo $row['product_id'] ?></a></td>
                                    <td><img class="img" src="../Media/Products<?php echo $row['image'] ?>" /></td>


                                    <td class="pname"><?php echo $row['name'] ?></td>
                                    <td class="qty"><?php echo $row['qty'] ?></td>
                                    <td class="price"><?php echo $row['price'] ?></td>
                                    <td class="time"><?php echo $row['time'] ?></td>
                                </tr>


                                <?php $toral += $row['qty'] * $row['price'] ?>

                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="col-9 text-right">
                        <h4>Total price
                            &nbsp;&nbsp;<b><?php echo $toral ?></b></h4>
                    </div>
                    <div>
                        <div>
                            <strong>Order Status</strong>
                            <?php
                            $order_status_arr = mysqli_fetch_assoc(mysqli_query($con, "select after_order.status from after_order,order_user_info where order_user_info.id='$id' and order_user_info.order_status=after_order.id"));
                            echo $order_status_arr['status'];
                            ?>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <select class="form-control w-25" name="update_order_status" required>
                                <option value="">Select Status</option>
                                <?php
                                $res = mysqli_query($con, "select * from after_order");
                                while ($row = mysqli_fetch_assoc($res)) {
                                    if ($row['id'] == $catagories_id) {
                                        echo "<option selected value=" . $row['id'] . ">" . $row['status'] . "</option>";
                                    } else {
                                        echo "<option value=" . $row['id'] . ">" . $row['status'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            <input type="submit" class="form-control w-25" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</main>

<?php
require('footer.inc.php');
?>