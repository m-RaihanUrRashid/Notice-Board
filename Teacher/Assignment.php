<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Details</title>
    <link rel="stylesheet"  href="../styles.css">
</head>
<body>
    <h1>Submitted Details</h1>
    <!-- Fetch and display details of the selected assignment using PHP -->
    <?php
    // Retrieve the assignment ID from the URL parameter
    $assignment_id = $_POST['assID'];

    // Query the database to retrieve assignment details based on the ID
    // Assume $assignment_info is an array containing information about the assignment

    // Display assignment details
    echo "<p><strong>Assignment Title:</strong> {$assignment_info['title']}</p>";
    echo "<p><strong>Description:</strong> {$assignment_info['description']}</p>";
    // Add more details as needed
    ?>

    <h2>Student's Assignment</h2>
    <form action="grade_assignment.php" method="POST">
        <textarea name="student_assignment" rows="10" cols="50" readonly><?php echo $student_assignment_content; ?></textarea><br>
        <button type="submit">Grade</button>
    </form>
</body>
</html>
