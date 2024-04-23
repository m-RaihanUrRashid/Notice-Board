<?php
    include('../dbconn.php');
    session_start();
    ob_start();
    $data = json_decode($_SESSION['JSON']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments List</title>
    <link rel="stylesheet"  href="../styles.css">

    <style>
        #ansBox{
            padding: 30px;
            
        }
        .announ{
            border: 5px solid #603d28;
            border-radius: 5px;
            padding: 30px;
        }
        p{
            text-align: left;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="stuClassList.php?unset_session=true">Dashboard</a></li>
            <li><a href="stuClass.php">Back to Class</a></li>
            <li><a href="../index.html">Log Out</a></li>
        </ul>
    </nav>
    <?php
        $ID = $_SESSION['classID'];
        $sql1 = "SELECT className FROM classroom WHERE classID = '$ID'";
        $classname = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_assoc($classname);
        echo "<h1>", $row['className'], "</h1>";
    ?>
    <div id="ansBox">
        <?php    
        $sql = "SELECT * FROM query WHERE classID = '$ID' ORDER BY createdAt DESC";
        $annlist = mysqli_query($conn, $sql);
        if(mysqli_num_rows($annlist) == 0){
            echo "<div class=announ style=\"text-align: center;\"> No queries yet. </div><br>";
        }else{
            while ($ann = mysqli_fetch_array($annlist)) {
                $ans = ($ann['answer'] == NULL) ? 'No answer yet :(' : $ann['answer'];
                echo "<div class=announ>";  
                echo "<h3>" , $ann['question'], "</h3>", $ann['createdAt'];
                echo "<br><br><p>" , $ans, "</p>";
                echo "</div><br>";
            }
        }
        ?>
    </div>
</body>
</html>