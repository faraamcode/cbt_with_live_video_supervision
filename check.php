<?php 
session_start();
include('includes/config.php');

// if(!isset($_SESSION['alogin'])){
// header('location: index.php');
// }

// $con = mysqli_connect('localhost', 'roemichs', 'roe*6018#');
// $selectdb = mysqli_select_db($con,'roemichs_srms');
$i=1;
$result=0;
if (!empty($_POST['examcheck'])) {
 $other =  $_POST['user'];
 $other_name =  $_POST['user_name'];
$question_tbl = $_POST['question_tbl'];
$count = count($_POST['examcheck']);
$choice=  $_POST['examcheck'];
$sql = "SELECT * FROM {$question_tbl} ";
 $query = $connection->query($sql);
 while ($ans= mysqli_fetch_array($query)) {

 	if(empty($choice[$i])){
 		$choice[$i] = 0;
 		
 	}

 	$correct = $ans['ans_id'] == $choice[$i];
 	
 	if ($correct) {
 		$result++;
 		# code...
 	}
 	$i++;
 	

 	
 }
 $user = $_SESSION['alogin'];
 
 $sql= "INSERT INTO results (admission, result, exam_name, name) VALUES ('$other', '$result', '$question_tbl', '$other_name')";
  $connection->query($sql);


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

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    </head>
  <body>
  	     <table class="table table-hover table-bordered table-center">
  	     	<thead> <tr>
  	     		        <th colspan="2" class="bg-dark">
  	     		        <h1 class="text-white" style="text-align:center;">You have succesfully submitted or your time is over</h1> 
  	     		        
  	     		        </th>

  	     		    </tr>
  	     		    <tr>
  	     		        <td><a href="logout.php" class="btn btn-danger">Logout</a></td>
  	     		        <td><a href="exampage.php" class="btn btn-danger">Go back</a></td>
  	     		    </tr>

  	     	</thead>
  	     	
  	     </table>

  	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
  </body>
</html>




 <?php
}
else echo "you have not select any question";
?>