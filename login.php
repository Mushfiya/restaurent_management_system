<?php 
session_start();
include 'dbconnect.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
   if(isset($_POST['loginbtn']))
  {   
      $email=$_POST['email'];
      $password=$_POST['password'];

      $sql= "SELECT ID FROM `employee` WHERE Email='$email' AND Password='$password' ";

      $result=mysqli_query($connection,$sql); 
      $row= mysqli_fetch_array($result,MYSQLI_ASSOC); 

      $ID= $row['ID'];
      $_SESSION['user_ID']= $ID;

      //print($row['ID']);

      //$ID=$row['Name'];

      $count= mysqli_num_rows($result);
      if($count==1){
         header('location:foodboard.php');
        }
        else{
         echo "Invalid email and password";
        }
  } 
    
    if(isset($_POST['registerbtn']))
     {
         header('location:registeruser.php');
     }

}

?> 


<!DOCTYPE html>
<html>
  <head>  
    <title> LOGIN Form</title>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/bootstrap.css">
       <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="color.css">
  </head>
  <body>
    <img class="log">
    <div class="loginbox">
    <img src="avatar1.jpg" class="avatar">
    <h1>Login Here</h1>
    
    <form action="" method="POST">
    <p> Email ID</p>
    <input type="email" name="email" placeholder="Enter Email">
    <p> Password</p>
    <input type="password" name="password" placeholder="Enter Password"><br>
    
    <input type="submit" name="loginbtn" value="Login">
    <a href="#">Forget your password?</a><br>
    <a href="#">Don't have an acoount?</a>

   <input type="submit" name="registerbtn" value="Register">
    </form>
    </div>
    <script src="js/jquery-2.1.4.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/ajax-utils.js"></script>
      <script src="js/script.js"></script>
  </body>
</html>