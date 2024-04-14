
<?php
include 'C:\xampp\htdocs\Notice-Board\dbconn.php';
$userID = $_POST['userID'];
$name = $_POST['name'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
$email = $_POST['email'];
$phone = $_POST['phone'];
$dept = $_POST['dept'];
$officeNo = $_POST['OfficeNo'];
$enrollDate = $_POST['enrollDate'];
$isHead = $_POST['isHead'];

// Insert data into the user table
$userRole = "Teacher"; // Assuming the role is always "Teacher" for this form
$sqlUser = "INSERT INTO user (userID, name, password, email, phone, role) 
            VALUES ('$userID', '$name', '$password', '$email', '$phone', '$userRole')";

if ($conn->query($sqlUser) === TRUE) {
    echo "New record created successfully in the user table";
} else {
    echo "Error: " . $sqlUser . "<br>" . $conn->error;
}

// Insert data into the teacher table
$sqlTeacher = "INSERT INTO teacher (teacherID, dept, officeNo, isHead) 
            VALUES ('$userID', '$dept', '$officeNo', '$isHead')";

if ($conn->query($sqlTeacher) === TRUE) {
    echo "New record created successfully in the teacher table";
} else {
    echo "Error: " . $sqlTeacher . "<br>" . $conn->error;
}


?>