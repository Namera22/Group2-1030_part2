<?php
$pageTitle = "Smart City Infrastructure Consultancy";
$pageDescription = "G02-A page where a user can submit an application to join a smart city infrastructure consultancy";
$pageKeywords = "apply, application, job, recruitment, form, smart city, consultancy";
$pageAuthor = "James Heneghan";
$pageStyles = ["global-style.css", "apply-style.css"];
?>

<?php include 'header.inc'; ?>
<?php include 'nav.inc'; ?>

        <!-- youtube video was used, the link: https://www.youtube.com/watch?v=e-8RIntUcUg-->
       <header class="hero">
     
            <div>
                <video autoplay loop muted plays-inline class="video" loading="lazy">
                    <source src="./images/Credit-to-sony-background-video.mp4" type="video/mp4">
                </video>
                <h1 class="overlay-text">JOIN THE TEAM</h1>
            <p class="info">Estimated time to apply: 5 to 8 minutes • Fields marked * are required</p>
            </div>
        </header>

        <!-- progress card that follows you down the page containing the contents of the page-->
        <main class="page-wrap" id="maincontent">
            <aside class="progress-card">
            <h2>Application Sections</h2>
            <ol>
                <li><a href="#job-details">Job Details</a></li>
                <li><a href="#personal-details">Personal Details</a></li>
                <li><a href="#contact-details">Contact Details</a></li>
                <li><a href="#address">Address</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#submit">Submit</a></li>
            </ol>
            </aside>

            <!--form method post to the link provided -->
            <form action="process_eoi.php" method="post" novalidate>
                <!-- using sections to divide the form by their type of questions-->
                <section class="form-section" id="job-details">
                    <!-- used div to divide each 'division' in the format, it also was used to make it easy for class tags-->
                    <div class="section-heading">
                        <!-- used to make styling easer, of which is yet to be completed.-->
                        <span class="section-number">1</span>
                        <div>
                            <h2>Job Details</h2>
                            <p>What are the details of the job you are applying for?</p>
                        </div>
                    </div>

                    <div class="form-grid two-column">
                        <div class="form-elements">
                            <label for="job_reference">Job Reference<span class="required">*</span></label>
                            <input type="text" name="job_reference" maxlength="5" required="required" pattern="^[a-zA-Z0-9]+" placeholder="Job Reference Number" id="job-reference" required>
                        </div>

                        <div class="form-elements">
                            <label for="job_description" class="unrequired">Job Description</label>
                            <input type="text" name="job_description" required="required" pattern="^[a-zA-Z0-9]+" placeholder="Details of the role" id="job-description">
                        </div>
                    </div>
                </section>

                <section class="form-section" id="personal-details">
                    <div class="section-heading">
                        <span class="section-number">2</span>
                        <div>
                            <h2>Personal Details</h2>
                            <p>Tell us who you are!</p>
                            </div>
                    </div>

                    <div class="form-grid two-column">
                        <div class="form-elements">
                            <label for="first_name">First Name<span class="required">*</span></label>
                            <input type="text" name="first_name" maxlength="20" pattern="^[a-zA-Z]+" placeholder="First Name" required id="first-name">
                        </div>
                    
                        <div class="form-elements">
                            <label for="last_name">Last Name<span class="required">*</span></label>
                            <input type="text" name="last_name" maxlength="20" pattern="^[a-zA-Z]+" placeholder="Last Name" required id="last-name">
                        </div>

                        <div class="form-elements">
                            <label for="dob">Date Of Birth<span class="required">*</span></label>
                            <input type="date" name="dob" id="dob" required>
                        </div>

                        <div class="form-elements">
                            <label for="gender">Your Gender<span class="required">*</span></label>
                            <p>
                                <label class="radio-option">
                                    <input type="radio" name="gender" id="male" required>
                                    <span>Male</span>
                                </label>

                                <label class="radio-option">
                                    <input type="radio" name="gender" id="female" required>
                                    <span>Female</span>
                                </label>

                                <label class="radio-option">
                                    <input type="radio" name="gender" id="na" required>
                                    <span>Prefer not say</span>
                                </label>
                            </p>
                        </div>
                    </div>
                </section>

                <section class="form-section" id="contact-details">
                    <div class="section-heading">
                        <span class="section-number">3</span>
                        <div>
                            <h2>Contact Details</h2>
                            <p>So we can get in touch</p>
                        </div>
                    </div>
                    <div class="form-grid two-column">
                        <div class="form-elements">
                            <label for="email">Email Address <span class="required">*</span></label>
                            <input type="email" name="email" id="email" placeholder="you@example.com" required>
                        </div>

                        <div class="form-elements">
                            <label for="phone">Contact Number <span class="required">*</span></label>
                            <input type="text" id="phone" name="phone" placeholder="0123-456-789" pattern="^[0-9]{8-12}" maxlength="12">
                        </div>

                            
                    </div>
                </section>

                <section class="form-section" id="address">
                    <div class="section-heading">
                        <span class="section-number">4</span>
                        <div>
                            <h2>Address</h2>
                            <p>Let us know where you are from</p>
                        </div>
                    </div>

                    <div class="form-grid two-column">
                            <div class="form-elements">
                            <label for="address">Street Address<span class="required">*</span></label>
                            <input type="text" name="address" id="address" placeholder="Address" maxlength="40">
                        </div>

                        <div class="form-elements">
                            <label for="suburbtown">Suburb/Town<span class="required">*</span></label>
                            <input type="text" name="suburbtown" id="suburbtown" placeholder="Suburb/Town" maxlength="40">
                        </div>

                        <div class="form-elements">
                            <label for="state">State/Territory<span class="required">*</span></label>
                            <select name="state" id="state">
                                <option value="select">Please select</option>
                                <option value="state1">VIC</option>
                                <option value="state2">NSW</option>
                                <option value="state3">QLD</option>
                                <option value="state4">WA</option>
                                <option value="state5">SA</option>
                                <option value="state6">ACT</option>
                                <option value="state7">NT</option>
                                <option value="state8">TAS</option>
                            </select>
                        </div>

                        <div class="form-elements">
                            <label for="postcode">Postcode<span class="required">*</span></label>
                            <input type="text" name="postcode" id="postcode" maxlength="4" placeholder="Postcode">
                        </div>
                    </div>
                </section>

                <section class="form-section" id="skills">
                    <div class="section-heading">
                        <span class="section-number">5</span>
                        <div>
                            <h2>Skills</h2>
                            <p>Let us know what you are best at</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-element-1column">
                            <style>
                                .skills-grid {
                                    display: grid;
                                    grid-template-columns: repeat(3, 1fr);
                                    gap: 1rem 3rem;
                                    margin-top: 1.5rem;
                                }
                                .skills-list {
                                    display: flex;
                                    align-items: center;
                                    gap: 0.6rem;
                                    font-size: 1.1rem;
                                    font-weight: 600;

                                    border: 2px solid black;
                                    border-radius: 12px;
                                    padding: 4px;
                                    margin: 2%;
                                    background-color: #fff;
                                    box-shadow: 5 10 10 gray;
                                }

                                .skills-list:hover {
                                    border-color: #0b3d6d;
                                    background-color: #f5f9ff;
                                    
                                }

                                .skills-list:has(input[type="checkbox"]:checked) {
                                    background-color: #123d6b;
                                    border-color: #123d6b;
                                    color: white;
                                }
                                

                            </style>
                            <label for="skills">What Skills Do You Have<span class="required">*</span></label>
                            <br>
                            <div class="skills-grid">
                                <label class="skills-list">
                                    <input type="checkbox" id="communication" name="communication" value="communication">
                                    <span>Communication</span>
                                </label>

                                <label class="skills-list">
                                    <input type="checkbox" id="problem_solving" name="problem_solving" value="problem_solving">
                                    <span>Problem Solving</span>
                                </label>

                                <label class="skills-list">
                                    <input type="checkbox" id="leadership" name="leadership" value="leadership">
                                    <span>Leadership</span>
                                </label>

                                <label class="skills-list">
                                    <input type="checkbox" id="technical" name="technical" value="technical">
                                    <span>Technical</span>
                                </label>

                                <label class="skills-list">
                                    <input type="checkbox" id="time_management" name="time_management" value="time_management">
                                    <span>Time Management</span>
                                </label>
                           
                                <label class="skills-list">
                                    <input type="checkbox" id="teamwork" name="teamwork" value="teamwork">
                                    <span>Teamwork</span>
                                </label>

                                <label class="skills-list">
                                    <input type="checkbox" id="adaptability" name="adaptability" value="adaptability">
                                    <span>Adaptability</span>
                                </label>

                                <label class="skills-list">
                                    <input type="checkbox" id="data_analysis" name="data_analysis" value="data_analysis">
                                    <span>Data Analysis</span>
                                </label>

                                <label class="skills-list">
                                    <input type="checkbox" id="customer_service" name="customer_service" value="customer_service">
                                    <span>Customer Service</span>
                                </label>

                                <label class="skills-list">
                                    <input type="checkbox" id="project_management" name="project_management" value="project_management">
                                    <span>Project Management</span>
                                </label>

                                <label class="skills-list">
                                    <input type="checkbox" id="critical_thinking" name="critical_thinking" value="critical_thinking">
                                    <span>Critical Thinking</span>
                                </label>

                                <label class="skills-list">
                                    <input type="checkbox" id="attention_to_detail" name="attention_to_detail" value="attention_to_detail">
                                    <span>Attention To Detail</span>
                                </label>
                            </div>    
                        </div>
                    </div>

                    <div class="form-element-1column">
                        <label for="otherskills" id="anything-missed">Anything we missed?</label>
                        <textarea name="otherskills" id="otherskills" rows="4" placeholder="Any other skills?"></textarea>
                    </div>
                </section>

                <section class="form-section" id="submit">
                    <div class="section-heading">
                        <span class="section-number">5</span>
                        <div>
                            <h2>Submit</h2>
                            <p>Make sure you have answered all of the required <span class="required">*</span></p>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="reset" class="btn btn-secondary" style="border-radius: 30px; background-color: rgb(236, 99, 99);">Clear Form</button>
                        <button type="submit" class="btn btn-primary" style="border-radius: 30px; background-color: rgb(188, 247, 100);">Submit Application</button>
                    </div>
                </section>
            </form>
        </main>

<?php include 'footer.inc'; ?>