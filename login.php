<?php
$_SESSION = array();
session_destroy();
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

    $sql = "SELECT * FROM user WHERE userID = $userID";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $SuserID = $row["userID"];
            $Sname = $row["name"];
            $Spassword = $row["password"];
            $Semail = $row["email"];
            $Sphone = $row["phone"];
            $Srole = $row["role"];

            if (password_verify($password, $Spassword)) {
                if ($Srole == "Admin") {
                    $response = array(
                        "success" => true,
                        "userID" => $SuserID,
                        "name" => $Sname,
                        "email" => $Semail,
                        "phone" => $Sphone,
                    );
                    $_SESSION['JSON'] = json_encode($response);
                    header('Location: Admin/Dashboard.php');
                    echo json_encode($response);
                }
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
