<?php
include('includes/config.php');
if(!empty($_GET['cat_id'])){
  $table = $_GET['cat_id'].$_GET['exam_id']; 
$sql5 ="SELECT * FROM {$table}";
$result = $connection->query($sql5);
$count =  mysqli_num_rows($result);  
echo $count;
}


?>