<?php
    require('top.inc.php');
    $catagories = '';
    $msg = '';
    $sub_catagories = '';

    if(isset($_GET['id']) && $_GET['id'] != '' )
    {
        $id=get_safe_val($con,$_GET['id']);
        $add_sql="select * from sub_catagories where id = '$id'";
        $res = mysqli_query($con,$add_sql);

        $ck = mysqli_num_rows($res);
        if($ck>0)
        {
            $row = mysqli_fetch_assoc($res);
            $catagories = $row['catagories_id'];
            $sub_catagories = $row['sub_catagories'];
        }
        else{
            header('location:sub_catagories.php');
            die();
        }
    }
    if(isset($_POST['submit']))
    {   
        $catagories=get_safe_val($con,$_POST['catagories_id']);
        $sub_catagories=get_safe_val($con,$_POST['sub_catagories']);
        $add_sql="select * from catagories where catagories_id = '$catagories' and
        sub_catagories = '$sub_catagories'";
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
                    $msg = 'Sub Catagory already exists';
                }
            }
            else{
                $msg = 'Sub Catagory already exists';
            }
        }
        if($msg=='')
        {
            if(isset($_GET['id']) && $_GET['id'] != '' ){
                mysqli_query($con,"update sub_catagories set catagories_id = '$catagories' , sub_catagories = '$sub_catagories'
                where id = '$id'");
            }
            else{
            $add_sql="insert into sub_catagories(catagories_id,sub_catagories,status) values('$catagories','$sub_catagories','1')";
            $res = mysqli_query($con,$add_sql);
            }
            header('location:sub_catagories.php');
            die();
            }
        }
?>
<div class="row">
            <div class="container mt-5 min-vh-100">
            <div class="contact-form">
                <form class="frm" method="POST">
                    <div class="title">
                        <h2>Add Sub Catagories</h2>
                    </div>
                    <div class="form-group py-3">
                        <Select class="form-control w-50" type="text" name="catagories_id" placeholder="Catagory" required="required">
                        <option>Select Catagory</option>
                        <?php
                            $res = mysqli_query($con,"select * from catagories where status = 1");       
                            while($row = mysqli_fetch_assoc($res)){
                                if($row['id']==$catagories){
                                    echo "<option selected value=".$row['id'].">".$row['catagories']."</option>";
                                }else
                                {
                                    echo "<option value=".$row['id'].">".$row['catagories']."</option>";
                                }
                            }
                        ?>
                    </select>
                    <div class="form-group py-3">
                        <input class="form-control w-50" type="text" name="sub_catagories" placeholder="Sub Catagories" required="required" value="<?php echo $sub_catagories?>"></input>
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