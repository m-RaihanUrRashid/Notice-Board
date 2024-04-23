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
    <link rel="stylesheet"  href="../styles.css">

    <style>
        #annBox{
            padding: 30px;
            
        }
        
        .announ{
            border: 5px solid #603d28;
            border-radius: 5px;
            padding: 20px;
        }

        p{
            text-align: left;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <!-- <li><a href="AssignmentList.php">Assignment List</a></li>
            <li><a href="Assignment.php">Assignment</a></li>
            <li><a href="Class.php">Class</a></li>
            <li><a href="MakeAnnouncement.php">Make Announcement</a></li>
            <li><a href="PostAssignment.php">Post Assignment</a></li> -->
            <li><a href="stuClassList.php?unset_session=true">Dashboard</a></li>
            <li><a href="stuClass.php">Back to Class</a></li>
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

        $stuID = $data->userID;

        $sql = "SELECT assID, title, description, deadline, createdAt FROM assignment WHERE classID = '$ID'";
        $asslist = mysqli_query($conn, $sql);
        if(mysqli_num_rows($asslist) == 0){
            echo "<div class=announ style=\"text-align: center;\"> No Assingments yet. </div><br>";
        }else{
            while ($ass = mysqli_fetch_array($asslist)) {
                echo "<div class='announ d-flex'>";
                echo "<div style='display: inline-block; width: 75%; vertical-align: top;'>";
                echo "<h3>" . $ass['title'] . "</h3>";
                echo "<p>" . $ass['createdAt'] . "</p><br><br>";
                echo "<p>" . $ass['description'] . "</p>";
                echo "</div>";
                echo "<div id='submitBox' style='display: inline-block; width: 20%;'>";
                echo "<form action='submit_assignment.php' method='POST'>";
                echo "<input type='hidden' name='assID' value='" . $ass['assID'] . "'>";
                echo "<p style='font-size: 13px;'>Due Date: " . $ass['deadline'] . "</p><br><br>";
                $sql2 = "SELECT * FROM submission WHERE assID = '" . $ass['assID'] . "' AND studentID = '" . $stuID . "'";
                $subs = mysqli_query($conn, $sql2);
                if(mysqli_num_rows($subs) != 0){
                    echo "<label for='textbox' style='font-size: 13px;'>Enter your Google drive link:</label>";
                    echo "<input type='text' id='textbox' name='linkBox' size='100' style=\"background-color: rgba(255, 255, 255, 0.6); border: 2px solid #603d28;\" disabled><br><br>";
                    echo "<button type='submit' style=\"all: unset\" disabled>Turn in</button>";
                }else{
                    echo "<label for='textbox' style='font-size: 13px;'>Enter your Google drive link:</label>";
                    echo "<input type='text' id='textbox' name='linkBox' size='100' style=\"background-color: rgba(255, 255, 255, 0.6); border: 2px solid #603d28;\" required><br><br>";
                    echo "<button type='submit' style=\"border: 1px solid black;\" >Turn in</button>";
                }
                echo "</form>";
                echo "</div>";
                echo "</div><br>";
            }
        }
        ?>
        <div class="announ d-flex">
            <div style="display: inline-block; width: 75%; vertical-align: top;">
                <h3>$ass['title']; ?></h3>
                <p>$ass['createdAt']; ?></p>
                <p>$ass['description']; ?></p>
            </div>
            <div style="display: inline-block; width: 20%;">
                <form action="submit_assignment.php" method="POST"> 
                    <p style= "font-size:13px;">Due Date: $ass['deadline']; ?></p><br><br>
                    $sql = "SELECT assID, title, description, deadline, createdAt FROM assignment WHERE classID = '$ID'";
                    $asslist = mysqli_query($conn, $sql);
                    <label for="textbox" style="font-size: 13px">Enter your Google drive link:</label>
                    <input type="text" id="textbox" name="textbox" size="100"><br><br>
                    <button type="submit">Turn in</button>
                </form>
            </div>
        </div>
    </div> 
</body>
</html>