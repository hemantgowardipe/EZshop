<?php
    session_start();
    include('../connect.php');
    // browzer security start
    if(empty($_SESSION['aname']))
     {
        header('location:index.php');
     }
    // browzer security end
    // connection of database start
    if(isset($_POST['add']))
    {
      $udate = date('Y-m-d');
      $title = $_POST['title'];
      $description = $_POST['description'] ;
      $photo = $_FILES['photo']['name'] ;
      $price = $_POST['price'];

      mysqli_query($con,"INSERT INTO fashion(udate,title,description,photo,price)VALUES('$udate','$title','$description','$photo','$price') ");

      $dir = "fashionimgs/";
      $photo = $_FILES['photo']['name'];
      $size = $_FILES['photo']['size'];
      $tmp_photo = $_FILES['photo']['tmp_name'];
      $error = $_FILES['photo']['error'];

      $ext = explode('.',$photo);
      $actual = strtolower(end($ext));
      $allowed = array('jpg','png','jpeg');

      if(in_array($actual,$allowed))
      {
        if($error ===0)
        {
            if($size < 5000000)
            {
                move_uploaded_file($tmp_photo,$dir.$photo);
            }
            else{
                echo "Limit is 50 Mb";
            }
        }
        else{
            echo "Network Error";
        }
      }
      else{
        echo "Wrong file type";
    }
      echo "<script>
        alert('Product Added Successfully...');
        window.location.href='fashionadd.php';
      </script>";
    }
     // connection of database end
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Responsive Navigation with Cart</title>
    <?php include('bootcdn.php')?>
    <style>
        /* Custom styles for premium look */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4; /* Light grey background */
        }
        .navbar {
            background-color: #ffffff; /* White background for navbar */
            border: none;
            border-radius: 0;
            padding: 15px 0;
        }
        .navbar .navbar-brand {
            color: #000000; /* Black color for brand */
            font-weight: bold;
            font-size: 1.5em;
            padding-left: 20px; /* Align brand properly */
            text-transform: uppercase;
        }
        .navbar .navbar-brand:hover {
            color: #000000; /* Keep brand name static (no hover effect) */
        }
        .navbar .navbar-nav > li {
            margin: 0 10px; /* Adjusting spacing between items */
        }
        .navbar .navbar-nav > li > a {
            color: #000000; /* Black color for links */
            padding: 15px 20px;
            font-weight: 500;
            text-transform: uppercase;
            position: relative;
            transition: color 0.3s ease;
        }
        /* Underline animation */
        .navbar .navbar-nav > li > a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: #00aaff; /* Bright blue for underline */
            left: 0;
            bottom: -5px;
            transition: width 0.3s ease;
        }
        .navbar .navbar-nav > li > a:hover::after {
            width: 100%;
        }
        .navbar .navbar-nav > li > a:hover {
            color: #00aaff; /* Bright blue on hover */
        }
        .navbar .navbar-nav > li.active > a {
            color: #00aaff;
        }
        .navbar-toggle {
            border: none;
            margin-right: 30px; /* Align toggle button properly */
            background-color: black;
        }
        .navbar-toggle .icon-bar {
            background-color: #000000; /* Black bars for toggle */
        }
        /* Dropdown styles */
        .navbar-nav .dropdown-menu {
            background-color: #ffffff; /* Same as navbar */
            border: none;
            border-radius: 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20px);
            transition: all 0.3s ease;
        }
        .navbar-nav .dropdown-menu a {
            color: #000000;
            padding: 10px 20px;
            display: block;
            transition: color 0.3s ease;
        }
        .navbar-nav .dropdown-menu a:hover {
            color: #00aaff;
        }
        /* Show dropdown on hover */
        .navbar-nav > li:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        /* User login and cart button styles */
        .login-btn, .cart-btn {
            color: #ffffff; /* White icon */
            border-radius: 50%; /* Circular shape */
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0px;
            transition: background-color 0.3s ease;
            margin-right: 15px;
        }
        .login-btn:hover, .cart-btn:hover {
            background-color: #00aaff; /* Bright blue on hover */
        }
        .well{
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            text-shadow: whitesmoke 2px 1px 1px;
            background:linear-gradient(105.75deg, rgb(249, 233, 216) 10.78%, rgb(186, 232, 255) 50.63%, rgb(188, 161, 255) 90.47%), linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), linear-gradient(0deg, rgb(255, 255, 255), rgb(255, 255, 255));
        }
        /* Media query for mobile */
        @media (max-width: 768px) {
            .navbar-nav {
                text-align: center;
            }
            .navbar-nav .dropdown-menu {
                position: static;
                float: none;
                width: 100%;
                transform: none;
                opacity: 1;
                visibility: visible;
            }
            .login-btn, .cart-btn {
                margin-right: 0;
                margin-bottom: 10px;
            }
            /* Center align the login and cart buttons when the navbar collapses */
            .navbar-right {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        }
        /* ADD Product Css start */

        /*  ADD Product Css End */
    </style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">EZShop</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class=""><a href="dashboard.php">Dashboard</a></li>
                <li class=""><a href="add.php">Electronics Add</a></li>
                <li class=""><a href="fashionadd.php">Fashion Add</a></li>
                <li class=""><a href="userlist.php">Users</a></li>
                <li class=""><a href="productlist.php">Products</a></li>
                <!-- Logout button -->
                <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span></a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Add Product Start -->

<div class="container">
    <br><br><br><br><br>
    <div class="well">
      <span class="glyphicon glyphicon-home"> <b>Clothing & Fashion Products</b></span>
    </div>
    <!-- add product section start -->

    <div class="row">
        <br><br>
      <div class="col-sm-3">

      </div>
      <div class="col-sm-6">
      <!-- add form start -->

        <form method="post" enctype="multipart/form-data">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2>ADD NEW PRODUCT</h2>
            </div>
            <div class="panel-body">
              <label for="">Product Title :</label>
              <input type="text" name="title" placeholder="Title" class="form-control">
              <br>
              <label for="">Product Description :</label>
              <textarea name="description" placeholder="Description" class="form-control"></textarea>
              <br>
              <label for="">Upload Image :</label>
              <input type="file" name="photo" class="form-control">
              <br>
              <label for="">Product Price :</label>
              <input type="text" name="price" placeholder="Enter Price" class="form-control">

            </div>
            <div class="panel-footer">
              <button type="submit" name="add" class="btn btn-primary">Add Product</button>

            </div>

          </div>
        </form>
      <!-- add for end -->
      </div>
    </div>
     <!-- add product section end -->
    
     </div>
    
<!-- Add Product End -->

</body>
</html>
