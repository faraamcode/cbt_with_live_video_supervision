<?php
ob_start();
session_start();
include('includes/config.php');
if (empty($_SESSION['alogin'])) {
  header('Location: index.php');
  
  # code...
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

    <title>WELCOME TO ROEMICHS ONLINE ENTRANCE EXAM</title>

    <!-- Bootstrap core CSS -->
    <link
      rel="stylesheet"
      href="./fontawesome-free-5.12.1-web/css/all.min.css"
    />
    <!-- css -->
    <link rel="stylesheet" href="./css/exam.css" />

    </head>
  <body>

<!-- top bar  -->

<nav id="topbar">
  
  <div class="school-name">
   <h4>Roemichs International Schools</h4>
  </div>

  <div class="cbt-item">
   <h4> (Computer Based Test)</h4>
  </div>

</nav>
                 <?php 
                  $admission = $_SESSION['alogin'];
                 $sql =  "SELECT * FROM tblstudents WHERE admission = '$admission' LIMIT 1";
                 $result = $connection->query($sql);
                 $row =mysqli_fetch_array($result);

                 ?>
<!-- content -->


<section id="content">
  <div class="examiner-info">
    <div class="passport">
      <i class="fas fa-user"></i>
    </div>
    <div class="other-details">
      <div class="name">
        <h4>Name</h4>
        <p><?php echo $row['StudentName']." ".$row['surname']; ?></p>
      </div>

      <div class="sex">
        <h4>SEX</h4>
        <p><?php echo $row['Gender']; ?></p>
      </div>

      <div class="reg-no">
        <h4>admission</h4>
        <p><?php echo $row['admission']; ?></p>
      </div>

    </div>
    <div class="logout-btn">
        <a href="logout.php" class="logout">Logout</a>
    </div>
  </div>

  <div class="examination-info">

    <div class="exam-instructions">
     <h1>Instructions</h1>
     <h5>Read the instructions and the questions carefully and pick your answer(s) from the options provided.</h5>
     <h2>Timer</h2>
     <h5>The time is a black colored text at the top right corner of your screen</h5>
     <h5>This timer will count down to 0hr 0min 0sec. Once your time is up, the exam will submit itself automatically.</h5>
      <h2>Navigation</h2>
      <h5>You can move from one question to another in two ways:<br/>
        Previous and Next: There is  previous and next button on each question page. Click the previous button to see the question before your current question. Click the next button to see the question after your current question.
      <br/>Question Numbers: There is a colored numbers on each question page. You can click on any number to jump to that question number.      </h5>
     <h2>Submit</h2>
     <h5>There is a red submit button at  the bottom of every question page. Please click only when you wish to submit.</h5>
    </div>

    <div class="available-exam">
      <h1>Please Click on any of the exams to start</h1>
      <?php 

$sql= "SELECT * FROM  exam_details WHERE activation = 'activated'";
$result = $connection->query($sql);
while($row = mysqli_fetch_array($result)){




?>
    <a href="exam_design.php?exam_details=<?php echo $row['exam_name'];?>&cat_details=<?php echo $row['cat_name']; ?>" class="btn btn-success"><?php echo $row['exam_name']; ?></a>

<?php } ?>


    </div>

  </div>

</section>


         
  	     
  	       

  
       

  	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
  </body>
</html>
