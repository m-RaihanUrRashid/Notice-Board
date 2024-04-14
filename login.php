<?php

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

session_start();
include('dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST["userID"] ?? null;
    $password = $_POST["password"] ?? null;
    if (!is_numeric($userID)) {
        $response = array("error" => "ID must be a valid number.");
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    $sql = "SELECT userID, password FROM user WHERE userID = $userID";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $SuserID = $row["userID"];
            $Spassword = $row["password"];
            
            if (password_verify($password, $Spassword)) {
                $response = array("success" => true);
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                $response = array("success" => false);
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        } else {
            $response = array("error" => "User not found!");
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    } else {
        $response = array("error" => "User not found!");
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}
