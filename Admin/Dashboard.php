<?php
// Start session
session_start();

// Check if the admin is logged in
if(isset($_SESSION['admin_username'])) {
    // Establish database connection

  

    // Fetch admin's name from database
    $admin_username = $_SESSION['admin_username'];
    $sql = "SELECT Name FROM user WHERE UserID = '$admin_username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $adminName = $row['Name'];
        }
    } else {
        $adminName = "Unknown";
    }

    $conn->close();
} else {
    // Redirect to login page if admin is not logged in
    header("Location: AddStudent.php");
    exit();
}
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
        <li><a href="login.php">Log Out</a></li>
    </ul>
</nav>

<h1>Admin Dashboard</h2>

<div class="welcome-message">
    <p>Welcome Admin</p>
    <!-- PHP code to fetch admin's name from database and display it -->
    <!-- Example: <p>Welcome Admin <?php echo $adminName; ?></p> -->
    <p>Welcome Admin John Doe</p> <!-- Example static welcome message -->
</div>




</body>
</html>

