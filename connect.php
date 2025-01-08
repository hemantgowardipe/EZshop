<?php
// function to connect server

    $con = mysqli_connect("localhost","root","");
    if($con)
    {
        mysqli_select_db($con,"ezshop");
        // echo "Yes connect...";
    }
?>