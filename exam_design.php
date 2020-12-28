<?php 
session_start();
include('includes/config.php');
if(empty($_SESSION['alogin'])){
header('location: index.php');
}
if(isset($_GET['exam_details'])){

$user = $_SESSION['alogin'];
$exam_details = $_GET['cat_details'].$_GET['exam_details'];
$answer_details = "answer".$exam_details;
$cat_name =$_GET['cat_details'];
$exam_name = $_GET['exam_details'];


$sql = "SELECT * FROM results WHERE admission ='$user' AND exam_name = '$exam_details' LIMIT 1";
$result = $connection->query($sql);
$row = mysqli_fetch_array($result);
if($row){
   header('location: exampage.php');  
}


}else{
  header('location: exampage.php');
}



    
   

  


?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icon.jpg">
    <link
      rel="stylesheet"
      href="./fontawesome-free-5.12.1-web/css/all.min.css"
    />
    <!-- css -->
    <link rel="stylesheet" href="./css/exam.css" />
  


    <title>WELCOME TO ROEMICHS ONLINE CLASS</title>



    <style>
    


    </style>
  </head>
  <body>
<!-- nav bar -->
<nav class="topbar">
  <div class="user-info">
  <i class="fas fa-user"></i>
  <span><?php echo $_SESSION['login']; ?></span>
  </div>

  <div class="subject">
    <span>Subject: <?php echo $exam_name; ?></span>
  </div>
  
  <div class="exam-time">
      <span class="hours">00:</span>
      <span class="minutes">00:</span>
      <span class="seconds">00</span>
    
  </div>

</nav>

<!-- getting exam details -->
<?php 
         $sql = "SELECT * FROM exam_details WHERE exam_name = '$exam_name' AND cat_name = '$cat_name' ";
         $result = $connection->query($sql);
         $row = mysqli_fetch_array($result);
         $question_no =  $row['total_question_no'];
         $exam_duration = $row['time_for_exam'];

         ?>

  
<!-- question section -->

<form action="check.php" method="post">
    <input type="hidden" id="question_no" value="<?php echo $question_no; ?>">
<input type="hidden" name="question_tbl" value="<?php echo $exam_details; ?>">
<input type="hidden" name="user" value="<?php echo $_SESSION['alogin']; ?>">
<input type="hidden" name="user_name" value="<?php echo $_SESSION['login']; ?>">

<section class="section-center section-question">
<?php 
         for ($i=0; $i <= $question_no ; $i++) { 
           # code...
        
         $sql= "SELECT * FROM {$exam_details} WHERE id=$i";
         $query = $connection->query($sql);
         while($row = mysqli_fetch_array($query) ){



?>
<div class="question-id" data-id="<?php echo $i; ?>">
<div class="single-question"  >

  <div class="question-no" >
    <h4 ><?php echo $i; ?></h4>
  </div>
  <div class="question ">
    <div class="question-text">
      <h4 class="card-header"> <?php echo $row['question']; ?></h4>      
    </div>
    <?php $string1 = "png";
    
    $string2 = "jpg";
    $string3 = "JPG";
    $string4 = "JPEG";
    $string5 = "jpeg";
    $image= $row['images'];
    if(strpos($image, $string1) !== false || strpos($image, $string2) !== false ){
    ?>
     <div class="question-image">
       <img src="./images/<?php echo $row['images']; ?>">
     </div>
     <?php  }?>
    </div>
             
    <?php 
            $sq= "SELECT * FROM {$answer_details} WHERE q_id=$i";
            $query = $connection->query($sq);
            
            while ($rows = mysqli_fetch_array($query)) {
              ?>
             <div class="question-options">
               <input type="radio" class="option" data-id="<?php echo $i; ?>" name="examcheck[<?php echo $i; ?>]" value="<?php echo $rows['id']; ?>">  <?php echo $rows['answer']; ?>
              </div>
              <?php } ?>
              <div class="extra"></div>
            </div>
            </div>
              <?php   }?>
              <?php   }?>



</section>
<!-- section for button -->

<section class="section-center section-button">
  <div class="prev-btn-container">
    <input type="button" class="prev-btn"  value="Previous"> 
  </div>
  <div class="next-btn-container">
    <input type="button" class="next-btn"  value="Next"> 
  </div>
  <div class="submit-btn">

  </div>
</section>

<!-- section for question numbers -->
<div class="section-center question-numbers">
  <div class="btn-container">

    
    <?php 
         for ($i=1; $i <= $question_no ; $i++) { 
           # code...
           
           
           ?>
        <a href="#<?php echo $i; ?>" class="btn btn-number" data-id="<?php echo $i; ?>"><?php echo $i; ?></a>
        
        
        <?php
         }
         ?>

</div>
</div>



      
  
  <input type="submit" class="go submit-btn" name="submit" value="submit">      

        

</form>




  

  
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
    <script src="jquery.js"></script>
    <script src="js/exam.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
      var time = <?php echo $exam_duration; ?>; //minutes time provided from database
      if(time > 60){
        hours = Math.floor(time/60);
        minutes = (time - (60*hours));
      }else{
        hours = 0;
        minutes = time;
      }
      seconds = 0;
      var test_counter = setInterval(function () {
        if(seconds < 1){
          if(minutes < 1){
            if(hours < 1){
              clearInterval(test_counter);
              alert('time up');
            }else{
              hours --;
              minutes = 59;
              seconds = 59;
            }
          }else{
            seconds = 59;
            minutes--;
          }
        }else{
          seconds--;
        }

        if(hours < 10){
          $('.hours').empty();
          $('.hours').append('0'+hours+':')
        }else{
          $('.hours').empty();
          $('.hours').append(hours+':')
        }
        if(minutes < 10){
          $('.minutes').empty();
          $('.minutes').append('0'+minutes+':')
        }else{
          $('.minutes').empty();
          $('.minutes').append(minutes+':')
        }
        if(seconds < 10){
          $('.seconds').empty();
          $('.seconds').append('0'+seconds)
        }else{
          $('.seconds').empty();
          $('.seconds').append(seconds)
        }
      }, 1000);
    })
    
    
    //check for Navigation Timing API support
if (window.performance) {
  console.info("window.performance works fine on this browser");
}
console.info(performance.navigation.type);
if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
  console.info( "This page is reloaded and your exam has been cancelled" );
  alert("This page is reloaded and your exam has been cancelled");
   $(".go").trigger('click');
} else {
  console.info( "This page is not reloaded");
}
    </script>
    <script type="text/javascript">
     const submitTime = parseInt(<?php echo $exam_duration * 60000; ?>);
     console.log(submitTime);
      setTimeout(function(){
        $(".go").trigger('click');
      }, <?php echo $exam_duration * 60000; ?>);
    </script>
  </body>
</html>