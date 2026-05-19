<?php
include 'settings.php';
$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$search = "";
if (isset($_GET['search']) && $_GET['search'] !== "") {
    $search = mysqli_real_escape_string($conn, trim($_GET['search']));
    $query = "SELECT * FROM jobs WHERE title LIKE '%$search%' OR ref_number LIKE '%$search%'";
} else {
    $query = "SELECT * FROM jobs";
}
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="G02-Job Positions at Smart City Infrastructure Consultancy Careers" />
    <meta name="keywords" content="smart city, jobs, careers, urban infrastructure, transport, IoT" />
    <meta name="author" content="Namera Nayat" />
    <link rel="stylesheet" href="jobs-style.css" />
    <link rel="stylesheet" href="index-style.css">
    <title>Job Positions | Smart City Infrastructure Consultancy</title>
</head>

<body>
    <nav class="navbar">

        <div class="nav-container">

            <!-- LOGO -->
            <div class="logo">
                <img src="images/logo.png" alt="Logo">
                <div class="logo-text">
                    <strong>SmartCity</strong>
                    <span>Infrastructure Consultancy</span>
                </div>
            </div>

            <!-- MENU -->
            <ul class="navigation-bar" aria-label="Main navigation">
                <li><a href="index.php">Home</a></li>
                <li><a href="jobs.php" class="active" aria-current="page">Jobs</a></li>
                <li><a href="apply.php">Apply</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
    <!-- SEARCH BAR -->
<form class="nav-search">

  <input type="text" id="search" placeholder="Search...">

  <button type="submit">Search</button>

</form>
        </div>

    </nav>
    <!-- Page wrapper -->
    <div id="page-wrapper">

        <!-- Page Header -->
        <header style="text-align: center;">
            <h1>Current Job Openings</h1>
            <p>Explore opportunities to help shape the cities of tomorrow.</p>
        </header>

        <!-- Search bar -->
        <form method="GET" action="jobs.php" style="text-align: center; margin: 1.5em 0;">
            <input type="text" name="search" placeholder="Search by job title or reference number..."
                value="<?php echo htmlspecialchars($search); ?>"
                style="padding: 0.6em 1em; width: 50%; border: 2px solid #0a3d62; border-radius: 10px; font-size: 1em;">
            <button type="submit"
                style="padding: 0.6em 1.2em; background-color: #0a3d62; color: white; border: none; border-radius: 10px; font-size: 1em; cursor: pointer; margin-left: 0.5em;">
                Search
            </button>
            <?php if ($search !== ""): ?>
                <a href="jobs.php" style="margin-left: 1em; color: #0a3d62; font-size: 0.95em;">Clear</a>
            <?php endif; ?>
        </form>

        <!-- main content -->
        <main role="main" aria-label="Job listings">

            <!-- Aside: Quick info panel - floated right, 25% width -->
            <aside aria-label="Quick information and job navigation">
                <h2>Quick Info</h2>

                <h3>Open Positions</h3>
                <p>We currently have <strong>5 positions</strong> available across our teams.</p>

                <h3>Details</h3>
                <p><strong>Location:</strong> Melbourne, VIC</p>
                <p><strong>Employment Type:</strong> Full-time, Permanent</p>
                <p><strong>Application Deadline:</strong> 30 May 2026</p>

                <h3>How to Apply</h3>
                <p>Ready to join us? Head to our <a href="apply.php">Apply page</a> and
                    submit your application with the relevant job reference number.</p>

                <h3>Contact Us</h3>
                <p><a href="mailto:info@urbansyncconsultancy.com">info@urbansyncconsultancy.com</a></p>

                <h3>Jump To Position</h3>
                <ul aria-label="Jump to job position">
                    <li><a href="#ST001">ST001 – Smart Transport Systems Engineer</a></li>
                    <li><a href="#UD002">UD002 – Urban Data Analyst</a></li>
                    <li><a href="#CP003">CP003 – Smart City Project Manager</a></li>
                    <li><a href="#CE004">CE004 – IoT &amp; Connected Infrastructure Specialist</a></li>
                    <li><a href="#CS005">CS005 – Community &amp; Stakeholder Engagement Officer</a></li>
                </ul>
            </aside>

            <!-- AI acknowledgement: All job content (descriptions, responsibilities, requirements, and details) generated using GenAI tools -->
            <?php

            if (mysqli_num_rows($result) == 0) {
                echo "<p style='margin-left:2.5em; color:#0a1628;'>No jobs found matching your search.</p>";
            }

            while ($job = mysqli_fetch_assoc($result)) {
                $responsibilities = explode("|", $job['responsibilities']);
                $essential = explode("|", $job['essential_req']);
                $preferable = explode("|", $job['preferable_req']);
                ?>
                <section id="<?php echo htmlspecialchars($job['ref_number']); ?>">
                    <p class="ref-number">
                        <?php echo htmlspecialchars($job['ref_number']); ?>
                    </p>
                    <h2>
                        <?php echo htmlspecialchars($job['title']); ?>
                    </h2>
                    <p>
                        <?php echo htmlspecialchars($job['description']); ?>
                    </p>

                    <h3>Position Details</h3>
                    <div class="job-details">
                        <p><strong>Salary:</strong>
                            <?php echo htmlspecialchars($job['salary']); ?>
                        </p>
                        <p><strong>Reporting Line:</strong>
                            <?php echo htmlspecialchars($job['reporting_line']); ?>
                        </p>
                        <p><strong>Employment Type:</strong>
                            <?php echo htmlspecialchars($job['employment_type']); ?>
                        </p>
                        <p><strong>Location:</strong>
                            <?php echo htmlspecialchars($job['location']); ?>
                        </p>
                    </div>

                    <h3>Key Responsibilities</h3>
                    <ol>
                        <?php foreach ($responsibilities as $item): ?>
                            <li>
                                <?php echo htmlspecialchars(trim($item)); ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>

                    <h3>Essential Requirements</h3>
                    <ul>
                        <?php foreach ($essential as $item): ?>
                            <li>
                                <?php echo htmlspecialchars(trim($item)); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <h3>Preferable Requirements</h3>
                    <ul>
                        <?php foreach ($preferable as $item): ?>
                            <li>
                                <?php echo htmlspecialchars(trim($item)); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="apply.php" class="apply-btn"
                        aria-label="Apply for <?php echo htmlspecialchars($job['title']); ?> <?php echo htmlspecialchars($job['ref_number']); ?>">
                        Apply Now <span class="icon">↗</span>
                    </a>
                </section>
            <?php } ?>
        </main>

    </div><!-- end #page-wrapper -->

    <footer>
        <p><a
                href="https://cos-10026-assignment-group-2.atlassian.net/jira/software/projects/SCRUM/summary?atlOrigin=eyJpIjoiMjAzY2JkYzZhZTNmNDBkNmJhMTc3MjE3NDM2OTUzNDQiLCJwIjoiaiJ9">Jira
                Project Link</a></p>
        <p><a href="https://github.com/Namera22/Group2-1030.git">GitHub Repository</a></p>
        <p><a href="mailto:info@smartcity.com">Email Us</a></p>
        <p><a href="https://namera22.github.io/Group2-1030/">Live Site</a></p>
    </footer>

</body>

</html>