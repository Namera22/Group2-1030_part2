<?php
session_start();

// Guard - redirect to login if not logged in
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Manager | Smart City Infrastructure Consultancy</title>
    <link rel="stylesheet" href="index-style.css">
</head>

<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <img src="images/logo.png" alt="Logo">
                <div class="logo-text">
                    <strong>SmartCity</strong>
                    <span>Infrastructure Consultancy</span>
                </div>
            </div>
            <ul class="navigation-bar" aria-label="Main navigation">
                <li><a href="index.html">Home</a></li>
                <li><a href="jobs.php">Jobs</a></li>
                <li><a href="apply.html">Apply</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </div>
    </nav>

    <div style="max-width:1100px; margin: 8em auto 3em; padding: 0 2em;">
        <h1 style="color:#0a1628;">HR Manager Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>.
            <a href="logout.php">Logout</a>
        </p>
        <!-- TODO: John builds the queries here -->
    </div>

    <footer>
        <p><a href="https://github.com/Namera22/Group2-1030.git">GitHub Repository</a></p>
        <p><a href="mailto:info@smartcity.com">Email Us</a></p>
    </footer>

</body>

</html>