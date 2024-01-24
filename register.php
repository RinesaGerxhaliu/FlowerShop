<?php
include("header.php");
include("inc/user.php");
include("inc/db_connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);

    // Check if necessary fields are not empty
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "All fields are required.";
    } else {
        // Check if passwords match
        if ($password !== $confirmPassword) {
            echo "Passwords do not match.";
        } else {
            // Create a database connection instance
            $dbConnection = DatabaseConnection::getInstance();
            $conn = $dbConnection->getConnection();

            // Create a User instance
            $user = new User($conn);

            // Check if the username is already taken
            if ($user->isUsernameTaken($username)) {
                echo "Username already exists. Please choose a different one.";
            } else {
                // Call the register method from the User class
                if ($user->register($username, $email, $password)) {
                    header("Location: login.php");
                } else {
                    echo "Error during registration.";
                }
            }

            // Close the database connection
            $dbConnection->closeConnection();
        }
    }
}
?>

<div class="form-body">
    <form id="registrationForm" method="POST" action="register.php" onsubmit="return validateForm()">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>

        <button type="submit">Sign Up</button>
    </form>
</div>

<?php include("footer.php"); ?>
