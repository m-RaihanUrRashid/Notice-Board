<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Assignment</title>
    <link rel="stylesheet"  href="../styles.css">
</head>
<body>
    <h1>Make Assignment</h1>
    <form action="ProcessAss.php" method="POST">
        <label for="assignment">Assignment:</label><br>
        <input type='text' id='textbox' name='title' size='20' style="width: 15%;"><br><br>
        <textarea id="assignment" name="assignment" rows="4" cols="50"></textarea><br>
        <input type="datetime-local" id="meeting-time" name="deadline" >
        <button type="submit">Post</button>
    </form>
</body>
</html>
