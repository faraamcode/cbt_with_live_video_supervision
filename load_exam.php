<?php
session_start();
error_reporting(0);
include('includes/config.php');
// setting our variable to empty to avoid error
$exam_name= "";
$cat_name ="";

// check if sign in
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: admin.php"); 
    }
    else{

$status = "";

if (isset($_POST['submit_details'])) {
    
    $cat_name =  $_POST['cat_name'];
    $exam_name=  $_POST['exam_name'];
    // setting name to session 

    $_SESSION['cat_name'] =  $_POST['cat_name'];
    $_SESSION['exam_name'] =  $_POST['exam_name'];
    $_SESSION['table_name'] =  $_POST['cat_name'].$_POST['exam_name'];
    $_SESSION['answer_tbl_name'] =  "answer".$_POST['cat_name'].$_POST['exam_name'];

    // to get other exam details from the database
    
    $sql = "SELECT * FROM exam_details WHERE cat_name = '$cat_name' AND exam_name = '$exam_name' LIMIT 1 ";
     $result1 = $connection->query($sql);
     $row = mysqli_fetch_array($result1);
     $_SESSION['exam_time'] = $row['time_for_exam'];
     $_SESSION['question_no'] = $row['total_question_no'];
     $qtn_total_no = $row['total_question_no'];
     $_SESSION['instructions'] = $row['instructions'];
     $quest_no = $row['total_question_no'];
     $status =$row['activation'];


    
    # code...
}





if(isset($_POST['update']))
{

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Roemichs Online Class </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        <script>

</script>


    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title text-center">ADD ANSWERS</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                       
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                           
                                            <div class="panel-body">


     <div class="bg-success"> <h5> Exam Category : <?php echo $_SESSION['cat_name']; ?> </h5>
    <h5> Exam name : <?php echo $_SESSION['exam_name']; ?> </h5>
    <h5> Time Duration : <?php echo $_SESSION['exam_time']; ?> minutes</h5>
    <h5> Number of Questions : <?php echo $qtn_total_no; ?> </h5>
    <h5> Instructions : <?php echo $_SESSION['instructions']; ?> </h5>
    <h5 id="table_details" data-id="<?php echo $_SESSION['table_name']; ?>"></h5>
    

    </div> 

   <div class="card">

   <?php for ($i=0; $i < $qtn_total_no + 1; $i++) { 
       
   $sql_ques = "SELECT * FROM {$_SESSION['table_name']} WHERE id = $i";
   $result= $connection->query($sql_ques);
   while ($row = mysqli_fetch_array($result)) {
       
       # code...
   ?>
<div class="question">
   <h5 class="card-header" data-id= "<?php echo $row['id']; ?>"><?php echo $i ; ?>.   <?php echo $row['question']; ?></h5>
  <img src="images/<?php echo $row['images']; ?> " class="img-responsive" style="align-item: center" width="400px" height="400px" alt="">
  <ol type="A">
  
   <?php

   $sql_option = "SELECT * FROM {$_SESSION['answer_tbl_name']} WHERE q_id = $i";
   $result_option = $connection->query($sql_option);
   while ($row_option = mysqli_fetch_array($result_option)) {


   ?>
<li style="margin-top: 5px;" data-id="<?php echo $row_option['id']; ?>" class="" > <?php echo $row_option['answer']; ?> </li>
<?php
  
   }
   
   ?>
    </ol>

    <?php   

$sql_correct = "SELECT * FROM {$_SESSION['answer_tbl_name']} WHERE q_id = $i AND id = {$row['ans_id']}";
     $result_correct = $connection->query($sql_correct);
     $correct = mysqli_fetch_array($result_correct);
     
    

    ?>
    <h5 class="bg-success">The correct answer: <?php  echo $correct['answer']; ?></h5>
  </div> 
   <?php 
   }
     # code...
   } ?>
  
   </div>
   

 <a class="btn btn-danger" id="activate" data-exam="<?php echo $exam_name; ?>" data-cat="<?php echo $cat_name; ?>">ACTIVATE</a>
                                               
   <a class="btn btn-info"  id="deactivate" data-exam="<?php echo $exam_name; ?>" data-cat="<?php echo $cat_name; ?>" >DEACTIVATE</a>
      <a class="btn btn-success"  id="status">Status:<?php echo $status; ?></a>
     


                                            </div>
                                              
   
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- textarea editor -->
        <script src='https://cdn.tiny.cloud/1/df5y5pzz1nwnxuzozukslb328erde5ygcjbt8ye0m3ht16f1/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>


        <!-- /.main-wrapper -->
        <script src="js/activate.js"></script>
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
              tinymce.init({
      selector: '#mytextarea'
    });	
        </script>
    </body>
</html>
<?PHP } ?>
