<?php 
    session_start();
    include('connect.php');
    // browzer security start
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['purchase']))
    {
        $query1="INSERT INTO `order_manager`(`name`,`contact`,`address`,`pay_mode`) VALUES('$_POST[name]','$_POST[contact]','$_POST[address]','$_POST[pay_mode]')";
        if(mysqli_query($con,$query1))
        {
            $order_id = mysqli_insert_id($con);
            $query2 = "INSERT INTO `user_order`(`order_id`,`Item_Name`,`Price`,`Quantity`) VALUES (?,?,?,?)";
            $stmt = mysqli_prepare($con,$query2);
            if($stmt)
            {
                mysqli_stmt_bind_param($stmt,"isii",$order_id,$Item_Name,$Price,$Quantity);
                foreach($_SESSION['cart'] as $key => $values)
                {
                    $Item_Name = $values['Item_Name'];
                    $Price = $values['Price'];
                    $Quantity = $values['Quantity'];
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo"<script>
                alert('Order Placed');
                window.location.href='home.php';
                </script>";
            }
            else
            {
                echo"<script>
                alert('SQl prepare eror');
                window.location.href='cart.php';
                </script>";
            }

        }
        else
        {
            echo"<script>
            alert('SQl eror');
            window.location.href='cart.php';
            </script>";
        }
    }
    }
?>