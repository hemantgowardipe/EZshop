<?php 
    session_start();
    include('connect.php');
    // browzer security start
    if(empty($_SESSION['aname']))
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
    <title>Dashboard</title>
    <?php include('bootcdn.php')?>
    <style>
        /* Navbar css start */
        /* Custom styles for premium look */
        body {
            font-family: 'Poppins', sans-serif;
            background-color:gainsboro; /* Light grey background */
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
            background: linear-gradient(105.75deg, rgb(249, 233, 216) 10.78%, rgb(186, 232, 255) 50.63%, rgb(188, 161, 255) 90.47%), linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), linear-gradient(0deg, rgb(255, 255, 255), rgb(255, 255, 255));
            text-align: center;
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
            text-shadow: whitesmoke 2px 1px 1px;
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
        /* Navbar css end */
        body {
            background-color: #f8f9fa;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
        .dashboard-container {
            margin-top: 50px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background-color: #343a40;
            color: #fff;
            border-radius: 10px 10px 0 0;
            padding: 15px;
            text-align: center;
        }
        .card-body {
            padding: 25px;
            text-align: center;
        }
        .card-title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .card-icon {
            font-size: 40px;
            color: #6c757d;
            margin-bottom: 15px;
        }
        /* graph css start */
        body {
            background-color: #f8f9fa;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 20px;
        }
        .chart-container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px 0;
        }
        .chart-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
            text-align: center;
        }
        @media (max-width: 768px) {
            .chart-container {
                padding: 15px;
            }
            .chart-title {
                font-size: 16px;
            }
        }
        /* graph css ends */
    </style>
</head>
<body>

<!-- Navbar start -->
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
<!-- Navbar ends -->
<br><br><br>
<div class="container dashboard-container">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">Total Users</div>
                <div class="card-body">
                    <div class="card-icon">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <?php 
                        $sql = mysqli_query($con,"SELECT * FROM register");
                        $result = mysqli_num_rows($sql);
                    ?>
                    <div class="card-title" id="totalUsers"><?php echo $result?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">Total Products</div>
                <div class="card-body">
                    <div class="card-icon">
                        <span class="glyphicon glyphicon-th-large"></span>
                    </div>
                    <?php 
                        $sql = mysqli_query($con,"SELECT * FROM product UNION SELECT * FROM fashion");
                        $result = mysqli_num_rows($sql);
                    ?>
                    <div class="card-title" id="totalProducts"><?php echo $result ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">Products Purchased</div>
                <div class="card-body">
                    <div class="card-icon">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                    </div>
                    <?php 
                        $sql = mysqli_query($con,"SELECT * FROM user_order");
                        $result = mysqli_num_rows($sql);
                    ?>
                    <div class="card-title" id="totalPurchased"><?php echo $result?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">Total Sales</div>
                <div class="card-body">
                    <div class="card-icon">
                        <span class="glyphicon glyphicon-usd"></span>
                    </div>
                    <?php 
                        $sql = mysqli_query($con,"SELECT SUM(Price) as total_price FROM user_order");
                        $result = mysqli_fetch_assoc($sql);
                    ?>
                    <div class="card-title" id="totalSales"><?php echo $result['total_price']?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- sales graph start -->
<div class="container">
    <div class="chart-container">
        <div class="chart-title">Monthly Sales Performance</div>
        <canvas id="salesChart"></canvas>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        const ctx = document.getElementById('salesChart').getContext('2d');

        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(75, 192, 192, 0.4)');
        gradient.addColorStop(1, 'rgba(75, 192, 192, 0)');

        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September'],
                datasets: [{
                    label: 'Sales (in USD)',
                    data: [12000, 19000, 30000, 25000, 32000, 45000, 60000,0,12345],
                    backgroundColor: gradient,
                    borderColor: '#4bc0c0',
                    borderWidth: 2,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#4bc0c0',
                    pointHoverBackgroundColor: '#4bc0c0',
                    pointHoverBorderColor: '#ffffff',
                    pointRadius: 5,
                    pointHoverRadius: 7,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart'
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#333',
                        fontSize: 14
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            fontColor: '#666',
                            fontSize: 12
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: '#e9ecef'
                        },
                        ticks: {
                            fontColor: '#666',
                            fontSize: 12,
                            beginAtZero: true
                        }
                    }]
                },
                tooltips: {
                    enabled: true,
                    backgroundColor: '#4bc0c0',
                    titleFontColor: '#ffffff',
                    bodyFontColor: '#ffffff',
                    cornerRadius: 4,
                    xPadding: 10,
                    yPadding: 10
                }
            }
        });
    });
</script>

<!-- sales graph ends -->
</body>
</html>
