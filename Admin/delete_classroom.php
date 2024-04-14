

<?php
include 'C:\xampp\htdocs\Notice-Board\dbconn.php';


$classID = $_POST['classID'];
    $sql = "DELETE FROM classroom WHERE classID = '$classID'";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Classroom deleted successfully.";
    } else {
        echo "Error deleting classroom: " . $conn->error;
    }

    // Close connection
    $conn->close();

    ?>