<?php
include("includes/config.php");
if (isset($_GET['question_tbl'])) {
    $table = $_GET['question_tbl'];
    
    $question_id = intval($_GET['question_id']);
    $question = $_GET['question'];

$sql = "UPDATE {$table} SET question ='$question' WHERE id= $question_id";
$result = $connection->query($sql);

if(mysqli_affected_rows($connection)==1){
    echo "UPDATED";
}else {
    echo "failed";
}



}

?>