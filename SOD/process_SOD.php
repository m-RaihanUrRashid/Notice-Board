<?php

include('../dbconn.php');

session_start();
ob_start();
$data = json_decode($_SESSION['JSON']);

$SODid = $data->userID;
$classID = $_POST['classID'];
$details = $_POST['application'];
$type = "Resignation";

$sql = "INSERT INTO sodapplication (SODid, classID, details, type) 
                    VALUES ('$SODid', '$classID', '$details', '$type')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('SOD Resignation submitted successfully!');window.location.href = 'applySOD.php';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'stuClassList.php';</script>";
}
