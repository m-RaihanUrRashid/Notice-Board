<php>
<?php 
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

<h1>Admin Dashboard</h2>

<div class="welcome-message">
    <p>Welcome</p>
    <?php
        echo $data->name;
    ?>
</div>




</body>
</html>

</php>
