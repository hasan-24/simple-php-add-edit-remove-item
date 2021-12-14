<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript"> 
    function display_c(){
    var refresh=1000;
    mytime=setTimeout('display_ct()',refresh)
    }

    function display_ct() {
    var x = new Date()
    document.getElementById('ct').innerHTML = x;
    display_c();
     }
    </script>

		<meta charset="utf-8">
		<title>Homepage- Stock Management System</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body onload=display_ct();>
    <div class="nav">
      <a style="float: right;" href="logout.php">Logout</a>
			<h4>Welcome <?php echo $_SESSION['username']; ?>! </h4> 
			<h8>Current Date and Time is: <span id='ct' ></span></h8>
    </div>
    <div class="nav2">
		<form method="POST" action="additem.php">
		    <label for="name">Product Name</label>
		    <input type="text" name="product_name">
		    <label for="name">Price</label>
		    <input type="text" name="price">
		    <label for="name">Quantity</label>
		    <input type="text" name="quant">
		    <button type="submit" name="add">Add item</button>
		</form>
    </div>


    <div class="nav2">
    <h4><u>Products</u></h4>
          <table>
            <thead>
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>                              
		        <?php 
               $conn = new mysqli("localhost:3308","root","","wt");
               $sql = "SELECT * FROM product";
               $result = $conn->query($sql);
					   $count=0;
               if ($result -> num_rows >  0) {
				  
                 while ($row = $result->fetch_assoc()) 
				        {
					   $count=$count+1;
            ?>
            <tr>
              <th><?php echo $count ?></th>
              <th><?php echo $row["product_name"] ?></th>
              <th><?php echo $row["price"]  ?></th>
              <th><?php echo $row["quantity"]  ?></th>
					    <th><a href="edit.php?id=<?php echo $row["product_id"] ?>">Edit</a> | <a href="delete.php?id=<?php echo $row["product_id"] ?>">Delete</a></th>
            </tr>
            <?php
              }
              }
            ?>
            </tbody>
          </table>
          </div>
	</body>
</html>