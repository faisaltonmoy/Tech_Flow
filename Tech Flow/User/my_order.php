<?php
require('header.php');
if(!isset($_SESSION['name']))
{
    echo "<script>alert('You can not track your order without login. Please Login/Register')</script>";
}
?>

<main>
    <div class="container mt-5 min-vh-100">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                        <div class="card-body">
                           <h4 class="box-title">My Order</h4>
                        </div>
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="">Product Name</th>
                                    <th class="">Quantity</th>
                                    <th class="">Price</th>
                                    <th class="">Total</th>
                                    <th class="">Product Status</th>
                                    <th class="">Order Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $toral = 0;
                                $email = '';
                                if (isset($_SESSION['name'])) {
                                    $sql = "select email from user_sign_up where name = '$_SESSION[name]'";
                                    $res = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $email = $row['email'];
                                    }
                                }
                                $sql = "SELECT product.name, order_details.qty, order_details.price,order_user_info.payment_status,after_order.status,order_user_info.total_price
                                from product inner join order_details on product.id = order_details.product_id
                                INNER JOIN order_user_info on order_user_info.id = order_details.order_id 
                                INNER join after_order on after_order.id = order_user_info.order_status
                                WHERE order_user_info.email = '$email'";
                                $res = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td class=""><?php echo $row['name'] ?></td>         
                                        <td class=""><?php echo $row['qty'] ?></td>
                                        <td class=""><?php echo $row['price'] ?></td>
                                        <td class=""><?php echo $row['qty'] * $row['price'] ?></td>
                                        <td class=""><?php echo $row['payment_status'] ?></td>
                                        <td class=""><?php echo $row['status'] ?></td>
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
require('footer.php');
?>