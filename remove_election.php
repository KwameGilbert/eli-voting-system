<?php
// Include your database connection
include 'db_connection.php';

if (isset($_GET['id'])) {
    $electionId = $_GET['id'];
    $sql = "DELETE FROM elections WHERE id = $electionId";
    if (mysqli_query($conn, $sql)) {
        header("Location: election_list.php");
        exit;
    } else {
        echo "Error removing election: " . mysqli_error($conn);
    }
} else {
    header("Location: election_list.php");
    exit;
}

// Close the database connection
mysqli_close($conn);
?>
