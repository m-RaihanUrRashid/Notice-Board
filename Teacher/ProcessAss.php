<?php
include('../dbconn.php');
session_start();
ob_start();
$data = json_decode($_SESSION['JSON']);

$classID = $_SESSION['classID'];
$createdBy = $data->userID;
$createdAt = date('Y-m-d H:i:s');
$title = $_POST['title'];
$assignment = $_POST['assignment'];
$deadline = $_POST['deadline'];

$sql = "INSERT INTO assignment (classID, createdAt, title, description, deadline) 
                    VALUES ('$classID', '$createdAt', '$title', '$assignment', '$deadline')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New assignment added to class!');window.location.href = 'stuClass.php';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'stuClassList.php';</script>";
}
?> 