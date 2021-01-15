<?php
// Turn off error reporting
error_reporting(0);
?>

<?php 
    include 'database.php';

    if(isset($_POST['submit'])){
        extract($_POST);
      
        if($password == $passwordConfirm){
        $select = mysqli_query($conn,"SELECT * from farmer where email='$email' ");
        if(mysqli_num_rows($select)==0){
          // $pass =	password_hash($_POST['password'], PASSWORD_BCRYPT);
          $hash =  md5( $password) ;
        $insert =  mysqli_query($conn,"INSERT INTO farmer(name,email,password) VALUES('$name','$email','$hash')");
          if($insert){
            $success = 'Successfully Register!';
            header("refresh:5;location: loginfarmer.php");
          }
          else{
            $error = 'User  not registered!';
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
  <link rel="stylesheet" href="project/style.css">
  <title>Farmer Index</title>
</head>
<style>
  nav{
  background-color: rgb(15, 18, 19);
    color: white;
    padding: 30px 30px;
    display: flex;
    justify-content: space-between;
}
</style>
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
      <div class="card-header">Register Form</div>
      <div class="card-body">
        <!-- register for farmer will be registerf -->
         <form action="<?php echo $_SERVER['PHP_SELF']?>"  method="POST">
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
                  <a href="project/farmer/loginfarmer.php">Go to login Page!</a>
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