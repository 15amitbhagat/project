
<?php
// Turn off error reporting
error_reporting(0);
?>
<?php 
session_start();
?>

<?php 
session_start();
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location:loginfarmer.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="agriculture/style.css">
    <title>farmer</title>
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
        <div class="row">
            <div class="col-4">
              <div class="card" style="width: 18rem;">
                <div class="avatar-ctn">
                    <img src="./images/demo/batman.png" class="avatar" alt="user profile pic" />
                </div>
            <div class="card-body">
               <h5 class="card-title"><?php name ?></h5>
               <p class="card-text">welcome to the FarmFood</p>
               <a href="#" class="btn btn-primary">user.email</a>
            </div>
        </div>
            </div>
             <div class="col-8">
               <div class="card text-center">
                   <div class="card-header">
                       profile page
                   </div>
                   <div class="card-body">
                       <h5 class="card-title">
                           hey 
                       </h5>
                       <p class="card-text">
                           some random text
                       </p>
                       <a href="" class="btn btn-primary">go to next page</a>
                   </div>
                   <div class="card-footer text-muted">
                      FarmFood
                   </div>
               </div> 
            </div>
        </div>
        
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
        
</body>

</html>