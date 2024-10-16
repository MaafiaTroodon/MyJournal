<?php
session_start();
include
// Define the base URL for easier path management
$base_url = '/CSCI2170/a2/';  // Adjust to match your actual folder structure

// Enable error reporting for debugging (you can remove this in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$csv_path = $_SERVER['DOCUMENT_ROOT'] . $base_url . 'db/users.csv';

// Ensure the file exists before proceeding
if (!file_exists($csv_path)) {
    die("Error: The user database file was not found.");
}

// Handle form submissions based on the action
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $username = htmlspecialchars($_POST['username'] ?? '');

    if ($action === 'login') {
        $password = $_POST['password'] ?? '';

        if (!empty($password)) {
            // Attempt to open the CSV file
            if (($file = fopen($csv_path, 'r')) !== false) {
                $valid_user = false;
                while (($data = fgetcsv($file)) !== false) {
                    if ($data[0] === $username && password_verify($password, $data[1])) {
                        $_SESSION['username'] = $username;
                        $_SESSION['full_name'] = $data[2];
                        $valid_user = true;
                        break;
                    }
                }
                fclose($file);

                if ($valid_user) {
                    session_regenerate_id(true);
                    header("Location: ../index.php");
                    exit();
                } else {
                    $_SESSION['login_error'] = "Invalid username or password.";
                }
            }
        }
    }
}
?>

<!-- Custom header for login.php only -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for login page -->
    <link rel="stylesheet" href="../css/style.css"> <!-- Adjusted path -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&family=Nunito:ital,wght@0,700;1,700&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    
    <title>Login - myJournal</title>
</head>
<body>

<!-- Custom navbar for login page -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"> <!-- Adjusted path -->
                <img class="logo-image" alt="Logo Image" src="../images/logo-image.jpg" width="100"> myJournal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="alert('Please log in to create an entry!');">Create Entry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="alert('Please log in to access your preferences!');">Preferences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Main content -->
<main class="container">
    <div class="form-container">
        <h1>Login to myJournal</h1>
        <?php if (isset($_SESSION['login_error'])): ?>
            <p class="text-danger"><?= $_SESSION['login_error']; ?></p>
            <?php unset($_SESSION['login_error']); ?>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
    <label for="password">Password:</label>
    <div class="input-group">
        <input type="password" class="form-control" id="password" name="password" required>
        <button class="btn-show-password" type="button" onclick="togglePasswordVisibility()">Show</button>
    </div>
</div>
            <input type="hidden" name="action" value="login">
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="mt-3">Don't have an account? <a href="../register.php">Register here</a>.</p>
        <p class="mt-3"><a href="../forgot_password.php">Forgot your password?</a></p>
    </div>
</main>
<script>
function togglePasswordVisibility() {
    var passwordField = document.getElementById("password");
    var showButton = passwordField.nextElementSibling;

    if (passwordField.type === "password") {
        passwordField.type = "text";
        showButton.textContent = "Hide";
    } else {
        passwordField.type = "password";
        showButton.textContent = "Show";
    }
}
</script>
<!-- Footer -->
<footer class="pg-footer">
    <p>&copy; <?php echo date("Y"); ?> myJournal. All rights reserved.</p>
    <p>
        <a href="/CSCI2170/A2/about.php">About myJournal</a> | 
        <a href="/CSCI2170/A2/terms_of_use.php">Terms of Use</a> | 
        <a href="/CSCI2170/A2/privacy_policy.php">Privacy Policy</a>
    </p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>