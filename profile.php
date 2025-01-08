<?php
    session_start();
    include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EZshop-Profile</title>
  <?php include('bootcdn.php')?>
    <style>
        /* Custom styles for premium look */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4; /* Light grey background */
        }
        .navbar {
            background: linear-gradient(105.75deg, rgb(249, 233, 216) 10.78%, rgb(186, 232, 255) 50.63%, rgb(188, 161, 255) 90.47%), linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), linear-gradient(0deg, rgb(255, 255, 255), rgb(255, 255, 255)); /* White background for navbar */
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
        .btn-primary{
            background:transparent;
            border: none;
            color: black;
        }
        .btn-primary:hover{
            background: transparent;
            color: #00aaff;
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

    /* Profile css start */
        body {
          font-family: 'Helvetica Neue', sans-serif;
          background-color: #f4f4f4;
          margin: 0;
          padding: 0;
        }
        .col-sm-6 form{
          background-color: #fff;
          margin: 30px auto;
          padding: 30px;
          border-radius: 8px;
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
          text-align: center;
        }
        .center{
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 40%;
          height: 40%;
          border-radius: 50%; 
        }
        .col-sm-6 label,input{
          font-family: sans-serif;
          font-size: 18px;
          text-align: center;
        }
        .col-sm-6 .btn-primary{
          border: 1px solid black;
        }
        .btn-primary a{
          text-decoration: none;
          color: #000000;

        }



    /* Profile css ends */
  </style>
</head>
<body>
    <!-- Navabe Start -->
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
                <li class=""><a href="home.php"><b>Home</b></a></li>
                <!-- User profile button -->
                <li><a href="profile.php" class="login-btn"><i class="fas fa-user"></i></a></li>
                <!-- Cart button -->
                <?php 
                    $count = 0; 
                    if(isset($_SESSION['cart']))
                    {
                        $count = count($_SESSION['cart']);
                    }
                    else
                    {
                        $count=0;
                    }
                 ?>
                <li><a href="cart.php"><button style="margin-top: -5px;" type="button" class="btn btn-primary"><b><span class="fas fa-shopping-cart"></span></b> <span class="badge">(<?php echo $count?>)</span></button></a></li>
                 <!-- Logout button -->
                 <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
            </ul>
        </div>
    </div>
</nav>
<!--  Navbar Ends -->
<br><br><br><br><br>
<div class="container">
  <div class="col-sm-3">

  </div>
  <div class="col-sm-6">
  <form method="post">
    <?php 
    $sql = mysqli_query($con,"SELECT * FROM register WHERE id = '".$_SESSION['id']."' ");
    while($abc = mysqli_fetch_array($sql)){
    ?>
    <img src="<?php echo "media/" .$abc['photo']?>" class="center">
    <br>
    <label for="">Name :</label>
    <input type="text" class="form-control" value="<?php echo $abc['name']?>">
    <br>
    <label for="">Email ID :</label>
    <input type="text" class="form-control" value="<?php echo $abc['email']?>">
    <br>
    <label for="">Mobile Number :</label>
    <input type="text" class="form-control" value="<?php echo $abc['contact']?>">
    <br>
    <button class="btn btn-primary"><a href="editprofile.php"><span class="glyphicon glyphicon-pencil"></span> Edit Profile</a></button>
    <button class="btn btn-primary"><a href="yourorder.php"><span class="glyphicon glyphicon-briefcase"></span> Your Orders</a></button>
    <br><br>
    <button class="btn btn-primary btn-block"><a href="logout.php">Log Out <span class="glyphicon glyphicon-log-out"></span></a></button>

    <?php 
    }
    ?>



  </form>
  </div>
</div>
    

</body>
</html>
