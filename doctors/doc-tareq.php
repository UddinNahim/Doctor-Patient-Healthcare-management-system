<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors Full Profile</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="docpro.css">
  </head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

    * a {
      text-decoration: none;
    }

    :root {
      --blue-color: #5e8af8;
      --green: #5e8af8;
      /* --green:#16a085;  */
      --black: #444;
      --light-color: #111;
      --box-shadow: .5rem .5rem 0 rgba(74, 161, 243, 0.2);
      --text-shadow: .4rem .4rem 0 rgba(0, 0, 0, .2);
      --border: .2rem solid var(--green);
    }

    body {
      background-color: #CEECF3;
      font-family: 'Poppins', sans-serif !important;
    }

    .navbar {
      background: #e2f7fc !important;
      font-weight: 400;
      /* position: fixed; */
      /* top:0; left: 0; right: 0;
    z-index: 1000; */
      box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .1);
    }

    .navbar-brand {
      font-size: 22px;
    }

    .first-part img {
      width: 50%;
    }

    p {
      font-size: 20px;
    }

    h3 {
      font-weight: bold;
    }

    .some-icon {
      font-size: 30px !important;
      text-align: center;
    }

    .fa-facebook,
    .fa-whatsapp,
    .fa-twitter,
    .fa-instagram,
    .fa-linkedin {
      font-size: 25px;
      margin-left: 10px;
    }

    /* .icon-title {
    text-align: left;
    margin-top: 10px;
    } */
    .icon-title,
    i,
    span {
      padding-top: 25px;
    }

    .text-message,
    .video-call,
    .text-appointment {
      border-radius: 48px;
      border: 1px solid rgba(53, 53, 53, 0.09);
      background: linear-gradient(180deg, rgba(100, 221, 248, 0.3) 53.5%, rgba(167, 219, 231, 0.00) 99.48%);
      padding: 3px 20px;
      margin-left: 20px;
    }

    div .row form {
      /* flex: 1 1 45rem; */
      /* background: #fff; */
      border: var(--border);
      box-shadow: var(--box-shadow);
      text-align: center;
      padding: 2rem;
      border-radius: 3rem;
    }

    .row form .box,
    .form-select,
    .form-control {
      width: 100%;
      margin: .7rem 0;
      border-radius: .5rem;
      border: var(--border);
      font-size: 1rem;
      color: var(--black);
      text-transform: none;
      padding: 10px 10px;
    }

    .row form .btn {
      padding: 0.5rem 1.5rem;
    }

    .gender {
      text-align: left;
    }

    .content {
      display: flex;
      justify-content: flex-start;
      gap: 20px;
      margin-top: 10px;

    }

    .btn {
      display: inline-block;
      margin-top: 1rem;
      padding: .5rem;
      padding-left: 1rem;
      border: var(--border);
      border-radius: .5rem;
      box-shadow: var(--box-shadow);
      color: var(--light-color);
      cursor: pointer;
      font-size: 1rem;
      background: #fff;
    }

    .btn:hover {
      background: var(--blue-color);
      color: #fff;
    }

    footer {
      background: #e2f7fc !important;
      text-align: center;
    }

    footer .credit {
      padding: 1rem;
      padding-top: 2rem;
      margin-top: 2rem;
      text-align: center;
      font-size: 1.2rem;
      color: var(--light-color);
      /* border-top: .1rem solid rgba(0, 0, 0, .1); */
    }

    footer .credit span {
      color: var(--green);
      font-weight: bold;
    }

    footer .last-part a {
      font-size: 12px;
      margin-left: 20px;
      color: var(--black);
      display: inline-block;
      margin-bottom: 10px;
    }
  </style>

  <body>
    <?php
    include_once('../dashboard/connect.php');
    if (isset($_POST['submit'])) {
        $P_name = mysqli_real_escape_string($conn, $_POST['name']);
        $P_email = mysqli_real_escape_string($conn, $_POST['email']);
        $P_number = $_POST['phone'];
        $Doctor_name = $_POST['doctors-name'];
        $Doctor_dept = $_POST['departments-name'];

        $P_symptoms = $_POST['symptoms'];
        $P_age = $_POST['age'];
        $P_gender = $_POST['inlineRadioOptions'];
        // $Appointment_time = $_POST['time'];
        $Appointment_date = $_POST['date'] . ' ' . $_POST['time'] . ':00';
        $Appointment_date = $_POST['date'];
        $P_address = mysqli_real_escape_string($conn, $_POST['address']);

        $insert = mysqli_query($conn, "INSERT INTO `appointment_info` (P_name, P_email, P_number, Doctor_name, Doctor_dept, P_symptoms, P_age, P_gender, Appointment_time, Appointment_date, P_address) VALUES ('$P_name', '$P_email', '$P_number', '$Doctor_name', '$Doctor_dept', '$P_symptoms', '$P_age', '$P_gender', '$Appointment_time', '$Appointment_date', '$P_address')")
        or die('query failed');

        if ($insert) {
            $message[] = 'Appointment Made Successfully !!';
        } else {
            $message[] = 'Appointment Failed !!';
        }
    }
    ?>

    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="../index.php" class="logo"><i class="fas fa-heartbeat"></i>
            <b>HealthCare</b></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 m-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Services
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../diagnostics-test/index.php" target="_blank">Diagnostics</a></li>
                  <li><a class="dropdown-item" href="../consultation-package/index.php" target="_blank">Consultation</a>
                  </li>
                  <li><a class="dropdown-item" href="../shopping-cart/index.php" target="_blank">E-Pharmacy</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Appointment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Review</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Registration
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../patient/index.php" target="_blank">Patient Login</a></li>
                  
                  <li><a class="dropdown-item" href="../patient/logout.php" target="_blank">Log out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <div class="container first-part mt-5 p-5">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6 mx-5">
          <img src="../image/doc-2.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-md-5">
          <h2 class="mt-3">Dr. Tareq Ahmed</h2>
          <h5><i class="fas fa-arrow-circle-right"></i> Fees: 450.00TK</h5>
          <!-- <span><i class="fas fa-phone"></i> 01934587256</span> <br>
            <span><i class="fas fa-envelope"></i> jamal@gmail.com</span> -->
          <div class="icon-title">
            <i class="fas fa-comment-dots"></i>
            <a target="_blank" href="https://api.whatsapp.com/?phone=+8801950381570"><span class="text-message">Text Message</span> <br></a>
            
            <i class="fas fa-video"></i>
            <a target="_blank" href="https://meet.google.com/twy-qyaq-ybh"><span class="video-call">Join in Video Call</span> <br></a>
            
            <i class="fas fa-calendar-alt"></i>
            <a href="#book_appointment"><span class="text-appointment">Appointment</span></a>
            
          </div>
        </div>
      </div>
      <div class="row border border-primary mt-5 p-5">
        <!-- <i class="fas fa-map-marker-alt"></i> -->
        <p><Strong> Designation : </Strong>Psychiatry (Mental Diseases, Autism, Brain Disorder, Drug Addiction)
          Specialist, <br>National Institute of Mental Health</p>
        <p><strong>Location : </strong>Dhaka</p>
        <p><strong>Experience: </strong>15 years+</p>
        <p><strong>Language: </strong>Bangla, English</p>
        <p><strong>Types of: </strong>Psychiatry</p>
        <p><strong>Chamber: </strong>MidWell Consultation Center
          45, Probal Tower, Ring Road Mohammadpur, Dhaka</p>
        <p><strong>Visiting Hour: </strong>2PM to 10PM (Closed: Friday)</p>
        <p><strong>Appointment Schedule:</strong></p>
        <table class="table table-striped border-primary">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Day</th>
              <th scope="col">Venue</th>
              <th scope="col">Time</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Friday</td>
              <td>Online Video Consultation Chamber</td>
              <td>02:00 PM - 9.00 PM</td>

            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Saturday</td>
              <td>Online Video Consultation Chamber</td>
              <td>03:00 PM - 10.00 PM</td>

            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Sunday</td>
              <td>Online Video Consultation Chamber</td>
              <td>02:30 PM - 8.30 PM</td>

            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Monday</td>
              <td>Online Video Consultation Chamber</td>
              <td>03:00 PM - 10.00 PM</td>

            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Tuesday</td>
              <td>Online Video Consultation Chamber</td>
              <td>05:00 PM - 9.30 PM</td>

            </tr>
            <tr>
              <th scope="row">6</th>
              <td>Wednesday</td>
              <td>Online Video Consultation Chamber</td>
              <td>04:30 PM - 8.30 PM</td>
            </tr>
            <tr>
              <th scope="row">7</th>
              <td>Thursday</td>
              <td>Online Video Consultation Chamber</td>
              <td>03.30 PM - 9.30 PM</td>
            </tr>
          </tbody>
        </table>
        <div class="some-icon">
          <p><strong>Contact With </strong> <br> <i class="fab fa-facebook"></i> <i class="fab fa-whatsapp"></i> <i
              class="fab fa-twitter"></i> <i class="fab fa-instagram"></i> <i class="fab fa-linkedin"></i></p>
        </div>
      </div>
    </div>
    <div class="container second-part mt-5 p-5" id="book_appointment">
      <h2 class="text-center">Book Appointment</h2>

      <div class="row d-flex justify-content-between align-items-center appointment mt-5" id="appointment">

        <div class="col-md-7 image">
          <img src="../image/appointment-img.svg" alt="">
        </div>

        <div class="col-md-5">
          <form
            action="<?php echo $_SERVER['PHP_SELF'];?>"
            method="post">
            <?php
                        if(isset($message)) {
                            foreach($message as $message) {
                                echo'<p class ="message">'.$message.'</p>';
                            }
                        }
    ?>

            <select class="form-select mb-3" name="doctors-name" aria-label="Default select example">
              <option selected>Select Doctors</option>
              <option value="Prof. Dr. Jamal Khan">Dr. Tareq Ahmed</option>
            </select>

            <select class="form-select mb-2" name="departments-name" aria-label="Default select example">
              <option selected>Select Departments</option>
              <option value="Psychiatry & Drug Addiction">Psychiatry & Drug Addiction</option>
            </select>

            <input type="text" name="name" placeholder="Enter Your Name" class="box" required> <br>
            <input type="tel" name="phone" placeholder="Enter Your Number" pattern="01[3-9]\d{8}" class="box" required>
            <br>
            <input type="email" id="email_address"  name="email" placeholder="Enter Your Email" class="box" required> <br>
            <input type="text" name="symptoms" placeholder="Enter Your Symptoms" class="box" required> <br>
            <input type="tel" name="age" placeholder="Enter Your Age" class="box" required> <br>
            <!-- <input type="time" name="time" placeholder="Select The Time" class="box" required> <br> -->



            <select class="form-select mb-2" name="time" aria-label="Default select example">
                            <option selected>Select Appointment Times</option>
                            <option value="02:00 PM - 9.00 PM">02:00 PM - 9.00 PM</option>
                            <option value="03:00 PM - 10.00 PM">03:00 PM - 10.00 PM</option>
                            <option value="02:30 PM - 8.30 PM">02:30 PM - 8.30 PM</option>
                            <option value="03:00 PM - 10.00 PM">03:00 PM - 10.00 PM</option>
                            <option value="05:00 PM - 9.30 PM">05:00 PM - 9.30 PM</option>
                            <option value="04:30 PM - 8.30 PM">04:30 PM - 8.30 PM</option>
                            <option value="03.30 PM - 9.30 PM">03.30 PM - 9.30 PM</option>
            </select>

            <input type="date" name="date" class="box datepicker" required> <br>



            <!-- <input type="text" readonly name="date" class="box datepicker" required> <br> -->


            <div class="content">
              <h6 class="gender">Select Gender:</h6>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Male">
                <label class="form-check-label" for="inlineRadio1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Female">
                <label class="form-check-label" for="inlineRadio2">Female</label>
              </div>
            </div>


            <textarea name="address" class="form-control" rows="3" cols="10"
              placeholder="Enter Your Address Here..."></textarea>
            <input type="submit" name="submit" value="Submit" class="btn">
          </form>
        </div>
      </div>
    </div>
    <div class="container-fluid mt-5">
      <footer>
        <div class="credit"> ©2023 <span>HealthCare BD</span> | All Rights Reserved</div>
        <div class="last-part">
          <a href="#conditions">Terms & Conditions</a>
          <a href="#privacy">Privacy Policy</a>
          <a href="#reviews">Reviews</a>
          <a href="#blogs">Health Blogs</a>
          <a href="#doctors">Expert Doctors List</a>
          <a href="contact">Contact Us</a>
        </div>
      </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
      integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
      
      $(function() {
            $( ".datepicker" ).datepicker({
                minDate:0
            });
        } );

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


    </script>
  </body>

</html>

<!-- Dr. Tareq Ahmed
Dr. Shamsuzzaman
Dr. Maruf Hossain
Prof. Dr. Jamal Khan
Dr. Fahima Khatun
Dr. Lutfa Tasnim
Prof. Dr. Humayun Kabir
Dr. Lokman Hossain
Prof. Dr. Ashraful Alam
Dr. Sirajul Haque
Dr. Zahirul Islam
Prof. Dr. Azharul Hoque
Dr. Abdullah Maruf
Dr. Ekramul Islam
Dr. Murad Hossain -->