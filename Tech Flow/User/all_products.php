<?php
require('header.php');

$per_page = 12;
$start = 0;
$current_page = 1;
if (isset($_GET['start'])) {
    $start = $_GET['start'];
    if ($start <= 0) {
        $start = 0;
        $current_page = 1;
    } else {
        $current_page = $start;
        $start--;
        $start = $start * $per_page;
    }
}
$record = mysqli_num_rows(mysqli_query($con, "select id,name from product"));
$pagi = ceil($record / $per_page);

$sql = "select id,name,image,price,mrp from product limit $start,$per_page";
$res = mysqli_query($con, $sql);

?>

<div class="row mt-0 maintop">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
        <h2>All Products</h2>
    </div>
</div>
<div class="container min-vh-100">
            <div class="row">
                <?php
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                $get_product = get_product($con, '', '', '', '', '', '', '', 'yes');

                ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="#">
                                    <img class="pic-1" src="<?php echo '../Media/Products' . $row['image'] ?>" />
                                    <img class="pic-2" src="<?php echo '../Media/Products' . $row['image'] ?>" />
                                </a>
                                <ul class="social">
                                    <li>
                                        <a href="product_details.php?id=<?php echo $get_product['0']['id'] ?>" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-tip="Wishlist"><i class="fa fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-tip="Compare"><i class="fa fa-random"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="product_details.php?id=<?php echo $row['id'] ?>">
                                        <?php echo $row['name'] ?></h3>
                                <div class="price">
                                    <ul class="ml-3">
                                        <s>
                                            <li class="prev_price text-center">Old Price: <?php echo $row['mrp'] ?></li>
                                        </s>
                                        <li>New Price: <?php echo $row['price'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php }
    else { ?>
        No records
    <?php } ?>
    <!--owl carosal-->

</div>

<div class="container mt-10">
    <ul class="pagination mt-30 justify-content-center">
        <?php
        for ($i = 1; $i <= $pagi; $i++) {
            $class = '';
            if ($current_page == $i) {
        ?><li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i ?></a></li><?php
                                                                                                            } else {
                                                                                                                ?>
                <li class="page-item"><a class="page-link" href="?start=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php
                                                                                                            }
            ?>

        <?php } ?>
    </ul>
</div>


<?php
require('footer.php');
?>