<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
       
        .classroom-entry {
            border: 1px solid #ccc;
            background-color: #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            width: fit-content; 
        }
    
        .delete-button {
            width: auto; 
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
            <li><a href="../index.html">Log Out</a></li>
        </ul>
    </nav>

<h1>Classrooms</h1>

<?php
include('../dbconn.php');;
$sql = "SELECT classID, className, semester FROM classroom";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
   
    echo "<ul>"; 
    while ($row = $result->fetch_assoc()) {
       
        echo "<li class='classroom-entry'>";
        
      
        echo "<p>Class Name: " . $row["className"] . " - Semester: " . $row["semester"] . "</p>";
        
       
        echo "<form action='delete_classroom.php' method='POST'>";
        
        echo "<input type='hidden' name='classID' value='" . $row["classID"] . "'>";

        echo "<button class='delete-button' type='submit'>Delete</button>";
 
        echo "</form>";
     
        echo "</li>";
    }
    echo "</ul>";
} else {

    echo "<p>No classrooms found</p>";
}
?>

</body>
</html>
