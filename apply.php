<?php
$pageTitle = "Smart City Infrastructure Consultancy";
$pageDescription = "G02-A page where a user can submit an application to join a smart city infrastructure consultancy";
$pageKeywords = "apply, application, job, recruitment, form, smart city, consultancy";
$pageAuthor = "James Heneghan";
$pageStyles = ["global-style.css", "apply-style.css"];
require_once 'settings.php';
session_start();
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
$query = "SELECT ref_number, title FROM jobs";
$result = mysqli_query($conn, $query);
$form_data = $_SESSION['form_data'] ?? [];
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['form_data'], $_SESSION['errors']);
?>

<?php include 'header.inc'; ?>
<?php include 'nav.inc'; ?>

        <!-- youtube video was used, the link: https://www.youtube.com/watch?v=ZWyv_w_cFiw&t=719s-->
        <header class="hero">
        <div class="hero-content">
            <video class="video" autoplay loop muted playsinline>
                <source src="./images/royalty_free.mp4" type="video/mp4">
            </video>

            <h1 class="overlay-text">JOIN THE TEAM</h1>
            <p class="info">Estimated time to apply: 5 to 8 minutes • Fields marked * are required</p>
        </div>
        </header>

        <?php if (!empty($errors)): ?>
            <div class="error-banner">
                <strong>Please check your application.</strong>
                <p>Please ensure all required fields contain valid inputs before submitting the form.</p>
            </div>
        <?php endif; ?>

        <!-- progress card that follows you down the page containing the contents of the page-->
        <main class="page-wrap" id="maincontent">
            <aside class="progress-card">
            <h2>Application Sections</h2>
            <ol>
                <li><a href="#job-details">Job Details</a></li>
                <li><a href="#personal-details">Personal Details</a></li>
                <li><a href="#contact-details">Contact Details</a></li>
                <li><a href="#home_address">Address</a></li>
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
                            <select name="job_reference" id="job_reference">
                            <?php
                            echo "<option value=''>Please select a job</option>";
                            while($job = mysqli_fetch_assoc($result)) {
                            $selected = (($form_data['job_reference'] ?? '') === $job['ref_number']) ? ' selected' : '';
                            echo "<option value='" . htmlspecialchars($job['ref_number']) . "'" . $selected . ">" . htmlspecialchars($job['ref_number']) . " - " . htmlspecialchars($job['title']) . "</option>";
                            }
                            ?>
                            </select>
                            <?php if(!empty($errors['job_reference'])) echo "<p style='color:red;'>" . $errors['job_reference'] . "</p>"; ?>
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
                            <input type="text" name="first_name" maxlength="20" pattern="^[a-zA-Z]+" placeholder="First Name" required id="first_name" autocomplete="given-name"
                            value="<?php echo htmlspecialchars($form_data['first_name'] ?? ''); ?>">
                            <?php if(!empty($errors['first_name'])) echo "<p style='color:red;'>" . $errors['first_name'] . "</p>"; ?>
                        </div>
                    
                        <div class="form-elements">
                            <label for="last_name">Last Name<span class="required">*</span></label>
                            <input type="text" name="last_name" maxlength="20" pattern="^[a-zA-Z]+" placeholder="Last Name" required id="last_name" autocomplete="family-name"
                            value="<?php echo htmlspecialchars($form_data['last_name'] ?? ''); ?>">
                            <?php if(!empty($errors['last_name'])) echo "<p style='color:red;'>" . $errors['last_name'] . "</p>"; ?>
                        </div>

                        <div class="form-elements">
                            <label for="dob">Date Of Birth<span class="required">*</span></label>
                            <input type="date" name="dob" id="dob" required
                            value="<?php echo htmlspecialchars($form_data['dob'] ?? ''); ?>">
                            <?php if(!empty($errors['dob'])) echo "<p style='color:red;'>" . $errors['dob'] . "</p>"; ?>
                        </div>

                        <fieldset>
                            <legend>Your Gender<span class="required">*</span></legend>
                            <label class="radio-option">
                                <input type="radio" name="gender" id="male" value="male" 
                                <?php if(($form_data['gender'] ?? '') === 'male') echo 'checked'; ?>>
                                <span>Male</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="gender" id="female" value="female" 
                                <?php if(($form_data['gender'] ?? '') === 'female') echo 'checked'; ?>>
                                <span>Female</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="gender" id="prefernotsay" value="prefer not say"
                                <?php if(($form_data['gender'] ?? '') === 'prefer not say') echo 'checked'; ?>>
                                <span>Prefer not say</span>
                            </label>
                            <?php if(!empty($errors['gender'])) echo "<p style='color:red;'>" . $errors['gender'] . "</p>"; ?>
                        </fieldset>
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
                            <input type="email" name="email" id="email" placeholder="you@example.com" required autocomplete="email"
                            value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>">
                            <?php if(!empty($errors['email'])) echo "<p style='color:red;'>" . $errors['email'] . "</p>"; ?>
                        </div>

                        <div class="form-elements">
                            <label for="phone">Contact Number <span class="required">*</span></label>
                            <input type="text" id="phone" name="phone" placeholder="0123-456-789" pattern="^[0-9]{8-12}" maxlength="12" autocomplete="tel"
                            value="<?php echo htmlspecialchars($form_data['phone'] ?? ''); ?>">
                            <?php if(!empty($errors['phone'])) echo "<p style='color:red;'>" . $errors['phone'] . "</p>"; ?>
                        </div>

                            
                    </div>
                </section>

                <section class="form-section" id="home_address">
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
                            <input type="text" name="address" id="address" placeholder="Address" maxlength="40" autocomplete="street-address"
                            value="<?php echo htmlspecialchars($form_data['address'] ?? ''); ?>">
                            <?php if(!empty($errors['address'])) echo "<p style='color:red;'>" . $errors['address'] . "</p>"; ?>
                        </div>

                        <div class="form-elements">
                            <label for="suburbtown">Suburb/Town<span class="required">*</span></label>
                            <input type="text" name="suburbtown" id="suburbtown" placeholder="Suburb/Town" maxlength="40"
                            value="<?php echo htmlspecialchars($form_data['suburbtown'] ?? ''); ?>">
                            <?php if(!empty($errors['suburbtown'])) echo "<p style='color:red;'>" . $errors['suburbtown'] . "</p>"; ?>
                        </div>

                        <div class="form-elements">
                            <label for="state">State/Territory<span class="required">*</span></label>
                            <select name="state" id="state">
                                
                                <option value="VIC" <?php if(($form_data['state'] ?? '') === 'VIC') echo 'selected'; ?>>VIC</option>
                                <option value="NSW" <?php if(($form_data['state'] ?? '') === 'NSW') echo 'selected'; ?>>NSW</option>
                                <option value="QLD" <?php if(($form_data['state'] ?? '') === 'QLD') echo 'selected'; ?>>QLD</option>
                                <option value="WA" <?php if(($form_data['state'] ?? '') === 'WA') echo 'selected'; ?>>WA</option>
                                <option value="SA" <?php if(($form_data['state'] ?? '') === 'SA') echo 'selected'; ?>>SA</option>
                                <option value="ACT" <?php if(($form_data['state'] ?? '') === 'ACT') echo 'selected'; ?>>ACT</option>
                                <option value="NT" <?php if(($form_data['state'] ?? '') === 'NT') echo 'selected'; ?>>NT</option>
                                <option value="TAS" <?php if(($form_data['state'] ?? '') === 'TAS') echo 'selected'; ?>>TAS</option>    
                            </select>
                            <?php if(!empty($errors['state'])) echo "<p style='color:red;'>" . $errors['state'] . "</p>"; ?>
                        </div>

                        <div class="form-elements">
                            <label for="postcode">Postcode<span class="required">*</span></label>
                            <input type="text" name="postcode" id="postcode" maxlength="4" placeholder="Postcode" autocomplete="postal-code"
                            value="<?php echo htmlspecialchars($form_data['postcode'] ?? ''); ?>">
                            <?php if(!empty($errors['postcode'])) echo "<p style='color:red;'>" . $errors['postcode'] . "</p>"; ?>
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
                            <fieldset class="form-element-1column">
                                <legend>What Skills Do You Have<span class="required">*</span></legend>
                                <br>
                                <div class="skills-grid">
                                    <label class="skills-list">
                                        <input type="checkbox" id="communication" name="communication" value="communication"
                                        <?php if(isset($form_data['communication'])) echo 'checked'; ?>>
                                        <span>Communication</span>
                                    </label>

                                    <label class="skills-list">
                                        <input type="checkbox" id="problem_solving" name="problem_solving" value="problem_solving"
                                        <?php if(isset($form_data['problem_solving'])) echo 'checked'; ?>>
                                        <span>Problem Solving</span>
                                    </label>

                                    <label class="skills-list">
                                        <input type="checkbox" id="leadership" name="leadership" value="leadership"
                                        <?php if(isset($form_data['leadership'])) echo 'checked'; ?>>
                                        <span>Leadership</span>
                                    </label>

                                    <label class="skills-list">
                                        <input type="checkbox" id="technical" name="technical" value="technical"
                                        <?php if(isset($form_data['technical'])) echo 'checked'; ?>>
                                        <span>Technical</span>
                                    </label>

                                    <label class="skills-list">
                                        <input type="checkbox" id="time_management" name="time_management" value="time_management"
                                        <?php if(isset($form_data['time_management'])) echo 'checked'; ?>>
                                        <span>Time Management</span>
                                    </label>

                                    <label class="skills-list">
                                        <input type="checkbox" id="teamwork" name="teamwork" value="teamwork"
                                        <?php if(isset($form_data['teamwork'])) echo 'checked'; ?>>
                                        <span>Teamwork</span>
                                    </label>

                                    <label class="skills-list">
                                        <input type="checkbox" id="adaptability" name="adaptability" value="adaptability"
                                        <?php if(isset($form_data['adaptability'])) echo 'checked'; ?>>
                                        <span>Adaptability</span>
                                    </label>

                                    <label class="skills-list">
                                        <input type="checkbox" id="data_analysis" name="data_analysis" value="data_analysis"
                                        <?php if(isset($form_data['data_analysis'])) echo 'checked'; ?>>
                                        <span>Data Analysis</span>
                                    </label>

                                    <label class="skills-list">
                                        <input type="checkbox" id="customer_service" name="customer_service" value="customer_service"
                                        <?php if(isset($form_data['customer_service'])) echo 'checked'; ?>>
                                        <span>Customer Service</span>
                                    </label>

                                    <label class="skills-list">
                                        <input type="checkbox" id="project_management" name="project_management" value="project_management"
                                        <?php if(isset($form_data['project_management'])) echo 'checked'; ?>>
                                        <span>Project Management</span>
                                    </label>

                                    <label class="skills-list">
                                        <input type="checkbox" id="critical_thinking" name="critical_thinking" value="critical_thinking"
                                        <?php if(isset($form_data['critical_thinking'])) echo 'checked'; ?>>
                                        <span>Critical Thinking</span>
                                    </label>

                                    <label class="skills-list">
                                        <input type="checkbox" id="attention_to_detail" name="attention_to_detail" value="attention_to_detail"
                                        <?php if(isset($form_data['attention_to_detail'])) echo 'checked'; ?>>
                                        <span>Attention To Detail</span>
                                    </label>
                                </div>    
                                <?php if(!empty($errors['skills'])) echo "<p style='color:red;'>" . $errors['skills'] . "</p>"; ?>
                            </fieldset>
                        </div>
                    </div>

                    <div class="form-element-1column">
                        <label for="other_skills" id="anything-missed">Anything we missed?</label>
                        <textarea name="other_skills" id="other_skills" rows="4" placeholder="Any other skills?"></textarea>
                    </div>
                </section>

                <section class="form-section" id="submit">
                    <div class="section-heading">
                        <span class="section-number">6</span>
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