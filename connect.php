<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "details";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $tenure = mysqli_real_escape_string($conn, $_POST['tenure']);
    $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
    $exitDate = mysqli_real_escape_string($conn, $_POST['exitDate']);
    $jobRole = mysqli_real_escape_string($conn, $_POST['jobRole']);
    $otherRole = mysqli_real_escape_string($conn, $_POST['otherRole']);
    $tasksAssigned = mysqli_real_escape_string($conn, $_POST['tasksAssigned']);
    $familiarTools = mysqli_real_escape_string($conn, $_POST['familiarTools']);
    $taskStatus = mysqli_real_escape_string($conn, $_POST['taskStatus']);
    $workDriveLink = mysqli_real_escape_string($conn, $_POST['workDriveLink']);

    // SQL query to insert data into the "record" table
    $sql = "INSERT INTO record (name, email, tenure, start_date, exit_date, job_role, other_role, tasks_assigned, familiar_tools, task_status, work_drive_link) 
            VALUES ('$name', '$email', '$tenure', '$startDate', '$exitDate', '$jobRole', '$otherRole', '$tasksAssigned', '$familiarTools', '$taskStatus', '$workDriveLink')";

    if ($conn->query($sql) === TRUE) {
        header("Location: details.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
