<?php
session_start();
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
            $Spassword = $row["password"];
            $Srole = $row["role"];

            if (password_verify($password, $Spassword)) {
                if ($Srole == "Admin") {
                    $response = array(
                        "success" => true,
                        "userID" => $row["userID"],
                        "name" => $row["name"],
                        "email" => $row["email"],
                        "phone" => $row["phone"],
                    );
                    $_SESSION['JSON'] = json_encode($response);
                    header('Location: Admin/Dashboard.php');
                    echo json_encode($response);
                }
                if ($Srole == "Teacher") {
                    $response = array(
                        "success" => true,
                        "userID" => $row["userID"],
                        "name" => $row["name"],
                        "email" => $row["email"],
                        "phone" => $row["phone"],
                        "dept" => $row["dept"],
                        "officeNo" => $row["officeNo"],
                        "isHead" => $row["isHead"]
                    );
                    $_SESSION['JSON'] = json_encode($response);
                    header('Location: Teacher/ClassList.php');
                    echo json_encode($response);
                }
                if ($Srole == "Student") {
                    $response = array(
                        "success" => true,
                        "userID" => $row["userID"],
                        "name" => $row["name"],
                        "email" => $row["email"],
                        "phone" => $row["phone"],
                        "dept" => $row["dept"],
                        //"officeNo" => $row["officeNo"],
                        "isSOD" => $row["isSOD"]
                    );
                    $_SESSION['JSON'] = json_encode($response);
                    header('Location: Student/stuClassList.php');
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
