<?php
include("includes/config.php");
if (isset($_GET['answer_tbl'])) {
    $table = $_GET['answer_tbl'];
    
    $ans_id = intval($_GET['ans_id']);
    $answer = $_GET['answer'];

$sql = "UPDATE {$table} SET answer ='$answer' WHERE id= $ans_id";
$result = $connection->query($sql);

if(mysqli_affected_rows($connection)==1){
    echo "Updated";
}else {
    echo "failed";
}



}

?>