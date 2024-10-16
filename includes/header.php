<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 
    Bootstrap. (2023). Navbar. Bootstrap 5.0 Documentation. 
    Retrieved October 10, 2024, from https://getbootstrap.com/docs/5.0/components/navbar/. 
    This CSS link was included to style the responsive navbar.
    -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&family=Nunito:ital,wght@0,600;1,600&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&family=Nunito:ital,wght@0,700;1,700&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <title>myJournal</title>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if the user is not logged in
            const isLoggedIn = <?php echo isset($_SESSION['username']) ? 'true' : 'false'; ?>;

            // Add event listeners to the "Create Entry" and "Preferences" links if the user is not logged in
            if (!isLoggedIn) {
                const createEntryLink = document.querySelector('a[href="add_entry.php"]');
                const preferencesLink = document.querySelector('a[href="account_settings.php"]');

                createEntryLink.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent default action
                    alert('Please log in or create an account to create an entry.');
                });

                preferencesLink.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent default action
                    alert('Please log in or create an account to access preferences.');
                });
            }
        });
    </script>

</head> 
    
<body>
    <!-- 
    Bootstrap. (2023). Offcanvas Navbar. Bootstrap 5.0 Documentation.
    Retrieved October 10, 2024, from https://getbootstrap.com/docs/5.0/components/navbar/#offcanvas.
    Adapted this code for a fixed navbar with additional links.
    -->

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img class="logo-image" alt="Logo Image" src="images/logo-image.jpg" width="100"> 
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_entry.php">Create Entry</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account_settings.php">Preferences</a>
                        </li>
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="includes/logout.php">Logout (<?php echo htmlspecialchars($_SESSION['full_name']); ?>)</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="includes/login.php">Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>