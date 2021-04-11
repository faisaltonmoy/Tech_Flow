<?php
    require('top.inc.php');
    $catagories_id = '';
    $sub_catagories_id = '';
    $name = '';
    $mrp = '';
    $price  = '';
    $qty  = '';
    $image = '';
    $short_desc = '';
    $long_desc  = '';
    $meta_title = '';
    $meta_desc  = '';
    $meta_keyword  = '';
    $best_seller  = '';

    $msg = '';
    $img_req='required';

    if(isset($_GET['id']) && $_GET['id'] != '' )
    {
        $img_req='';
        $id=get_safe_val($con,$_GET['id']);
        $res = mysqli_query($con,"select * from product where id = '$id'");
        
        $ck = mysqli_num_rows($res);
        if($ck>0)
        {
            $row = mysqli_fetch_assoc($res);

            $catagories_id = $row['catagories_id'];
            $sub_catagories_id = $row['sub_catagories_id'];
            $name = $row['name'];
            $mrp = $row['mrp'];
            $price = $row['price'];
            $qty = $row['qty'];
            $image = $row['image'];
            $short_desc = $row['short_desc'];
            $long_desc = $row['long_desc'];
            $meta_title = $row['meta_title'];
            $meta_desc = $row['meta_desc'];
            $meta_keyword = $row['meta_keyword'];
            $best_seller = $row['best_seller'];
        }
        else{
            header('location:products.php');
            die();
        }
    }
    if(isset($_POST['submit']))
    {   
        $catagories_id=get_safe_val($con,$_POST['catagories_id']);
        $sub_catagories_id=get_safe_val($con,$_POST['sub_catagories_id']);
        $name=get_safe_val($con,$_POST['name']);
        $mrp=get_safe_val($con,$_POST['mrp']);
        $price=get_safe_val($con,$_POST['price']);
        $qty=get_safe_val($con,$_POST['qty']);
        $short_desc=get_safe_val($con,$_POST['short_desc']);
        $long_desc=get_safe_val($con,$_POST['long_desc']);
        $meta_title=get_safe_val($con,$_POST['meta_title']);
        $meta_desc=get_safe_val($con,$_POST['meta_desc']);
        $meta_keyword=get_safe_val($con,$_POST['meta_keyword']);
        $best_seller=get_safe_val($con,$_POST['best_seller']);


        $add_sql="select * from product where name = '$name'";
        $res = mysqli_query($con,$add_sql);

        $ck = mysqli_num_rows($res);
        if($ck>0)
        {
            if(isset($_GET['id']) && $_GET['id'] != '' )
            {
                $get_data=mysqli_fetch_assoc($res);
                if($id==$get_data['id'])
                {

                }else{
                    $msg = 'Product already exists';
                }
            }
            else{
                $msg = 'Product already exists';
            }
        }

        if($_GET['id']==0){
            if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
                $msg="Please select only png,jpg and jpeg format";
            }
        }else{
            if($_FILES['image']['type']!=''){
                    if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
                    $msg="Please select only png,jpg and jpeg format";
                }
            }
        }

        if($msg==''){
            if(isset($_GET['id']) && $_GET['id'] != '' ){
            if($_FILES['image']['name']!= '')
            {
                $image = rand(11111111,99999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],'../Media/Products'.$image);

                $up_sql="Update product set catagories_id='$catagories_id', sub_catagories_id='$sub_catagories_id', name='$name', mrp='$mrp', 
                price='$price', qty='$qty', image='$image', short_desc='$short_desc', 
                long_desc='$long_desc', meta_title='$meta_title', meta_desc='$meta_desc', meta_keyword='$meta_keyword', best_seller='$best_seller'  where id='$id'";
            }
            else{
                $up_sql="Update product set catagories_id='$catagories_id',sub_catagories_id='$sub_catagories_id', name='$name', mrp='$mrp', 
                price='$price', qty='$qty', short_desc='$short_desc', 
                long_desc='$long_desc', meta_title='$meta_title', meta_desc='$meta_desc', meta_keyword='$meta_keyword', best_seller='$best_seller' where id='$id'";
            }
            mysqli_query($con,$up_sql);
        }
        else{
        $image = rand(11111111,99999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'../Media/Products'.$image);
        $add_sql="insert into product (catagories_id,sub_catagories_id, name, mrp, price, qty, image, short_desc, long_desc, meta_title, meta_desc, meta_keyword,status,best_seller) 
        VALUES ('$catagories_id', '$sub_catagories_id', '$name', '$mrp', '$price', '$qty', '$image', '$short_desc', '$long_desc', 
         '$meta_title', '$meta_desc', '$meta_keyword',1,'$best_seller')";
        $res = mysqli_query($con,$add_sql);
        }
        header('location:products.php');
        die();
        }
    
    }
