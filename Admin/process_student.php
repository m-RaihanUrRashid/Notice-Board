
<?php
include 'C:\xampp\htdocs\Notice-Board\dbconn.php';

    $userID = $_POST['userID'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dept = $_POST['dept'];
    $minor = $_POST['minor'];
    $enrollDate = $_POST['enrollDate'];
    $isSOD = $_POST['isSOD'];


    $userRole = "Student"; 
    $sqlUser = "INSERT INTO user (userID, name, password, email, phone, role) 
                VALUES ('$userID', '$name', '$password', '$email', '$phone', '$userRole')";

    if ($conn->query($sqlUser) === TRUE) {
        echo "<script>alert('New record created successfully in the user table');window.location.href = 'AddStudent.php';</script>";
    } else {
        echo "Error: " . $sqlUser . "<br>" . $conn->error;
    }

 
    $sqlStudent = "INSERT INTO student (studentID, dept, minor, enrollDate, isSOD) 
                VALUES ('$userID', '$dept', '$minor', '$enrollDate', '$isSOD')";

    if ($conn->query($sqlStudent) === TRUE) {
        echo "<script>alert('New record created successfully in the student table');window.location.href = 'AddStudent.php';</script>";
    } else {
        echo "Error: " . $sqlStudent . "<br>" . $conn->error;
    }
    ?>