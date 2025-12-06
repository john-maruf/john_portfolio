<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>This is your secure portfolio area.</p>
    <p><a href="logout.php">Log Out</a></p>
</body>
</html>