?>

<div class="row">
            <div class="container mt-5 min-vh-100">
            <div class="contact-form">
                <form class="frm" method="POST" enctype="multipart/form-data">
                    <div class="title">
                        <h2>Add Products</h2>
                    </div>
                    <div class="form-group py-3">
                        <Select class="form-control w-50" type="text" name="catagories_id" id="catagories_id" placeholder="Catagory" required="required"
                        onchange="get_s_cat('')" required>
                        <option>Select Catagory</option>
                        <?php
                            $res = mysqli_query($con,"select id,catagories from catagories order by catagories asc");
                            while($row = mysqli_fetch_assoc($res)){
                                if($row['id']==$catagories_id){
                                    echo "<option selected value=".$row['id'].">".$row['catagories']."</option>";
                                }else
                                {
                                    echo "<option value=".$row['id'].">".$row['catagories']."</option>";
                                }
                                
                            }
                        ?>
                    </select>
                    </div>
                    <div class="form-group py-3">
                        <Select class="form-control w-50" type="text" name="sub_catagories_id" id="sub_catagories_id" placeholder="Catagory" required="required">
                        <option>Select Sub Catagory</option>
                    </select>
                    </div>
                    <div class="form-group py-3">
                        <input class="form-control w-50" type="text" name="name" placeholder="Enter Product Name" required="required" value="<?php echo $name?>"></input>
                    </div>
                    <div class="form-group py-3">
                        <Select class="form-control w-50" type="text" name="best_seller" placeholder="Best Seller" required="required">
                        <option value=" ">Select Best Seller</option>
                        <?php
                            if($best_seller==1){
                                echo '<option selected value="1">Yes</option>
                                <option value="0">No</option>';
                            }elseif($best_seller==0)
                            {
                                echo '<option value="1">Yes</option>
                                <option selected value="0">No</option>';
                            }
                            else
                            {
                                echo '<option value="1">Yes</option>
                                <option value="0">No</option>';
                            }
                        ?>
                    </select>
                    </div>
                    <div class="form-group py-3">
                        <input class="form-control w-50" type="text" name="mrp" placeholder="Enter MRP" required="required" value="<?php echo $mrp?>"></input>
                    </div>
                    <div class="form-group py-3">
                        <input class="form-control w-50" type="text" name="price" placeholder="Enter Price" required="required" value="<?php echo $price?>"></input>
                    </div>
                    <div class="form-group py-3">
                        <input class="form-control w-50" type="text" name="qty" placeholder="Enter Quantity" required="required" value="<?php echo $qty?>"></input>
                    </div>
                    <div class="form-group py-3">
                        <input class="form-control w-50" type="file" name="image" placeholder="Set a Image" <?php echo $img_req?> value="<?php echo $image?>"></input>
                    </div>
                    <div class="form-group py-3">
                        <textarea class="form-control w-50" type="text" name="short_desc" placeholder="Add a short description"  value="<?php echo $short_desc?>"></textarea>
                    </div>
                    <div class="form-group py-3">
                        <textarea class="form-control w-50" type="text" name="long_desc" placeholder="Add a long description"  value="<?php echo $long_desc?>"></textarea>
                    </div>
                    <div class="form-group py-3">
                        <textarea class="form-control w-50" type="text" name="meta_title" placeholder="Add meta title"  value="<?php echo $meta_title?>"></textarea>
                    </div>
                    <div class="form-group py-3">
                        <textarea class="form-control w-50" type="text" name="meta_desc" placeholder="Add meta description"  value="<?php echo $meta_desc?>"></textarea>
                    </div>
                    <div class="form-group py-3">
                        <textarea class="form-control w-50" type="text" name="meta_keyword" placeholder="Add meta keyword"  value="<?php echo $meta_keyword?>"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary w-15" type="submit" name="submit">Submit</button>
                    </div>
                    <div class="err_msg color:red"><?php echo $msg ?></div>
                </form> 
            </div>
        </div>
</div>

<script>
    function get_s_cat(s_cat_id){
        var catagories_id=jQuery('#catagories_id').val();
        $.ajax({
            url:'get_s_cat.php',
            type:'post',
            data:'catagories_id='+catagories_id+'&s_cat_id='+s_cat_id,
            success:function(result){
                jQuery('#sub_catagories_id').html(result);
            }
        });
    }
</script>

<?php
    require('footer.inc.php');
?>
<script>
    <?php
    if(isset($_GET['id'])){
        ?>
        get_s_cat('<?php echo $sub_catagories_id?>');
        <?php
    }
    ?>
</script>