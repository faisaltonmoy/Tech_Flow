<?php

require('connect.php');
require('function.php');
require('add_to_cart.inc.php');

date_default_timezone_set("Asia/Dhaka");

$cat_dt_res = mysqli_query($con, "select * from catagories where status=1 order by catagories asc");
$cat_dt_arr = array();
while ($row = mysqli_fetch_assoc($cat_dt_res)) {
    $cat_dt_arr[] = $row;
}
$obj = new add_to_cart();
$totalProduct = $obj->total_product();

$script_name = $_SERVER['SCRIPT_NAME'];
$script_name_arr = explode('/', $script_name);
$mypage = $script_name_arr[count($script_name_arr) - 1];

$meta_title = "Tech Flow";
$meta_desc = "Tech Flow";
$meta_keyword = "Tech Flow";

if ($mypage == 'product_details.php') {
    $product_id = get_safe_val($con, $_GET['id']);
    $product_meta = mysqli_fetch_assoc(mysqli_query($con, "select * from product where id='$product_id'"));
    $meta_title = $product_meta['meta_title'];
    $meta_desc = $product_meta['meta_desc'];
    $meta_keyword = $product_meta['meta_keyword'];
}
if ($mypage == 'contact_us.php') {
    $meta_title = 'Contact Us';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php echo $meta_desc ?>">
    <meta name="keywords" content="<?php echo $meta_keyword ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $meta_title ?></title>

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <!-- owlCarousel connect cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />

    <!-- Animate.css connect cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--Link up with css file-->
    <link rel="stylesheet" href="Css/Home.css" />
    <link rel="stylesheet" href="Css/style.css" />
    <link rel="stylesheet" href="Css/con_us.css" />
    <link rel="stylesheet" href="Css/product_detail.css" />
    <link rel="stylesheet" href="Css/gridproduct.css" />
    <link rel="stylesheet" href="Css/Cart.css" />
    <link rel="stylesheet" href="Css/checkout.css" />
    <link rel="stylesheet" href="Css/footer.css" />
    <link rel="stylesheet" href="Css/log_reg.css" />
    <link rel="stylesheet" href="Css/about.css" />

</head>

<body>
    <!--Header  Start-->
    <header>
        <!--NavBar Start-->
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg my-navbar ">
                <!--<a class="navbar-brand" href="#">Tech Flow</a>-->


                <div class="col-lg-2 col-md-2 col-sm-2 mb-4">
                    <h3 class="navpictitle"><a href="home.php">
                            <img class="nav-pic" src="PIC/TechFlow.png" alt="Logo"></a></h3>
                </div>
                <!--NavBar Logo-->



                <div class="col-lg-7 col-md-3 col-sm-2 text-right">

                    <!-- Toggler/collapsibe Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas fa-bars navbar-toggler-icon" style="color: #2B7A78"></span>
                    </button>

                    <!--Nav Item-->

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active ml-1">
                                <a class="nav-link" href="home.php">Home</a>
                            </li>
                            <li class="nav-item active ml-1">
                                <a class="nav-link" href="all_products.php">Products</a>
                            </li>
                            <?php
                            foreach ($cat_dt_arr as $list) {
                            ?>
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                        <?php echo $list['catagories'] ?></a>
                                    <?php
                                    $cat_id = $list['id'];
                                    $sub_cat_res = mysqli_query($con, "select * from sub_catagories where status='1' and catagories_id='$cat_id'");
                                    if (mysqli_num_rows($sub_cat_res) > 0) {
                                    ?>
                                        <ul class="dropdown-menu mega-menu" aria-labelledby="navbarDropdown">
                                            <?php
                                            while ($sub_cat_rows = mysqli_fetch_assoc($sub_cat_res)) {
                                                echo '<li><a class="dropdown-item" href="catagories.php?id=' . $list['id'] . '&sub_catagories=' . $sub_cat_rows['id'] . '">' . $sub_cat_rows['sub_catagories'] . '</a></li>';
                                            }
                                            ?>
                                            <li class="dropdown-menu mega-menu">
                                                <a class="dropdown-item" href="catagories.php?id=<?php echo $list['id'] ?>">All <?php echo $list['catagories'] ?></a>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php
                            }
                            ?>
                            <li class="nav-item ml-1">
                                <a class="nav-link" href="About.php">Team</a>
                            </li>
                            <li class="nav-item ml-1">
                                <a class="nav-link" href="contact_us.php">Contact_Us</a>
                            </li>

                        </ul>

                    </div>

                </div>


                <!--Search Box-->
                <div class="col-lg-3 col-md-10 col-sm-12">

                    <div class="row col-12 ml-3 mb-3 mt-1">
                        <div class="log_in_out col-lg-3 col-md-12 col-sm-12 mt-2">
                            <a href="user_login.php"><i class="fa fa-user fa-2x ml-3" style="color:#2B7A78"></i></a>
                            <span class="user_name text-right" style="color: #2B7A78"><?php if (isset($_SESSION['name'])) { ?>
                                    <a href="logout.php"><?php echo $_SESSION['name'] ?></a></span>
                        <?php } ?>
                        </div>

                        <div class="log_in_out col-lg-3 col-md-12 col-sm-12 mt-2">
                            <a href="my_order.php"><i class="fa fa-shopping-bag fa-2x ml-3" style="color:#2B7A78"></i></a>
                            <span class="user_name text-right" style="color: #2B7A78"></span>
                        </div>

                        <div class="shop_cart col-lg-5 col-md-12 col-sm-12 mt-2">
                            <a href="Cart.php"><i class="fa fa-shopping-cart fa-2x ml-3" style="color:#2B7A78"></i>
                                <span class="htc_qua" style="color: #2B7A78"><?php echo $totalProduct ?></span></a>
                        </div>
                    </div>

                    <div class="searchbox">
                        <form action="search.php" method="get">
                            <input type="text" class="searchbox__input" placeholder="Search..." name="str" />
                            <svg class="searchbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.966 56.966">
                                <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </form>
                    </div>
                </div>

            </nav>

        </div>

        <!--NavBar End-->
        <?php
        $sql = "select * from news where status = 1";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($res);
        ?>
        <div class="sliding_text_wrap " style="background-color: rgba(2, 12, 20, 0.8)">
            <marquee direction="left" style="color: #fa8729">
                <?php echo $row['message'] ?>
            </marquee>
        </div>

    </header>
    <!--Header  End-->