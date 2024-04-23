<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Announcement</title>
    <link rel="stylesheet"  href="../styles.css">
</head>
<body>
    <h1>Make Announcement</h1>
    <form action="ProcessAnn.php" method="POST">
        <label for="announcement">Announcement:</label><br>
        <input type='text' id='textbox' name='title' size='20' style="width: 15%;"><br><br>
        <textarea id="announcement" name="announcement" rows="4" cols="50"></textarea><br>
        <button type="submit">Post</button>
    </form>
</body>
</html>
