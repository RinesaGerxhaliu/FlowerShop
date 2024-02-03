<?php
include("header.php");
include("inc/user.php");
include("inc/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);

    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "All fields are required.";
    } else {

        if ($password !== $confirmPassword) {
            echo "Passwords do not match.";
        } else {

            $dbConnection = DatabaseConnection::getInstance();
            $conn = $dbConnection->getConnection();

            $user = new User($conn);

            if ($user->isUsernameTaken($username)) {
                echo "Username already exists. Please choose a different one.";
            } else {

                if ($user->register($username, $email, $password)) {
                    header("Location: login.php");
                } else {
                    echo "Error during registration.";
                }
            }

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

<script>
    function validateForm() {
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirmPassword').value;

        if (username === '' || email === '' || password === '' || confirmPassword === '') {
            alert('All fields must be filled out');
            return false;
        }

        if (password !== confirmPassword) {
            alert('Passwords do not match');
            return false;
        }

        return true; 
    }
</script>

<?php include("footer.php"); ?>