<?php

include("pages/header.php");
include("auth/user.php");
include("auth/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $dbConnection = DatabaseConnection::getInstance();
    $conn = $dbConnection->getConnection();

    $user = new User($conn);

    if ($user->login($username, $password)) {
        header("Location: Homepage.php");
    } else {
        echo "Invalid username or password.";
    }

    $dbConnection->closeConnection();
}
?>

<main class="login_main">
    <div class="containeer">
        <form id="loginFormm" method="POST" action="login.php" onsubmit="return validateForm()">
            <h2 class="login-h2">Login</h2>

            <div class="inputt-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="inputt-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="error" id="error-message"></div>

            <button type="submit">Login</button>

            <p class="signup-link">Don't have an account? <a href="register.php">Sign up here</a></p>
        </form>
    </div>
</main>

<script>
    function validateForm() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var errorMessage = document.getElementById('error-message');

        if (username === '' || password === '') {
            errorMessage.textContent = 'Username and password are required.';
            return false;
        }
        return true;
    }
</script>

<?php include("footer.php") ?>