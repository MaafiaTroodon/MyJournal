<?php
session_start();
ob_start();  // Start output buffering
require 'includes/header.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $body = htmlspecialchars($_POST['body']);
    $username = $_SESSION['username'];
    $date = date('Y-m-d'); // Get the current date

    if (empty($title) || empty($body)) {
        $error_message = "Both title and body are required.";
    } else {
        $file_path = $_SERVER['DOCUMENT_ROOT'] . '/CSCI2170/a2/db/entries.csv';

        if (($file = fopen($file_path, 'a')) !== false) {
            fputcsv($file, [$username, $title, $body, $date]);
            fclose($file);

            // Redirect to the home page after adding the entry
            header("Location: index.php");
            exit();  // Always use exit after header redirect
        } else {
            $error_message = "Could not write to the entries database.";
        }
    }
}
?>

<div class="form-container">
    <h1>Create a New Journal Entry</h1>
    <?php if (isset($error_message)): ?>
        <p class="text-danger"><?= $error_message; ?></p>
    <?php endif; ?>
    <form method="POST" action="add_entry.php">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Entry</button>
    </form>
</div>

<?php
require 'includes/footer.php';
?>