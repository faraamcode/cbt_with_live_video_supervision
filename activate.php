<?php
include("includes/config.php");
 if(isset($_GET['cat'])){
     $exam = $_GET['exam'];
     $cat = $_GET['cat'];
     $value = $_GET['updatevalue'];
     
     $sql = "UPDATE exam_details SET activation ='$value' WHERE exam_name= '$exam' AND cat_name='$cat' ";
$result = $connection->query($sql);

if(mysqli_affected_rows($connection)==1){
    echo $value;
}else {
    echo "failed";
}
     
     
 }
?>