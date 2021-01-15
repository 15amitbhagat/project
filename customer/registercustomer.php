<?php
// Turn off error reporting
error_reporting(0);
?>

<?php 
    include 'database.php';

    if(isset($_POST['submit'])){
        extract($_POST);
        if($password == $passwordConfirm){
        $select = mysqli_query($conn,"SELECT * from customer where email='$email' ");
        if(mysqli_num_rows($select)==0){
          $hash =  md5( $password) ;
        $insert =  mysqli_query($conn,"INSERT INTO customer(name,email,password) VALUES('$name','$email','$hash')");
          if($insert){
            $success = 'Successfully Register!';
            header("refresh:5;location: loginc.php");
          }
          else{
            $error = 'Product not registered!';
          }
      }
        else
        $error = 'This email id already registered!';
    }
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
    <link rel="stylesheet" href="project/style.css">
  <title>customer Index</title>
</head>

<body>

  <nav>
    <h4>FarmFood</h4>
    <ul>
    <li><a href="project/index.php">Home</a></li>
    <li><a href="project/customer/registercustomer.php">Register</a></li>         
     <li><a href="project/customer/logincustomer.php">Login</a></li>
    </ul>
  </nav>
  <div class="container mt-4">
    <div class="card">
      <div class="card-header">Register Form</div>
      <div class="card-body">
        <!-- register for customer will be registerc -->
         <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="form-group">
                        
                        <input type="text" class="form-control" id="name" placeholder="name" name="name">
                    </div>
                    <div class="form-group">
                        
                        <input type="email" class="form-control" id="email" placeholder="email" name="email">
                    </div>
                    <div class="form-group">
                        
                        <input type="password" class="form-control" id="password" placeholder="password" name="password">
                    </div>
                     <div class="form-group">
                        
                        <input type="password" class="form-control" id="passwordConfirm" placeholder="confirm  password" name="passwordConfirm">
                    </div>
                  
                    <button type="submit" name="submit" class="btn btn-primary">Register User</button>
                </form>
                <?php 
               
               if($error){?>
               <div class="alert alert-danger" role="alert">
                 <?php echo $error;?>
               </div>
               <?php }?>

               <?php if($success){?>
               <div class="alert alert-success" role="alert">
                 <?php echo $success;?><br>
                 <a href="project/customer/logincustomer.php">Go to login Page!</a>
               </div>
               <?php }?>
      </div>
    </div>

 
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
</body>

</html>