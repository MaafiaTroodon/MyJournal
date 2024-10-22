<?php
ob_start(); // Start output buffering
require 'includes/header.php';

/*
PHP Manual. (2023). password_hash() - Manual. PHP Documentation. Retrieved October 10, 2024, from https://www.php.net/manual/en/function.password-hash.php.
Used to securely hash passwords before saving them in the users.csv file during registration.
*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form input and sanitize it
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $full_name = htmlspecialchars($_POST['full_name']);
    $security_question = htmlspecialchars($_POST['security_question']);
    $security_answer = htmlspecialchars($_POST['security_answer']);

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<p class='text-danger'>Passwords do not match!</p>";
    } else {
        // Path to the users.csv file
        $csv_path = '/Applications/XAMPP/xamppfiles/htdocs/CSCI2170/a2/db/users.csv';

        // Ensure the users.csv file exists, and create it if not
        if (!file_exists($csv_path)) {
            // Create the CSV file with headers if it doesn't exist
            $file = fopen($csv_path, 'w');
            fputcsv($file, ['username', 'password', 'full_name', 'security_question', 'security_answer']);
            fclose($file);
        }

        // Open the CSV file to check if the username already exists
        if (($file = fopen($csv_path, 'r')) !== false) {
            $username_exists = false;
            while (($data = fgetcsv($file)) !== false) {
                if ($data[0] === $username) {
                    $username_exists = true;
                    break;
                }
            }
            fclose($file);

            if ($username_exists) {
                echo "<p class='text-danger'>Username already taken.</p>";
            } else {
                // If the username is unique, hash the password and save the new user
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                if (($file = fopen($csv_path, 'a')) !== false) {
                    fputcsv($file, [$username, $hashed_password, $full_name, $security_question, $security_answer]);
                    fclose($file);
                    header("Location: index.php"); // Redirect to homepage after successful registration
                    exit();
                } else {
                    echo "<p class='text-danger'>Could not write to user database.</p>";
                }
            }
        } else {
            echo "<p class='text-danger'>Could not open user database for reading.</p>";
        }
    }
}
?>

<main class="container">
  <div class="register-box">
    <h1>Register for myJournal</h1>
    <form action="register.php" method="POST">
      <div class="form-group mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>

      <div class="form-group mb-3">
        <label for="password" class="form-label">Password:</label>
        <div class="input-group">
          <input type="password" class="form-control" id="register_password" name="password" required>
          <button class="btn-show-password" type="button" onclick="togglePasswordVisibility('register_password')">Show</button>
        </div>
      </div>

      <div class="form-group mb-3">
        <label for="confirm_password" class="form-label">Confirm Password:</label>
        <div class="input-group">
          <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
          <button class="btn-show-password" type="button" onclick="togglePasswordVisibility('confirm_password')">Show</button>
        </div>
      </div>

      <div class="form-group mb-3">
        <label for="full_name" class="form-label">Full Name:</label>
        <input type="text" class="form-control" id="full_name" name="full_name" required>
      </div>

      <div class="form-group mb-3">
        <label for="security_question" class="form-label">Security Question:</label>
        <input type="text" class="form-control" id="security_question" name="security_question" required>
      </div>

      <div class="form-group mb-3">
        <label for="security_answer" class="form-label">Security Question Answer:</label>
        <input type="text" class="form-control" id="security_answer" name="security_answer" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
  </div>
</main>

<script>
function togglePasswordVisibility(fieldId) {
  var passwordField = document.getElementById(fieldId);
  if (passwordField.type === "password") {
    passwordField.type = "text";
  } else {
    passwordField.type = "password";
  }
}
</script>

<?php
require 'includes/footer.php';
ob_end_flush(); // End output buffering
?>