<?php
session_start();
ob_start(); // Start output buffering
require 'includes/header.php';

/*
PHP Manual. (2023). password_hash() - Manual. PHP Documentation. Retrieved October 10, 2024, from https://www.php.net/manual/en/function.password-hash.php.
Used to securely hash passwords before saving them in the users.csv file.
*/
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$file_path = $_SERVER['DOCUMENT_ROOT'] . '/CSCI2170/a2/db/users.csv';

// Read current user data from users.csv
$current_full_name = '';
if (($file = fopen($file_path, 'r')) !== false) {
    while (($data = fgetcsv($file)) !== false) {
        if ($data[0] === $username) {
            $current_full_name = $data[2]; // Get current full name
            break;
        }
    }
    fclose($file);
}

// Handle form submission for updating display name
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_name'])) {
    $new_full_name = htmlspecialchars($_POST['full_name']);

    // Update users.csv with the new full name
    $users = [];
    if (($file = fopen($file_path, 'r')) !== false) {
        while (($data = fgetcsv($file)) !== false) {
            if ($data[0] === $username) {
                $data[2] = $new_full_name; // Update full name
            }
            $users[] = $data;
        }
        fclose($file);
    }

    if (($file = fopen($file_path, 'w')) !== false) {
        foreach ($users as $user) {
            fputcsv($file, $user);
        }
        fclose($file);
        $_SESSION['full_name'] = $new_full_name; // Update session
        header("Location: account_settings.php?success=name");
        exit();
    }
}

// Handle form submission for updating password
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if new password matches confirmation
    if ($new_password !== $confirm_password) {
        $error_message = "Passwords do not match!";
    } else {
        $users = [];
        if (($file = fopen($file_path, 'r')) !== false) {
            while (($data = fgetcsv($file)) !== false) {
                if ($data[0] === $username) {
                    if (password_verify($current_password, $data[1])) {
                        $data[1] = password_hash($new_password, PASSWORD_DEFAULT); // Hash and update password
                    } else {
                        $error_message = "Current password is incorrect!";
                    }
                }
                $users[] = $data;
            }
            fclose($file);
        }

        if (!isset($error_message)) {
            if (($file = fopen($file_path, 'w')) !== false) {
                foreach ($users as $user) {
                    fputcsv($file, $user);
                }
                fclose($file);
                // Log the user out after changing password
                session_destroy();
                header("Location: index.php?success=password");
                exit();
            }
        }
    }
}
?>

<div class="form-container mt-5">
    <h1>Account Settings</h1>

    <!-- Display success or error messages -->
    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger"><?= $error_message; ?></div>
    <?php elseif (isset($_GET['success']) && $_GET['success'] == 'name'): ?>
        <div class="alert alert-success">Display name updated successfully!</div>
    <?php elseif (isset($_GET['success']) && $_GET['success'] == 'password'): ?>
        <div class="alert alert-success">Password changed successfully! Please log in again.</div>
    <?php endif; ?>

    <!-- Form for updating display name -->
    <form method="POST" action="account_settings.php">
        <div class="mb-3">
            <label for="full_name" class="form-label">Display Name:</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="<?= htmlspecialchars($current_full_name); ?>" required>
        </div>
        <button type="submit" name="update_name" class="btn btn-primary">Update Display Name</button>
    </form>

    <hr>

    <!-- Form for updating password -->
    <form method="POST" action="account_settings.php">
        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password:</label>
            <div class="input-group">
                <input type="password" class="form-control" id="current_password" name="current_password" required>
                <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('current_password')">Show</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">New Password:</label>
            <div class="input-group">
                <input type="password" class="form-control" id="new_password" name="new_password" required>
                <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('new_password')">Show</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm New Password:</label>
            <div class="input-group">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('confirm_password')">Show</button>
            </div>
        </div>

        <button type="submit" name="update_password" class="btn btn-primary">Update Password</button>
    </form>
</div>

<script>
function togglePasswordVisibility(fieldId) {
    var passwordField = document.getElementById(fieldId);
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

<?php
require 'includes/footer.php';
?>