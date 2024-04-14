
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet"  href="../styles.css">

    <style>
        /* Basic styling */
    
        form {
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            margin-bottom: 10px;
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        #additionalFields {
            display: none; /* Initially hide additional fields */
        }
    </style>
</head>
<body>


<nav>
    <ul>
        <li><a href="Dashboard.php">Dashboard</a></li>
        <li><a href="AddStudent.php">Add Student</a></li>
        <li><a href="AddTeacher.php">Add Teacher</a></li>
        <li><a href="CreateClassroom.php">Create Classroom</a></li>
        <li><a href="ViewClassrooms.php">View Classrooms</a></li>
        <li><a href="login.php">Log Out</a></li>
    </ul>
</nav>

<h1>Add Student</h1>

<form action="process_student.php" method="POST">
    <label for="userID">User ID:</label>
    <input type="text" id="userID" name="userID" required>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required>

    <label for="dept">Department:</label>
    <input type="text" id="dept" name="dept" required>

    <label for="minor">Minor:</label>
    <input type="text" id="minor" name="minor">

    <label for="enrollDate">Enrollment Date:</label>
    <input type="date" id="enrollDate" name="enrollDate" required>

    <label for="isSOD">Is SOD:</label>
    <select id="isSOD" name="isSOD" required>
        <option value="Y">Yes</option>
        <option value="N">No</option>
    </select>

    <button type="submit">Add Student</button>
</form>


<?php
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

</body>
</html>

