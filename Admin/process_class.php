
<?php
include 'C:\xampp\htdocs\Notice-Board\dbconn.php';
// Get form inputs
$classID = $_POST['ClassID'];
$className = $_POST['name'];
$teacherID = $_POST['TeacherID'];
$semester = $_POST['semester'];
$SODid = $_POST['SODid'];
$isActive = $_POST['isActive'];

// Verify that the provided teacherID exists in the user table as a teacher
$sqlTeacherCheck = "SELECT * FROM user WHERE userID = '$teacherID' AND role = 'Teacher'";
$resultTeacherCheck = $conn->query($sqlTeacherCheck);

// Verify that the provided SODid exists in the user table as a student
$sqlStudentCheck = "SELECT * FROM user WHERE userID = '$SODid' AND role = 'Student'";
$resultStudentCheck = $conn->query($sqlStudentCheck);

if ($resultTeacherCheck->num_rows > 0 && $resultStudentCheck->num_rows > 0) {
    // Insert data into the classroom table
    $sqlClassroom = "INSERT INTO classroom (classID, className, teacherID, semester, isActive, SODid) 
                VALUES ('$classID', '$className', '$teacherID', '$semester ', '$isActive', '$SODid')";

    if ($conn->query($sqlClassroom) === TRUE) {
        echo "New record created successfully in the classroom table";
    } else {
        echo "Error: " . $sqlClassroom . "<br>" . $conn->error;
    }
} else {
    echo "Error: Provided Teacher ID or SOD ID does not exist or is not assigned as a Teacher or Student.";
}
?>