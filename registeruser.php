<?php

include 'dbconnect.php';
$err_Name = $err_Password = $err_Email = $err_OrderConfirm = $err_valid_Email = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST['Name'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];
    $OrderConfirm = $_POST['OrderConfirm'];
    $image = $_FILES['image']['name'];
    $target = "photos/".basename($image);
    if ($Name == "") {
        $err_Name = "your username is empty";
    } elseif (empty($Password)) {
        $err_Password = "your password is empty";
    } elseif ($Email == "") {
        $err_Email = "your email is empty";
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $err_valid_Email = "your email is Invalid";
    } elseif ($OrderConfirm == null) {
        $err_OrderConfirm = "your order is empty";
    } else {
        $sql = "INSERT INTO `users` (`Name`, `Password`, `Email`, `OrderConfirm`,`image`) VALUES ('$Name', '$Password', '$Email', '$OrderConfirm','$image')";

        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
            echo "";
        }

        mysqli_query($connection, $sql);
        echo "Successfuly Added";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        .container {
            margin: 0;
            padding: 30px;
            background: url("food2.jpg");
            background-size: cover;
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <h2>Add New Users</h2>
    <form class="container" method="POST" action="" enctype="multipart/form-data">
        <label>Name</label>
        <input type="text" name="Name"> <br><br>
        <span><?php echo $err_Name ?></span><br>
        <label>Password</label>
        <input type="text" name="Password"> <br><br>
        <span><?php echo $err_Password ?></span><br>

        <label>Email</label>
        <input type="text" name="Email"><br><br>
        <span><?php echo $err_Email ?></span><br>
        <span><?php echo $err_valid_Email ?></span><br>

        <label>Order Confirm</label>
        <input type="number" name="OrderConfirm"><br><br>
        <span><?php echo $err_OrderConfirm ?></span><br>
        <label>Image</label>
        <input type="file" name="image"><br><br>
        <input type="submit" name="save" value="Save">
        <button><a href="logout.php">Back</a></button>
    </form>
</body>

</html>