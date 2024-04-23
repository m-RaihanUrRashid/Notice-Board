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
        #submitBox{

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
            <li><a href="#" onclick="history.back();">Back to Class</a></li>
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
    <div style="text-align: center;">
        <div style="display: inline-block; text-align: left;">
            <form action="SODquestion.php">
                <h3>Ask an SOD</h3>
                <label for="textbox" style="font-size: 13px;">Subject:</label>
                <input type="text" id="textbox" name="textbox" size="15"><br>   
                <label for="textbox" style="font-size: 13px;">Question:</label>
                <textarea name="" id="" cols="60" rows="10" style="resize: none; border-radius:5px;"></textarea><br><br>
                <button type="submit" style="border: 1px solid black;">Ask</button>
            </form>
        </div>
    </div>
    </body>
</html>