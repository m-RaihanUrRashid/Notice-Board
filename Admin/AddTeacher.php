<php>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet"  href="../styles.css">

    <style>
        /* Basic styling */
    
        form {
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            margin-bottom: 10px;
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        #additionalFields {
            display: none; /* Initially hide additional fields */
        }
    </style>
</head>
<body>

<nav>
    <ul>
        <li><a href="AddStudent.php">Add Student</a></li>
        <li><a href="AddTeacher.php">Add Teacher</a></li>
        <li><a href="CreateClassroom.php">Create Classroom</a></li>
        <li><a href="ViewClassrooms.php">View Classrooms</a></li>
    </ul>
</nav>

<h1>Add Teacher</h1>



<form action="process_student.php" method="POST">
    <label for="userID">User ID:</label>
    <input type="text" id="userID" name="userID" required>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required>

    <label for="dept">Department:</label>
    <input type="text" id="dept" name="dept" required>

    <label for="OfficeNo">OfficeNo:</label>
    <input type="text" id="OfficeNo" name="OfficeNo">

    <label for="enrollDate">Enrollment Date:</label>
    <input type="date" id="enrollDate" name="enrollDate" required>

    <label for="isHead">isHead</label>
    <select id="isHead" name="isHead" required>
        <option value="Y">Yes</option>
        <option value="N">No</option>
    </select>

    <button type="submit">Add Teacher</button>
</form>

</body>
</html>

</php>