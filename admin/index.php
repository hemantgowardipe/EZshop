<?php
    session_start();

    if(isset($_POST['login']))
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if($user=='Hemant' && $pass='hemant@123')
        {
            $_SESSION['aname'] = $user;
            header('location:add.php');
        }
        else
        {
            echo "<script>
                alert('Invalid Entry');
            </script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <?php include('../bootcdn.php') ?>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-image: url('../images/background-login.png');
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
                            <h2> Admin Login</h2>
                        </div>
                        <div class="panel-body">
                            <label for="">Username :</label>
                            <input type="text" name="user" class="form-control" placeholder="username" require autofocus>
                            <br>
                            <label for="">Password :</label>
                            <input type="password" name="pass" class="form-control" require>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" name="login" class="btn-warning btn-block" style="color: black; padding:6px; border-radius:10px"> Login</button>
                            <br>
                            <p>
                                Go to <a href="../">User Panel</a>
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