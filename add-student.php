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





$message = "";
if(isset($_POST['submit']))
{


// setting up file and saving it
$filename=$_FILES['file']['name'];
$filetmp=$_FILES['file']['tmp_name'];
$fileExt= explode('.', $filename);
$fileActualExt= strtolower(end($fileExt));
$fileNewName=uniqid(''.true).".".$fileActualExt;
$fileDestination ='passport/'. $fileNewName;
move_uploaded_file($filetmp,$fileDestination);




$surname=$_POST['surname'];
$othername=$_POST['othername'];
$application=$_POST['application'];
$gender=$_POST['gender'];


// inserting question
$sql="INSERT INTO tblstudents (StudentName, admission, Gender, surname, passport) VALUES('$othername', '$application', '$gender', '$surname', '$fileNewName') ";
$connection->query($sql);
if (mysqli_affected_rows($connection)==1) {
    $message = "Student added succesfully";
    # code...
}

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
                                    <h2 class="title text-center">ADD  Student</h2>
                                
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
                                           <h4 class="bg-success"><?php echo $message; ?></h4>
                                            <div class="panel-body">

    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">


 







<div class="form-group">
<label for="default" class="col-sm-2 control-label">Passport</label>
 <div class="col-sm-10">
<input type="file" name="file">
</div></div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Surname</label>
 <div class="col-sm-10">
 <input type="text"  name="surname" class="form-control clid" id="classid"required="required">
</div></div>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Other Name</label>
 <div class="col-sm-10">
 <input type="text"  name="othername" class="form-control clid" id="classid"required="required">
</div></div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Application Number</label>
 <div class="col-sm-10">
 <input type="text" name="application" class="form-control clid" id="classid"required="required">
</div></div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
 <div class="col-sm-10">
 <select  name="gender" class="form-control clid" id="classid"required="required">
<option value="" class="form-control">Choose gender</option>
<option value="male" class="form-control">Male</option>
<option value="female" class="form-control">Female</option>
 </select>
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
