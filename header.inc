<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="<?php echo htmlspecialchars($pageDescription ?? 'SmartCity Infrastructure Consultancy website'); ?>">
  <meta name="keywords" content="<?php echo htmlspecialchars($pageKeywords ?? 'smart city, infrastructure, consultancy'); ?>">
  <meta name="author" content="<?php echo htmlspecialchars($pageAuthor ?? 'Group 2'); ?>">

  <title><?php echo htmlspecialchars($pageTitle ?? 'SmartCity Infrastructure Consultancy'); ?></title>

  <!-- global STYLES -->
  <link rel="stylesheet" href="global-style.css?v=20260522-footer">

  <!-- PAGE-SPECIFIC STYLES -->

  <?php

    $currentPage = basename($_SERVER['PHP_SELF']);

    if ($currentPage == "index.php") {
        echo '<link rel="stylesheet" href="index-style.css?v=20260522-hero-type">';
    }

    elseif ($currentPage == "jobs.php") {
        echo '<link rel="stylesheet" href="jobs-style.css">';
    }

    elseif ($currentPage == "apply.php") {
        echo '<link rel="stylesheet" href="apply-style.css?v=20260522-hero-fix">';
    }

    elseif ($currentPage == "about.php") {
        echo '<link rel="stylesheet" href="about-style.css">';
    }

  ?>
    <link rel="icon" href="images/favicon.ico" type="image/ico"
</head>

<body>

<a class="skip-link" href="#maincontent">
  Skip to main content
</a>