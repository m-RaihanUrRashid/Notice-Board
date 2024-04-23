<?php
include('../dbconn.php');
session_start();
ob_start();
$data = json_decode($_SESSION['JSON']);
if (isset($_GET['unset_session']) && $_GET['unset_session'] === 'true') {
    unset($_SESSION['classID']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
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
            <?php
            if ($data->isSOD != null) {
                echo '<form method="post"><button id="SODMode" type="submit" name="submit">SOD Portal</button></form>';
                if (isset($_POST['submit'])) {
                    $_SESSION['JSON'] = json_encode($data);
                    header('Location: ../SOD/SOD.php');
                    echo json_encode($data);
                }
            };
            ?>
            <!-- <li><a href="AssignmentList.php">Assignment List</a></li>
            <li><a href="Assignment.php">Assignment</a></li>
            <li><a href="Class.php">Class</a></li>
            <li><a href="MakeAnnouncement.php">Make Announcement</a></li>
            <li><a href="PostAssignment.php">Post Assignment</a></li> -->
            <li><a href="stuClassList.php">Dashboard</a></li>
            <li><a href="../index.html">Log Out</a></li>
        </ul>
    </nav>

    <div id="welc"><span>Welcome, <?php echo $data->name; ?>!</span></div>
    <h2 id="header">Your Classes:</h2>


    <div id="classBox">
        <?php
        $queryID = $data->userID;
        $sql = "SELECT classID FROM enroll WHERE studentID = '$queryID'";
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

    <div class="background-container"></div>
    <script>
        function btnGo(ID) {
            window.location.href = 'stuClass.php?ID=' + ID;
        }
        // function btnGo(ID) {
        //     document.write(ID);
        //     <?php
                //         $data["class"] = $ID;
                //         $_SESSION['JSON'] = json_encode($data);
                //         header('Location: Teacher/ClassList.php');
                //         echo json_encode($data);
                //     
                ?>
        // }
    </script>
</body>

</html>