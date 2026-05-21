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

    </ul>

    <!-- SEARCH -->

    <form class="nav-search">

      <input type="text"
             id="search"
             placeholder="Search..."
             aria-label="Search website">

      <button type="submit" aria-label="Submit search">
        Search
      </button>

    </form>

  </div>

</nav>

</header>