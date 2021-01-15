
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
  header('location:loginseller.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<link rel="stylesheet" href="agriculture/style.css">
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
           
            <li><a href="project/seller/logoutseller.php">Logout</a></li>
            <?php }else{ ?>
            <li><a href="project/seller/loginseller.php">Login</a></li>
            <li><a href="project/seller/registerseller.php">Register</a></li> 
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
               <h5 class="card-title"><%=user.name%></h5>
               <p class="card-text">welcome to the FarmFood</p>
               <a href="#" class="btn btn-primary"><%=user.email%></a>
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
                           hey <%=user.name%>
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