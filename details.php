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

// Retrieve data from the database
$sql = "SELECT * FROM record"; // Assuming 'record' is the table name
$result = $conn->query($sql);

// Check if there is data
if ($result->num_rows > 0) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styles */
        header {
            width: 100%;
            background: white; /* White background color */
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        header h1 {
            color: #333; /* Dark text color */
            font-size: 1.5rem;
            font-weight: 700;
        }

        header img {
            width: 130px; /* Adjust the size of the logo */
            margin-right: 15px;
        }

        header nav {
            display: flex;
            align-items: center;
        }

        header nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        header nav ul li {
            font-size: 1rem;
            font-weight: 500;
            color: #333; /* Dark text color */
            cursor: pointer;
        }

        /* Main Content Styles */
        .details-container {
            max-width: 100%;
            overflow-x: auto;
            flex: 1;
            margin-top: 80px; /* Adjusted margin to accommodate fixed header */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        /* Footer Styles */
        footer {
            background: white; /* White background color */
            padding: 20px;
            color: #333; /* Dark text color */
            text-align: center;
            width: 100%;
            margin-top: auto; /* Push the footer to the bottom */
        }

        footer p {
            margin-bottom: 10px;
        }

        footer img {
            width: 30px;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header>
        <div>
            <img src="Abhyaz.logo.jpg" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="form1.html">Register</a></li>
                <li><a href="details.php">Detail Sheet</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content Section -->
    <div class="details-container">
        <h2>Intern Details</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Tenure</th>
                <th>Start Date</th>
                <th>Tentative Exit Date</th>
                <th>Job Role</th>
                <th>Interested in any other job role</th>
                <th>Task Assigned</th>
                <th>Familiar Tools</th>
                <th>Task Status</th>
                <th>Work Drive Link</th>
                <!-- Add similar headers for other fields -->
            </tr>

            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['tenure'] . "</td>";
                echo "<td>" . $row['start_date'] . "</td>";
                echo "<td>" . $row['exit_date'] . "</td>";
                echo "<td>" . $row['job_role'] . "</td>";
                echo "<td>" . $row['other_role'] . "</td>";
                echo "<td>" . $row['tasks_assigned'] . "</td>";
                echo "<td>" . $row['familiar_tools'] . "</td>";
                echo "<td>" . $row['task_status'] . "</td>";
                echo "<td>" . $row['work_drive_link'] . "</td>";
                // Add similar cells for other fields
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; Abhyaz 2024</p>
        <!-- Add your social media logos here -->
        <a href="https://www.linkedin.com/company/abhyazlearning/mycompany/" ><img src="Linkedin.png" alt="LinkedIn" ></a>
        <a href="https://www.abhyaz.com/" ><img src="google.png" alt="Google" ></a>
        <a href="https://www.facebook.com/abhyazlearning/" ><img src="Facebook.png" alt="Facebook" ></a>
        <a href="https://www.instagram.com/abhyazlearning/?hl=en" ><img src="Instagram.png" alt="Instagram" ></a>
    </footer>
</body>

</html>

<?php
} else {
    echo "No records found";
}

// Close the database connection
$conn->close();
?>
