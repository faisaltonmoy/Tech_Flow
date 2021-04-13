<?php

require('connect.inc.php');
require('function.inc.php');

if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') 
{

}
else
{
    header('location:login.php');
    die();
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Desktop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Admin_Css/home.css">
    <link rel="stylesheet" href="Admin_Css/style.css">
    <link rel="stylesheet" href="Admin_Css/admin_login.css">
  </head>
  <body>
      <div>
        <header>

          <div class="header">
            <h1 class="py-3 text-center">Tech Flow</h1>
            <div class="row justify-content-center">
              <div class="col-lg-offset-2">
                <h6 class="admin_nav px-2"><a href="../User/home.php">My Website</a></h6>
              </div>
              <div class="col-lg-offset-2">
                <h6 class="admin_nav px-2"><a href="categories.php">Catagory</a></h6>
              </div>
              <div class="col-lg-offset-2">
                <h6 class="admin_nav px-2"><a href="products.php">Products</a></h6>
              </div>
              <div class="col-lg-offset-2">
                <h6 class="admin_nav px-2"><a href="sub_catagories.php">Sub Catagoy</a></h6>
              </div>
              <div class="col-lg-offset-2">
                <h6 class="admin_nav px-2"><a href="order_window.php">Order Window</a></h6>
              </div>
              <div class="col-lg-offset-2">
                <h6 class="admin_nav px-2"><a href="news_carousel.php">Carousel</a></h6>
              </div>
              <div class="col-lg-offset-2">
                <h6 class="admin_nav px-2"><a href="contact_us.php">Contact Us</a></h6>
              </div>
              <div class="col-lg-offset-2">
                <h6 class="admin_nav px-2"><a href="user_info.php">User's Info</a></h6>
              </div>
              <div class="col-lg-offset-2">
                <h6 class="admin_nav px-2"><a href="news.php">News</a></h6>
              </div>
              <div class="ml-5 col-lg-offset-2">
                <a href="logout.php">
                <button class="logout">Logout</button>
                </a>
            </div>
            </div>  
          </div>

        </header>