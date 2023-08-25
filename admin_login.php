<?php
// Simulate a basic admin authentication system
$validUsername = 'admin';
$validPasswordHash = password_hash('password123', PASSWORD_DEFAULT);

// Initialize variables to store error messages
$usernameError = '';
$passwordError = '';
$loginError = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password
    if ($username !== $validUsername) {
        $usernameError = 'Invalid username';
    }

    if (!password_verify($password, $validPasswordHash)) {
        $passwordError = 'Invalid password';
    }

    // If username and password are valid, redirect to admin dashboard
    if (empty($usernameError) && empty($passwordError)) {
        // In a real application, you would use a proper authentication mechanism and redirect here
        // For demonstration purposes, we're redirecting to a dummy admin dashboard
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $loginError = 'Invalid credentials. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form action="admin_login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <span class="error"><?php echo $usernameError; ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span class="error"><?php echo $passwordError; ?></span>
            </div>
            <div class="error"><?php echo $loginError; ?></div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
