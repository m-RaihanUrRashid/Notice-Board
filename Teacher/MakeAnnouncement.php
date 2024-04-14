<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Announcement</title>
</head>
<body>
    <h1>Make Announcement</h1>
    <form action="process_announcement.php" method="POST">
        <label for="announcement">Announcement:</label><br>
        <textarea id="announcement" name="announcement" rows="4" cols="50"></textarea><br>
        <button type="submit">Post</button>
    </form>
</body>
</html>
