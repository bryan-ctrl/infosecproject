<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

include 'header.php'; // Include the header
?>
<head>
    <link rel="stylesheet" href="signup.css">
</head>

<div class="main-container">
    <div class="signup-container">
        <form method="post" action="signup.php">
        <h2>Sign Up</h2>
            <div class="input-group">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>

            <div class="input-group">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname"required>
            </div>

            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn">Sign Up</button>
        </form>
        <p class="switch">Already have an account? <a href="login.php">Log In</a></p>
    </div>
</div>


<?php include 'footer.php'; // Include the footer ?>
