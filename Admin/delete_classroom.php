

<?php
include 'C:\xampp\htdocs\Notice-Board\dbconn.php';


$classID = $_POST['classID'];
    $sql = "DELETE FROM classroom WHERE classID = '$classID'";

   
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Classroom deleted successfully');window.location.href = 'ViewClassrooms.php';</script>";
    } else {
        echo "<script>alert('Error deleting classroom: " . $conn->error;"'); window.location.href = 'ViewClassrooms.php';</script>";
    }


    $conn->close();

    ?>