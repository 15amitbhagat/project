<?php
// Turn off error reporting
error_reporting(0);
?>


<?php

session_start();
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location:logincustomer.php');
}
include 'database.php';

$email = $_SESSION['email'];
$sql = mysqli_query($conn,"SELECT * from addfarmer");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <base href="/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="project/style.css">
    <title>Farmer </title>
</head>
<body>
     <nav>
        <h4>FarmFood</h4>
        <ul>
               <li><a href="project/customer/profilecustomer.php">Profile</a></li>
               <li><a href="project/customer/buyproductcustomer.php">Buy Product</a></li>
               <li><a href="project/customer/logoutcustomer.php">Logout</a></li> 
       </ul>
    </nav>
    <div class="container mt-4">
        <div class="jumbotron">
  <h1 class="display-4">Buy Product</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <div class="row">
  <?php while($row = mysqli_fetch_assoc($sql)){?>
    <div class="col-3">
    <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="../project/image/<?php echo $row['image'];?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['product_name']?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Description: <?php echo $row['product_description'];?></li>
    <li class="list-group-item">Price: <?php echo $row['product_price'];?></li>
    <li class="list-group-item">Quantity: <?php echo $row['product_quantity'];?></li>
  </ul>
  <div class="card-body">
  
    <a href="project/customer/payment.php?fid=<?php echo $row['fid']?>" class="card-link">Buy</a>
  </div>
</div>
    </div>
  <?php } ?>
  </div>
</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>