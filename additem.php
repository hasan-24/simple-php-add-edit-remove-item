<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }

$item_name = "";
$item_price    = "";
$db = mysqli_connect('localhost:3308', 'root', '', 'wt');
if (isset($_POST['add'])) {
  echo "connect";
  $item_name=mysqli_real_escape_string($db, $_POST['product_name']);
  $item_price=mysqli_real_escape_string($db, $_POST['price']);
  $quant=mysqli_real_escape_string($db, $_POST['quant']);
    $query = "INSERT INTO product (product_name,price,quantity) 
  			  VALUES('$item_name','$item_price','$quant')";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully added.');</script>";
    }
    else{
        echo"<script>alert('An error occured.');</script>";
    }
  	header('location: index.php');
}
?>