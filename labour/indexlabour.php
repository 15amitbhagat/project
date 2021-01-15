<?php 
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
    <title>labour Index</title>
</head>

<style>
body {
  background-image: url('project/public/images/demo/indexlabour.jpg');  
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;

  
}

nav{
    background-color: rgb(186, 224, 238);
    color: white;
    padding: 30px 30px;
    display: flex;
    justify-content: space-between;
}

</style>
<body>
    
      <nav>
        <h4>FarmFood</h4>
        <ul>
        <?php if($_SESSION['user'] =='labour') { ?>
            <li><a href="project/index.php">Home</a></li>
            <li><a href="project/labour/profilelabour.php">Profile</a></li>
            <li><a href="project/labour/addproductlabour.php">Add Product</a></li>
            <li><a href="project/labour/viewlabourlabour.php">View Labour</a></li>
            <li><a href="project/labour/buytoollabour.php">Buy Tools</a></li>
            <li><a href="project/labour/logoutlabour.php">Logout</a></li>
            <?php }else{ ?>
            <li><a href="project/labour/loginlabour.php">Login</a></li>
            <li><a href="project/labour/registerlabour.php">Register</a></li> 
          <?php }?>
           
        </ul>
    </nav>
    <div class="container mt-4">
        <div class="jumbotron">
  <h1 class="display-4">Welcome to labour section</h1>
  <p class="lead">
    Here  labour can Add there profile, Update and Delete there profile .
  </p>
</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>