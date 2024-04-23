<?php
include('../dbconn.php');
session_start();
ob_start();
$data = json_decode($_SESSION['JSON']);

$assID = $_POST['assID'];
$grade = $_POST['gradeBox'];

$sql = "UPDATE submission 
        SET grade = '" . $grade . "'
        WHERE assID = '" . $assID . "'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record created successfully in the classroom table');window.location.href = 'PostAssignment.php';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'ClassList.php';</script>";
}
