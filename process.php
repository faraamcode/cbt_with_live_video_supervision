<?php
session_start();
include('includes/config.php');
$exam_name = array();
if (isset($_GET['name'])) {
    $cat_name = $_GET['name'];

    $sql = "SELECT * FROM exam_details WHERE cat_name = '$cat_name'";
    $result = $connection->query($sql);
    while($row= mysqli_fetch_array($result)){
        
        array_push($exam_name,$row['exam_name']);

    }
    echo json_encode($exam_name);
    # code...
}else {
    echo "failed";
}

?>