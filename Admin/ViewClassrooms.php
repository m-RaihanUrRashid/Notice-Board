<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        /* Box style for each list item */
        .classroom-entry {
            border: 1px solid #ccc;
            background-color: #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            width: fit-content; /* Set width to fit content */
        }
        /* Button style */
        .delete-button {
            width: auto; /* Set width to auto */
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
            <li><a href="http://localhost/Notice-Board/">Log Out</a></li>
        </ul>
    </nav>

<h1>Classrooms</h1>

<?php
include 'C:\xampp\htdocs\Notice-Board\dbconn.php';
$sql = "SELECT classID, className, semester FROM classroom";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
   
    echo "<ul>"; // Start list
    while ($row = $result->fetch_assoc()) {
        // Start list item with box style
        echo "<li class='classroom-entry'>";
        
        // Display classroom name and semester
        echo "<p>Class Name: " . $row["className"] . " - Semester: " . $row["semester"] . "</p>";
        
        // Form to delete classroom
        echo "<form action='delete_classroom.php' method='POST'>";
        // Hidden input to pass classID to delete_classroom.php
        echo "<input type='hidden' name='classID' value='" . $row["classID"] . "'>";
        // Delete button
        echo "<button class='delete-button' type='submit'>Delete</button>";
        // Close form
        echo "</form>";
        
        // Close list item
        echo "</li>";
    }
    echo "</ul>"; // End list
} else {
    // No classrooms found
    echo "<p>No classrooms found</p>";
}
?>

</body>
</html>
