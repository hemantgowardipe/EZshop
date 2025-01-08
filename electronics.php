<?php
    session_start();
    include('connect.php');
    // browzer security start
    if(empty($_SESSION['id']))
     {
        header('location:index.php');
     }
    // browzer security end
    if (isset($_POST['buy'])) 
{
    
    $pdate = $_POST['pdate'];
    $userid = $_POST['userid'];
    $uname = $_POST['uname'];
    $pdtid = $_POST['pdtid'];
    $photo = $_POST['photo'];
    $price = $_POST['price'];
    $title = $_POST['title'];

    mysqli_query($con,"INSERT INTO purchase(pdate,userid,uname,pdtid,photo,price,title) VALUES('$pdate','$userid','$uname','$pdtid','$photo','$price','$title') ");

    echo "<script> 
    alert('Successfully Purchased new Product...');
    window.location.href='electronics.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZshop-Electronics</title>
    <?php include('connect.php')?>
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

        /* Electronics Css start */
        /* Updated modern styles */
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f9fa;
    }

    .well {
      text-align: center;
      background-color: white;
      border: none;
      font-size: 20px;
      font-family: cursive;
    }
    .well input{
        text-align: center;
    }
    .panel-heading img{
      width: 100%;
      height: 60%;
      justify-content: center;
      background-color: whitesmoke;

    }
    .panel-body {
      text-align: center;
      padding: 15px;
      font-size: 18px;
      font-weight: bold;
      margin-top: 10px;
      color: #333;
      margin-top: -10px;
    }
        /* Electronics Css ends */
    /* Search css start */
    /* Search css end */
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
<!-- Electronics Body start -->
<div class="container">
    <br><br><br><br><br><br>
    <div class="well"><b>Electronics</b>
</div>

    <!-- Search bar start -->
    <div class="container">
        <div class="row hidden-print">
            <form method="post">
                <div class="col-sm-10">
                    <input type="text" name="search" placeholder="Search" class="form-control" autofocus>
                </div>
                <div class="col-sm-2">
                    <button name="btn" type="submit" class="btn btn-warning">Search <span class="glyphicon glyphicon-search"></span></button>
                    <br><br>
                    <span><select class="btn btn-sm" onchange="location=this.value;">
                    <option value="">Select :<span class="glyphicon glyphicon-chevron-down"></span></option>
                    <option value="electronics.php">Electronics</option>
                    <option value="fashion.php">Fashion</option>
                    </select></span>

                </div>
            </form>
            <br><br><br><br><br>
        </div>
    </div>

    <!-- tabel start -->
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
          <tbody id="myTable">
            <?php
            if(isset($_POST['btn']))
            {
            echo"
                <thead>
                    <tr>
                    <th>PRODUCT ID</th>
                    <th>UPLOAD DATE</th>
                    <th>PRODUCT TITLE</th>
                    <th>PHOTO</th>
                    <th>PRICE</th>
                </tr>";
              $search = $_POST['search'];
            $sdata = mysqli_query($con,"SELECT * FROM product WHERE title LIKE '%".$search."%'" );
            while($row = mysqli_fetch_assoc($sdata))
            {
            ?>
            <tr>
              <td><?php echo $row['pid'] ?></td>
              <td><?php echo $row['udate'] ?></td>
              <td><?php echo $row['title'] ?></td>
              <td>
               <img src=" <?php echo 'media/'.$row['photo'] ?>" width="80px">
              </td>
              <td><?php echo $row['price'] ?></td>
            </tr>
            <?php 
            }}
            ?>
        </tbody>
        </thead>

      </table>
     </div>

    
    


    <!--  Search bar end -->
        <!-- Product Grid Section -->
    <?php 
      $sdata = mysqli_query($con,"SELECT * FROM product ORDER BY pid ");
      while($row = mysqli_fetch_assoc($sdata)) {  
    ?>
    
<div class="continer">
<div class="col-sm-3">
    <div class="panel">
      <div class="panel-heading">
        <img src="<?php echo 'admin/imgs/'.$row['photo'] ?>">
      </div>
      <div class="panel-body">
        <h3><?php echo $row['title']?></h3>
        <h4><?php echo "PRICE: ".$row['price'] ?>/-</h4></b>
      </div>
    <div class="panel-footer">
        <form method="post">
                <!-- hidden inputs starts -->
            <input type="hidden" name="pdate" value="<?php echo date('Y-m-d') ?>">
                
            <input type="hidden" name="userid" value="<?php echo $_SESSION['id'] ?>">
                
            <input type="hidden" name="uname" value="<?php echo $_SESSION['name'] ?>">
                
            <input type="hidden" name="pdtid" value="<?php echo $row['pid'] ?>">

            <input type="hidden" name="photo" value="<?php echo $row['photo'] ?>">

            <input type="hidden" name="price" value="<?php echo $row['price'] ?>">

            <input type="hidden" name="title" value="<?php echo $row['title'] ?>">
                <!-- hidden inputs ends -->
            <button type="submit" class="btn btn-info btn-block" name="buy">Buy Now</button>
        </form>
        <form action="manage_cart.php" method="post">
            <br>
            <button type="submit" class="btn btn-warning btn-block" name="add">Add To Cart</button>   
            <input type="hidden" name="Item_Name" value="<?php echo $row['title']?>" >
            <input type="hidden" name="Price" value="<?php echo $row['price']?>" >
      </form>
        </div>
    </div>
</div>
          <!-- Add more products with different data-price, data-popularity, and data-rating attributes -->
    </div>
      
      <?php
        }
      ?>
      

</div>

</div>


 <!-- Electronics Body ends -->

</body>
</html>
