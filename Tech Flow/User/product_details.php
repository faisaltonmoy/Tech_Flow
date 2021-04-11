<?php
    require('header.php');
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $pro_id = mysqli_real_escape_string($con,$id);

    if($pro_id>0)
    {
      $get_product=get_product($con,'','',$pro_id);
    }else{
        ?>
        <script>
            window.location.href='home.php';
        </script>
        <?php
    }
?>

<div class="container">
      <div class="row">
        <div class="col-md-5">
          <div
            id="carouselExampleControls"
            class="carousel slide"
            data-bs-ride="carousel"
          >
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img
                  src="<?php echo '../Media/Products'.$get_product['0']['image']?>" alt = "shoe image"
                  class="d-block productimage w-100"
                  alt="..."
                />
              </div>
              <div class="carousel-item">
                <img
                  src="<?php echo '../Media/Products'.$get_product['0']['image']?>" alt = "shoe image"
                  class="d-block productimage w-100"
                  alt="..."
                />
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <p class="newarrival text-center">New</p>
          <h2><?php echo $get_product['0']['name']?></h2>

          <p class ="last-price">BDT <span><?php echo $get_product['0']['mrp']?></span></p>
          <p class="price">BDT <span><?php echo $get_product['0']['price']?></p>
          <h2>Description</h2>
            <p><?php echo $get_product['0']['short_desc']?></p>
            <ul>
              <li class = "ml-3">Color: <span>Black</span></li>
              <li class = "ml-3">Available: <span>in stock</span></li>
              <li class = "ml-3">Shipping Area: <span>All over the world</span></li>
              <li class = "ml-3"> Shipping Fee: <span>Free</span></li>
            </ul>

            <div class = "purchase-info">
              <input class="quantity" id="qty" type="number" min="0" value="1">
            <button type = "button" class = "btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">
              <a href="product_details.php?id=<?php echo $get_product['0']['id']?>">Add to Cart <i class = "fa fa-shopping-cart"></i></a>
            </button>
            <button type = "button" class = "btn"><a href="#"> Compare <i class = "fa fa-random"></a></i></button>
          </div>
        </div>
      </div>
    
      <div class="row">
        <div class="col-md-5 basicinfo">

          <div class="titlespecification text-center my-2">
            Basic Information
          </div>
          </div>

          <div class="col-lg-12">
            <p class="long_desc text-center">
            <?php echo $get_product['0']['long_desc']?>
            </p>
          </div>
      </div>
  </div>
<?php
    require('footer.php');
?>