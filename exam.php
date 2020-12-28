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


}else{
  header('location: exampage.php');
}



// $sq= "SELECT * FROM user WHERE username = '$user'";
// $result = $connection->query($sq);
// $row= mysqli_fetch_array($result);
//   # code...
// $action = $row['action'];

//     if ($action == 'attempted') {
//     header('location: exampage.php');  
//       # code...
//     }

    
   

  


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
     <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
      <style>
    
    
    #videos {
    position: relative;
    width: 100%;
    height: 100%;
    margin-left: auto;
    margin-right: auto;
}

#subscriber {
    position: absolute;
    left: 0;
    top: 0;
    width:200px;
    height: 19%;
    z-index: 10;
}

#publisher {
    position: absolute;
    width: 50%;
    height: 240px;
    bottom: 10px;
    left: 200px;
   
    z-index: 100;
    border: 3px solid white;
    border-radius: 3px;
}
        </style>
   <style type="text/css">
      .timer-wrap{
        width: 100%;
        float: left;
        background-color: #34495e;
        padding: 20px 0px;
        position: sticky;
        bottom: 0;
        right: 0;
      }
      .timer-wrap .time{
        display: none;

      }
      .timer-wrap .timer{
        font: bold 55px 'times new roman';
        color: #ffffff;
        margin: 10px auto 0px;
        text-align: center;
      }
      #animati{
        animation: leelaanimate 0.5s infinite;
      }
     @keyframes leelaanimate{
         0%{ color:red },
         10%{ color:blue },
         20%{ color: yellow },
         40%{ color: green },
         50%{ color: pink},
         60%{ color: orange},
         80%{ color: black},
         100%{ color: brown },
         
         

     }

    </style>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center text-primary " id="animati">Roemichs International Schools</h1>
      <h2 class="text-center text-danger"></h2>
      <div class="col-lg-8 m-auto d-block">
         <div class="card">
         <?php 
         $sql = "SELECT * FROM exam_details WHERE exam_name = '$exam_name' AND cat_name = '$cat_name' ";
         $result = $connection->query($sql);
         $row = mysqli_fetch_array($result);
         $question_no =  $row['total_question_no'];
         $exam_duration = $row['time_for_exam'];

         ?>
          <h3 class="text-center card-header"><?php echo $row['instructions']; ?></h3>


         </div><br>
         <form action="check.php" method="post">
         <input type="hidden" name="question_tbl" value="<?php echo $exam_details; ?>">
                  <input type="hidden" name="user" value="<?php echo $_SESSION['alogin']; ?>">
         <?php 
         for ($i=0; $i < 31; $i++) { 
           # code...
        
         $sql= "SELECT * FROM {$exam_details} WHERE id=$i";
         $query = $connection->query($sql);
         while($row = mysqli_fetch_array($query) ){



         ?>
         <div class="card">
           <h4 class="card-header"><?php echo $i; ?>. <?php echo $row['question']; ?></h4>

           <?php 
            $sq= "SELECT * FROM {$answer_details} WHERE q_id=$i";
            $query = $connection->query($sq);
            
            while ($rows = mysqli_fetch_array($query)) {
              ?>
              <div class="card-body">
                <input class="option-btn" data-id="<?php echo $i; ?>" type="radio" name="examcheck[<?php echo $i; ?>]" value="<?php echo $rows['id']; ?>">  <?php echo $rows['answer']; ?>
                
              </div>

           <?php } ?>
         </div>
         <?php   }?>
         <?php   }?>
<br><input type="submit" class="go btn btn-danger m-auto d-block" name="submit" class="" >
</form>
</div>


      <div class="m-auto d-block text-center">
      <a href="logout.php"><button class="btn btn-primary">Logout</button></a>
      </div><br>
      <div class="text-center text-white">
        <h5>Copyright © 2020 Roemichs ICT personnel</h5>
      </div>


    </div>

    <div class="timer-wrap">
      <i class="time">0:30:0</i>
      <div class="timer">
        <span class="hours">00:</span>
      <span class="minutes">00:</span>
      <span class="seconds">00</span>
      </div>
    </div>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <!-- javascri -->
    <script src="js/answered.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    
    <script src="assets/js/vendor/holder.min.js"></script>
    <script src="jquery.js"></script>
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
    </script>
    <script type="text/javascript">
      setTimeout(function(){
        $(".go").trigger('click');
      }, 2700000);
    </script>
  </body>
</html>