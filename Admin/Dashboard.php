<?php
include('../dbconn.php');
session_start();
$data = json_decode($_SESSION['JSON']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        .welcome-message {
            text-align: center;
            font-size: 60px;
            margin-top: 20px;
        }

        span {
            color: #333;
            font-family: "BD", sans-serif;
            padding: 10px;
            font-weight: normal;
            font-style: normal;
            background-color: #eee;
        }
    </style>

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

    <h1 id="header">Admin Dashboard</h1>
    <div class="welcome-message">
        <p>
            <span>Welcome, <?php echo $data->name; ?>!</span>
        </p>
    </div>
    <div class="background-container"></div>

    </body>

</html>