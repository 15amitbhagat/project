<?php
// Turn off error reporting
error_reporting(0);
?>

<?php 
session_start();
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location:loginlabour.php');
}
?>

<?php

include 'database.php';
session_start();
$email = $_SESSION['email'];

$id = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from labour where email = '$email'"))['id'];
$select = mysqli_query($conn,"SELECT * from add_labour where id = '$id' ");


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
        <?php if($_SESSION['user'] =='labour') { ?>
            <li><a href="project/index.php">Home</a></li>
            
            <li><a href="project/labour/addprofilelabour.php">Add Profile</a></li>
            <li><a href="project/labour/viewprofilelabour.php">View Profile</a></li>
         
            <li><a href="project/labour/logoutlabour.php">Logout</a></li>
            <?php }else{ ?>
            <li><a href="project/labour/loginlabour.php">Login</a></li>
            <li><a href="project/labour/registerlabour.php">Register</a></li> 
          <?php }?>
         
        </ul>
    </nav>
    <div class="container mt-4">
        <div class="jumbotron">
  <h1 class="display-4">ViewLabour Profilet</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <div class="row">
  <?php while($row = mysqli_fetch_assoc($select)){?>
    <div class="col-3">
    <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="project/image/<?php echo $row['image'];?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['name']?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Address: <?php echo $row['address'];?></li>
    <li class="list-group-item">mobile_no <?php echo $row['mobile_no'];?></li>
    
    <li class="list-group-item">price_min <?php echo $row['price_min'];?></li>
    <li class="list-group-item">price_max <?php echo $row['price_max'];?></li>
  </ul>
  <div class="card-body">
  
    <a href="#" class="card-link">Update</a>
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