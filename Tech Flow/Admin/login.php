<?php

require('connect.inc.php');
require('function.inc.php');

$msg='';

if(isset($_POST["submit"])) {

    $username = get_safe_val($con,$_POST['username']);
    $password = get_safe_val($con,$_POST['password']);

    $sql = "select * from admin_user where username = '$username' and password = '$password'";
    $res = mysqli_query($con,$sql);
    $count = mysqli_num_rows($res);
    if($count>0)
    {
        $_SESSION['ADMIN_LOGIN']='Yes';
        $_SESSION['ADMIN_USERNAME']= $username;
        header('location:categories.php');
        die();

    }else{
        $msg = "Please Enter Correct login Details";
    }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Admin Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Admin_Css/admin_login.css">
  </head>
  <body>
      <div class="row">
            <div class="container lg">
            <div class="contact-form lg_frm">
                <form class="frm" method="POST">
                    <div class="title">
                        <h2>Login</h2>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Username" required="required"></input>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required="required"></input>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                    <div class="err_msg"><?php echo $msg ?></div>
                </form> 
            </div>
        </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>