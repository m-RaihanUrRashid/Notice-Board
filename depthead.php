<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Department Head Dashboard</title>
  <style>
    /* Basic styling for demonstration purposes */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }
    h2 {
      margin-top: 0;
    }
    .button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Department Head Dashboard</h2>

  <h3>Approve SOD Application</h3>
  <button class="button">Approve SOD Application</button>

  <h3>Terminate Teacher</h3>
  <button class="button">Terminate Teacher</button>

  <h3>Terminate Student</h3>
  <button class="button">Terminate Student</button>

  <h3>Delete Classroom</h3>
  <button class="button">Delete Classroom</button>

  <!-- Placeholder for displaying lists -->
  <div id="lists">
    <h2>Lists</h2>

    <h3>View Teacher List</h3>
    <ul id="teacherList">
      <!-- Populate this list dynamically -->
      <!-- <li>Teacher 1</li> -->
      <!-- <li>Teacher 2</li> -->
    </ul>

    <h3>View Student List</h3>
    <ul id="studentList">
      <!-- Populate this list dynamically -->
      <!-- <li>Student 1</li> -->
      <!-- <li>Student 2</li> -->
    </ul>

    <h3>View Classroom List</h3>
    <ul id="classroomList">
      <!-- Populate this list dynamically -->
      <!-- <li>Classroom 1</li> -->
      <!-- <li>Classroom 2</li> -->
    </ul>
  </div>
</div>

</body>
</html>
