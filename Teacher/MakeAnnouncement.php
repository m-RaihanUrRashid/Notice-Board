<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Announcement</title>
    <link rel="stylesheet" href="../styles.css">

    <style>
        #annBox {
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
    <h1>Make Announcement</h1>
    <div id="annBox">
        <form action="ProcessAnn.php" method="POST">
            <label for="announcement">Announcement:</label><br>
            <input type='text' id='textbox' name='title' size='20' style="width: 15%;" placeholder="Title"><br><br>
            <textarea id="announcement" name="announcement" rows="4" cols="50" placeholder="Content"></textarea><br>
            <button type="submit">Post</button>
        </form>
    </div>
</body>

</html>