<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Responsive Navigation with Cart</title>
    <?php include('bootcdn.php')?>
    <?php include('connect.php')?>
    <style>
        /* Custom styles for premium look */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4; /* Light grey background */
        }
        .navbar {
            background:linear-gradient(105.75deg, rgb(249, 233, 216) 10.78%, rgb(186, 232, 255) 50.63%, rgb(188, 161, 255) 90.47%), linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), linear-gradient(0deg, rgb(255, 255, 255), rgb(255, 255, 255)); ; /* White background for navbar */
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

        /* Your order css start */
        body {
            background-color: #f5f5f5;
            font-family: 'Helvetica Neue', sans-serif;
        }
        .order-page {
            max-width: 1200px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .order-title {
            font-size: 2em;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
        }
        .order-summary {
            margin-bottom: 20px;
        }
         .order-summary th, .order-summary td {
            text-align: center;
            padding: 15px;
        }
        .order-summary th {
            background-color: #e9ecef;
            color: #333;
        }
        .order-summary td {
            border-bottom: 1px solid #ddd;
        }
        .order-summary img {
            width: 50%;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            padding: 10px;
        }
        .total-price {
            font-size: 1.5em;
            color: #333;
            font-weight: bold;
        }
        .order-summary table {
            width: 100%;
        }
        .payment-button {
            background-color: #007bff;
            border: none;
            padding: 15px 40px;
            color: #fff;
            font-size: 1.2em;
            font-weight: bold;
            display: block;
            margin: 20px auto;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .payment-button:hover {
            background-color: #0056b3;
        }
        .order-details {
            margin-top: 40px;
        }
        .order-details h3 {
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }
        .order-details p {
            color: #555;
            font-size: 1.1em;
            margin-bottom: 10px;
        }
                /* Your order css ends */
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
                <li class=""><a href="home.php"><b>Home</b></a></li>
                <!-- User login button -->
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

<!-- Your order body start -->
 <br><br><br><br><br><br>
<div class="container">
<div class="order-page">
  <div class="order-title">Your Order</div>

  <div class="order-summary">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Product</th>
          <th>Image</th>
          <th>Product Id</th>
          <th>Purchase Date</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $total=0;
      $sdata = mysqli_query($con,"SELECT * FROM purchase ORDER BY pid ");
      while($row = mysqli_fetch_assoc($sdata)) {  
        $total = $total+$row['price'];
    ?>
        <tr>
            <td><?php echo $row['title']?></td>
            <td><img src="<?php echo 'media/'.$row['photo']?>" alt="Product 1"></td>
            <td><?php echo $row['pdtid']?></td>
            <td><?php echo $row['pdate']?></td>
            <td><?php echo $row['price']?></td>
        </tr>
        <?php 
      }
    ?>
        <tr>
          <td colspan="4" class="text-right total-price">Total</td>
          <td><?php echo $total?></td>
        </tr>
      </tbody>
    </table>
    <button type="submit" onclick="print()" class="btn btn-success">Print <span class="glyphicon glyphicon-print"></span></button>
  </div>
</div>
 <!-- Your order body ends -->

</body>
</html>
