<?php
require('top.inc.php');

$name = '';
$image = '';

$msg = '';
$img_req = 'required';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $img_req = '';
    $id = get_safe_val($con, $_GET['id']);
    $res = mysqli_query($con, "select * from carousel where id = '$id'");

    $ck = mysqli_num_rows($res);
    if ($ck > 0) {
        $row = mysqli_fetch_assoc($res);
        $name = $row['name'];
        $image = $row['image'];
    } else {
        header('location:news_carousel.php');
        die();
    }
}
if (isset($_POST['submit'])) {

    $name = get_safe_val($con, $_POST['name']);


    $add_sql = "select * from product where name = '$name'";
    $res = mysqli_query($con, $add_sql);

    $ck = mysqli_num_rows($res);
    if ($ck > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $get_data = mysqli_fetch_assoc($res);
            if ($id == $get_data['id']) {
            } else {
                $msg = 'Product already exists';
            }
        } else {
            $msg = 'Product already exists';
        }
    }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            if ($_FILES['image']['name'] != '') {
                $image =$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],'../PIC/carousel'.$image);
                
                $up_sql = "Update carousel set name='$name', image='$image'  where id='$id'";
            } else {
                $up_sql = "Update carousel set name='$name', image='$image'  where id='$id'";
            }
            mysqli_query($con, $up_sql);
        } else {
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'../PIC/carousel'.$image);
            $add_sql = "insert into carousel(name,image,status) 
                        VALUES ('$name','$image',1)";
            $res = mysqli_query($con, $add_sql);
        }
        header('location:news_carousel.php');
        die();
    }
}
?>

<div class="row">
    <div class="container mt-5 min-vh-100">
        <div class="contact-form">
            <form class="frm" method="POST" enctype="multipart/form-data">
                <div class="title">
                    <h2>Add News Carousel</h2>
                </div>
                <div class="form-group py-3">
                    <div class="form-group py-3">
                        <input class="form-control w-50" type="text" name="name" placeholder="Carousel Name" required="required" value="<?php echo $name ?>"></input>
                    </div>
                    <div class="form-group py-3">
                        <input class="form-control w-50" type="file" name="image" placeholder="Set a Image" <?php echo $img_req ?> value="<?php echo $image ?>"></input>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary w-15" type="submit" name="submit">Submit</button>
                </div>
                <div class="err_msg color:red"><?php echo $msg ?></div>
            </form>
        </div>
    </div>
</div>

<?php
require('footer.inc.php');
?>