<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Assignment</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        #assBox {
            text-align: center;
        }
    </style>
</head>

<body>

    <nav>
        <ul>
            <li><a href="ClassList.php">Dashboard</a></li>
            <li><a href="../index.html">Log Out</a></li>
        </ul>
    </nav>
    <h1>Make Assignment</h1>
    <div id="assBox">
        <form action="ProcessAss.php" method="POST">
            <label for="assignment">Assignment:</label><br>
            <input type='text' id='textbox' name='title' size='20' style="width: 15%;" placeholder="Title"><br><br>
            <textarea id="assignment" name="assignment" rows="4" cols="50" placeholder="Assignment"></textarea><br>
            <input type="datetime-local" id="meeting-time" name="deadline">
            <button type="submit">Post</button>
        </form>
    </div>
</body>

</html>