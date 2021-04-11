<?php
    require('header.php');
    $row=mysqli_query($con,"select id from order_user_info order by id desc limit 1");
    $res=mysqli_fetch_assoc($row);
?>
<main class="container min-vh-100 text-center">
    <h3>
    Thank you for your order. We will contact you soon.
    </h3>
    <div class="text-right">
        <a href="invoice.php?id=<?php echo $res['id']?>">Get Invoice</a>
    </div>
</main>
<?php
    require('footer.php');
?>