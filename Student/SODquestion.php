<?php
include('../dbconn.php');
session_start();
ob_start();
$data = json_decode($_SESSION['JSON']);

$classID = $_SESSION['classID'];
$studentID = $data->userID;
$createdAt = date('Y-m-d H:i:s');
$question = $_POST['question'];

$sql = "INSERT INTO query (classID, studentID, createdAt, question) 
                    VALUES ('$classID', '$studentID', '$createdAt', '$question')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New question sent successfully to the class SOD!');window.location.href = 'stuClass.php';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'stuClassList.php';</script>";
}
?>