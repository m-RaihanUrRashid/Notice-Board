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
            <li><a href="SOD.php?unset_session=true">Dashboard</a></li>
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
                // echo "<form action='submit_assignment.php' method='POST'>";
                // echo "<input type='hidden' name='assID' value='" . $ass['assID'] . "'>";
                echo "<p style='font-size: 13px;'>Due Date: " . $ass['deadline'] . "</p><br><br>";
                // echo "<label for='textbox' style='font-size: 13px;'>Enter your Google drive link:</label>";
                // echo "<input type='text' id='textbox' name='linkBox' size='100' style=\"background-color: rgba(255, 255, 255, 0.6); border: 2px solid #603d28;\" required><br><br>";
                // echo "<button type='submit' style=\"border: 1px solid black;\">Turn in</button>";
                // echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "<br>";
            }
        }
        ?>
    </div> 
</body>
</html>