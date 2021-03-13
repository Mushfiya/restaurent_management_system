<?php
    include 'dbconnect.php';
    $yourID=$_GET['ID'];
    $sql = "SELECT * FROM `foodlist` WHERE ID=$yourID ";
    $result = $connection->query($sql);//execute the sql 

    while ($rows= $result->fetch_assoc()) {
    	$dbFoodName= $rows['FoodName'];
    	$dbFoodCategory= $rows['FoodCategory'];
    	$dbQuantity= $rows['Quantity'];
    	$dbPrice= $rows['Price'];
    	$dbRating= $rows['Rating'];
    }

     if($_SERVER['REQUEST_METHOD'] == 'POST')
     {
     	$FoodName=$_POST['FoodName'];
     	$FoodCategory=$_POST['FoodCategory'];
     	$Quantity=$_POST['Quantity'];
     	$Price=$_POST['Price'];
     	$Rating=$_POST['Rating'];
     	
     	$sql="UPDATE `foodlist` SET `FoodName`='$FoodName',`FoodCategory`='$FoodCategory',`Quantity`='$Quantity',`Price`='$Price',`Rating`='$Rating' WHERE `foodlist`.`ID`=$yourID";
     	//echo $sql;
     	mysqli_query($connection,$sql);
     	header('Location:foodboard.php');
     }
    //echo $result->username; 
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Edit FoodList</h3>
	<form method="POST" action="">
		<label>Food Name</label>
		<input type="text" name="FoodName" value="<?php echo $dbFoodName?>"> <br><br>

		<label>Food Category</label>
		<input type="text" name="FoodCategory" value="<?php echo $dbFoodCategory?>"> <br><br>

		<label>Quantity</label>
		<input type="text" name="Quantity" value="<?php echo $dbQuantity?>"><br><br>

		<label>Price</label>
		<input type="text" name="Price" value="<?php echo $dbPrice?>"><br><br>

		<label>Rating</label>
		<input type="text" name="Rating" value="<?php echo $dbRating?>"><br><br>

		<input type="submit" name="edit" value="Save Edit">
        <button><a href="logout.php">Back</a></button>
	</form>
</body>
</html>


