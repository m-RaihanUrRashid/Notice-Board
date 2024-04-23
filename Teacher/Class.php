<?php
    include('../dbconn.php');
    session_start();
    ob_start();
    $data = json_decode($_SESSION['JSON']); 

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $_SESSION['classID'] = $ID;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php 
        $ID = $_SESSION['classID'];
        $sql1 = "SELECT className FROM classroom WHERE classID = '$ID'";
        $classname = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_assoc($classname);
        echo "<title>", $row['className'], "</title>";
    ?>
    <link rel="stylesheet"  href="../styles.css">
</head>
<body>

    <nav>
        <ul>
            <li><a href="ClassList.php">Dashboard</a></li>
            <li><a href="../index.html">Log Out</a></li>
        </ul>
    </nav>

    <?php 
        $ID = $_SESSION['classID'];
        $sql1 = "SELECT className FROM classroom WHERE classID = '$ID'";
        $classname = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_assoc($classname);
        echo "<h1>", $row['className'], "</h1>";
    ?>
    <button onclick="location.href='MakeAnnouncement.php'">Make Announcement</button> 
    <button onclick="location.href='PostAssignment.php'">Post Assignment</button> 
    <button onclick="location.href='AssignmentList.php'">All Assignments</button> 
</body>
</html>
