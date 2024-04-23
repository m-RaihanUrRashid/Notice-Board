<?php
include('../dbconn.php');
session_start();
ob_start();
$data = json_decode($_SESSION['JSON']);

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $_SESSION['classID'] = $ID;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class View</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="SOD.php?unset_session=true">Dashboard</a></li>
            <li><a href="../index.html">Log Out</a></li>
        </ul>
    </nav>

    <?php
    $ID = $_SESSION['classID'];
    $sql1 = "SELECT className FROM classroom WHERE classID = '$ID'";
    $classname = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($classname);
    echo "<h1>", $row['className'], "</h1>";
    echo "<button onclick=\"annbtn('", $ID, "')\">View Announcement</button>";
    echo "<button onclick=\"assbtn('", $ID, "')\">View Assignment</button>";
    echo "<button onclick=\"askSOD('", $ID, "')\">Answer Queries</button>";



    //<button onclick="location.href='ViewAssignment.php'">View Assignment</button> 
    //<button onclick="location.href='MakeQuery.php'">Ask an SOD</button> 
    ?>
    <script>
        function annbtn(ID) {
            window.location.href = 'ViewAnnouncement.php';
        }

        function assbtn(ID) {
            window.location.href = 'ViewAssignment.php';
        }

        function askSOD(ID) {
            window.location.href = 'AnsQuery.php';
        }
    </script>
</body>

</html>