<!-- <?php 
//session_start();
// $user_ID= $_SESSION['user_ID'];
// if(!isset($user_ID) || empty($user_ID)){
// 	header('location:login.php');
// 	exit;
//} 

?>
 -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="">
	<style>
		.container{
			margin:0;
          padding:0;
          background:url("food4.jpg");
          background-size: cover;
          font-family: sans-serif;
		}
		.btn{
			border: none;
          outline:none;
          height:60px;
          background:#fb2525;
          color: #fff;
          font-size:28px;
          border-radius:30px;
		}
		.btn:hover
      {    cursor:pointer;
          background:#ffc107;
          color:#000;
      }
      .btn a{   
          text-decoration:none;
          font-size:12px;
          line-height:20px;
          color: black;
      }
      .btn a:hover
      {  
        color:blue;
      }
	</style>
</head>
<body>
 <div class="container">

	<center><h2>Thank you for login</h2>
	
			<label>Add new user</label>
			&nbsp; <button class="btn"><a href="registeruser.php">Add User</a></button>

			<h4><a href="logout.php">Logout</a></h4> 
		    <h4><a href="userprofile.php">Your Profile</a></h4> </center>
		   
		   <h3 style="color: white">Food List</h3> 












	<div class="card">
	  <div class="card-header">	    
		    <div class="form-group">
		    <input type="email" class="form-control" id="searchexampleInputEmail1" aria-describedby="emailHelp" placeholder="search">
		    </div>
	  </div>
		  <div class="card-body">
		  <table class="table table-hover table-primary" id="showresult"></table>
		  </div>
	</div>
           
 </div>
    
		    <div>
				<?php
                  include 'dbconnect.php';
			      $sql = "SELECT * FROM `users`";
			      $query = mysqli_query($connection, $sql);
			      while ($res = mysqli_fetch_array($query)) {
			        echo "<br>";
			        $photoname=$res['image'];
			        echo "username:".$res['Name'];
			        echo "<br>";
			        echo "<img src='photos/$photoname' height='300' width='100'>";
			        echo "<br>";
			      }

			    ?>
		    </div>


</body>
</html>


<script>
  $(document).ready(function() {

    load_data();

    function load_data(query) {
      $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {
          query: query
        },
        success: function(data) {
          $('#showresult').html(data);
        }
      });
    }
    $('#searchexampleInputEmail1').keyup(function() {
      var search = $(this).val();
      if (search != '') {
        load_data(search);
      } else {
        load_data();
      }
    });
  });
</script>