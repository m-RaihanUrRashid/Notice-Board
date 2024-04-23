<?php

    include('../dbconn.php');

    session_start();
    ob_start();
    $data = json_decode($_SESSION['JSON']);

    $link = $_POST['linkBox'];
    $assID = $_POST['assID'];
    $studentID = $data->userID;
    $subDate =  date('Y-m-d H:i:s');    

    $sql= "INSERT INTO submission (assID, studentID, filelink, subDate) 
                    VALUES ('$assID', '$studentID', '$link ', '$subDate')";

    if ($conn->query($sql) === TRUE) {
        
            echo "<script>alert('New record created successfully in the classroom table');window.location.href = 'ViewAssignment.php';</script>";
        } else {
        
            echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'CreateClassroom.php';</script>";
    }