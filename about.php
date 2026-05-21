<?php
$pageTitle = "About Us - SmartCity Infrastructure Consultancy";
$pageDescription = "About the SmartCity Infrastructure Consultancy team members and contributions.";
$pageKeywords = "about us, team members, contributions, SmartCity";
$pageAuthor = "John Fitzpatrick";
?>

<?php include 'header.inc'; ?>
<?php include 'nav.inc'; ?>


<style>
  body {/*embedded css, general font formatting and area padding for the rest of the site, although most sections have a reassigned padding*/
    font-family: 'Open Sans', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
    background: #ffffff;
    line-height: 1.5;
    margin: 0;
    padding: 0;
    overflow-y: auto;
}
</style>

<main id="maincontent">

<h1 style="color:#0A3D62;"><strong>About us!</strong></h1>
    <!--inline CSS ^--> 


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

</main>

<?php include 'footer.inc'; ?>