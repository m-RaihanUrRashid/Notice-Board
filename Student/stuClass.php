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
            <li><a href="stuClassList.php?unset_session=true">Dashboard</a></li>
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
    echo "<button onclick=\"askSOD('", $ID, "')\">Ask an SOD</button>";
    echo "<button onclick=\"viewAns('", $ID, "')\">SOD Answer Forum</button>";
    ?>
    <script>
        function annbtn(ID) {
            window.location.href = 'ViewAnnouncement.php';
        }

        function assbtn(ID) {
            window.location.href = 'ViewAssignment.php';
        }

        function askSOD(ID) {
            window.location.href = 'MakeQuery.php';
        }
        function viewAns(ID) {
            window.location.href = 'ViewAns.php';
        }
    </script>
</body>

</html>