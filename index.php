<?php
// $conn = mysqli_connect('localhost', 'root', '', 'appointment_form') or die('connection failed');
require_once('dashboard/connect.php');
if (isset($_POST['submit'])) {
    $P_name = mysqli_real_escape_string($conn, $_POST['name']);
    $P_email = mysqli_real_escape_string($conn, $_POST['email']);
    $P_number = $_POST['phone'];
    $Doctor_name = $_POST['doctors-name'];
    $Doctor_dept = $_POST['departments-name'];

    $P_symptoms = $_POST['symptoms'];
    $P_age = $_POST['age'];
    $P_gender = $_POST['gender'];
    $Appointment_time = $_POST['time'];
     $Appointment_date = $_POST['date'];
    //$Appointment_date = $_POST['date'] . ' ' . $_POST['time'] . ':00';

    $P_address = mysqli_real_escape_string($conn, $_POST['address']);

    $insert = mysqli_query($conn, "INSERT INTO `appointment_info` (P_name, P_email, P_number, Doctor_name, Doctor_dept, P_symptoms, P_age, P_gender, Appointment_time, Appointment_date, P_address) VALUES ('$P_name', '$P_email', '$P_number', '$Doctor_name', '$Doctor_dept', '$P_symptoms', '$P_age', '$P_gender', '$Appointment_time', '$Appointment_date', '$P_address')")
    or die('query failed');
    $message = [];
    if ($insert) {
        $message[] = 'Appointment Made Successfully !!';
    } else {
        $message[] = 'Appointment Failed !!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page - Doctor Patient HealthCare System</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/style.css">

    </head>

    <body>

        <!-- header section starts  -->

        <header class="header">

            <a href="#" class="logo" style="text-decoration: none;"> <i class="fas fa-heartbeat"></i> <strong>HealthCare</strong></a>

            <nav class="navbar">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a>
                    <li><a href="#services">Services</a>
                        <ul>
                            <li><a href="diagnostics-test/index.php?type=Diagnostics" target="_blank">Diagnostics</a></li>
                            <li><a href="diagnostics-test/index.php?type=Consultation" target="_blank">Consultation</a></li>
                            <li><a href="diagnostics-test/index.php?type=E-Pharmacy" target="_blank">E-Pharmacy</a></li>
                        </ul>
                    </li>
                    <i class="fas fa-arrow-down"></i>
                    <li><a href="#doctors">Doctors</a></li>
                    <li><a href="#appointment">Appointment</a></li>
                    <li><a href="#client_review">Review</a></li>
                    <li><a href="#blogs">Blogs</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#registration">Registration</a>
                        <ul>
                            <li><a href="patient/index.php" target="_blank">Patient Login</a></li>
                            <!-- <li><a href="doctors/index.php"  target="_blank">Doctor Panel</a></li> -->
                            <li><a href="patient/index.php" target="_blank">Log out</a></li>
                        </ul>
                    </li>
                    <i class="fas fa-arrow-down"></i>
                </ul>
            </nav>
            <!-- <a href="login-signup/login.php"  target="_blank"><img src="image/log.png" class="log"></a> -->
            <div id="menu-btn" class="fas fa-bars"></div>
        </header>

        <!-- header section ends -->

        <!-- home section starts  -->

        <section class="home" id="home">

            <div class="content">
                <h3>We Provide Instant Mental Health Through Online Health Care</h3>
                <p> A person who has good physical health is likely to have bodily functions and processes working at
                    their peak.</p>
                <a href="#appointment" class="btn"> Get Started <span class="fas fa-chevron-right"></span> </a>
            </div>

            <div class="image">
                <img src="image/header-img-1.png" alt="">
            </div>
        </section>

        <!-- home section ends -->

        <!-- icons section starts  -->

        <section class="icons-container">

            <div class="icons">
                <i class="fas fa-stethoscope"></i>
                <h3>120+</h3>
                <p>Diagnostics Test</p>
            </div>

            <div class="icons">
                <i class="fas fa-users"></i>
                <h3>1040+</h3>
                <p>Satisfied Patients</p>
            </div>

            <div class="icons">
                <i class="fas fa-user-md"></i>
                <h3>100+</h3>
                <p>Expert Doctors</p>
            </div>

            <div class="icons">
                <i class="fas fa-pills"></i>
                <h3>130+</h3>
                <p>Available Medicines</p>
            </div>

        </section>

        <!-- icons section ends -->

        <!-- about section starts  -->

        <section class="about" id="about">

            <h1 class="heading"> <span>about</span> us </h1>

            <div class="row">

                <div class="image">
                    <img src="image/new.png" alt="">
                </div>

                <div class="content">
                    <h3>take the world's best quality treatment</h3>
                    <p>We are dedicated to providing exceptional healthcare services and fostering a strong
                        doctor-patient relationship. At our healthcare system, we prioritize the well-being and
                        satisfaction of our patients above all else. Our healthcare system fosters open communication
                        and encourages active participation from our patients in their healthcare decisions.</p>
                    <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
                </div>

            </div>

        </section>

        <!-- about section ends -->

        <!-- services section starts  -->

        <section class="services" id="services">

            <h1 class="heading"> our <span class="span1">services</span> </h1>

            <div class="box-container">

                <div class="box">
                    <i class="fas fa-notes-medical"></i>
                    <h3>Diagnostic Tests</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
                    <a target="_blank"href="./diagnostics-test/index.php" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
                </div>

                <div class="box">
                    <i class="fas fa-video"></i>
                    <h3>Consultation</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
                    <a target="_blank" href="https://meet.google.com/twy-qyaq-ybh" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a> 
                </div>

                <div class="box">
                    <i class="fas fa-user-md"></i>
                    <h3>Expert Doctors</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
                    <a target="_blank" href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
                </div>

                <div class="box">
                    <i class="fas fa-pills"></i>
                    <h3>E-Pharmacy</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
                    <a target="_blank" href="shopping-cart/index.php" class="btn" target="_blank"> learn more <span
                            class="fas fa-chevron-right"></span> </a>
                </div>

                <div class="box">
                    <i class="fas fa-medkit"></i>
                    <h3>Helpline</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
                    <a target="_blank" href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
                </div>

                <div class="box">
                    <i class="fas fa-handshake"></i>
                    <h3>Community</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
                    <a target="_blank" href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>


                </div>
                <div class="box">
                    <i class="fas fa-users"></i>
                    <h3>Volunteers</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
                    <a  target="_blank" href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
                </div>
                <div class="box">
                    <i class="far fa-newspaper"></i>
                    <h3>Articles</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
                    <a target="_blank" href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
                </div>
            </div>

        </section>

        <!-- services section ends -->

        <!-- doctors section starts  -->

        <section class="doctors" id="doctors-section">

            <h1 class="heading"> our <span>doctors</span> </h1>

            <div class="box-container">

                <div class="box">
                    <img src="image/doc-2.jpg" alt="">
                    <h3>Dr. Tareq Ahmed</h3>
                    <span>BDS, BCS (Health), FICD, PGT (OMS)</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-twitter" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-instagram" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-linkedin" style="text-decoration: none;"></a>

                    </div>
                </div>

                <div class="box">
                    <img src="image/doc-5.jpg" alt="">
                    <h3>Dr. Javed Aziz</h3>
                    <span>Oral & Maxillofacial Surgery</span>
                    <div class="share">
                         <a href="#" class="fab fa-facebook-f" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-twitter" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-instagram" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-linkedin" style="text-decoration: none;"></a>
                    </div>
                </div>

                <div class="box">
                    <img src="image/doc-9.jpg" alt="">
                    <h3>Dr. Zahirul Islam</h3>
                    <span>Orthopadic & Trauma Surgeon</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-twitter" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-instagram" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-linkedin" style="text-decoration: none;"></a>
                    </div>
                </div>

                <div class="box">
                    <img src="image/doc-8.jpg" alt="">
                    <h3>Dr. Ashraful Alam</h3>
                    <span>MBBS, MD (Endocrinology)</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-twitter" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-instagram" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-linkedin" style="text-decoration: none;"></a>
                    </div>
                </div>

                <div class="box">
                    <img src="image/doc-2.jpg" alt="">
                    <h3>Dr. Md. Nurul Amin</h3>
                    <span>MBBS, BCS (Health), MD (Rheumatology)</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-twitter" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-instagram" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-linkedin" style="text-decoration: none;"></a>
                    </div>
                </div>

                <div class="box">
                    <img src="image/doc-6.jpg" alt="">
                    <h3>Dr. Md. Ekramul Islam</h3>
                    <span>(MBBS, BCS (Health), FCPS (surgery))</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-twitter" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-instagram" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-linkedin" style="text-decoration: none;"></a>

                    </div>
                </div>
                <div class="box">
                    <img src="image/doc-7.jpg" alt="">
                    <h3>Dr. Mahfuza Hussain</h3>
                    <span>(MBBS (Dhaka), FCGP (BCGP))</span>
                    <div class="share">

                        <a href="#" class="fab fa-facebook-f" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-twitter" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-instagram" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-linkedin" style="text-decoration: none;"></a>
                    </div>
                </div>
                <div class="box">
                    <img src="image/doc-8.jpg" alt="">
                    <h3>Dr. Md. Fayez Uddin</h3>
                    <span>(BDS, PGT(OMS,BSMMU))</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-twitter" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-instagram" style="text-decoration: none;"></a>
                        <a href="#" class="fab fa-linkedin" style="text-decoration: none;"></a>
                    </div>
                </div>

            </div>
            <div class="button">
                <a href="doctors/doctors.html" target="_blank"><button class="get">Get More Details</button></a>
            </div>

        </section>

        <!-- doctors section ends -->

        <!-- appointment section starts   -->

        <section class="appointment" id="appointment">

            <h1 class="heading"> <span>appointment</span> now </h1>

            <div class="row">

                <div class="image">
                    <img src="image/appointment-img.svg" alt="">
                </div>

                <form
                    action="<?php echo $_SERVER['PHP_SELF'];?>"
                    method="post" autocomplete="off">
                    <?php
                        if(isset($message) && !empty($message)) {
                            foreach($message as $message) {
                                echo'<p class ="message">'.$message.'</p>';
                            }
                        }
                    ?>
                    <h3>book appointment</h3>

                  

                    <div class="dept-selection"
                        style="margin-top: 10px; text-align:left; border: 0.2rem solid #5e8af8; border-radius: 0.5rem; margin-bottom: 8px; padding: 1rem;">
                        <select class="form-select" name="departments-name" id="specialists" style="width: 100% ">
                            <option selected>Select Departments</option>
                            <option value="Psychiatry">Psychiatry & Drug Addiction</option>
                            <option value="Child Specialist">Child Specialist</option>
                            <option value="Plastic Surgery">Burn & Plastic Surgery</option>
                            <option value="Cardiology">Cardiology</option>
                            <option value="Chest Diseases">Chest Diseases & Medicine</option>
                            <option value="Neurology">Neurology</option>
                            <option value="Skin Consultant">Skin Consultant</option>
                        </select>
                    </div>

                    <div class="doctor-selection"
                        style="margin-top: 10px; text-align:left; border: 0.2rem solid #5e8af8; border-radius: 0.5rem; margin-bottom: 15px; padding: 1rem;">
                        <select class="form-select" name="doctors-name" id="doctors" style="width: 100%;">
                            <option selected>Select Doctors</option>
                            <option data-skill="Psychiatry" value="Dr. Tareq Ahmed">Dr. Tareq Ahmed</option>
                            <option data-skill="Child Specialist" value="Dr. Shamsuzzaman">Dr. Shamsuzzaman</option>
                            <option data-skill="Skin Consultant" value="Dr. Maruf Hossain">Dr. Maruf Hossain</option>
                            <option data-skill="Psychiatry" value="Prof. Dr. Jamal Khan">Prof. Dr. Jamal Khan</option>
                            <option data-skill="Psychiatry" value="Dr. Fahima Khatun">Dr. Fahima Khatun</option>
                            <option data-skill="Chest Diseases" value="Dr. Lutfa Tasnim">Dr. Lutfa Tasnim</option>
                            <option data-skill="Child Specialist" value="Prof. Dr. Humayun Kabir">Prof. Dr. Humayun Kabir</option>
                            <option data-skill="Skin Consultant" value="Dr. Lokman Hossain">Dr. Lokman Hossain</option>
                            <option data-skill="Cardiology" value="Prof. Dr. Ashraful Alam">Prof. Dr. Ashraful Alam</option>
                            <option data-skill="Neurology" value="Dr. Sirajul Haque">Dr. Sirajul Haque</option>
                            <option data-skill="Plastic Surgery" value="Dr. Zahirul Islam">Dr. Zahirul Islam</option>
                            <option data-skill="Child Specialist" value="Prof. Dr. Azharul Hoque">Prof. Dr. Azharul Hoque</option>
                            <option data-skill="Psychiatry" value="Dr. Abdullah Maruf">Dr. Abdullah Maruf</option>
                            <option data-skill="Plastic Surgery" value="Dr. Ekramul Islam">Dr. Ekramul Islam</option>
                            <option data-skill="Cardiology" value="Dr. Murad Hossain">Dr. Murad Hossain</option>
                        </select>
                    </div>

                    <input type="text" id="name_input" name="name" placeholder="Enter Your Name" class="box" required> <br>
                    <input type="tel" id="phone_number"  name="phone" placeholder="Enter Your Number" class="box"
                        required> <br>
                    <input type="email" id="email_address" name="email" placeholder="Enter Your Email" class="box" required> <br>
                    <input type="text" name="symptoms" placeholder="Enter Your Symptoms" class="box" required> <br>
                    <input type="tel" name="age" placeholder="Enter Your Age" class="box" required> <br>

                    <div class="time-selection"
                        style="margin-top: 10px; text-align:left; border: 0.2rem solid #5e8af8; border-radius: 0.5rem; margin-bottom: 8px; padding: 1rem;">
                        <select class="form-select" name="time" id="times" style="width: 100% ">
                            <option selected>Select Appointment Time</option>
                            <option value="02:00 PM - 9.00 PM">02:00 PM - 9.00 PM</option>
                            <option value="03:00 PM - 10.00 PM">03:00 PM - 10.00 PM</option>
                            <option value="02:30 PM - 8.30 PM">02:30 PM - 8.30 PM</option>
                            <option value="03:00 PM - 10.00 PM">03:00 PM - 10.00 PM</option>
                            <option value="05:00 PM - 9.30 PM">05:00 PM - 9.30 PM</option>
                            <option value="04:30 PM - 8.30 PM">04:30 PM - 8.30 PM</option>
                            <option value="03.30 PM - 9.30 PM">03.30 PM - 9.30 PM</option>
                        </select>
                    </div>


                    <!-- <input type="time" name="time" placeholder="Select The Time" class="box" required> <br> -->


                    <input type="text" readonly name="date" placeholder="Select the date" class="box datepicker" required> <br>
                    <!-- <input type="date" name="date" placeholder="Select the date" class="box datepicker" required> <br> -->

                   



                    <div class="select-content">
                        <p style="font-size: 14px; font-weight:500; margin-top: 10px;" class="gender">Select Gender:</p>
                        <div class="radio-content" style="font-size: 14px; margin-top: 10px;">
                            <input type="radio" id="male" name="gender" value="Male">
                            <label for="male">Male</label>
                        </div>
                        <div class="radio-content" style="font-size: 14px; font-weight:500; margin-top: 10px;">
                            <input type="radio" id="female" name="gender" value="Female">
                            <label for="female">Female</label>
                        </div>
                    </div>
                    <br>

                    <div style="margin-top: 10px; text-align:left; border: 0.2rem solid #5e8af8; border-radius: 0.5rem; margin: 0.7rem 0; padding: 1rem;"
                        class="text-area">
                        <textarea name="address" rows="4" cols="70"
                            placeholder="Enter Your Address Here..."></textarea><br>
                    </div>

                    <input type="submit" name="submit" value="book now" class="btn">
                </form>

            </div>

        </section>

        <!-- appointment section ends -->

        <!-- review section starts  -->

        <div class="reviews" id="client_review">
            <h1 class="heading"> Client's <span>Review</span> </h1>
            <div class="team">
                <div class="team_member">
                    <div class="team_img">
                        <img src="image/pic-1.png" alt="Team_image">
                    </div>
                    <h3>Aktaruzzaman</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas
                        facere.</p>
                    <div class="rating-icon">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i><span>5</span>
                    </div>
                </div>
                <div class="team_member">
                    <div class="team_img">
                        <img src="image/pic-2.png" alt="Team_image">
                    </div>
                    <h3>Riyad Ahmed</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas
                        facere.</p>
                    <div class="rating-icon">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star-half-alt"></i><i class="fas fa-star-half-alt"></i><span>4.5</span>
                    </div>
                </div>
                <div class="team_member">
                    <div class="team_img">
                        <img src="image/pic-3.png" alt="Team_image">
                    </div>
                    <h3>Nahim Uddin</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas
                        facere.</p>
                    <div class="rating-icon">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i
                            class="fas fa-star-half-alt"></i><i class="fas fa-star-half-alt"></i><span>3.5</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- review section ends -->

        <!-- blogs section starts  -->

        <section class="blogs" id="blogs">

            <h1 class="heading"> our <span>blogs</span> </h1>

            <div class="box-container">

                <div class="box">
                    <div class="image">
                        <img src="image/blog-1.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="icon">
                            <a href="#" style="text-decoration: none;"> <i class="fas fa-calendar"></i> 21 jan, 2022 </a>
                            <a href="#" style="text-decoration: none;"> <i class="fas fa-user"></i> by healthCare</a>
                        </div>
                        <h3>Discrimination at work is linked to high blood pressure</h3>
                        <a href="https://www.health.harvard.edu/blog/discrimination-at-work-is-linked-to-high-blood-pressure-202305302939"
                            target="_blank" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="image/blog-6.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="icon">
                            <a href="#" style="text-decoration: none;"> <i class="fas fa-calendar"></i> 14 march, 2022 </a>
                            <a href="#" style="text-decoration: none;"> <i class="fas fa-user"></i> by healthCare </a>
                        </div>
                        <h3>3 simple swaps for better heart health</h3>
                        <a href="https://www.health.harvard.edu/blog/3-simple-swaps-for-better-heart-health-202209262812"
                            target="_blank" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="image/blog-3.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="icon">
                            <a href="#" style="text-decoration: none;"> <i class="fas fa-calendar"></i> 05 Jan, 2023 </a>
                            <a href="#" style="text-decoration: none;"> <i class="fas fa-user"></i> by healthCare </a>
                        </div>
                        <h3>Pouring from an empty cup? Three ways to refill emotionally</h3>
                        <a href="https://www.health.harvard.edu/blog/pouring-from-an-empty-cup-three-ways-to-refill-emotionally-202301262882"
                            target="_blank" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="image/blog-4.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="icon">
                            <a href="#" style="text-decoration: none;"> <i class="fas fa-calendar"></i> 13 Feb, 2023 </a>
                            <a href="#" style="text-decoration: none;"> <i class="fas fa-user"></i> by healthCare </a>
                        </div>
                        <h3>How does waiting on prostate cancer treatment affect survival?</h3>
                        <a href="https://www.health.harvard.edu/blog/prostate-cancer-how-does-waiting-on-treatment-affect-survival-202304282929"
                            target="_blank" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="image/blog-5.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="icon">
                            <a href="#" style="text-decoration: none;"> <i class="fas fa-calendar"></i> 26 March, 2023 </a>
                            <a href="#" style="text-decoration: none;"> <i class="fas fa-user"></i> by healthCare </a>
                        </div>
                        <h3>Natural disasters strike everywhere: Ways to help protect your health</h3>
                        <a href="https://www.health.harvard.edu/blog/natural-disasters-strike-everywhere-ways-to-help-protect-your-health-202301202878 "
                            target="_blank" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="image/blog-6.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="icon">
                            <a href="#" style="text-decoration: none;"> <i class="fas fa-calendar"></i> 18 April, 2023 </a>
                            <a href="#" style="text-decoration: none;"> <i class="fas fa-user"></i> by healthCare </a>
                        </div>
                        <h3>Dementia: Coping with common, sometimes distressing behaviors</h3>
                        <a href="https://www.health.harvard.edu/blog/dementia-coping-with-common-sometimes-distressing-behaviors-202305082933"
                            target="_blank" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
                    </div>
                </div>

            </div>

        </section>

        <!-- blogs section ends -->

        <!-- footer section starts  -->

        <section class="contact" id="contact">

            <div class="box-container">

                <div class="box">
                    <h3>quick links</h3>
                    <a href="#home" style="text-decoration: none;"> <i class="fas fa-chevron-right"></i> home </a>
                    <a href="#about" style="text-decoration: none;"> <i class="fas fa-chevron-right"></i> about </a>
                    <a href="#services" style="text-decoration: none;"> <i class="fas fa-chevron-right"></i> services </a>
                    <a href="#doctors" style="text-decoration: none;"> <i class="fas fa-chevron-right"></i> doctors </a>
                    <a href="#appointment" style="text-decoration: none;"> <i class="fas fa-chevron-right"></i> appointment </a>
                    <a href="#review" style="text-decoration: none;"> <i class="fas fa-chevron-right"></i> review </a>
                    <a href="#blogs" style="text-decoration: none;"> <i class="fas fa-chevron-right"></i> blogs </a>
                </div>

                <div class="box">
                    <h3>our services</h3>
                    <a href="diagnostics.html" style="text-decoration: none;"> <i class="fas fa-chevron-right"></i>Diagnostics</a>
                    <a href="diagnostics.html" style="text-decoration: none;"> <i class="fas fa-chevron-right"></i>Lab Tests</a>
                    <a href="shopping-cart/index.php" style="text-decoration: none;"> <i class="fas fa-chevron-right"></i>Order Medicine</a>
                    <a href="consultation.html" style="text-decoration: none;"> <i class="fas fa-chevron-right"></i>Video Consultation</a>
                    <a href="#blogs" style="text-decoration: none;"> <i class="fas fa-chevron-right"></i>Health Care Blogs</a>
                </div>

                <div class="box">
                    <h3>appointment info</h3>
                    <a href="tel:+8801234567890" style="text-decoration: none;"> <i class="fas fa-phone"></i>+8801234567890</a>
                    <a href="tel:+8801782546978" style="text-decoration: none;"> <i class="fas fa-phone"></i> +8801782546978</a>
                    <a href="mailto:someone@example.com" style="text-decoration: none;"> <i class="fas fa-envelope"></i>healthbd@gmail.com</a>
                    <a href="mailto:someone@example.com" style="text-decoration: none;"> <i class="fas fa-envelope"></i>healthbd@gmail.com</a>
                    <a href="#" style="text-decoration: none;"> <i class="fas fa-map-marker-alt"></i>Dhaka, Bangladesh</a>
                </div>

                <div class="box">
                    <h3>follow us</h3>
                    <a href="#" style="text-decoration: none;"> <i class="fab fa-facebook"></i> facebook </a>
                    <a href="#" style="text-decoration: none;"> <i class="fab fa-twitter"></i> twitter </a>
                    <a href="#" style="text-decoration: none;"> <i class="fab fa-twitter"></i> twitter </a>
                    <a href="#" style="text-decoration: none;"> <i class="fab fa-instagram"></i> instagram </a>
                    <a href="#" style="text-decoration: none;"> <i class="fab fa-linkedin"></i> linkedin </a>
                    <a href="#" style="text-decoration: none;"> <i class="fab fa-pinterest"></i> pinterest </a>
                </div>
            </div>
        </section>
        <footer>
            <div class="credit"> ©2023 <span>HealthCare BD</span> | All Rights Reserved</div>
            <div class="last-part">
                <a href="#conditions" style="text-decoration: none;">Terms & Conditions</a>
                <a href="#privacy" style="text-decoration: none;">Privacy Policy</a>
                <a href="#reviews" style="text-decoration: none;">Reviews</a>
                <a href="#blogs" style="text-decoration: none;">Health Blogs</a>
                <a href="#doctors" style="text-decoration: none;">Expert Doctors List</a>
                <a href="contact" style="text-decoration: none;">Contact Us</a>
            </div>
        </footer>
        <!-- footer section ends -->


        <!-- js file link  -->
        <!-- jquery cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="js/script.js"></script>
        <script>
        $(function() {
            $( ".datepicker" ).datepicker({
                minDate:0
            });
        } );

        document.addEventListener('DOMContentLoaded', function() {
        let nameInput = document.getElementById('name_input'); 

        nameInput.addEventListener('blur', function() {
        const pattern = /^[A-Z][a-zA-Z. ]+$/;

        if (!pattern.test(this.value)) {
            alert('Please enter a valid name starting with an uppercase letter.');
                }
            });
         });


        let email = document.getElementById('email_address');
        email.addEventListener('blur', function (e) {
            if (this.value.length < 5) {
                alert('Please enter a valid email address');
            } else {
                const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if(!pattern.test(this.value)) {
                    alert('Please enter a valid email address');
                }
            }
        });


        let phone_number = document.getElementById('phone_number');
        phone_number.addEventListener('blur', function (e) {
            if (this.value.length < 11) {
                alert('Please enter 11 digit mobile number');
            } else {
                const pattern = /^01[9765843][0-9]{8}$/;
                if(!pattern.test(this.value)) {
                    alert('Please enter a valid phone number');
                }
            }
        });

        $(document).ready(function() {
    // Store all doctors in a variable for future use
    var allDoctors = $('#doctors option');
    // console.log(allDoctors);
    $('#specialists').change(function() {
        // Get the selected department
        var selectedDepartment = $(this).val();

        // Filter the doctors based on the selected department
        var filteredDoctors = allDoctors.filter(function(i,v) {
            // console.log($(this).data('skill') === selectedDepartment);
            return $(this).data('skill') === selectedDepartment;
        });
        console.log(filteredDoctors);

        // Clear the doctors dropdown
        $('#doctors').empty();

        // Add the filtered doctors to the dropdown
        $('#doctors').append(filteredDoctors);
    });
});

        </script>

    </body>

</html>