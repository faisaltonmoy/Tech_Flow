<?php
require('header.php');

$name = '';
$email = '';
$phone = '';
$message = '';
$msg = '';


if (isset($_POST["submit"])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    $sql = "Insert into contact_us(name,email,phone,message)
    values('$name','$email','$phone','$message')";

    $res = mysqli_query($con, $sql);

    if ($res == true) {
        echo '<script>alert("Thank you for your response")</script>';
    } else {
        echo '<script>alert("Something worng")</script>';
    }

    $name = '';
    $email = '';
    $phone = '';
    $message = '';
}

?>
<div class="container min-vh-50">
    <div class="contact-form">
        <form class="frm" method="POST">
            <div class="title">
                <h2>Contact Us</h2>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Name" required="required" value="<?php echo $name; ?>"></input>
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email" required="required" value="<?php echo $email; ?>"></input>
            </div>
            <div class="form-group">
                <input class="form-control" type="phone" name="phone" placeholder="Phone" required="required" value="<?php echo $phone; ?>"></input>
            </div>
            <div class="form-group">
                <textarea class="form-control" type="text" name="message" placeholder="Message" required="required" value="<?php echo $message; ?>"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            </div>
            <div class="err_msg"><?php echo $msg ?></div>
        </form>
    </div>
</div>

<?php
require('footer.php');
?>