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
<link rel="stylesheet" href="project/style.css">
    <title>Labour</title>
</head>

<body>
    <nav>
        <h4>FarmFood</h4>
        <ul>
        <li><a href="project/index.php">Home</a></li>
              <li><a href="project/labour/profilelabour.php">Profile</a></li>
              <li><a href="project/labour/addprofilelabour.php">ADD profile</a></li>
              <li><a href="project/labour/logoutlabour.php">Logout</a></li>
            <li><a href="project/labour/loginlabour.php">Login</a></li>
            <li><a href="project/labour/registerlabour.php">Register</a></li>
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