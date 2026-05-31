<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$siteSearchMessage = "";

if (isset($_GET['site_search'])) {
    $siteSearch = strtolower(trim($_GET['site_search']));
    $isAdminSearch = isset($_SESSION['logged_in']) && ($_SESSION['role'] ?? '') === 'admin';

    if ($siteSearch === "") {
        $siteSearchMessage = "Please enter something to search.";
    } elseif (in_array($siteSearch, ["home", "index"], true)) {
        header("Location: index.php");
        exit();
    } elseif (in_array($siteSearch, ["jobs", "job", "careers", "career", "openings"], true)) {
        header("Location: jobs.php");
        exit();
    } elseif (in_array($siteSearch, ["apply", "application", "form"], true)) {
        header("Location: apply.php");
        exit();
    } elseif (in_array($siteSearch, ["about", "team", "members"], true)) {
        header("Location: about.php");
        exit();
    } elseif (in_array($siteSearch, ["admin", "login", "admin login"], true)) {
        header("Location: login.php");
        exit();
    } elseif (in_array($siteSearch, ["eoi", "manage"], true)) {
        header("Location: " . ($isAdminSearch ? "manage.php" : "login.php"));
        exit();
    } elseif (in_array($siteSearch, ["transport", "smart traffic", "traffic", "energy", "solar", "battery", "services"], true)) {
        header("Location: index.php#services");
        exit();
    } elseif (preg_match("/^[a-z]{2}[0-9]{3}$/", $siteSearch)) {
        header("Location: jobs.php?search=" . urlencode($siteSearch));
        exit();
    } else {
        $siteSearchMessage = "No matching page found. Try jobs, apply, about, admin, transport, solar, or a job reference such as ST001.";
    }
}

$pageTitle = "Smart City Infrastructure Consultancy";
$pageDescription = "G02-Home page for Smart City Infrastructure Consultancy.";
$pageKeywords = "smart city, infrastructure, consultancy, smart transport, digital solutions";
$pageAuthor = "Shushmita Barua";
$pageStyles = ["global-style.css", "index-style.css"];
?>

<?php include 'header.inc'; ?>
<?php include 'nav.inc'; ?>

<!-- main-->
<main id="maincontent">

  <?php if ($siteSearchMessage !== ""): ?>
    <section class="search-feedback" aria-live="polite">
      <?php echo htmlspecialchars($siteSearchMessage); ?>
    </section>
  <?php endif; ?>

  <!--hero section-->
  <section class="hero">

    <div class="overlay">

      <h1>
        Building Intelligent Urban Futures
      </h1>

      <p>Smart transport and digital solutions.</p>

      <a href="jobs.php"
         class="btn"
         aria-label="Explore available careers">

         Explore Careers

      </a>

    </div>

  </section>

  <!--table-->
  <section class="services-section" id="services">

    <div class="services-inner">
      <h2>Our Services</h2>

      <table class="services-table">

        <thead>

          <tr>
            <th colspan="2" scope="col">Services</th>
          </tr>

        </thead>

        <tbody>

          <tr>
            <td class="service-category">Transport</td>
            <td>Smart Traffic</td>
          </tr>

          <tr>
            <td class="service-category" rowspan="2">Energy</td>
            <td>Solar</td>
          </tr>

          <tr>
            <td>Battery</td>
          </tr>

        </tbody>

      </table>
    </div>

  </section>

  <!-- acknowledgement of the country-->
  <section class="acknowledgement">

    <h2>Our Commitment to Inclusion</h2>

    <p>
      SmartCity Nexus encourages applications from Aboriginal and Torres Strait Islander peoples and is committed to creating an inclusive workplace.
    </p>

    <p>
      We recognise the importance of diverse perspectives in building smarter,more equitable urban environments.
    </p>

  </section>

</main>

<?php include 'footer.inc'; ?>