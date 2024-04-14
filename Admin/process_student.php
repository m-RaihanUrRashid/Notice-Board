
<?php
include 'C:\xampp\htdocs\Notice-Board\dbconn.php';
    // Get form inputs
    $userID = $_POST['userID'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dept = $_POST['dept'];
    $minor = $_POST['minor'];
    $enrollDate = $_POST['enrollDate'];
    $isSOD = $_POST['isSOD'];

    // Insert data into the user table
    $userRole = "Student"; // Assuming the role is always "Student" for this form
    $sqlUser = "INSERT INTO user (userID, name, password, email, phone, role) 
                VALUES ('$userID', '$name', '$password', '$email', '$phone', '$userRole')";

    if ($conn->query($sqlUser) === TRUE) {
        echo "New record created successfully in the user table";
    } else {
        echo "Error: " . $sqlUser . "<br>" . $conn->error;
    }

    // Insert data into the student table
    $sqlStudent = "INSERT INTO student (studentID, dept, minor, enrollDate, isSOD) 
                VALUES ('$userID', '$dept', '$minor', '$enrollDate', '$isSOD')";

    if ($conn->query($sqlStudent) === TRUE) {
        echo "New record created successfully in the student table";
    } else {
        echo "Error: " . $sqlStudent . "<br>" . $conn->error;
    }
    ?>