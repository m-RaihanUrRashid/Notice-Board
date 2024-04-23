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
    <title>Answer Query</title>
    <link rel="stylesheet" href="../styles.css">

    <style>
        #qBox {
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

        #q {
            color: black;
            font-size: 40px;
        }

        button:disabled {
            pointer-events: none;
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
    <div id="qBox">
        <?php
        $sql = "SELECT * FROM query WHERE classID = '$ID' ORDER BY createdAt DESC";
        $qlist = mysqli_query($conn, $sql);
        if (mysqli_num_rows($qlist) == 0) {
            echo "<div class=announ style=\"text-align: center;\"> No queries yet! </div><br>";
        } else {
            while ($q = mysqli_fetch_array($qlist)) {
                echo "<div class='announ d-flex'>";
                echo "<div style='display: inline-block; width: 75%; vertical-align: top;'>";
                echo "<p id='q'>" . $q['question'] . "</p><br><br>";
                echo "<p>Asked on: " . $q['createdAt'] . "</p><br><br>";
                echo "<p>Student ID: " . $q['studentID'] . "</p>";
                echo "</div>";
                echo "<div id='submitBox' style='display: inline-block; width: 20%;'>";
                echo "<form action='submit_ans.php' method='POST'>";
                echo "<input type='hidden' name='qID' value='" . $q['qID'] . "'>";
                echo "<label for='textarea' style='font-size: 13px;'>Enter answer:</label>";
                if ($q['answer'] == null) {
                    echo "<textarea id='answer' name='answer' style=\"background-color: rgba(255, 255, 255, 0.6); border: 2px solid #603d28; height: 100px; width: 300px;\" required></textarea><br><br>";
                    echo "<button type='submit' style=\"border: 1px solid black;\">Submit Answer</button>";
                } else {
                    echo "<textarea id='answer' name='answer' style=\"background-color: #ebe894; border: 2px solid #603d28; height: 100px; width: 300px;\" required disabled>" . $q['answer'] . "</textarea><br><br>";
                    echo "<button type='submit' style=\"border: 1px solid black;\" disabled>Submit Answer</button>";
                }
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "<br>";
            }
        }
        ?>
    </div>
</body>

</html>