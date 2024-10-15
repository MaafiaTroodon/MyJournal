
<?php
session_start();
require 'includes/header.php';

// If the user is logged in, display journal entries
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $file_path = $_SERVER['DOCUMENT_ROOT'] . '/CSCI2170/a2/db/entries.csv';
    ?>
    <div class="entry-container">
        <div class="entry-heading">
            <h1>Welcome, <?= $_SESSION['full_name']; ?>!</h1>
            <h2>Your Journal Entries</h2>
        </div>
        <main class="jounal-container">
            <?php
            $entries_found = false;
            if (file_exists($file_path) && ($file = fopen($file_path, 'r')) !== false) {
                $entry_id = 0;
                while (($data = fgetcsv($file)) !== false) {
                    if ($data[0] === $username) {
                        $entries_found = true;
                        ?>
                        <div class="entry-card" >
                            <div class="entry-card-header">
                                <?= htmlspecialchars($data[1]); ?> - <?= htmlspecialchars($data[3]); ?>
                            </div>
                            <div class="entry-card-body">
                                <?= nl2br(htmlspecialchars($data[2])); ?>
                            </div>
                            <div class="entry-card-footer">
                                <a href="edit_entry.php?entry_id=<?= $entry_id; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete_entry.php?entry_id=<?= $entry_id; ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        <?php
                    }
                    $entry_id++;
                }
                fclose($file);

                if (!$entries_found) {
                    echo "<p>No entries found. Start writing your first journal entry!</p>";
                }
            } else {
                echo "<p>No entries found. Start writing your first journal entry!</p>";
            }
            ?>
        </main>
    </div>
    <?php
} else {
    // User not logged in, show login link and welcome message
    ?>
    <main class="container">
        <div class="welcome-box" style="text-align: center;">
            <h1 class="display-4">Welcome to myJournal</h1>
            <p class="lead">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum. 
                Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.
            </p>
            <p class="lead">
                Duis lobortis massa imperdiet quam. Nulla consequat massa quis enim. Donec pede justo, fringilla vel.
            </p>
            <div class="login-box">
                <a href="includes/login.php" class="btn btn-primary btn-lg">Click here to login to access journals</a>
            </div>
            <div class="signup-box">
    <p>Don't have an account? <a href="register.php">Create one today to start writing journals</a></p>
  </div>
        </div>
    </main>
    <?php
}

require 'includes/footer.php';