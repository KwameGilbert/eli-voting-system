<?php
// Include your database connection
include 'db_connection.php';

// Check if an ID parameter is provided
if (isset($_GET['id'])) {
    $electionId = $_GET['id'];

    // Fetch election details from the database
    $sql = "SELECT * FROM elections WHERE id = '$electionId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $electionData = mysqli_fetch_assoc($result);

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newName = $_POST['newName'];
            $newDate = $_POST['newDate'];
            $newStatus = $_POST['newStatus'];

            // Update election details in the database
            $updateSql = "UPDATE elections SET name = '$newName', date = '$newDate', status = '$newStatus' WHERE id = '$electionId'";
            if (mysqli_query($conn, $updateSql)) {
                header("Location: election_list.php"); // Redirect back to the election list
                exit();
            } else {
                echo "Error updating election: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Election not found.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Election</title>
    <!-- Add your custom CSS styles here -->
</head>
<body>
    <div class="container">
        <h1>Edit Election</h1>
        <form method="post">
            <label for="newName">New Election Name:</label>
            <input type="text" id="newName" name="newName" value="<?php echo $electionData['name']; ?>" required><br>

            <label for="newDate">New Date Held:</label>
            <input type="date" id="newDate" name="newDate" value="<?php echo $electionData['date']; ?>" required><br>

            <label for="newStatus">New Status:</label>
            <select id="newStatus" name="newStatus">
                <option value="open" <?php if ($electionData['status'] === 'open') echo 'selected'; ?>>Open</option>
                <option value="closed" <?php if ($electionData['status'] === 'closed') echo 'selected'; ?>>Closed</option>
            </select><br>

            <button type="submit">Update Election</button>
        </form>
    </div>
</body>
</html>
