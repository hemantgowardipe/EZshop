<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZShop-Home</title>
    <?php include('connect.php')?>
    <?php include('bootcdn.php')?>
    <style>
        /* Navbar start */
        /* Custom styles for premium look */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4; /* Light grey background */
        }
        .navbar {
            background:linear-gradient(105.75deg, rgb(249, 233, 216) 10.78%, rgb(186, 232, 255) 50.63%, rgb(188, 161, 255) 90.47%), linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), linear-gradient(0deg, rgb(255, 255, 255), rgb(255, 255, 255));; ; /* White background for navbar */
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
            /* Center align the login and cart buttons when the navbar collapses */
            .navbar-right {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        }
    /* Navbar css ends */
    /* Home CSS Start */
        body {
            font-family: 'Helvetica Neue', sans-serif;
            background:white;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Header Section start */
        .header {
            text-align: center;
            margin-bottom: 50px;
        }
        .header h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 10px;
            font-family: 'Times New Roman', Times, serif;
        }
        .header p {
            font-size: 18px;
            color: #777;
        }
    /* Header CSS ends */

    /* Scrollable Video Section start*/
        .video-section {
            position: relative;
            height: 700px;
            overflow: hidden;
        }
        .video-section video {
            position: absolute;
            top: 0%;
            left: 0%;
            min-width: 100%;
            max-height: 100%;
            border-radius: 10px;
            object-fit: cover;
            z-index: -1;
        }
        .video-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            z-index: 1;
        }
        .video-overlay h2 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .video-overlay p {
            font-size: 20px;
        }
        .video-overlay a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff5733;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
        }
    /* Scrollable Video Section start*/

    /* Carousel image section start */
        .carousel-container {
            max-width: 1200px;
            margin: 50px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .carousel .item {
            text-align: center;
            padding: 30px;
        }

        .carousel .item img {
            max-width: 100%;
            height: auto;
            display: inline-block;
            margin: 0 auto;
            border-radius: 16px;
            transition: transform 0.3s;
        }

        .carousel .item:hover img {
            transform: scale(1.05);
        }

        .carousel-indicators li {
            background-color: #000;
            border: none;
            margin: 4px;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            opacity: 0.6;
            transition: opacity 0.3s;
        }

        .carousel-indicators .active {
            background-color: #007bff;
            opacity: 1;
        }

        .carousel-indicators li:hover {
            opacity: 1;
        }
    /* Carousel image section ends */

    /* Search bar and darkmode button css start */
        body {
            transition: background-color 0.5s, color 0.5s;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .search-bar {
            position: relative;
            max-width: 50%;
            margin: 20px auto;
            text-align: center;
        }
        .search-bar input {
            width: 70%;
            padding: 12px 45px 12px 20px;
            border: 2px solid #007bff;
            border-radius: 10px;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }
        .search-bar input:focus {
            border-color: #0056b3;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
            outline: none;
        }
        .search-bar span {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 20px;
            color: #aaa;
            font-size: 14px;
            pointer-events: none;
            animation: fadeWords 6s infinite;
        }
        @keyframes fadeWords {
            0%, 20% { opacity: 1; }
            25%, 95% { opacity: 0; }
        }
        .dark-light-toggle {
            display: inline-block;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 10px;
            cursor: pointer;
            border: none;
            background-color: transparent;
            font-size: 18px;
            color: #555;
            padding: 5px;
            transition: color 0.3s, transform 0.3s;
        }
        .dark-light-toggle:hover {
            color: #007bff;
            transform: scale(1.1);
        }
        @media (max-width: 768px) {
            .search-bar {
                max-width: 100%;
            }
            .search-bar input {
                font-size: 14px;
                padding: 10px 40px 10px 20px;
            }
            .dark-light-toggle {
                font-size: 16px;
                right: 8px;
            }
        }
    /* Search bar and darkmode button css ends */

    /* Brand images css starts */
        body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .marquee {
      width: 100%;
      overflow: hidden;
      white-space: nowrap;
      box-sizing: border-box;
      background-color: #fff;
      padding: 20px 0;
      position: relative;
    }

    .marquee-content {
      display: flex;
      animation: marquee 5s linear infinite;
    }

    .marquee-content img {
      height: 150px;
      margin: 0 20px;
      vertical-align: middle;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      flex-shrink: 0;
    }

    @keyframes marquee {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-50%);
      }
    }

    @media (max-width: 768px) {
      .marquee-content img {
        height: 100px; /* Adjust image size for mobile */
      }
      .marquee-content {
        animation: marquee-mobile 5s linear infinite;
      }
    }

    @keyframes marquee-mobile {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-100%);
      }
    }
    /* Brand images css ends */

    /* Explore section css start */
        .button-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            width: 100%;
            max-width: 800px;
            gap: 20px;
            position: relative;
        }

        .circle-button {
            position: relative;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
            transition: transform 1s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.5s ease;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            perspective: 1000px;
            z-index: 1;
        }

        .circle-button img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 1s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .circle-button:hover {
            transform: rotateY(360deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            z-index: 2;
        }

        .circle-button:active {
            transform: scale(0.9);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .circle-button:hover img {
            transform: scale(1.3);
        }

        .circle-button .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            font-size: 18px;
            font-style: italic;
            font-weight: bold;
            transition: opacity 0.5s ease;
            text-align: center;
        }

        .circle-button:hover .overlay {
            opacity: 1;
        }

        .fade-out {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.8s ease;
        }

        .fade-out.active {
            visibility: visible;
            opacity: 1;
            background: inherit;
        }

        @media (max-width: 768px) {
            .circle-button {
                width: 140px;
                height: 140px;
            }

            .circle-button .overlay {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .button-container {
                flex-direction: column;
                align-items: center;
            }

            .circle-button {
                width: 120px;
                height: 120px;
            }
        }
    /* Explore section css ends */
        /* Home css ends */
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
            <a class="navbar-brand" href="#">EZShop </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class=""><a href="home.php"><b>Home</b></a></li>
                <!-- User profile button -->
                <li><a href="profile.php" class="login-btn"><span class="glyphicon glyphicon-user"></span></a></li>
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
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar ends -->

<!-- Home Section Start -->
     <!-- Header Section -->
     <div class="header">
        <br><br><br><br>
        <h1>Welcome to EZShop <?php echo $_SESSION['name']?></h1>
        <p>Find the best products that suit your needs.</p>
    </div>

    <!--  Search bar and darkmode button statrt  -->
    <div class="search-bar">
        <input type="text" placeholder="Search...">
        <span id="placeholder-text">Trending Now...</span>
        <button class="dark-light-toggle" id="toggle-theme">&#9728;</button>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        const words = ["Trending Now...", "Latest News", "Popular Products", "Top Brands", "Deals of the Day"];
        let currentIndex = 0;

        function changeWords() {
            currentIndex = (currentIndex + 1) % words.length;
            $('#placeholder-text').text(words[currentIndex]);
        }

        setInterval(changeWords, 3000);

        $('#toggle-theme').on('click', function() {
            const isDarkMode = $('body').hasClass('dark-mode');
            $('body').toggleClass('dark-mode', !isDarkMode).css({ 
                backgroundColor: isDarkMode ? '#ffffff' : '#000000', 
                color: isDarkMode ? '#000000' : '#ffffff' 
            });
            $(this).html(isDarkMode ? '&#9728;' : '&#9790;'); // Toggle icons
        });
    </script>
      <!-- Search bar and darkmode button ends -->


    <!-- Carousel Images section start -->
    <div class="carousel-container">
        <div id="ecommerceCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#ecommerceCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#ecommerceCarousel" data-slide-to="1"></li>
                <li data-target="#ecommerceCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="media/fashion-poster.jpg" alt="Product 1">
                </div>
                <div class="item">
                    <img src="media/winter_sale.png" alt="Product 2">
                </div>
                <div class="item">
                    <img src="media/beauty-product.jpg" alt="Product 3">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#ecommerceCarousel').carousel({
                interval: 3000 // Automatic scroll interval in milliseconds
            });
        });
    </script>
    <!-- Carousel images section ends -->

    <!-- Scrollable Video Section start -->
     <br><br>
   <div class="container-fluid">
   <div class="video-section">
        <video autoplay muted loop id="backgroundVideo">
            <source src="media/sale.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="video-overlay">
            <h2>Premium Shopping Experience</h2>
            <p>Discover the best products curated just for you.</p>
            <a href="">See More</a>
        </div>
    </div>
   </div>
   <br><br>
   <!-- Scrollable Video Section ends-->

    <!-- Brand section start -->
