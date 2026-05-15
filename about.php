<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta name = "description" content = "G02-About page for web technology project">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="John Fitzpatrick">
    <meta name="keywords" content="Swinburne, metadata, web development">
    <link  rel="stylesheet" href="about-style.css">
    <link rel="stylesheet" href="index-style.css">
    <title>About us</title><!--meta data-->
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
    <ul class="navigation-bar">
      <li><a href="index.php" >Home</a></li>
      <li><a href="jobs.php">Jobs</a></li>
      <li><a href="apply.php">Apply</a></li>
      <li><a href="about.php"class="active">About</a></li>
    </ul>

  </div>

</nav>
<h1 style="color:#0A3D62;"><strong>About us!</strong></h1>
    <!--inline CSS ^--> 



<style>
  body {/*embedded css, general font formatting and area padding for the rest of the site, although most sections have a reassigned padding*/
    font-family: 'Open Sans', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
    background: #ffffff;
    line-height: 1.5;
    margin: 0;
    padding: 1.5em;
    overflow-y: auto;
}
</style>

<h2 id="parent_nestidlist">Class Information</h2><!--seperated from section so i can use hover functions-->
<section id="nestedlist">

<ul><!--nested list for class time and day-->
  <li>
    <strong>Web development project Group 2</strong>
    <ul>
      <li>Class time/day: Wednesday 10:30AM - 12:30 PM</li>
    </ul>
    </li>
</ul></section>
<h2 class="contribution">Who contributed where?</h2>
<section id="description">
  
  <dl class="contribution"><!--defintion list for memeber contributions-->
    <dt><strong>103815210<img class="dtImage"src="images/Member1.png" alt="Photo of Member1!" title="Group-photo"/></strong></dt>
    <dd>I have contributed to the index.html page, including layout structure, navigation bar, hero section, maintaining consistency, and accessibility features. "চেষ্টা করলে সব সম্ভব"</dd>
    <dd>Translation: With effort, everything is possible.</dd>
    <dt><strong>103534492<img class="dtImage" src="images/Member2.png" alt="Photo of Member 2!" title="Group-photo"/></strong></dt>
    <dd>I have contributed on the jobs.html page for this project. "ইট মারলে পাটকেল খেতে হয়।"</dd>
    <dd>If you throw a brick at someone, you will also be hit by a brick at some point.</dd>
    <dt><strong>106319524<img class="dtImage" src="images/Member3.png" alt="Photo of Member 3!" title="Group-photo"/></strong></dt>
    <dd>I have contributed to the apply.html application page. I have made a form for users to fill out with their details for joining the smart city infrastructure consultancy team. "Palos y piedras pueden romper mis huesos, pero las palabras nunca me harán daño"</dd>
    <dd>Sticks and stones may break your bones but words can never hurt you!</dd>
    <dt><strong>106504032<img class="dtImage" src="images/Member4.png" alt="Photo of Member 4!" title="Group-photo"/></strong></dt>
    <dd>I worked on the About.html page(this one!), "強力な労働力の鍵はオープンなコミュニケーションです"</dd>
    <dd>the key to a strong work force is open communication</dd>
</dl></section>

<section id="tables">
  <h2 class="subheader">Here's more about us!</h2>
  <table><!--Fun facts table for imagex-->
    <tr>
    <th>Name</th>
    <th>Dream Job</th>
    <th>Coding Snack of Choice</th>
    <th>Hometown</th>
    <th>Fun Fact</th>
  </tr>
  <tr>
    <td>Shushmita Barua</td>
    <td>Software engineer</td>
    <td>Iced coffee</td>
    <td>Chattogram , Bangladesh</td>
    <td>I love dancing</td>
  </tr>
  <tr>
    <td>Namera Nayat</td>
    <td>Full stack developer</td>
    <td>Oreos</td>
    <td>Chittagong, Bangladesh</td>
    <td>I love badminton</td>
  </tr>
  <tr>
    <td>James Heneghan</td>
    <td>AI programmer</td>
    <td>Chicken Crimpy Shapes, Banana</td>
    <td>Leongatha, Victoria</td>
    <td>I can drive racing go karts</td>
  </tr>
  <tr>
    <td>John Fitzpatrick</td>
    <td>Software developer/Programmer</td>
    <td>Chocolate Bar</td>
    <td>Kyneton, Victoria</td>
    <td>I used to play the piano</td>
  </tr>
</table>
</section>
<section>
<figure><figcaption><h2 style="font-size: 35px;">Meet our team!</h2></figcaption>
<a class="image" href="images/group_photo.png">  <img id="image" src="images/group_photo.png" alt="Photo of our current standing Group!" title="Group-photo" /></a></figure>
</section>
<!--image to take up whole bottom of screen-->


</body>
<!--page footer-->
<footer>
  <p><a href="https://cos-10026-assignment-group-2.atlassian.net/jira/software/projects/SCRUM/summary?atlOrigin=eyJpIjoiMjAzY2JkYzZhZTNmNDBkNmJhMTc3MjE3NDM2OTUzNDQiLCJwIjoiaiJ9">Jira Project Link</a></p>
  <p><a href="https://github.com/Namera22/Group2-1030.git">GitHub Repository</a></p>
  <p><a href="mailto:info@smartcity.com">Email Us</a></p>
  <p><a href="https://namera22.github.io/Group2-1030/">Live Site</a></p>
</footer>



</html>