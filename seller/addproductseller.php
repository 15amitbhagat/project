<?php
// Turn off error reporting
error_reporting(0);
?>

<?php 
session_start();
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location:loginseller.php');
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
        
        $fid = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from seller where email = '$email'"))['id'];
        $insert = mysqli_query($conn,"INSERT INTO addtool(id,product_name,product_description,product_quantity,product_price,category,image) 
        VALUES('$fid','$product_name','$product_description','$product_quantity','$product_price','$category','$filename')");
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
        <?php if($_SESSION['user'] =='seller') { ?>
         <li><a href="project/index.php">Home</a></li>
         <li><a href="project/seller/profileseller.php">Profile</a></li>
         <li><a href="project/seller/addproductseller.php">Add Product</a></li>
         <li><a href="project/seller/viewtool.php">View Product</a></li>
         
         <li><a href="project/seller/logoutseller.php">Logout</a></li>
         <?php }else{ ?>
         <li><a href="project/seller/loginseller.php">Login</a></li>
         <li><a href="project/seller/registerseller.php">Register</a></li> 
       <?php }?>
         
            
        </ul>
    </nav>
    <section id="one"  class="wrapper style1 align-center"  >
    <div class="container ">
      
         <div class="container col-sm-12" id="mainform">
        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                                     
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">  <h4 >ADD product </h4></div>
                </div> 
                <div class="panel-body" >
                    <form class="form-horizontal"  method="POST" action="<?php echo $_SERVER['PHP_SELF']?>"  enctype="multipart/form-data">

                    
                       
                        <div class="select-wrapper" style="width: auto" >
                        <label for="product_category" class="col-md-3 control-label">Product Category</label><br>
							  <select name="category" id="type" required style="background-color:white;color: black;">
								  <option value="" style="color: black;">- Category -</option>
								  <option value="tool" style="color: black;">tool</option>
								  <option value="seed" style="color: black;">seed</option>
								  <option value="fertilizers" style="color: black;">fertilizers</option>
							  </select>
						</div>
                        <div class="form-group">
                            <label for="product_name" class="col-md-3 control-label">Product Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_description" class="col-md-3 control-label">Product Description</label>
                            <div class="col-md-9">
                               <textarea rows="3" cols="3" class="form-control" name="product_description" id="product_description" placeholder="Product Description"></textarea> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_quantity" class="col-md-3 control-label">Product Quantity</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="product_quantity" id="product_quantity" placeholder="Product Quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_price" class="col-md-3 control-label">Product Price</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="product_price" id="product_price" placeholder="Product price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_image" class="col-md-3 control-label">Product Image</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" name="image" accept=""/>
                            </div>
                        </div>                                
                        
                       
                        <div class="form-group">
                            <!-- Button -->                                       
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="submit" name="submit" class="btn btn-info"><i class="icon-hand-right"></i> Add Product</button>
                                
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
                  <a href="project/seller/viewtool.php">Go to view product!</a>
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