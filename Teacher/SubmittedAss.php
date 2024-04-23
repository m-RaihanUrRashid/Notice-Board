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
    <link rel="stylesheet" href="../styles.css">

    <style>
        #annBox {
            padding: 30px;

        }

        .announ {
            border: 5px solid #603d28;
            border-radius: 5px;
            padding: 20px;
        }

        p {
            text-align: left;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="ClassList.php?unset_session=true">Dashboard</a></li>
            <li><a href="Class.php">Back to Class</a></li>
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
    <div id="annBox">
        <?php
        $assID = $_POST['assID'];

        $sql = "SELECT * FROM submission WHERE assID = '$assID'";
        $asslist = mysqli_query($conn, $sql);
        if (mysqli_num_rows($asslist) == 0) {
            echo "<div class=announ style=\"text-align: center;\"> No submissions yet. </div><br>";
        } else {
            while ($ass = mysqli_fetch_array($asslist)) {
                $stuID = $ass['studentID'];
                $sql1 = "SELECT name FROM user WHERE userID = '$stuID'";
                $query = mysqli_query($conn, $sql1);
                $student = mysqli_fetch_assoc($query);
                echo "<div class='announ d-flex'>";
                echo "<div style='display: inline-block; width: 75%; vertical-align: top;'>";
                echo "<h3>" . $student['name'] . "</h3>";
                echo "<p>" . $ass['subDate'] . "</p><br><br>";
                echo "<p><a href=" . $ass['filelink'] . ">Link of student submission</a></p>";
                echo "</div>";

                echo "<div id='submitBox' style='display: inline-block; width: 20%;'>";
                echo "<form action='sub_ass.php' method='POST'>";
                echo "<input type='hidden' name='assID' value='" . $ass['assID'] . "'>";
                echo "<label for='textbox' style='font-size: 13px;'>Enter Grade:</label>";

                if ($ass['grade'] == NULL) {
                    echo "<textarea id='gradeBox' name='gradeBox' style=\"background-color: rgba(255, 255, 255, 0.6); border: 2px solid #603d28; height: 100px; width: 200px;\" required></textarea><br><br>";
                    echo "<button type='submit' style=\"border: 1px solid black;\">Grade</button>";
                } else {
                    // $sql1 = "SELECT grade FROM submission WHERE assID = '" . $ass['assID'] . "'";
                    // $query = mysqli_query($conn, $sql1);
                    // $grade = mysqli_fetch_assoc($query);
                    echo "<textarea id='gradeBox' name='gradeBox' style=\"background-color: #ebe894; border: 2px solid #603d28; height: 100px; width: 200px;\" required disabled>" . $grade . "</textarea><br><br>";
                    echo "<button type='submit' style=\"border: 1px solid black;\" disabled>Submit Answer</button>";
                }
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>

</html>