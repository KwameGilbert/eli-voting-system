<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $electionName = $_POST["electionName"];
    $dateHeld = $_POST["dateHeld"];
    $status = $_POST["status"];

    $sql = "INSERT INTO elections (name, date, status) VALUES ('$electionName', '$dateHeld', '$status')";

    if (mysqli_query($conn, $sql)) {
        header("Location: election_list.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
