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
                    $teachSql = "SELECT * FROM teacher WHERE teacherID = $userID";
                    $teachResult = mysqli_query($conn, $teachSql);
                    if ($teachResult) {
                        if (mysqli_num_rows($teachResult) > 0) {
                            $row2 = mysqli_fetch_assoc($teachResult);
                            $response = array(
                                "success" => true,
                                "userID" => $row["userID"],
                                "name" => $row["name"],
                                "email" => $row["email"],
                                "phone" => $row["phone"],
                                "dept" => $row2["dept"],
                                "officeNo" => $row2["officeNo"],
                                "isHead" => $row2["isHead"]
                            );
                            $_SESSION['JSON'] = json_encode($response);
                            header('Location: Teacher/ClassList.php');
                            echo json_encode($response);
                        }
                    }
                }
                if ($Srole == "Student") {
                    $stuSql = "SELECT * FROM student WHERE studentID = $userID";
                    $stuResult = mysqli_query($conn, $stuSql);
                    if ($stuResult) {
                        if (mysqli_num_rows($stuResult) > 0) {
                            $row2 = mysqli_fetch_assoc($stuResult);
                            $response = array(
                                "success" => true,
                                "userID" => $row["userID"],
                                "name" => $row["name"],
                                "email" => $row["email"],
                                "phone" => $row["phone"],
                                "dept" => $row2["dept"],
                                "isSOD" => $row2["isSOD"]
                            );
                            $_SESSION['JSON'] = json_encode($response);
                            header('Location: Student/stuClassList.php');
                            echo json_encode($response);
                        }
                    }
                }
                if ($Srole == "ClassMod") {
                    $cmSql = "SELECT * FROM classmod WHERE modID = $userID";
                    $cmResult = mysqli_query($conn, $cmSql);
                    if ($cmResult) {
                        if (mysqli_num_rows($cmResult) > 0) {
                            $row2 = mysqli_fetch_assoc($cmResult);
                            $response = array(
                                "success" => true,
                                "userID" => $row["userID"],
                                "name" => $row["name"],
                                "email" => $row["email"],
                                "phone" => $row["phone"],
                                "dept" => $row2["dept"],
                            );
                            $_SESSION['JSON'] = json_encode($response);
                            header('Location: ClassMod/classmod.php');
                            echo json_encode($response);
                        }
                    }
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
