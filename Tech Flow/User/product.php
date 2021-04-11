<?php
    require('header.php');
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $cata_id = mysqli_real_escape_string($con,$id);
    $get_product=get_product($con,'',$cata_id);
?>

    <main class="container min-vh-100">
        <?php 
            if(count($get_product)>0) { ?> 
      <div class="First">
        <div class="row">
                <?php                    
                    foreach($get_product as $list) {
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                    <div class="owl-carousel">
                        <div class="item m-3">
                            <div>
                                <a href="#">
                                    <img src="<?php echo '../Media/Products'.$list['image']?>"/>
                                </a>
                            </div>
                            <div class="info">
                                <h4 class="ml-3"><a href="#"><?php echo $list['name']?></a></h4>
                                <ul class="price">
                                    <li class="prev_price"><?php echo $list['mrp']?></li>
                                    <li><?php echo $list['price']?></li>
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