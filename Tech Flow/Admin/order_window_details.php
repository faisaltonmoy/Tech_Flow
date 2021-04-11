<?php
require('top.inc.php');
?>

<main>
    <div class="container mt-5 min-vh-100">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
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
                                $id = get_safe_val($con, $_GET['id']);
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