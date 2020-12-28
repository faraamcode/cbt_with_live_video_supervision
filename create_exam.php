<?php 
session_start();
include("includes/config.php");
if(empty($_SESSION['alogin'])){
header('Location: index.php');
}
$message = "";
if (isset($_POST['create'])){
    $cat_name =  $_POST['cat_name'];
    $exam_name =  $_POST['exam_name'];
    $instructions =  $_POST['instructions'];
    $total_question_no =  $_POST['total_question_no'];
    $time_for_exam =  $_POST['time_for_exam'];

	// checking if exam name already exist on exam category selected
    $sql =  "SELECT * FROM exam_details WHERE cat_name = '$cat_name' AND exam_name = '$exam_name' ";
	$query = $connection->query($sql);
	$result = mysqli_fetch_array($query);
    
	if ($result) {
		$message = "Exam name already exist";
		# code...
	}else{
        $examtable = $cat_name.$exam_name;
        $answertable = "answer".$cat_name.$exam_name;
		$sql =  "INSERT INTO exam_details(cat_name, exam_name, time_for_exam, total_question_no, instructions) VALUES('$cat_name', '$exam_name', {$time_for_exam}, {$total_question_no}, '$instructions')";
        $query = $connection->query($sql);
          
        // creating table for questions
            $sql2 =  "CREATE TABLE {$examtable} (id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, question varchar(255), ans_id int(11), images varchar(255))";
            $query2 = $connection->query($sql2);

         // creating tables for answers
            $sql3 =  "CREATE TABLE {$answertable} (id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, answer varchar(255), q_id int(11))";
            $query3 = $connection->query($sql3);

            $message = " Exam created successfully";

            # code...
        
		
	}

	# code...
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
                                    <h2 class="title text-center">ADD EXAM CATEGORY</h2>
									<h2 class="bg-danger"><?php echo $message; ?></h2>
                                
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

                                                <form class="form-horizontal" method="post" action="">
                                                <div class="form-group">
<label for="default" class="col-sm-2 control-label">SELECT Exam Category</label>
 <div class="col-sm-10">
 <select name="cat_name" class="form-control clid" id="classid"required="required">
<option value="">SELECT CATEGORY</option>
<?php 

$sql= "SELECT * FROM cat_names";
$result = $connection->query($sql);
while($row = mysqli_fetch_array($result)){




?>
<option value="<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name']; ?></OPTION>
<?php } ?>

</select>

</div></div>

                                                    
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Exam name</label>
 <div class="col-sm-10">
 <input type="text" name="exam_name" class="form-control" required="required"  maxlength="20">
</div></div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Time Duration</label>
 <div class="col-sm-10">
 <input type="number" name="time_for_exam" class="form-control" required="required" maxlength="4">
</div></div>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Number of Questions</label>
 <div class="col-sm-10">
 <input type="number" name="total_question_no" class="form-control" required="required" maxlength="4">
</div></div>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Instructions and Passage</label>
 <div class="col-sm-10">
 <textarea name="instructions" class="form-control" required="required">
 </textarea>
</div></div>




                         




               
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="create"  class="btn btn-primary">Submit</button>
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
        <!-- /.main-wrapper -->
        
        <script src="https://cdn.tiny.cloud/1/df5y5pzz1nwnxuzozukslb328erde5ygcjbt8ye0m3ht16f1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
           
        </script>
    </body>
</html>





