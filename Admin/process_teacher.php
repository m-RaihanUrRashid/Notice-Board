
<?php
include 'C:\xampp\htdocs\Notice-Board\dbconn.php';
$userID = $_POST['userID'];
$name = $_POST['name'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
$phone = $_POST['phone'];
$dept = $_POST['dept'];
$officeNo = $_POST['OfficeNo'];
$enrollDate = $_POST['enrollDate'];
$isHead = $_POST['isHead'];


$userRole = "Teacher"; 
$sqlUser = "INSERT INTO user (userID, name, password, email, phone, role) 
            VALUES ('$userID', '$name', '$password', '$email', '$phone', '$userRole')";

if ($conn->query($sqlUser) === TRUE) {
    echo "<script>alert('New record created successfully in the user table');window.location.href = 'AddTeacher.php';</script>";
} else {
    echo "Error: " . $sqlUser . "<br>" . $conn->error;
}


$sqlTeacher = "INSERT INTO teacher (teacherID, dept, officeNo, isHead) 
            VALUES ('$userID', '$dept', '$officeNo', '$isHead')";

if ($conn->query($sqlTeacher) === TRUE) {
    echo "New record created successfully in the teacher table";
} else {
    echo "Error: " . $sqlTeacher . "<br>" . $conn->error;
}


?>