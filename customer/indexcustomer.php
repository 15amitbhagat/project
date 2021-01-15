
<?php
// Turn off error reporting
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="project/style.css">
    <title>Customer</title>
</head>
<body>

     <nav>
        <h4>FarmFood</h4>
        <ul>
        <?php if($_SESSION['user'] =='customer') { ?>
            <li><a href="project/index.php">Home</a></li>
            <li><a href="project/customer/profilecustomer.php">Profile</a></li>
            <li><a href="project/customer/buyproductcustomer.php">Buy Product</a></li>
            
            <li><a href="project/customer/logoutcustomer.php">Logout</a></li>
            <?php }else{ ?>
            <li><a href="project/customer/logincustomer.php">Login</a></li>
            <li><a href="project/customer/registercustomer.php">Register</a></li> 
          <?php }?>
            
        </ul>
    </nav>
    
    
    <div class="container mt-4">
        <div class="jumbotron">
  <h1 class="display-4">Index page of customer </h1>
  <p class="lead"> </p>
  <hr class="my-4">
  <p></p>
  <p class="lead">
   
  </p>
</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>