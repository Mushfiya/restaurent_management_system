<?php

  include 'dbconnect.php';
  $yourID=$_GET['ID']; 

  $sql="DELETE FROM `foodlist` WHERE `foodlist`.`ID` = $yourID; " ;  
  mysqli_query($connection,$sql);

  header('Location:Foodboard.php');

?>