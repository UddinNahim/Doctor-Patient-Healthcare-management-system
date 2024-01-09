<?php
session_start();
require_once "../dashboard/connect.php";

if (isset($_POST["register"])) {
    $firstName = $_POST["firstName"];
    $lastName  = $_POST["lastName"];
    $phoneNo   = $_POST["phoneNo"];
    $email     = $_POST["email"];
    $password  = $_POST["password"];

    $check_query = mysqli_query($conn, "SELECT * FROM patient where loginid = '$email'");
    $rowCount = mysqli_num_rows($check_query);


    if (empty($_POST["firstName"])) {
        die("First Name is required");
    }
    
    if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Valid email is required");
    }
    
    if (strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters");
    }
    
    if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
        die("Password must contain at least one letter");
    }

    if ( ! preg_match("/[0-9]/", $_POST["password"])) {
        die("Password must contain at least one number");
    }
    


    if (!empty($firstName) && !empty($lastName) && !empty($phoneNo) && !empty($email) && !empty($password)) {
        if ($rowCount > 0) {
            ?>
            <script>
                alert("User with email already exists!");
            </script>
            <?php
        } else {
            $passw = hash('sha256', $_POST['password']);
            $password_hash = hash('sha256', '2123293dsj2hu2nikhiljdsd' . $passw);

            $patientname = $firstName . " " . $lastName;
            // die("INSERT INTO patient (patientname, mobileno, loginid, password, status) VALUES ('$patientname', '$phoneNo', '$email', '$password_hash', 'Active')");
            $result = mysqli_query($conn, "INSERT INTO patient (patientname, mobileno, loginid, password, status) VALUES ('$patientname', '$phoneNo', '$email', '$password_hash', 0)");
            if ($result) {
                $otp = rand(100000, 999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['mail'] = $email;
                require "Mail/phpmailer/PHPMailerAutoload.php";
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';

                $mail->Username = 'musfiq.cse.green@gmail.com';
                $mail->Password = 'tqsffiyxyrpgpboz';

                $mail->setFrom('musfiq.cse.green@gmail.com', 'OTP Verification');
                $mail->addAddress($_POST["email"]);

                $mail->isHTML(true);
                $mail->Subject = "Your verify code";
                $mail->Body = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                <br><br>
                <p>With regards,</p>
                <b>Doctor Patient System</b>";

                if (!$mail->send()) {
                    ?>
                    <script>
                        alert("<?php echo "Register Failed, Invalid Email " ?>");
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                        window.location.replace('verification.php');
                    </script>
                    <?php
                }
            }
        }
    }
}
?>

<!-- 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" /> -->
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- ICONS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Patient Register Form</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    html, body {
    background-image: url("../image/teleme-bg-1.jpg");
    background-repeat: no-repeat;
    background-position: left;
    background-size: cover;
    font-family: 'Poppins', sans-serif;
    /* margin: 0;
    padding: 0; */
    /* box-sizing: border-box; */
  }
  .navbar {
    background-color: #fff;
    border-bottom: 1px solid lightgrey;
  }

  .navbar-brand {
    color: #000;
    font-weight: bold;
  }

  .navbar-nav .nav-link {
    color: #000;
  }
  .card {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
  }

  .card-header {
    background-color: #4b84ff;
    color: #fff;
    font-weight: bold;
    border-radius: 20px 20px 0 0;
    text-align: center;
    font-size: 20px;
  }
  .form-group {
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
  }

  .form-control {
    border-radius: 5px;
    border: 1px solid lightgrey;
    height: 40px;
  }
  .form-inner form .field {
  height: 50px;
  width: 100%;
  margin-top: 20px;
} 

  .checkbox {
    margin-top: 10px;
  }

  .new-btn {
    /* height: 40px; */
    width: 100%;
    background: linear-gradient(to right, #4b84ff, #54dce6);
    border: none;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
  }

  input[type=submit] {
    padding: 8px 10px!important;
  }
 
  ::selection {
  background: #fa4299;
  color: #fff;
}

#togglePassword {
  position: absolute;
  right: 20px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  color: #888;
}

#togglePassword.fa-eye-slash {
  color: #568cff;
}


</style>

<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Patient Register Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" >Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php" style="font-weight:bold; color:black; text-decoration:underline">Register</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<main class="login-form">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Patient Register</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="register">

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                <input type="text" class="form-control"  name="lastName" placeholder="Last Name" required> 
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Contact Number</label>
                                <div class="col-md-6">
                                <input type="tel" id="phone_number" class="form-control" name="phoneNo" maxlength="11"  placeholder="Contact Number" required> 
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="email_address" class="form-control" name="email" required >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    <i class="fas fa-eye" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Register" name="register" class="new-btn">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


<script>
    const passwordField = document.getElementById("password");
         const togglePassword = document.getElementById("togglePassword");

         // Toggle password visibility
         togglePassword.addEventListener("click", () => {
         if (passwordField.type === "password") {
            passwordField.type = "text";
            togglePassword.classList.remove("fa-eye");
            togglePassword.classList.add("fa-eye-slash");
         } else {
            passwordField.type = "password";
            togglePassword.classList.remove("fa-eye-slash");
            togglePassword.classList.add("fa-eye");
         }
         });


let firstName = document.querySelector('input[name="firstName"]');
let lastName = document.querySelector('input[name="lastName"]');

firstName.addEventListener('blur', function() {
    validateName(this, "First Name");
});

lastName.addEventListener('blur', function() {
    validateName(this, "Last Name");
});

function validateName(input, fieldName) {
    const pattern = /^[A-Z][a-zA-Z. ]+$/;

    if (!pattern.test(input.value)) {
        alert(`${fieldName} should start with an uppercase letter followed by alphabets, spaces, or periods.`);
        input.value = '';  // Clear the input if invalid
    }
}



         let phone_number = document.getElementById('phone_number');
        phone_number.addEventListener('blur', function (e) {
            if (this.value.length < 10) {
                alert('Please enter 11 digit mobile number');
            } else {
                const pattern = /^01[9765843][0-9]{8}$/;
                if(!pattern.test(this.value)) {
                    alert('Please enter a valid phone number');
                }
            }
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


        let password = document.getElementById('password');
        password.addEventListener('blur', function (e) {
            if (this.value.length < 8) {
                alert('Password must be at least 8 characters long');
            } else {
                const pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                if(!pattern.test(this.value)) {
                    alert('Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character');
                }
            }
        });
</script>

</body>
</html>
<!-- <script>
    // const toggle = document.getElementById('togglePassword');
    // const password = document.getElementById('password');

    // toggle.addEventListener('click', function(){
    //     if(password.type === "password"){
    //         password.type = 'text';
    //     }else{
    //         password.type = 'password';
    //     }
    //     this.classList.toggle('bi-eye');
    // });


    
</script> -->
