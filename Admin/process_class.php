<?php

include('../dbconn.php');;
$classID = $_POST['ClassID'];
$className = $_POST['name'];
$teacherID = $_POST['TeacherID'];
$semester = $_POST['semester'];
$SODid = $_POST['SODid'];
$isActive = $_POST['isActive'];

$sqlTeacherCheck = "SELECT * FROM user WHERE userID = '$teacherID' AND role = 'Teacher'";
$resultTeacherCheck = $conn->query($sqlTeacherCheck);


$sqlStudentCheck = "SELECT * FROM user WHERE userID = '$SODid' AND role = 'Student'";
$resultStudentCheck = $conn->query($sqlStudentCheck);

if ($resultTeacherCheck->num_rows > 0 && $resultStudentCheck->num_rows > 0) {
    $sqlClassroom = "INSERT INTO classroom (classID, className, teacherID, semester, isActive, SODid) 
                VALUES ('$classID', '$className', '$teacherID', '$semester ', '$isActive', '$SODid')";

    if ($conn->query($sqlClassroom) === TRUE) {
        
         echo "<script>alert('New record created successfully in the classroom table');window.location.href = 'CreateClassroom.php';</script>";
        } else {
        
            echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'CreateClassroom.php';</script>";
    }
} else {
    echo "<script>alert('Error: Provided Teacher ID or SOD ID does not exist or is not assigned as a Teacher or Student.');window.location.href = 'CreateClassroom.php';</script>";
}

?>