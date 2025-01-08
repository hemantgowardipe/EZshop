<?php
    session_start();
    include('connect.php');
    if(empty($_SESSION['id']))
     {
        header('location:index.php');
     }
     if(isset($_POST['edit']))
     {
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $photo = $_FILES['photo']['name'];

        mysqli_query($con, "UPDATE register SET name='$name' , contact='$contact' , email='$email' , pass='$pass' , photo='$photo' WHERE id = '".$_SESSION['id']."' ");

        $dir = "media/";
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
        alert('Profile Updated') ;
        window.location.href='profile.php';
        </script>";

     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZshop-Edit Profile</title>
    <?php include('bootcdn.php')?>
    <style>
        /* Navbar Css start */
        .well {
            background-color: gainsboro;
            width: 100%;
            height: 80px;
        }
        .well a{
            color: black;
        }

        /*  Navbar css ends */
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

        .note{
            color: red;
        }

    </style>
</head>
<body>
    <!-- Navbar start -->
    <div class="container-fluid">
        <div class="well">
            <a href="profile.php"><span class="glyphicon glyphicon-menu-left"></span></a>
            <br><br><br>
            <marquee behavior="fast" direction="left"><h4 class="note">Note : Fill all the fields , do not fill only that field you want to update other it will not show full details in profile.</h4></marquee>
    </div>
    <!-- Navbar ends -->
    <hr>
    <div class="container">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-6">
            <form action="" method="post" enctype="multipart/form-data">
            <label for="">Username:</label>
                <input type="text" name="name" class="form-control" placeholder="" require autofocus>
                    <br>
            <label for="">Contact :</label>
                <input type="number" name="contact" class="form-control" require>
                    <br>
            <label for="">Email :</label>
                <input type="email" name="email" class="form-control" require>
                    <br>
            <label for="">Set Password :</label>
                <input type="text" name="pass" class="form-control" require>
                    <br>
            <label for="">Profile Image :</label>
                <input type="file" name="photo" class="form-control" >
                    <br>
            <button type="submit" name="edit" class="btn-warning btn-block" style="color: black; padding:6px; border-radius:10px">SUBMIT</button>
        </div>

            </form>
        </div>

    </div>
    
</body>
</html>