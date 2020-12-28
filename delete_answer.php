<?php
include("includes/config.php");
if (isset($_GET['answer_tbl'])) {
    $table = $_GET['answer_tbl'];
    
    $ans_id = intval($_GET['ans_id']);

$sql = "DELETE FROM {$table} WHERE id= $ans_id";
$result = $connection->query($sql);

if(mysqli_affected_rows($connection)==1){
    echo "Deleted";
}else {
    echo "failed";
}



}

?>