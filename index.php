<?php
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
  <section class="services-section">

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