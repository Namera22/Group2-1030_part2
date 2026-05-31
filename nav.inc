<?php
$navRole = $_SESSION['role'] ?? null;
$isAdmin = $navRole === 'admin';
?>

<header>

<nav class="navbar">

  <div class="nav-container">

    <!-- LOGO -->

    <div class="logo">

      <img src="images/logo.png"
           alt="SmartCity Infrastructure Consultancy logo">

      <div class="logo-text">
        <strong>SmartCity</strong>
        <span>Infrastructure Consultancy</span>
      </div>

    </div>

    <!-- NAVIGATION -->

    <ul class="navigation-bar" aria-label="Main navigation">

      <li>
        <a href="index.php"
        class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
        Home
        </a>
      </li>

      <li>
        <a href="jobs.php"
        class="<?php echo (basename($_SERVER['PHP_SELF']) == 'jobs.php') ? 'active' : ''; ?>">
        Jobs
        </a>
      </li>

      <li>
        <a href="apply.php"
        class="<?php echo (basename($_SERVER['PHP_SELF']) == 'apply.php') ? 'active' : ''; ?>">
        Apply
        </a>
      </li>

      <li>
        <a href="about.php"
        class="<?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>">
        About
        </a>
      </li>

      <?php if ($isAdmin): ?>
        <li>
          <a href="manage.php"
          class="<?php echo (basename($_SERVER['PHP_SELF']) == 'manage.php') ? 'active' : ''; ?>">
          EOI
          </a>
        </li>
      <?php endif; ?>

    </ul>

    <!-- SEARCH -->

    <form class="nav-search" method="get" action="index.php">

      <input type="text"
             id="search"
             name="site_search"
             placeholder="Search..."
             aria-label="Search website"
             value="<?php echo htmlspecialchars($_GET['site_search'] ?? ''); ?>">

      <button type="submit" aria-label="Submit search">
        Search
      </button>

    </form>

    <div class="nav-account" aria-label="Account status">
      <?php if (isset($_SESSION['logged_in']) && $isAdmin): ?>
        <span>Admin</span>
        <a href="logout.php">Logout</a>
      <?php else: ?>
        <a href="login.php">Admin Login</a>
      <?php endif; ?>
    </div>

  </div>

</nav>

</header>