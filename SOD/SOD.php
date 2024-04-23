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
            echo '<form method="post"><button id="SODMode" type="submit" name="submit">Student Portal</button></form>';
            if (isset($_POST['submit'])) {
                $_SESSION['JSON'] = json_encode($data);
                header('Location: ../Student/stuClassList.php');
                echo json_encode($data);
            };
            ?>
            <li><a href="SOD.php">Dashboard</a></li>
            <li><a href="../index.html">Log Out</a></li>
        </ul>
    </nav>

    <div id="welc"><span>Welcome, SOD <?php echo $data->name; ?>!</span></div>
    <h2 id="header">Your Classes:</h2>


    <div id="classBox">
        <?php
        $queryID = $data->userID;
        $sql = "SELECT * FROM classroom WHERE SODid = '$queryID'";
        $course_list = mysqli_query($conn, $sql);
        while ($class = mysqli_fetch_array($course_list)) {
            $ID = $class['classID'];
            echo "<button onclick=\"btnGo('", $ID, "')\">", $class['className'], "</button>";
        }
        ?>
    </div>

    <div class="background-container"></div>
    <script>
        function btnGo(ID) {
            window.location.href = 'stuClass.php?ID=' + ID;
        }
    </script>
</body>

</html>