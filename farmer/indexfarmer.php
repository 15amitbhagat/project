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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="project/style.css">
    <title>Farmer </title>
</head>

<style>
body {
  background-image: url('project/public/images/demo/indexfarmer.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 80%;
}

nav{
  background-color: rgb(15, 18, 19);
    color: white;
    padding: 30px 30px;
    display: flex;
    justify-content: space-between;
}

h1 {text-align: center;
  color: black;}
h3 {text-align: center;
    color: black;}


</style>
<body class="indexfarmer">
    
     <nav>
        
        <ul>
        <li><a href="project/index.php"><h2>Home</h2></a></li>
            <?php if($_SESSION['user'] =='farmer') { ?>
            
            <li><a href="project/farmer/profilefarmer.php">Profile</a></li>
            <li><a href="project/farmer/addproductfarmer.php">Add Product</a></li>
            <li><a href="project/farmer/viewlabourfarmer.php">View Labour</a></li>
            <li><a href="project/farmer/buytoolfarmer.php">Buy Tools</a></li>
            <li><a href="project/farmer/logoutfarmer.php">Logout</a></li>
            <?php }else{ ?>
            <li><a href="project/farmer/loginfarmer.php"><h2>Login</h2></a></li>
            <li><a href="project/farmer/registerfarmer.php"><h2>Register</h2></a></li> 
          <?php }?>
        </ul>
    </nav>
    <div class="container mt-4">
        <div class="jumbotron">
      <h1>Welcome To Farmer Index Page</h1>
     <h3>Here Farmer can Add there product and <br> can buy Farm Tools, Seed ,Fertilizers 
       and Also get informatiom of the FARM labour</h3>
     
</div>
    </div>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <?php 
require 'footer.php';
?>
</body>

</html>

