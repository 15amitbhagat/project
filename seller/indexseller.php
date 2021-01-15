<?php
// Turn off error reporting
error_reporting(0);
?>
<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/">
    <link href="public/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="project/style.css">
    <title>Seller</title>
</head>
<body>
    
     <nav>
        <h4>FarmFood</h4>
        <ul>
        <?php if($_SESSION['user'] =='seller') { ?>
            <li><a href="project/index.php">Home</a></li>
            <li><a href="project/seller/profileseller.php">Profile</a></li>
            <li><a href="project/seller/addproductseller.php">Add Product</a></li>
            <li><a href="project/seller/viewtool.php">View Product</a></li>
            <li><a href="project/seller/logoutseller.php">Logout</a></li>
            <?php }else{ ?>
            <li><a href="project/seller/loginseller.php">Login</a></li>
            <li><a href="project/seller/registerseller.php">Register</a></li> 
          <?php }?>
        </ul>
    </nav>
    <div class="container mt-4">
        <div class="jumbotron">
  <h1 class="display-4">index page of seller</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <p></p>
  <p class="lead">
    
  </p>
</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>



