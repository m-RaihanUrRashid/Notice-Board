<?php
    include 'D:\xampp\htdocs\Notice-Board\dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class List</title>
    <link rel = stylesheet href= global_bg.css?parameter=3>
</head>
<body>
    <h1>hello</h1>
    <div class='questionView'>
    <?php
        //session_start();
        //$queryID =  $_SESSION["userID"];
        $queryID = "2";
        $sql ="SELECT classID FROM enroll WHERE studentID = '$queryID'" ;
        $course_list = mysqli_query($conn, $sql);

        while ($class = mysqli_fetch_array($course_list)){
            $ID = $class['classID']; 
            $sql1 ="SELECT className FROM classroom WHERE classID = '$ID'" ;
            $classname = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_assoc($classname);
            echo "<button>", $row['className'], "</button>";
        }

        
    ?>
</div>


</body>
</html>