<div class="container-fluid">
<div class="marquee">
    <div class="marquee-content">
    <img src="media/realme-mobile-logo-icon.png" alt="Image 1">
      <img src="media/gucchi.png" alt="Image 2">
      <img src="media/apple-icon.png" alt="Image 3">
      <img src="media/xiaomi-mi-logo-icon.png" alt="Image 4">
      <img src="media/nvidia-icon.png" alt="Image 5">
      <img src="media/intel-icon.png" alt="Image 1">
      <img src="media/ck.png" alt="Image 2">
      <img src="media/asus-icon.png" alt="Image 3">
      <img src="media/armani.png" alt="Image 4">
      <img src="media/hp-icon.png" alt="Image 5">
    </div>
  </div>
    <br><br>
    </div>
    <!-- Brand section ends -->
    <br><br>

    <!-- Explore section start -->
        <div class="container-fluid">
        <div class="button-container">
        <a href="electronics.php" class="circle-button" aria-label="Explore Nature">
            <img src="media/gadgets.png" alt="Explore Nature">
            <div class="overlay">Electronics</div>
        </a>
        <a href="fashion.php" class="circle-button" aria-label="Travel the World">
            <img src="media/shopping-bag.png" alt="Travel the World">
            <div class="overlay">Clothing & Fashion</div>
        </a>
    </div>

    <div class="fade-out" id="fadeOutEffect"></div>

    <!-- JavaScript for advanced animations -->
    <script>
        const fadeOutEffect = document.getElementById('fadeOutEffect');

        document.querySelectorAll('.circle-button').forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                fadeOutEffect.style.background = window.getComputedStyle(document.body).background;
                fadeOutEffect.classList.add('active');

                setTimeout(() => {
                    window.location.href = button.getAttribute('href');
                }, 800); // Wait for fade-out effect to complete
            });
        });
    </script>
        </div>
    <!-- Explore section ends -->
<!-- Home Section Ends -->

</body>
</html>