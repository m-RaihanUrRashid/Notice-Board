<?php
    include('../dbconn.php');
    session_start();
    ob_start();
    $data = json_decode($_SESSION['JSON']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments List</title>
</head>
<body>
<div id="assignBox">
        <?php
        // $queryID = $data->userID;
        // $sql = "SELECT classID FROM enroll WHERE studentID = '$queryID'";
        // $course_list = mysqli_query($conn, $sql);
        // while ($class = mysqli_fetch_array($course_list)) {
        //     $ID = $class['classID'];
        //     $sql1 = "SELECT className FROM classroom WHERE classID = '$ID'";
        //     $classname = mysqli_query($conn, $sql1);
        //     $row = mysqli_fetch_assoc($classname);
        //     echo "<button onclick=\"btnGo('", $ID, "')\">", $row['className'], "</button>";
        // }

        $ID = $_GET['ID'];
        $sql = "SELECT title, content, createdBy FROM announcement WHERE classID = '$ID'";
        $course_list = mysqli_query($conn, $sql);
        while ($class = mysqli_fetch_array($course_list)) {

        }
        ?>
    </div>
</body>
</html>