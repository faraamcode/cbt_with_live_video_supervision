<?php
session_start();
error_reporting(0);
include('includes/config.php');
// setting our variable to empty to avoid error
$exam_name= "";
$cat_name ="";
$message ="";

// check if sign in
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: admin.php"); 
    }
    else{


if (isset($_POST['submit_details'])) {
    
    $cat_name =  $_POST['cat_name'];
    $exam_name=  $_POST['exam_name'];
    // setting name to session 




    // to get other exam details from the database
    


    
    # code...
}

    $sql = "SELECT * FROM exam_details WHERE cat_name = '$cat_name' AND exam_name = '$exam_name'";
     $result = $connection->query($sql);
     $row = mysqli_fetch_array($result);
     $_SESSION['exam_time'] = $row['time_for_exam'];
     $_SESSION['question_no'] = $row['total_question_no'];
     $_SESSION['instructions'] = $row['instructions'];




if(isset($_POST['update']))
{
 
$category = $_POST['cat_name'];
$exam = $_POST['exam_name'];
$time = $_POST['time_for_exam'];
$q_number = $_POST['total_question_no'];
$instruct = $_POST['instructions'];
$message= "EXAM DETAILS UPDATED SUCCESSFULLY";

$sql = "UPDATE exam_details SET time_for_exam ={$time}, total_question_no = {$q_number}, instructions= '$instruct'  WHERE exam_name = '$exam' AND cat_name ='$category'";

$connection->query($sql);
// resseting the input values  

$sql2 = "SELECT * FROM exam_details WHERE cat_name = '$category' AND exam_name = '$exam'";
$result = $connection->query($sql2);
$row = mysqli_fetch_array($result);
$_SESSION['exam_time'] = $row['time_for_exam'];
$_SESSION['question_no'] = $row['total_question_no'];
$_SESSION['instructions'] =$row['instructions'];
$cat_name= $category;
$exam_name = $exam;




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
                                    <h2 class="title text-center">ADD MATHEMATICS QUESTIONS</h2>
                                
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

    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <h4 class="bg-success"> <?php echo $message; ?></h4>
   <h4 class="bg-info">Exam Category:  <?php echo $cat_name; ?> </br>
   Exam Name:  <?php echo $exam_name; ?>
   </h4>
  
  <input type="hidden" value="<?php echo $cat_name; ?>" name ="cat_name">                                                  

 <input type="hidden" name="exam_name"  value="<?php echo $exam_name; ?>">


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Time Duration</label>
 <div class="col-sm-10">
 <input type="number" name="time_for_exam" class="form-control" required="required" maxlength="4" value="<?php echo $_SESSION['exam_time']; ?>">
</div></div>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Number of Questions</label>
 <div class="col-sm-10">
 <input type="number" name="total_question_no" class="form-control" required="required" maxlength="4" value="<?php echo $_SESSION['question_no']; ?>">
</div></div>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Instructions and Passage</label>
 <div class="col-sm-10">
 <textarea name="instructions" class="form-control" required="required"> <?php echo $_SESSION['instructions']; ?>
 </textarea>
</div></div>



               
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                        <input type="submit" name="update" value="UPDATE" class="btn btn-primary btn-lg ">
                                                        </div>
                                                    </div>
                                                </form>

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
        <script src="https://cdn.tiny.cloud/1/df5y5pzz1nwnxuzozukslb328erde5ygcjbt8ye0m3ht16f1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>


        <!-- /.main-wrapper -->
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
