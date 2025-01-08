<?php
     session_start();
     include('connect.php');
     if(!empty($_SESSION['id']))
     {
        header('location:home.php');
     }

    if(isset($_POST['login']))
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sql = mysqli_query($con,"SELECT * FROM `register` WHERE `email` = '$user' AND `pass` = '$pass' ");
        $row = mysqli_num_rows($sql);
        while($result = mysqli_fetch_assoc($sql))
        {
            // session used to fix the data 
           $_SESSION['id'] = $result['id'];
           $_SESSION['name'] = $result['name'];
        }
        if($row>0)
        {
            echo "<script>
                window.location.href='home.php';
            </script>";
        }
        else
        {
            echo "<script>
                alert('Invalid Username or Password')
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Page</title>
    <?php include('bootcdn.php') ?>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-image: url('images/background-login.png');
            background-attachment: fixed;
            background-size: cover;
        }
        
    </style>
</head>
<body>
    <div class="conatainer">
        <br><br><br><br>
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">
                <!-- user logi  form start -->
                 <form method="post">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Login</h2>
                        </div>
                        <div class="panel-body">
                            <label for="">Email :</label>
                            <input type="email" name="user" class="form-control" placeholder="email" require autofocus>
                            <br>
                            <label for="">Password :</label>
                            <input type="password" name="pass" class="form-control" require>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" name="login" class="btn-warning btn-block" style="color: black; padding:6px; border-radius:10px">Login</button>
                            <br>
                            <p>
                                Go to <span class="glyphicon glyphicon-hand-right"> </span> <a href="admin/">Admin Panel</a>
                            </p>
                            <p>
                                Not Registered? <span class="glyphicon glyphicon-hand-right"> </span>  <a href="register.php">Sign Up</a> here
                            </p>
                        </div>

                    </div>

                 </form>
                 <!-- user login form end -->
            </div>
        </div>
    </div>
    
</body>
</html>