<?php
session_start();

// Guard - redirect to login if not logged in
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

// EOI management is only available to administrators.
if (($_SESSION['role'] ?? '') !== 'admin') {
    header("Location: index.php");
    exit();
}

$pageTitle = "HR Manager | Smart City Infrastructure Consultancy";
$pageDescription = "HR manager dashboard for Smart City Infrastructure Consultancy.";
$pageKeywords = "HR manager, dashboard, Smart City Infrastructure Consultancy";
$pageAuthor = "Group 2";
?>

<?php include 'header.inc'; ?>
<?php include 'nav.inc'; ?>

    <main id="maincontent" style="max-width:1100px; margin: 8em auto 3em; padding: 0 2em;">
        <h1 style="color:#0a1628;">HR Manager Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>.
            <a href="logout.php">Logout</a>
        </p>
        <!-- TODO: John builds the queries here -->
    </main>

    <?php include 'footer.inc'; ?>