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
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        #welc {
            text-align: center;
            margin: 10px;
        }

        #classBox {
            background-color: #e4e4e4;
        }
    </style>
</head>

<body>

    <nav>
        <ul>
            <li><a href="ClassList.php">Dashboard</a></li>
            <li><a href="../index.html">Log Out</a></li>
        </ul>
    </nav>

    <div id="welc"><span>Welcome, <?php echo $data->name; ?>!</span></div>
    <h2 id="header">Your Classes:</h2>


    <div class='questionView'>


        <div id="classBox">
            <?php
            $queryID = $data->userID;
            $sql = "SELECT classID FROM classroom WHERE teacherID = '$queryID'";
            $course_list = mysqli_query($conn, $sql);
            while ($class = mysqli_fetch_array($course_list)) {
                $ID = $class['classID'];
                $sql1 = "SELECT className FROM classroom WHERE classID = '$ID'";
                $classname = mysqli_query($conn, $sql1);
                $row = mysqli_fetch_assoc($classname);
                echo "<button onclick=\"btnGo('", $ID, "')\">", $row['className'], "</button>";
            }
            ?>
        </div>
    </div>
    <div class="background-container"></div>
    <script>
        function btnGo(ID) {
            window.location.href = 'Class.php?ID=' + ID;
        }
    </script>
</body>

</html>