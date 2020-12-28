<?php
session_start();
include('includes/config.php');
if (!empty($_SESSION['alogin'])) {
    header('Location: dashboard.php');

    # code...
}
// if($_SESSION['alogin']!=''){
// $_SESSION['alogin']='';
// }
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName='$uname' and Password='$password' LIMIT 1";

$results=$connection->query($sql);
if($row= mysqli_fetch_array($results))
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";

}

}

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icon.jpg">
    <link href="album.css" rel="stylesheet">

    <title>WELCOME TO ROEMICHS ONLINE CLASS</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
        <style>
            body{
    background:url('images/bg11.JPG');
    background-position: center;
    height: 100%;
    background-size: cover;
    background-repeat : no-repeat;
    opacity:0.8;
}
        </style>
    </head>
    <body>
        <div clas="container-fluid">
          <div class="row">
           <div class="col-lg-5 m-auto">
               <div class="card mt-4 bg-dark mx-auto " style="width: 20rem; margin-top: 50px;" >
                   <div class="card-title text-center mt-3">
                       <img src="images/logo.png" width ="50px" height="50px">
                       
                   </div>
                   <div class="card-body">
                       <form method="post" action="">
                           <div class="input-group mb-3">
                               <div class="input-group-prepend">
                                   <span class="input-group-text">
                                       <i class="fa fa-user fa-2x"></i>
                                       
                                   </span>
                                   
                                   
                               </div>
                               <input type="text" class="form-control py-4" name="username" placeholder="Enter application number">
                           </div>
                           <div class="input-group mb-3">
                               <div class="input-group-prepend">
                                   <span class="input-group-text">
                                       <i class="fa fa-lock fa-2x"></i>
                                       
                                   </span>
                                   
                                   
                               </div>
                               <input type="password" name="password" class="form-control py-4" placeholder="Enter your password">
                           </div>
                           <button class="btn btn-success" type="submit" name="login">Login</button>
                       </form>
                      
                   </div>
               </div>
             </div>  
           </div>
           
       </div>
       

 
    </body>
</html>
