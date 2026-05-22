<?php
session_start();

// If already logged in as an administrator, redirect straight to the website.
if (isset($_SESSION['logged_in']) && ($_SESSION['role'] ?? '') === 'admin') {
    header("Location: index.php");
    exit();
}

if (isset($_SESSION['logged_in'])) {
    session_unset();
    session_destroy();
    session_start();
}

include 'settings.php';
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $statement = mysqli_prepare($conn, "SELECT username, password, role FROM users WHERE username = ?");
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $account = mysqli_fetch_assoc($result);

    if ($account && $account['role'] === 'admin' && password_verify($_POST['password'], $account['password'])) {
        session_regenerate_id(true);
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $account['username'];
        $_SESSION['role'] = $account['role'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}

$pageTitle = "Admin Login | Smart City Infrastructure Consultancy";
$pageDescription = "Administrator login for Smart City Infrastructure Consultancy.";
$pageKeywords = "admin login, administrator access, Smart City Infrastructure Consultancy";
$pageAuthor = "Namera Nayat";
?>

<?php include 'header.inc'; ?>
<?php include 'nav.inc'; ?>

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

    <main id="maincontent" class="login-wrapper">
        <h1>Admin Login</h1>
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
    </main>

    <?php include 'footer.inc'; ?>