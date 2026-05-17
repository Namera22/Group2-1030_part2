<?php
session_start();

// If already logged in, redirect straight to manage.php
if (isset($_SESSION['logged_in'])) {
    header("Location: manage.php");
    exit();
}

include 'settings.php';
$conn = mysqli_connect($host, $user, $password, $database);

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '" . mysqli_real_escape_string($conn, $username) . "'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: manage.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Login | Smart City Infrastructure Consultancy</title>
    <link rel="stylesheet" href="index-style.css">
    <style>
        .login-wrapper {
            max-width: 400px;
            margin: 8em auto 3em;
            padding: 2em;
            border: 2px solid #0a3d62;
            border-radius: 10px;
            background-color: #f0f4f8;
        }

        .login-wrapper h1 {
            font-size: 1.5em;
            color: #0a1628;
            margin-bottom: 1em;
            text-align: center;
            margin-top: 0;
        }

        .login-wrapper label {
            display: block;
            margin-bottom: 0.3em;
            color: #0a1628;
            font-weight: bold;
        }

        .login-wrapper input {
            width: 100%;
            padding: 0.6em 1em;
            margin-bottom: 1em;
            border: 1px solid #0a3d62;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1em;
        }

        .login-btn {
            width: 100%;
            padding: 0.7em;
            background-color: #0a3d62;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            cursor: pointer;
            font-weight: bold;
        }

        .login-btn:hover {
            background-color: #0a1628;
        }

        .error {
            color: red;
            margin-bottom: 1em;
            text-align: center;
            font-size: 0.95em;
        }
    </style>
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

    <div class="login-wrapper">
        <h1>HR Manager Login</h1>
        <?php if ($error): ?>
            <p class="error">
                <?php echo htmlspecialchars($error); ?>
            </p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>

    <footer>
        <p><a href="https://cos-10026-assignment-group-2.atlassian.net/jira/software/projects/SCRUM/summary">Jira
                Project Link</a></p>
        <p><a href="https://github.com/Namera22/Group2-1030.git">GitHub Repository</a></p>
        <p><a href="mailto:info@smartcity.com">Email Us</a></p>
    </footer>

</body>

</html>