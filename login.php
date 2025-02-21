<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php?page=service_history"); // Redirect directly to Service History
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}

include 'header.php'; 
?>

<head>
    <link rel="stylesheet" href="login.css">
</head>

<div class="main-container">
    <div class="login-container">
        <div class="logo-container">
            <img src="images/carbg.jpg" alt="Logo" />
        </div>
        <form method="post" action="">
            <img src="images/carrepair.jpg" alt="Logo" class="logo"> <!-- Logo added here -->
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="SIGN IN">
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
