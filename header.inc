<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="SmartCity Infrastructure Consultancy website">
  <meta name="keywords" content="smart city, infrastructure, consultancy">
  <meta name="author" content="Group 2">

  <title>SmartCity Infrastructure Consultancy</title>

  <!-- global STYLES -->
  <link rel="stylesheet" href="global-style.css">

  <!-- PAGE-SPECIFIC STYLES -->

  <?php

    $currentPage = basename($_SERVER['PHP_SELF']);

    if ($currentPage == "index.php") {
        echo '<link rel="stylesheet" href="index-style.css">';
    }

    elseif ($currentPage == "jobs.php") {
        echo '<link rel="stylesheet" href="jobs-style.css">';
    }

    elseif ($currentPage == "apply.php") {
        echo '<link rel="stylesheet" href="apply-style.css">';
    }

    elseif ($currentPage == "about.php") {
        echo '<link rel="stylesheet" href="about-style.css">';
    }

  ?>

</head>

<body>

<a class="skip-link" href="#maincontent">
  Skip to main content
</a>