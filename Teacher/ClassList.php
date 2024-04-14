<?php
// Include the dbconn.php file to establish a connection with the database
include('../dbconn.php');;

// Fetch the logged-in teacher's name from the database
session_start();
$teacher_id = $_SESSION['user_id']; // Assuming the user ID of the logged-in teacher is stored in the session
$sql_teacher = "SELECT Name FROM User WHERE UserID = $teacher_id";
$result_teacher = mysqli_query($conn, $sql_teacher);
$row_teacher = mysqli_fetch_assoc($result_teacher);
$teacher_name = $row_teacher['Name'];

// Fetch the classes taught by the teacher from the database
$sql_classes = "SELECT ClassID, ClassName FROM Classroom WHERE TeacherID = $teacher_id";
$result_classes = mysqli_query($conn, $sql_classes);
$classes = [];
while ($row_class = mysqli_fetch_assoc($result_classes)) {
    $classes[] = $row_class;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <h1>Welcome, <?php echo $teacher_name; ?></h1>
    <h2>Your Classes:</h2>

    <?php foreach ($classes as $class): ?>
        <button onclick="location.href='Class.php?class_id=<?php echo $class['ClassID']; ?>'"><?php echo $class['ClassName']; ?></button>
    <?php endforeach; ?>
</body>
</html>
