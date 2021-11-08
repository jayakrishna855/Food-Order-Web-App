<?php
 session_start();
 define('SITEURL','http://localhost/food-restaurant/');
 define('LOCALHOST','localhost');
 define('DB_USERNAME','root');
 define('DB_PASSWORD','Deena#95');
 define('DB_NAME','food-order');
 define('PORT',"8111");
  


  $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME,PORT) or die(mysqli_error($conn));
  $db_select=mysqli_select_db($conn,DB_NAME) or die(mysqli_error($conn));
?>