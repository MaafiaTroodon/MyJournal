<footer class="pg-footer">
    <!-- Display last login time if available and user is logged in -->
    <?php
    // Check if session is already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start(); // Start session if it's not already active
    }

    if (isset($_SESSION['username']) && isset($_COOKIE['last_login_time'])) {
        echo "<p>Last login attempt was on " . $_COOKIE['last_login_time'] . ".</p><br>";
    }
    ?>
    <p>&copy; <?php echo date("Y"); ?> myJournal. All rights reserved.</p> 
    <br>
    <p>
        <?php if (isset($_SESSION['username'])): ?>
            <!-- If user is logged in, allow access to Preferences -->
            <a href="/CSCI2170/a2/account_settings.php">Preferences</a> | 
        <?php else: ?>
            <!-- If user is not logged in, redirect to login page -->
            <a href="includes/login.php">Login to access Preferences</a> |
        <?php endif; ?>
        <a href="/CSCI2170/A2/about.php">About myJournal</a> | 
        <a href="/CSCI2170/A2/terms_of_use.php">Terms of Use</a> | 
        <a href="/CSCI2170/A2/privacy_policy.php">Privacy Policy</a>
    </p>
    <br>
</footer>
<!-- Bootstrap JS for navbar functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Link to your custom JavaScript file -->
<script src="js/main.js"></script>
</body>
</html>

