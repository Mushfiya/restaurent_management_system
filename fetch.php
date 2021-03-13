<?php 
  
  include "dbconnect.php";
  
  $output = '';
  if (isset($_POST["query"])) {
    
    $search= mysqli_real_escape_string($connection, $_POST["query"]);
    $query = "SELECT * FROM `foodlist`  WHERE FoodName LIKE '%" . $search . "%' OR FoodCategory LIKE '%" . $search . "%' OR Quantity LIKE '%".$search. "%' OR Price LIKE '%".$search. "%' OR Rating LIKE '%".$search."%'"; 

  }
  else
  {
  	$query=" SELECT * FROM `foodlist`";
  }

  $result = mysqli_query($connection, $query) or die('Error');

  if (mysqli_num_rows($result)>0) {






  	
  	echo "<thead> 
    <tr>
      <th scope='col'>Food Name</th>
      <th scope='col'>Food Category</th>
      <th scope='col'>Quantity</th>
      <th scope='col'>Price </th> 
      <th scope='col'>Rating</th>
    </tr>
  </thead>"; 
    while ($res = mysqli_fetch_assoc($result)) {
        echo "<tr><td>";
        echo $res['FoodName'];
        echo "</td><td>";
        echo $res['FoodCategory'];
        echo "</td><td>";
        echo $res['Quantity'];
        echo "</td><td>";
        echo $res['Price'];
        echo "</td><td>";
        echo $res['Rating'];
        echo "</td><td>";

        echo "<a class='bttn' href='foodupdate.php?ID=" . $res['ID'] . "'><button>EDIT</button></a>";
        echo "<a class='bttn' href='fooddelete.php?ID=" . $res['ID'] . "'><button>DELETE</button></a>";
        echo "</td></tr>";
        echo $output;
    }
  }
  else
  {
  	echo "no data found";
  }

        $query = "SELECT * FROM `users`";
        $search = mysqli_query($connection, $query);
        while ($res = mysqli_fetch_array($search)) {
          echo "<br>";
          $photoname=$res['image'];
          echo "username:".$res['Name'];
          echo "<br>";
          echo "<img src='photos/$photoname' height='300' width='100'>";
          echo "<br>";
        }



?>


