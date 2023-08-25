

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Elections</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333333;
        }
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-top: 20px;
        }
        label {
            font-weight: bold;
            width: 100%;
        }
        input[type="text"], input[type="date"], select {
            width: 90%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }

    
        button[type="submit"], .back-to-dashboard, .change_action_edit, .change_action_remove {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 3px;
            padding: 5px 16px;
            cursor: pointer;
            margin: 8px;
        }

        .change_action_remove {
            background-color: red;
        }

        .back-to-dashboard{
            margin-bottom: auto;
        }
        
        a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }
       
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Elections</h1>

        <!-- Add New Election Form -->
        <h2>Add New Election</h2>
        <form method="post" action="add_election.php">
            <label for="electionName">Election Name:</label>
            <input type="text" id="electionName" name="electionName" required><br>

            <label for="dateHeld">Date Held:</label>
            <input type="date" id="dateHeld" name="dateHeld" required><br>

            <label for="status">Status:</label>
            <select id="status" name="status"> <br>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
            </select><br>

            <button type="submit" class="action-button">Add Election</button>
        </form>

        <!-- Existing Elections -->
        <h2>Existing Elections</h2>
        <?php
        // Include your database connection
        include 'db_connection.php';

        // Fetch existing elections from the database
        $sql = "SELECT * FROM elections";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>
                    <tr>
                        <th>Election Name</th>
                        <th>Date Held</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['status']}</td>
                        <td>
                            <a href='edit_election.php?id={$row['id']}' class='change_action_edit'>Edit</a> |
                            <a href='remove_election.php?id={$row['id']}' class='change_action_remove'>Remove</a>
                        </td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No elections have been created yet.</p>";
        }
        // Close the database connection
        mysqli_close($conn);
        ?>
        <a href="admin_dashboard.php" class="back-to-dashboard">Back to Dashboard</a>
    </div>
</body>
</html>