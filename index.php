
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
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor ac ipsum sed vulputate. Aenean eget justo id urna luctus fringilla sed id mauris. Vivamus vel semper tellus, dictum mollis augue. Ut ac arcu ut tellus pulvinar pretium. Quisque porttitor nunc sed nisi aliquet suscipit. Suspendisse laoreet urna eu metus vestibulum, sit amet dignissim nibh bibendum. In cursus, risus at convallis maximus, enim dui imperdiet felis, sit amet placerat enim dui nec nunc. Aliquam erat volutpat. Curabitur ut ex non purus malesuada convallis. Sed blandit ligula nunc, non sodales felis ultricies ac. Nullam aliquam eu justo sed tristique. Cras sodales rutrum faucibus. Cras tincidunt ornare ante et ultricies. Praesent luctus, nisl at porttitor hendrerit, eros mauris vestibulum dolor, nec maximus leo lorem sit amet mauris.

                Phasellus malesuada libero mi, ut fringilla magna pharetra ut. Curabitur aliquam urna et lacus pellentesque, non ornare ante volutpat. Mauris vel urna quam. Proin felis enim, hendrerit a nunc et, faucibus posuere tellus. Maecenas scelerisque, urna convallis euismod bibendum, ligula leo rhoncus eros, nec accumsan quam diam ut mauris. Etiam vel lectus vel est lacinia feugiat eu ac lorem. Maecenas id scelerisque tellus. In hac habitasse platea dictumst. Praesent tempus pulvinar est sit amet pellentesque.
            </p>
            <p class="lead">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut fringilla, justo non commodo vulputate, magna sapien venenatis odio, sit amet euismod leo augue ut risus. Sed maximus semper suscipit. Pellentesque tristique urna at nibh suscipit, in finibus turpis maximus. Vivamus dapibus ligula ut libero venenatis egestas. Nullam ac felis non nulla tristique volutpat non id sem. Vivamus rutrum, sapien eget dignissim facilisis, ligula ligula sollicitudin ipsum, et commodo velit purus vitae lacus. Integer ut risus nec est consectetur facilisis vitae nec nunc. Maecenas quis maximus nulla. Suspendisse luctus rutrum tristique.
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