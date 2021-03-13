<?php
 

include 'dbconnect.php';
session_start();
$user_ID= $_SESSION['user_ID'];
if(!isset($user_ID) || empty($user_ID)){
	header('location:login.php');
	exit;
} 
//$user_ID= $_SESSION['user_ID'];
$sql="SELECT * FROM `employee` WHERE ID=$user_ID";
$result = $connection->query($sql);//execute the sql 

    while ($rows= $result->fetch_assoc()) {
    	$dbName= $rows['Name'];
    	$dbPassword= $rows['Password'];
    	$dbEmail= $rows['Email'];
    	$dbAge= $rows['Age'];
    	$dbDesignation= $rows['Designation'];
    	$dbSalary= $rows['Salary'];
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<style type="text/css">
	.log{  width:1366px;
          height:696px;
          
          }
      .loginbox{  width: 320px;
          height: 450px;
          background: #000;
          color: #fff;
          top:20%;
          left:36%;
          position:absolute;
          transform: translate{-50%,-50%}
          box-sizing: border-box;
          padding: 70px 30px;
          opacity:.7;
               }
    
    body{
    	margin:0;
          padding:0;
          background:url("food2.jpg");
          background-size: cover;
          font-family: sans-serif;
    }
    .avatar{
    	width: 100px;
          height: 100px;
          border-radius:50%;
          position:absolute;
          top:-14%;
          left:calc(50% - 50px);
    }

	</style>
</head>
<body>
 <img class="log">
    <div class="loginbox">
	<img src="avatar1.jpg" class="avatar">
	<h3><a href="foodboard.php">Back</a></h3>
	<!-- <h3><a href="logout.php"></a>Logout</h3> -->
	<div>
		<h4>Your Name: <?php echo $dbName; ?></h4>
	</div>

	<div>
		<h4>Your Password: <?php echo $dbPassword; ?></h4>
	</div>

	<div>
		<h4>Your Email: <?php echo $dbEmail; ?></h4>
	</div>

	<div>
		<h4>Your Age: <?php echo $dbAge; ?></h4>
	</div>

	<div>
		<h4>Your Designation: <?php echo $dbDesignation; ?></h4>
	</div>

	<div>
		<h4>Your Salary: <?php echo $dbSalary; ?></h4>
	</div>
  </fieldset>

</div>

</body>
</html>