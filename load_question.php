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


if (isset($_POST['submit_details'])) {
    
    $cat_name =  $_POST['cat_name'];
    $exam_name=  $_POST['exam_name'];
    // setting name to session 

    $_SESSION['cat_name'] =  $_POST['cat_name'];
    $_SESSION['exam_name'] =  $_POST['exam_name'];
    $_SESSION['table_name'] =  $_POST['cat_name'].$_POST['exam_name'];
    $_SESSION['answer_tbl_name'] =  "answer".$_POST['cat_name'].$_POST['exam_name'];

    // to get other exam details from the database
    


    
    # code...
}

    $sql = "SELECT * FROM exam_details WHERE cat_name = '$cat_name' AND exam_name = '$exam_name'";
     $result = $connection->query($sql);
     $row = mysqli_fetch_array($result);
     $_SESSION['exam_time'] = $row['time_for_exam'];
     $_SESSION['question_no'] = $row['total_question_no'];


$sql5 ="SELECT * FROM {$_SESSION['table_name']}";
$result = $connection->query($sql5);
$_SESSION['set_question'] =  mysqli_num_rows($result);


if(isset($_POST['submit']))
{


// setting up file and saving it
$filename=$_FILES['file']['name'];
$filetmp=$_FILES['file']['tmp_name'];
$fileExt= explode('.', $filename);
$fileActualExt= strtolower(end($fileExt));
$fileNewName=uniqid(''.true).".".$fileActualExt;
$fileDestination ='images/'. $fileNewName;
move_uploaded_file($filetmp,$fileDestination);


$sql4 ="SELECT * FROM {$_SESSION['table_name']}";
$result = $connection->query($sql4);
$count =  mysqli_num_rows($result);

$qno= $count+1;
$question=$_POST['question'];
$optionA=$_POST['A'];
$optionB=$_POST['B'];
$optionC=$_POST['C'];
$optionD=$_POST['D'];
$question_table =$_SESSION['table_name'];
$answer_table = $_SESSION['answer_tbl_name'];

// inserting question
$sql2="INSERT INTO {$question_table}(id, question, images) VALUES({$qno}, '$question', '$fileNewName') ";
$connection->query($sql2);



// inserting options of the above question
$sql3="INSERT INTO  {$answer_table}(answer, q_id) VALUES('$optionA', {$qno}), ('$optionB', {$qno}), ('$optionC', {$qno}), ('$optionD', {$qno})";
$connection->query($sql3);






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
                                    <h2 class="title text-center">ADD  QUESTIONS</h2>
                                
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


    <div class="bg-success"> <h5> Exam Category : <?php echo $_SESSION['cat_name']; ?> </h5>
    <h5 class="exam" data-id="<?php echo $_SESSION['exam_name']; ?>"> Exam name : <?php echo $_SESSION['exam_name']; ?> </h5>
    <h5 class="cat" data-id="<?php echo $_SESSION['cat_name']; ?>"> Time Duration : <?php echo $_SESSION['exam_time']; ?> minutes</h5>
    <h5> Number of Questions : <?php echo $_SESSION['question_no']; ?> </h5>
    <h5 id="question_set"> Number of Questions set : <?php echo $_SESSION['set_question'] ; ?> </h5>

    </div> 


<!-- <div class="form-group">
<label for="default" class="col-sm-2 control-label">Question Number</label>
 <div class="col-sm-10">
 <input type="text" maxlength="4" name="qno" class="form-control clid" id="classid"required="required">
</div></div> -->



<div class="form-group">
<label for="default" class="col-sm-2 control-label">Question</label>
 <div class="col-sm-10">
 <textarea name="question" class="form-control" required>
 </textarea>
</div></div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Image</label>
 <div class="col-sm-10">
<input type="file" name="file">
</div></div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">OPTION A</label>
 <div class="col-sm-10">
 <textarea name="A" class="form-control" required>
 </textarea>
</div></div>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">OPTION B</label>
 <div class="col-sm-10">
 <textarea name="B" class="form-control" required>
 </textarea>
</div></div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">OPTION C</label>
 <div class="col-sm-10">
 <textarea name="C" class="form-control" required>
 </textarea>
</div></div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">OPTION D</label>
 <div class="col-sm-10">
 <textarea name="D" class="form-control" required>
 </textarea>
</div></div>


               
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                        <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg ">
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
        <script src="js/load_question.js"></script>
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
