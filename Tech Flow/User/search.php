<?php
    require('header.php');

    $str=mysqli_real_escape_string($con,$_GET['str']);

    if($str != '')
    {
        $get_product=get_product($con,'','','','',$str);
    }else{
        ?>
        <script>
            window.location.href='home.php';
        </script>
        <?php
    }
    
?>

    <main class="container min-vh-100">
        <?php 
            if(count($get_product)>0) { ?> 
      <div class="First">
        <div class="row">
                <?php                    
                    foreach($get_product as $list) {
                ?>
                <div class="col-md-3 col-sm-6">
                  <div class="product-grid">
                    <div class="product-image">
                      <a href="#">
                      <img
                      class="pic-1"
                      src="<?php echo '../Media/Products'.$list['image']?>"
                      />
                      <img
                      class="pic-2"
                      src="<?php echo '../Media/Products'.$list['image']?>"
                      />
                      </a>

                      <ul class="social">
                        <li>
                          <a href="#" data-tip="Add to Cart">
                        <i class="fa fa-shopping-cart"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#" data-tip="Wishlist"
                        ><i class="fa fa-heart"></i
                          ></a>
                        </li>
                        <li>
                          <a href="#" data-tip="Compare"
                        ><i class="fa fa-random"></i
                          ></a>
                        </li>
                      </ul>
                    </div>
                      <div class="product-content">
                        <h3 class="title"><a href="product_details.php?id=<?php echo $list['id']?>">
                          <?php echo $list['name']?></h3>
                          <div class="price">
                            <ul class="ml-3">
                              <s><li class="prev_price text-center">Old Price: <?php echo $list['mrp']?></li></s>
                              <li>New Price: <?php echo $list['price']?></li>
                            </ul>
                          </div>
                      </div>
                  </div>
                </div>
              <?php } ?>
        </div>
      </div>

    <?php } else{
        echo "Data Not Found";
    } ?>

  </main>

<?php
    require('footer.php');
?>