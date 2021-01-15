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

    if(isset($_POST['submit'])){
        extract($_POST);
        print_r($_POST);
        $filename = $_FILES["image"]["name"]; 
        $tempname = $_FILES["image"]["tmp_name"];     
            $folder = "../image/".$filename; 
        
        $fid = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from labour where email = '$email'"))['id'];
        $insert = mysqli_query($conn,"INSERT INTO add_labour(l_id,name,address,mobile_no,price_max,price_min,image) 
        VALUES('$fid','$name','$address','$mobile_no','$price_max','$price_min','$filename')");
        if($insert && move_uploaded_file($tempname, $folder) ){
            $success = 'Inserted successfully!';
        }
        else
        $error = 'Error in inserting!'; 

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
    <section id="one"  class="wrapper style1 align-center"  >
    <div class="container ">
      
         <div class="container col-sm-12" id="mainform">
        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                                     
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">  <h4 >ADD  </h4></div>
                </div> 
                <div class="panel-body" >
                    <form class="form-horizontal"  method="POST" action="<?php echo $_SERVER['PHP_SELF']?>"  enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label"> Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" id="name" placeholder=" Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-md-3 control-label"> address</label>
                            <div class="col-md-9">
                               <textarea rows="3" cols="3" class="form-control" name="address" id="address" placeholder=" address"></textarea> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile_no" class="col-md-3 control-label"> mobile_no</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="mobile_no" id="mobile_no" placeholder=" mobile_no">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price_max" class="col-md-3 control-label"> price_max</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="price_max" id="price_max" placeholder=" price_max">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price_min" class="col-md-3 control-label"> price_min</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="price_min" id="price_min" placeholder=" price_min">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-md-3 control-label"> Image</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" name="image" accept=""/>
                            </div>
                        </div>                                
                        
                       
                        <div class="form-group">
                            <!-- Button -->                                       
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="submit" name="submit" class="btn btn-info"><i class="icon-hand-right"></i> Add Profile</button>
                                
                            </div>
                        </div>  
                    </form>
                    <?php if($error){?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
                </div>
                <?php }?>

                <?php if($success){?>
                <div class="alert alert-success" role="alert">
                  <?php echo $success;?><br>
                </div>
                <?php }?>
                 </div>
            </div>
        </div>
    </div>

                       
                        
 
    </div>

    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>