<?php
session_start();
require 'includes/header.php';

/*
Bootstrap. (2023). Navbar. Bootstrap 5.0 Documentation. Retrieved October 10, 2024, from https://getbootstrap.com/docs/5.0/components/navbar/.
Used to create the responsive navigation bar for the journal application.
*/

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $file_path = $_SERVER['DOCUMENT_ROOT'] . '/CSCI2170/a2/db/entries.csv';
    ?>
    
    <div class="entry-container">
        <div class="entry-heading">
            <h1>Welcome, <?= $_SESSION['full_name']; ?>!</h1>
            <h2>Your Journal Entries</h2>
        </div>

        <!-- Search bar for journal entries -->
        <div class="search-bar">
            <input type="text" id="search-input" class="form-control" placeholder="Search journal entries...">
        </div>

        <main class="journal-container">
            <?php
            $entries_found = false;
            if (file_exists($file_path) && ($file = fopen($file_path, 'r')) !== false) {
                $entry_id = 0;
                echo '<div id="entry-list">';
                while (($data = fgetcsv($file)) !== false) {
                    if ($data[0] === $username) {
                        $entries_found = true;
                        ?>
                        <div class="entry-card" data-title="<?= htmlspecialchars($data[1]); ?>" data-body="<?= htmlspecialchars($data[2]); ?>">
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
                echo '</div>';
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

    <script>
        // JavaScript for live search filtering
        document.getElementById('search-input').addEventListener('input', function() {
            const filter = this.value.toLowerCase();
            const entries = document.querySelectorAll('.entry-card');

            entries.forEach(function(entry) {
                const title = entry.getAttribute('data-title').toLowerCase();
                const body = entry.getAttribute('data-body').toLowerCase();

                if (title.includes(filter) || body.includes(filter)) {
                    entry.style.display = '';
                } else {
                    entry.style.display = 'none';
                }
            });
        });
    </script>

    <?php
} else {
    // User not logged in, show login link and welcome message
    ?>
    <main class="container">
        <div class="welcome-box" style="text-align: center;">
            <h1 class="display-4">Welcome to myJournal</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</p>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p class="lead">Nunc imperdiet lectus vitae ante imperdiet dictum.</p>
            <p class="lead">Vestibulum eget velit viverra, fermentum diam vel, tincidunt ante.</p>
            <p class="lead">Nam enim sapien, ultricies a odio ac, pharetra efficitur tellus.</p>
            <p class="lead">In hac habitasse platea dictumst.</p>
            <p class="lead">Donec tempus, tellus non egestas aliquet, neque neque commodo velit, vel tincidunt augue metus id tortor.</p>
            <p class="lead">Aenean vel augue vulputate, lobortis sapien sit amet, viverra justo.</p>
            <p class="lead">Morbi eget velit quis neque interdum luctus.</p>
            <p class="lead">Cras in odio non sapien mattis egestas ut eget mauris.</p>
            <p class="lead">Morbi quis elit augue.</p>
            <p class="lead">Curabitur lorem arcu, ultrices porttitor semper et, sollicitudin eget justo.</p>
            <p class="lead">Vestibulum vel nisl velit.</p>
            <p class="lead">Etiam fringilla neque at massa consectetur, et hendrerit tellus aliquam.</p>
            <p class="lead">Phasellus nec sapien eget sapien faucibus aliquet a a felis.</p>
            <p class="lead">Morbi volutpat facilisis eros eget consectetur.</p>
            <p class="lead">Pellentesque ut mi eu ex vehicula pulvinar et malesuada dolor.</p>
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
?>