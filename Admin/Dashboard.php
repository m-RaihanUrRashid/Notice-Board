
<?php 
include 'C:\xampp\htdocs\Notice-Board\dbconn.php';
    session_start();
    $data = json_decode($_SESSION['JSON']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet"  href="../styles.css">
    <style>
        /* CSS for welcome message */
        .welcome-message {
            text-align: center; /* Center align the content */
            font-size: 24px; /* Set font size to 24px */
            margin-top: 20px; /* Add some top margin for spacing */
        }
    </style>

    <nav>
    <ul>
        <li><a href="Dashboard.php">Dashboard</a></li>
        <li><a href="AddStudent.php">Add Student</a></li>
        <li><a href="AddTeacher.php">Add Teacher</a></li>
        <li><a href="CreateClassroom.php">Create Classroom</a></li>
        <li><a href="ViewClassrooms.php">View Classrooms</a></li>
        <li><a href="index.html">Log Out</a></li>
    </ul>
</nav>

<h1>Admin Dashboard</h2>
<div class="welcome-message">
    <p>Welcome <span style="font-size: 30px;"><?php echo $data->name; ?></span></p>
</div>
<div class="background-container"></div>



</body>
</html>

