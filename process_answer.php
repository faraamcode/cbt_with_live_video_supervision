<?php
include("includes/config.php");
if (isset($_GET['question_tbl'])) {
    $table = $_GET['question_tbl'];
    $q_id = intval($_GET['question_id']);
    $ans_id = intval($_GET['answer_id']);

$sql = "UPDATE {$table} set ans_id = $ans_id WHERE id=$q_id";
$result = $connection->query($sql);

if(mysqli_affected_rows($connection)==1){
    echo "succesful";
}else {
    echo "failed";
}



}

?>