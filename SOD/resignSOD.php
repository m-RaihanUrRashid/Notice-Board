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
    <title>Resign as SOD</title>
    <link rel="stylesheet" href="../styles.css">

    <style>
        #sodBox {
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
            <li><a href="SOD.php?unset_session=true">Dashboard</a></li>
            <li><a href="../index.html">Log Out</a></li>
        </ul>
    </nav>
    <?php
    echo "<h1>Resign as SOD</h1>";
    ?>
    <div id="sodBox">
        <?php
        $sql = "SELECT * FROM classroom WHERE SODid = '$data->userID'";
        $clist = mysqli_query($conn, $sql);
        if (mysqli_num_rows($clist) == 0) {
            echo "<div class=announ style=\"text-align: center;\"> You are fired? </div><br>";
        } else {
            while ($cls = mysqli_fetch_array($clist)) {
                echo "<div class='announ d-flex'>";
                echo "<div style='display: inline-block; width: 75%; vertical-align: top;'>";
                echo "<h3>Class Name: " . $cls['className'] . "</h3>";
                echo "<p>Semester: " . $cls['semester'] . "</p><br><br>";
                echo "</div>";
                echo "<div id='submitBox' style='display: inline-block; width: 20%;'>";
                echo "<form action='process_SOD.php' method='POST'>";
                echo "<input type='hidden' name='classID' value='" . $cls['classID'] . "'>";
                echo "<label for='textbox' style='font-size: 13px;'>Enter your application:</label>";

                $sql = "SELECT * FROM sodapplication WHERE SODid = '" . $data->userID . "' AND classID = '" . $cls['classID'] . "'";
                $alist = mysqli_query($conn, $sql);
                if (mysqli_num_rows($alist) != 0) {
                    while ($a = mysqli_fetch_array($alist)) {
                        echo "<textarea id='answer' name='answer' style=\"background-color: #ebe894; border: 2px solid #603d28; height: 100px; width: 300px;\" required disabled>" . $a['details'] . "</textarea><br><br>";
                        echo "<button type='submit' style=\"border: 1px solid black;\" disabled>Submit Application</button>";
                    }
                } else {
                    echo "<textarea id='application' name='application' style=\"background-color: rgba(255, 255, 255, 0.6); border: 2px solid #603d28; height: 100px; width: 300px;\" required></textarea><br><br>";
                    echo "<button type='submit' style=\"border: 1px solid black;\">Submit Application</button>";
                }
                echo "</form>";
                echo "</div>";
                echo "</div><br><br>";
            }
        }
        ?>
    </div>
</body>

</html>