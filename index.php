<?php
session_start();
include('includes/config.php');
// if (!empty($_SESSION['alogin'])) {
//     header('Location: exampage.php');

//     # code...
// }

if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=($_POST['password']);
$sql ="SELECT admission, surname FROM tblstudents WHERE admission='$uname' and surname= '$password' LIMIT 1";
$result= $connection->query($sql);
if($row = mysqli_fetch_array($result))
{
$_SESSION['alogin']=$_POST['username'];
$_SESSION['login']=$_POST['password'];
header('Location: exampage.php');
 
  
 
}else{
    echo "nooo";
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

    <title>WELCOME TO ROEMICHS 2020 ENTRANCE EXAM</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
        <style>
            body{
    background:  hsl(45, 100%, 96%);
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
                       <h5 class="text-center text-white">Roemichs CBT</h5>
                   </div>
                   <div class="card-body">
                       <form method="post" action="">
                           <div class="input-group mb-3">
                               <div class="input-group-prepend">
                                   <span class="input-group-text">
                                       <i class="fa fa-user fa-2x"></i>
                                       
                                   </span>
                                   
                                   
                               </div>
                               <input type="text" class="form-control py-4" name="username" autocomplete="on" value="<?php echo isset($uname) ? $uname : ''; ?>" placeholder="Enter your admission number">
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
       

     <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e9c36e069e9320caac5334d/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    </body>
</html>
