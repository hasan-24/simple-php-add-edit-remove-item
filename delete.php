<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }

$db = mysqli_connect('localhost:3308', 'root', '', 'wt');
if (isset($_GET['id']))
{
$result = mysqli_query($db,"DELETE FROM product WHERE product_id=".$_GET['id']);
if($result==true)
	echo "Deleted Sucessfully!";
header("Location:index.php");
}
?>