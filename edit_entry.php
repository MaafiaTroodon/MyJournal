<?php
session_start();
require 'includes/header.php';

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$entry_id = $_GET['entry_id']; // Get entry ID or line number from URL

// Path to entries.csv
$file_path = $_SERVER['DOCUMENT_ROOT'] . '/CSCI2170/a2/db/entries.csv';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $body = htmlspecialchars($_POST['body']);
    
    // Validate and update the entry in the CSV file
    if (empty($title) || empty($body)) {
        $error_message = "Both title and body are required.";
    } else {
        $entries = [];
        if (($file = fopen($file_path, 'r')) !== false) {
            while (($data = fgetcsv($file)) !== false) {
                $entries[] = $data;
            }
            fclose($file);
        }

        if ($entries[$entry_id][0] === $username) {
            // Update the specific entry
            $entries[$entry_id][1] = $title;
            $entries[$entry_id][2] = $body;
            $entries[$entry_id][3] = date('Y-m-d'); // Update the date

            // Write the updated entries back to the CSV file
            $file = fopen($file_path, 'w');
            foreach ($entries as $entry) {
                fputcsv($file, $entry);
            }
            fclose($file);

            // Redirect to the home page after editing the entry
            header("Location: index.php");
            exit();
        } else {
            $error_message = "You do not have permission to edit this entry.";
        }
    }
}
?>
<main class="container">
    <div class="form-container">
        <h1>Edit Journal Entry</h1>
        <?php if (isset($error_message)) {
            echo "<p class='text-danger'>$error_message</p>";
        } ?>

        <form action="edit_entry.php?entry_id=<?= $entry_id ?>" method="POST">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($entries[$entry_id][1]) ?>" required>
            </div>
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" id="body" name="body" rows="5" required><?= htmlspecialchars($entries[$entry_id][2]) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Entry</button>
        </form>
    </div>
</main>

<?php
require 'includes/footer.php';
?>