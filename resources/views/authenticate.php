<?php

session_start();

// --- DATABASE CONFIGURATION ---
$servername = "localhost";
$username_db = "root";           // Default XAMPP user
$password_db = "";               // Default XAMPP password
$dbname = "usename_password";    // Your specific database name

// 1. Create Connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// 2. Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Process Login Attempt
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize input to prevent basic exploits
    $user = htmlspecialchars($_POST['username']);
    $pass = $_POST['password'];

    // 4. Prepare statement to retrieve the hashed password
    // Always use Prepared Statements for security!
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // User found
        $user_row = $result->fetch_assoc();
        $hashed_password = $user_row['password'];

        // 5. Verify the password against the stored hash
        if (password_verify($pass, $hashed_password)) {
            
            // Password is correct! Start the session.
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['id'] = $user_row['id'];
            $_SESSION['username'] = $user_row['username'];
            
            // Redirect the user to a secure area
            header('Location: welcome.php');
            exit;
            
        } else {
            // Password verification failed
            echo "Login failed. Incorrect username or password.";
        }
    } else {
        // User not found
        echo "Login failed. Incorrect username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>