<?php
require('header.php');

function make_query($con)
{
    $query = "SELECT * FROM carousel Where status = 1 ORDER BY id ASC";
    $result = mysqli_query($con, $query);
    return $result;
}

function make_slide_indicators($con)
{
    $output = '';
    $count = 0;
    $result = make_query($con);
    while ($row = mysqli_fetch_array($result)) {
        if ($count == 0) {
            $output .= '
   <li data-target="#carouselExampleIndicators" data-slide-to="' . $count . '" class="active"></li>
   ';
        } else {
            $output .= '
   <li data-target="#carouselExampleIndicators" data-slide-to="' . $count . '"></li>
   ';
        }
        $count = $count + 1;
    }
    return $output;
}

function make_slides($con)
{
    $output = '';
    $count = 0;
    $result = make_query($con);
    while ($row = mysqli_fetch_array($result)) {
        if ($count == 0) {
            $output .= '<div class="carousel-item active">';
        } else {
            $output .= '<div class="carousel-item">';
        }
        $output .= '
   <img class="d-block w-100" src="../PIC/carousel' . $row["image"] . '" alt="' . $row["name"] . '" />
   <div class="carousel-caption d-none d-md-block d-sm-block">
    <h3 class="sub-heading animate__animated animate__rotateIn delay-2s">' . $row["name"] . '</h3>
   </div>
  </div>
  ';
        $count = $count + 1;
    }
    return $output;
}


?>



<!--Main Start-->

<main>
    <!--CAROUSEL START-->
    <div class="container-fluid p-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
            <ol class="carousel-indicators">
                <?php echo make_slide_indicators($con); ?>
            </ol>
            <div class="carousel-inner">
                <?php echo make_slides($con); ?>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>

    <!--Top CATEGORIES product Heading-->

    <div class="row  maintop">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <h2>New Arrival</h2>
        </div>
    </div>

    <!--New Arrival product Item-->

    <div class="container">

        <!--owl carosal-->
        <div class="row">
            <?php
            $get_product = get_product($con, 9);
            foreach ($get_product as $list) {
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="#">
                                <img class="pic-1" src="<?php echo '../Media/Products' . $list['image'] ?>" />
                                <img class="pic-2" src="<?php echo '../Media/Products' . $list['image'] ?>" />
                            </a>
                            <ul class="social">
                                <li>
                                    <a href="product_details.php?id=<?php echo $list['id'] ?>" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
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
                            <h3 class="title"><a href="product_details.php?id=<?php echo $list['id'] ?>">
                                    <?php echo $list['name'] ?></h3>
                            <div class="price">
                                <ul class="ml-3">
                                    <s>
                                        <li class="prev_price text-center">Old Price: <?php echo $list['mrp'] ?></li>
                                    </s>
                                    <li>New Price: <?php echo $list['price'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

    <!--Best Selling product Heading-->

    <div class="row mt-0 maintop">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <h2>Best Seller</h2>
        </div>
    </div>
    <div class="container">

        <!--owl carosal-->
        <div class="row">
            <?php
            $get_product = get_product($con, 6, '', '', '', '', '', 'Yes');
            foreach ($get_product as $list) {
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="#">
                                <img class="pic-1" src="<?php echo '../Media/Products' . $list['image'] ?>" />
                                <img class="pic-2" src="<?php echo '../Media/Products' . $list['image'] ?>" />
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
                            <h3 class="title"><a href="product_details.php?id=<?php echo $list['id'] ?>">
                                    <?php echo $list['name'] ?></h3>
                            <div class="price">
                                <ul class="ml-3">
                                    <s>
                                        <li class="prev_price text-center">Old Price: <?php echo $list['mrp'] ?></li>
                                    </s>
                                    <li>New Price: <?php echo $list['price'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

</main>

<!--Main End-->



<?php
require('footer.php');
?>