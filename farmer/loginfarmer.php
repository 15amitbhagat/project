<?php
// Turn off error reporting
error_reporting(0);
?>

<?php 
    include 'database.php';  
    session_start();
    if(isset($_POST['submit'])){
        extract($_POST);
    
      $passFetched = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from farmer where email='$email'"))['password'];
      if($passFetched==md5($password)){
        $_SESSION['email'] = $email;
        $_SESSION['user'] = 'farmer';
        header('location:addproductfarmer.php');
      }
      else
      $error = 'Email or password doesnt exist!';
    }
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
   
    <ul>
   
            <li><a href="project/index.php"><h2>Home</h2></a></li>
             <li><a href="project/farmer/loginfarmer.php"><h2>Login</h2></a></li>
            <li><a href="project/farmer/registerfarmer.php"><h2>Register</h2></a></li> 
         
    </ul>
  </nav>
  <div class="container mt-4">
    <div class="card">
      <div class="card-header">login</div>
      <div class="card-body">
        <!-- login  for farmer will be loginf -->
         <form action="<?php echo $_SERVER['PHP_SELF']?>"  method="POST">
                    
                    <div class="form-group">
                        
                        <input type="email" class="form-control" id="email" placeholder="email" name="email">
                    </div>
                    <div class="form-group">
                        
                        <input type="password" class="form-control" id="password" placeholder="password" name="password">
                    </div>
                   
                  
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </form>
                <?php if($error){?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $error;?>
                </div>
                <?php }?>
      </div>
    </div>
  
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
</body>
<?php 
require 'footer.php';
?>


</html>