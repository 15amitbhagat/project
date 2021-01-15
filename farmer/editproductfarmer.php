<?php
// Turn off error reporting
error_reporting(0);
?>
<?php 
session_start();
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location:loginfarmer.php');
}
?>

<?php 
    include 'database.php';
    session_start();
    $email = $_SESSION['email'];
    $fid = $_GET['fid'];
    $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from addfarmer where fid ='$fid' "));
    echo($row);

    if(isset($_POST['submit'])){
        extract($_POST);
        print_r($_POST);
        $fid = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from farmer where email = '$email'"))['id'];

        $filename = $_FILES["image"]["name"]; 
        $tempname = $_FILES["image"]["tmp_name"];     
            $folder = "image/".$filename; 
        
        $insert = mysqli_query($conn,"UPDATE addfarmer SET product_name = '$product_name', product_description='$product_description', product_quantity='$product_quantity',product_price='$product_price', category='$category',image='$filename'  where fid ='$fid' ");
        if($insert ){
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
    <link rel="stylesheet" href="agriculture/style.css">
    <title>Farmer Index</title>
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
    <section id="one"  class="wrapper style1 align-center"  >
    <div class="container ">
      
         <div class="container col-sm-12" id="mainform">
        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                                     
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">  <h4 >EDIT product </h4></div>
                </div> 
                <div class="panel-body" >
                    <form class="form-horizontal"  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">

                    
                        <div id="signupalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>
                        <div class="select-wrapper" style="width: auto" >
							  <select name="category" id="type" required style="background-color:white;color: black;">
								  <option value="" style="color: black;" >- Category -</option>
								  <option value="Fruit" style="color: black;" >Fruit</option>
								  <option value="Vegetable" style="color: black;">Vegetable</option>
								  <option value="Grains" style="color: black;">Grains</option>
							  </select>
						</div>
                        <div class="form-group">
                            <label for="product_name" class="col-md-3 control-label">Product Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['product_name']?>" name="product_name" id="product_name" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_description" class="col-md-3 control-label">Product Description</label>
                            <div class="col-md-9">
                               <textarea rows="3" cols="3" class="form-control"  value="<?php echo $row['product_description']?>" name="product_description" id="product_description" placeholder="Product Description"><?php echo $row['product_description']?>          
                            </textarea> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_quantity" class="col-md-3 control-label">Product Quantity</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" value="<?php echo $row['product_quantity']?>" name="product_quantity" id="product_quantity" placeholder="Product Quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_price" class="col-md-3 control-label">Product Price</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" value="<?php echo $row['product_price']?>" name="product_price" id="product_price" placeholder="Product price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_image" class="col-md-3 control-label">Product Image</label>
                            <div class="col-sm-9">
                                <img src="/project/image/<?php echo $row['image'];?>" width=200 height=200/>
                                <input class="form-control" type="file" name="image" accept=""/>
                            </div>
                        </div>                                
                        
                       
                        <div class="form-group">
                            <!-- Button -->                                       
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="submit" name="submit" class="btn btn-info"><i class="icon-hand-right"></i> Edit Product</button>
                                
                            </div>
                        </div>  
                    </form>
                    <?php if($error){?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $error;?>
                </div>
                <?php }?>

                <?php if($success){?>
                <div class="alert alert-success" role="alert">
                  <?php echo $success;?><br>
                  <a href="project/farmer/viewproductfarmer.php">Go to view product!</a>
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