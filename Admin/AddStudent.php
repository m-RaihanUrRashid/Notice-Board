
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create User</title>
        <link rel="stylesheet"  href="../styles.css">

        <style>        
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
           
            #additionalFields {
                display: none; 
            }
        </style>
    </head>
    <body>


    <nav>
        <ul>
            <li><a href="Dashboard.php">Dashboard</a></li>
            <li><a href="AddStudent.php">Add Student</a></li>
            <li><a href="AddTeacher.php">Add Teacher</a></li>
            <li><a href="CreateClassroom.php">Create Classroom</a></li>
            <li><a href="ViewClassrooms.php">View Classrooms</a></li>
            <li><a href="../index.html">Log Out</a></li>
        </ul>
    </nav>

    <h1>Add Student</h1>

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

        <label for="minor">Minor:</label>
        <input type="text" id="minor" name="minor">

        <label for="enrollDate">Enrollment Date:</label>
        <input type="date" id="enrollDate" name="enrollDate" required>

        <label for="isSOD">Is SOD:</label>
        <select id="isSOD" name="isSOD" required>
            <option value="Y">Yes</option>
            <option value="N">No</option>
        </select>

        <button type="submit">Add Student</button>
    </form>



    </body>
    </html>

