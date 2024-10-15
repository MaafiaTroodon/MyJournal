<?php
session_start();
require 'includes/header.php'; // Include your header here

// Define the base URL for easier path management
$base_url = '/CSCI2170/a2/';
$csv_path = $_SERVER['DOCUMENT_ROOT'] . $base_url . 'db/users.csv';

$error = $success = '';
$step = 1; // Default to step 1 (Enter Username)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $step = intval($_POST['step']);
    
    if ($step === 1) {
        // Step 1: Validate Username
        $username = htmlspecialchars($_POST['username']);
        if (($file = fopen($csv_path, 'r')) !== false) {
            $user_found = false;
            while (($data = fgetcsv($file)) !== false) {
                if ($data[0] === $username) {
                    $_SESSION['reset_username'] = $username;
                    $_SESSION['security_answer'] = $data[4]; // Adjust to the correct index // Assuming security answer is in column 3
                    $user_found = true;
                    break;
                }
            }
            fclose($file);
            if ($user_found) {
                $step = 2; // Go to Step 2: Security Question
            } else {
                $error = "Username not found.";
            }
        }
    } elseif ($step === 2) {
        // Step 2: Validate Security Question
        $security_answer = strtolower(trim($_POST['security_answer']));
        $stored_answer = strtolower(trim($_SESSION['security_answer']));

        if ($security_answer === $stored_answer) {
            $step = 3; // Go to Step 3: Reset Password
        } else {
            $error = "Security answer is incorrect.";
        }
    } elseif ($step === 3) {
        // Step 3: Reset Password
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if ($new_password === $confirm_password && strlen($new_password) >= 8) {
            // Hash the new password and update the CSV
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $users = [];
            if (($file = fopen($csv_path, 'r')) !== false) {
                while (($data = fgetcsv($file)) !== false) {
                    if ($data[0] === $_SESSION['reset_username']) {
                        $data[1] = $hashed_password; // Update the password field (assuming it's in column 1)
                    }
                    $users[] = $data;
                }
                fclose($file);
            }

            // Write the updated data back to CSV
            if (($file = fopen($csv_path, 'w')) !== false) {
                foreach ($users as $user) {
                    fputcsv($file, $user);
                }
                fclose($file);
                session_destroy(); // Invalidate session and log the user out
                $success = "Your password has been reset. Please log in again.";
                header("Location: includes/login.php?reset=success");
                exit();
            }
        } else {
            $error = "Passwords do not match or are too short.";
        }
    }
}
?>

<main class="container">
    <div class="form-container">
        <h1>Forgot Password</h1>
        <?php if ($error): ?>
            <p class="text-danger"><?= $error; ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p class="text-success"><?= $success; ?></p>
        <?php endif; ?>

        <?php if ($step === 1): ?>
            <!-- Step 1: Ask for Username -->
            <form action="forgot_password.php" method="POST">
                <div class="form-group">
                    <label for="username">Enter your username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <input type="hidden" name="step" value="1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php endif; ?>

        <?php if ($step === 2): ?>
            <!-- Step 2: Ask Security Question -->
            <form action="forgot_password.php" method="POST">
                <div class="form-group">
                    <label for="security_answer">What is your favorite color?</label> <!-- Replace this with your actual security question -->
                    <input type="text" class="form-control" id="security_answer" name="security_answer" required>
                </div>
                <input type="hidden" name="step" value="2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php endif; ?>

        <?php if ($step === 3): ?>
            <!-- Step 3: Reset Password -->
            <form action="forgot_password.php" method="POST">
                <div class="form-group">
                    <label for="new_password">Enter new password:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('new_password')">Show</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm new password:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('confirm_password')">Show</button>
                    </div>
                </div>
                <input type="hidden" name="step" value="3">
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        <?php endif; ?>
    </div>
</main>

<!-- Add your Bootstrap JS if needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
function togglePasswordVisibility(fieldId) {
    var passwordField = document.getElementById(fieldId);
    var button = passwordField.nextElementSibling;

    if (passwordField.type === "password") {
        passwordField.type = "text";
        button.textContent = "Hide";
    } else {
        passwordField.type = "password";
        button.textContent = "Show";
    }
}
</script>

<?php
require 'includes/footer.php'; // Include your footer here
?>