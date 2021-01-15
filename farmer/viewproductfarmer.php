<?php
// Turn off error reporting
error_reporting(0);
?>

<?php 
session_start();
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location:loginfarmer.php');
}
?>

<?php

include 'database.php';
session_start();
$email = $_SESSION['email'];

$id = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from farmer where email = '$email'"))['id'];
$select = mysqli_query($conn,"SELECT * from addfarmer where id = '$id' ");


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
        <?php if($_SESSION['user'] =='farmer') { ?>
            <li><a href="project/index.php">Home</a></li>
            <li><a href="project/farmer/profilefarmer.php">Profile</a></li>
            <li><a href="project/farmer/addproductfarmer.php">Add Product</a></li>
            <li><a href="project/farmer/viewlabourfarmer.php">View Labour</a></li>
            <li><a href="project/farmer/buytoolfarmer.php">Buy Tools</a></li>
            <li><a href="project/farmer/logoutfarmer.php">Logout</a></li>
            <?php }else{ ?>
            <li><a href="project/farmer/loginfarmer.php">Login</a></li>
            <li><a href="project/farmer/registerfarmer.php">Register</a></li> 
          <?php }?>
         
        </ul>
    </nav>
    <div class="container mt-4">
        <div class="jumbotron">
  <h1 class="display-4">View Added Product</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <div class="row">
  <?php while($row = mysqli_fetch_assoc($select)){?>
    <div class="col-3">
    <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="project/image/<?php echo $row['image'];?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['product_name']?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Description: <?php echo $row['product_description'];?></li>
    <li class="list-group-item">Price: <?php echo $row['product_price'];?></li>
    <li class="list-group-item">Quantity: <?php echo $row['product_quantity'];?></li>
  </ul>
  <div class="card-body">
    <a href="project/farmer/editproductfarmer.php?fid=<?php echo $row['fid']?>" class="card-link">Edit Product</a>
    <a href="project/farmer/deleteproduct.php?fid=<?php echo $row['fid']?>" class="card-link">Delete Product</a>
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