<?php
require('top.inc.php');
$catagories = '';
$msg = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_val($con, $_GET['id']);
    $add_sql = "select * from catagories where id = '$id'";
    $res = mysqli_query($con, $add_sql);

    $ck = mysqli_num_rows($res);
    if ($ck > 0) {
        $row = mysqli_fetch_assoc($res);
        $catagories = $row['catagories'];
    } else {
        header('location:categories.php');
        die();
    }
}
if (isset($_POST['submit'])) {
    $catagories = get_safe_val($con, $_POST['catagories']);
    $add_sql = "select * from catagories where catagories = '$catagories'";
    $res = mysqli_query($con, $add_sql);

    $ck = mysqli_num_rows($res);
    if ($ck > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $get_data = mysqli_fetch_assoc($res);
            if ($id == $get_data['id']) {
            } else {
                $msg = 'Catagory already exists';
            }
        } else {
            $msg = 'Catagory already exists';
        }
    }
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            mysqli_query($con, "update catagories set catagories = '$catagories' where id = '$id'");
        } else {
            $add_sql = "insert into catagories(catagories,status) values('$catagories','1')";
            $res = mysqli_query($con, $add_sql);
        }
        header('location:categories.php');
        die();
    }
}
?>
<div class="row">
    <div class="container ad_c mt-5 min-vh-100">
        <div class="contact-form ad_c">
            <form class="frm" method="POST">
                <div class="title">
                    <h2>Add Catagories</h2>
                </div>
                <div class="form-group py-3">
                    <input class="form-control w-50" type="text" name="catagories" placeholder="Catagory" required="required" value="<?php echo $catagories ?>"></input>
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