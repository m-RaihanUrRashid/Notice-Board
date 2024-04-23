<?php
include('../dbconn.php');
session_start();
ob_start();
$data = json_decode($_SESSION['JSON']);

$qID = $_POST['qID'];
$answer = $_POST['answer'];

$sql = "UPDATE query SET answer = ? WHERE qID = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "si", $answer, $qID);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "<script>alert('New answer sent successfully to the class!');window.location.href = 'AnsQuery.php';</script>";
} else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href = 'SOD.php';</script>";
}

mysqli_stmt_close($stmt);
?>