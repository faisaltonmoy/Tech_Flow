<?php
require('header.php');

$obj = new add_to_cart();
$totalProduct = $obj->total_product();

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
?>
    <script>
        window.location.href = 'home.php';
    </script>
<?php
}
$name = "";
$email = "";
$dis = 0;
$discount = 0;
if (isset($_SESSION['name'])) {
    $sql = "select name,email from user_sign_up where name = '$_SESSION[name]'";
    $res = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $name = $row['name'];
        $email = $row['email'];
    }
    $dis = 0.02;
    $discount = 2;
}

$total = 0;

if (isset($_POST['submit'])) {
    $name = get_safe_val($con, $_POST['name']);
    $email = get_safe_val($con, $_POST['email']);
    $address = get_safe_val($con, $_POST['address']);
    $city = get_safe_val($con, $_POST['city']);
    $state = get_safe_val($con, $_POST['state']);
    $zip = get_safe_val($con, $_POST['zip']);
    $payment_type = get_safe_val($con, $_POST['payment_type']);

    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($con, '', '', $key);

        $price = $productArr[0]['price'];
        $qty = $val['qty'];
        $total = $total + ($qty * $price);
    }
    $total_price = $total;
    $payment_status = 'Pending';
    if ($payment_type == 'cod') {
        $payment_status = 'Pending';
    }
    $order_status = 1;

    $sql = "insert into `order_user_info` (name,email,address,city,state,zip,payment_type,total_price,payment_status,order_status)
        values('$name','$email','$address','$city','$state','$zip','$payment_type','$total_price','$payment_status','$order_status')";

    $res = mysqli_query($con, $sql);

    $order_id = mysqli_insert_id($con);

    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($con, '', '', $key);
        $price = $productArr[0]['price'];
        $qty = $val['qty'];

        mysqli_query($con, "insert into `order_details`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
    }

    unset($_SESSION['cart'])
?>
    <script>
        window.location.href = 'confirm.php';
    </script>
<?php
}
?>
<main class="container">
    <h2 class="mt-5 ml-3"> CheckOut Form</h2>
    <div class="row">
        <div class="col-50">
            <div class="container add">
                <form id="validate" method="post">
                    <div class="row">
                        <div class="col-50">
                            <h3 class="mt-2">Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" name="name" value="<?php echo $name ?>" placeholder="Full Name" required>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" name="email" value="<?php echo $email ?>" placeholder="....@example.com" required>
                            <label for="adr"><i class="fas fa-address-card"></i> Address</label>
                            <input type="text" name="address" placeholder="Address" required>
                            <label for="city"><i class="fas fa-city"></i> City</label>
                            <input type="text" name="city" placeholder="City" required>

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" name="state" placeholder="State" required>
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" name="zip" placeholder="Post/Zip code" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-50">

                        </div>
                    </div>
                    <div class="row">
                        <div class="single-method">
                            <h5 class="ml-3 mb-2">Cash on Delivery<input type="radio" name="payment_type" value="cod" />
                                &nbsp; &nbsp; &nbsp; Pay on Card
                                <input type="radio" name="payment_type" value="card" />
                            </h5>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn1">
                </form>
            </div>
        </div>
        <div class="col-25">
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="">Name</th>
                            <th class="">QTY</th>
                            <th class="">Remove</th>
                            <th class="">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $val) {
                                $productArr = get_product($con, '', '', $key);
                                $pname = $productArr[0]['name'];
                                $mrp = $productArr[0]['mrp'];
                                $price = $productArr[0]['price'];
                                $image = $productArr[0]['image'];
                                $qty = $val['qty'];
                                $total = $total + ($qty * $price);
                        ?>
                                <tr>
                                    <td class="product-name"><a href="#"><?php echo $pname ?></a></td>
                                    <td class="product-quantity">
                                        <h5><?php echo $qty ?></h5>
                                    <td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')">
                                            <i class="fa fa-trash" style="color:red"></i></a></td>
                                    <td class="product-subtotal"><?php echo $qty * $price ?></td>
                                    </td>


                                </tr>
                        <?php }
                        } ?>


                    </tbody>
                </table>
                
                <div class="row">
                    <div class="col-50 ml-4">
                        <h5><b>Discount</b></h5>
                    </div>
                    <div class="col-25 ml-5">
                        <p><b>&emsp;&emsp;&nbsp;&emsp;<?php echo $discount?>%</b></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-50 ml-5">
                        <h5><b>Total</b></h5>
                    </div>
                    <div class="col-25 ml-5">
                        <p><b>৳ <?php echo $total-($total*$dis) ?></b></p>
                    </div>
                </div>

            </div>
        </div>
    </div>


</main>
<?php
require('footer.php');
?>