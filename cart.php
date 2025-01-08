<?php 
    session_start();
    include('connect.php');
    // browzer security start
    if(empty($_SESSION['id']))
     {
        header('location:index.php');
     }
    // browzer security end
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
            background: linear-gradient(105.75deg, rgb(249, 233, 216) 10.78%, rgb(186, 232, 255) 50.63%, rgb(188, 161, 255) 90.47%), linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), linear-gradient(0deg, rgb(255, 255, 255), rgb(255, 255, 255));;;; /* White background for navbar */
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
        .login-btn{
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
        .login-btn:hover{
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
            .login-btn{
                margin-bottom: 10px;
            }
            /* Center align the login and cart buttons when the navbar collapses */
            .navbar-right {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        }
        /* cart css start */
        .well{
            text-align: center;
            font-size: 25px;
            font-family: 'Times New Roman', Times, serif;
        }
        body {
            background-color: #f4f4f4;
            font-family: 'Helvetica', sans-serif;
        }
         .panel-heading h3{
            text-align: center;
         }
         .panel-heading h4{
            margin-left: 280px;
         }
        .form-check-label {
            font-size: 16px;
            margin-left: 5px;
        }
        .col-sm-4 button{
            border: 1px solid black;
        }
         /* cart css end */
    </style>
</head>

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
                    else{
                        $count = 0;
                    }
                 ?>
                <li><a href="cart.php"><button style="margin-top: -5px;" type="button" class="btn btn-primary"><b><span class="fas fa-shopping-cart"></span></b> <span class="badge">(<?php echo $count?>)</span></button></a></li>
                <!-- Logout button -->
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
            </ul>
        </div>
    </div>
</nav>

        <!-- Cart body start -->
    <div class="container">
            <br><br><br><br><br>
            <div class="well"><b>My Cart</b></div>
    </div>

<div class="col-sm-8">
    <table class="table">
        <thead >
            <tr>
                <th scope="col">Sr.no</th>
                <th scope="col">Item Name</th>
                <th scope="col">Item Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>      
            </tr>
        </thead>
        <tbody >
            <?php 
                if(isset($_SESSION['cart']))
                {
                foreach($_SESSION['cart'] as $key => $value)
                {
                    $sr=$key+1;
                    echo"
                    <tr>
                        <td>$sr</td>

                        <td>$value[Item_Name]</td>

                        <td>$value[Price]<input name='Item_Name' class='iprice' type='hidden' value='$value[Price]'></td>

                        <td>
                            <form action='manage_cart.php' method='POST'>
                                <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
                                <input name='Item_Name' type='hidden' value='$value[Item_Name]'>
                            </form
                        </td>

                        <td class='itotal'></td>

                        <form action='manage_cart.php' method='POST'>
                            <td><button name='Remove_Item' class='btn btn-sm btn-danger'>Remove</button></td>
                            <input name='Item_Name' type='hidden' value='$value[Item_Name]'>
                        </form>
                    </tr>
                    ";
                    }
                }
            ?>
    </tbody>
</table>
    </div>
    <label style="margin-left: 30px;" for="">Continue Shopping :</label>
    <select class="btn btn-sm" onchange="location=this.value;">
                    <option value="">Select :<span class="glyphicon glyphicon-chevron-down"></span></option>
                    <option value="electronics.php">Electronics</option>
                    <option value="fashion.php">Fashion</option>
    </select>
    <br><br>
    <div class="col-sm-4">
        <div class="panel">
            <div class="panel-heading">
            <h3><b>Total :</b></h3>
            <h3 id="gtotal"></h3>
            <br>
            <?php 
                if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
                {
            ?>
            <form method="POST" action="purchase.php">
                <div class="form-group">
                    <label for="">Name :</label>
                    <input type="text" name="name" class="form-control" required>
                        <br>
                    <label for="">Mobile Number :</label>
                    <input type="number" name="contact" class="form-control" required>
                        <br>
                    <label for="">Address :</label>
                    <input type="text" name="address" class="form-control" required>
                </div>
                <div class="form-check">
                    <input type="radio" name="pay_mode" value="COD" class="form-check-input">
                    <label class="form-check-label" for="">Cash On Delivery</label>
                </div>
                    <br>
                <button type="submit" name="purchase" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-briefcase"> </span> Buy</button>
                </form>
            <?php 
            }?>
            </div>
        </div>
    </div>
        <!-- Cart body ends -->
<script>
    var gt=0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');
    function subTotal()
    {
        gt=0;
        for(i=0;i<iprice.length;i++)
        {
            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
            gt = gt+(iprice[i].value)*(iquantity[i].value);
        }
        gtotal.innerText=gt;
    }
        subTotal();
</script>

</body>
</html>

