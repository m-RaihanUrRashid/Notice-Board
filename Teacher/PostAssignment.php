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
    <form action="process_assignment.php" method="POST">
        <label for="assignment">Assignment:</label><br>
        <textarea id="assignment" name="assignment" rows="4" cols="50"></textarea><br>
        <button type="submit">Post</button>
    </form>
</body>
</html>