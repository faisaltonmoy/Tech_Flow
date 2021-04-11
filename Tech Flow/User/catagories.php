<?php
require('header.php');
$id = isset($_GET['id']) ? $_GET['id'] : '';
$cata_id = mysqli_real_escape_string($con, $id);
$sub_catagories = '';
if (isset($_GET['sub_catagories'])) {
  $sub_catagories = mysqli_real_escape_string($con, $_GET['sub_catagories']);
}
$price_high_selected = "";
$price_low_selected = "";
$new_selected = "";
$old_selected = "";
$sort_order = "";

if (isset($_GET['sort'])) {
  $sort = mysqli_real_escape_string($con, $_GET['sort']);
  if ($sort == "price_high") {
    $sort_order = " order by product.price desc ";
    $price_high_selected = "selected";
  }
  if ($sort == "price_low") {
    $sort_order = " order by product.price asc ";
    $price_low_selected = "selected";
  }
  if ($sort == "new") {
    $sort_order = " order by product.id desc ";
    $new_selected = "selected";
  }
  if ($sort == "old") {
    $sort_order = " order by product.id asc ";
    $old_selected = "selected";
  }
}
if ($cata_id > 0) {
  $get_product = get_product($con, '', $cata_id, '', $sub_catagories, '', $sort_order);
} else {
?>
  <script>
    window.location.href = 'home.php';
  </script>
<?php
}

?>

<main class="container">
  <div class="sort m-5">
    <select class="select_sorted w-25" onchange="sort_product_sub(<?php echo $cata_id ?>,<?php echo $_GET['sub_catagories'] ?>)" id="sort_product_id">
      <option value="">Default Sorting</option>
      <option value="price_low" <?php echo $price_low_selected ?>>Sort by price low to high</option>
      <option value="price_high" <?php echo $price_high_selected ?>>Sort by price high to low</option>
      <option value="new" <?php echo $new_selected ?>>Sort by new first</option>
      <option value="old" <?php echo $old_selected ?>>Sort by old first</option>
    </select>
  </div>
  <div class="container min-vh-100">
    <?php
    if (count($get_product) > 0) { ?>
      <div class="First">
        <div class="row">
          <?php
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
                      <a href="#" data-tip="Add to Cart">
                        <i class="fa fa-shopping-cart"></i>
                      </a>
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

    <?php } else {
      echo "Data Not Found";
    } ?>
  </div>
</main>

<?php
require('footer.php');
?>