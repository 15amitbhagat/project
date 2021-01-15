<?php

include 'database.php';
session_start();
$email = $_SESSION['email'];

mysqli_fetch_assoc(mysqli_query($conn,"SELECT product_name,product_description,product_quantity,product_price,image,category from addfarmer"));


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <base href="/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="agriculture/style.css">
    <title>Farmer </title>
</head>
<body>
    
     <nav>
        <h4>FarmFood</h4>
        <ul>
        <li><a href="agriculture/index.php">Home</a></li>
             <li><a href="agriculture/profilef.php">Profile</a></li>
             <li><a href="agriculture/addproductf.php">Add Product</a></li>
             <li><a href="agriculture/viewproductf.php">View Product</a></li>
             <li><a href="agriculture/viewlabourf.php">View Labour</a></li>
             <li><a href="agriculture/buytoolf.php">Buy Tools</a></li>
             <li><a href="agriculture/logoutf.php">Logout</a></li>
         
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
  <img class="card-img-top" src="./agriculture/image/<?php echo $row['image'];?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['product_name']?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Description: <?php echo $row['product_description'];?></li>
    <li class="list-group-item">Price: <?php echo $row['product_price'];?></li>
    <li class="list-group-item">Quantity: <?php echo $row['product_quantity'];?></li>
  </ul>
  <div class="card-body">
    <a href="agriculture/editproductf.php?fid=<?php echo $row['fid']?>" class="card-link">Edit Product</a>
    <a href="#" class="card-link">Delete Product</a>
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