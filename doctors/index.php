<?php
    include('connect/connection.php');

    if(isset($_POST["login"])){
        $email = mysqli_real_escape_string($connect, trim($_POST['email']));
        $password = trim($_POST['password']);

        $sql = mysqli_query($connect, "SELECT * FROM doctor_login where email = '$email'");
        $count = mysqli_num_rows($sql);

            if($count > 0){
                $fetch = mysqli_fetch_assoc($sql);
                $hashpassword = $fetch["password"];
    
                if($fetch["status"] == 0){
                    ?>
                    <script>
                        alert("Please verify email account before login.");
                    </script>
                    <?php
                }else if(password_verify($password, $hashpassword)){
                    ?>
                    <script>
                        alert("login in successfully");
                        window.location.replace('http://localhost/final-project/main-page.php');
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert("email or password invalid, please try again.");
                    </script>
                    <?php
                }
            }         
    }

?>

<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
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

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- ICON -->
    <!-- <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css” /> -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Doctor Login Form</title>
</head>

<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
  body {
    background-image: url("../image/teleme-bg-1.jpg");
    background-repeat: no-repeat;
    background-position: left;
    background-size: cover;
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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

  .login-form {
    margin-top: 50px;
  }

  .container {
    max-width: 100%;
  }

  .img-wrapper {
    text-align: center;
  }

  .img-wrapper img {
    width: 100%;
    max-width: 480px;
    height: auto;
    border-radius: 20px;
    /* box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1); */
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
    font-size: 25px;
  }

  .card-body {
    padding: 30px;
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

  #togglePassword {
  position: absolute;
  right: 20px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  color: #888;
}

  /* Style for eye-open icon */
  #togglePassword.fa-eye-slash {
  color: #568cff;
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

  .btn-link {
    color: #4b84ff;
    text-decoration: underline;
    font-weight: bold;
    /* text-align: center; */
    margin-left: 20px;
  }

  input[type=submit] {
    padding: 8px 10px!important;
  }
  .text-md-right {
    text-align: left!important;
}
  
  ::selection {
  background: #fa4299;
  color: #fff;
}
.icon-part {
    font-size: 20px;
    margin-top: 15px;
  }
  .fa-facebook,
.fa-whatsapp,
.fa-envelope,
.fa-youtube {
  margin-left: 15px;
}

  @media screen and (min-width: 768px) and (max-width: 1023px) {
    .container {
      padding: 0 10px;
    }

    .img-wrapper img {
      max-width: 100%;
      
    }
  }

  @media screen and (max-width: 767px) {
    .container .row {
    flex-direction: column-reverse;
    align-items: center;
  }
    .card-body {
      padding: 15px;
    }
    .img-wrapper img {
        margin-top: 20px;
    }

    .form-control {
      height: 35px;
    }

    #togglePassword {
      right: 20px;
    }
    .text-md-right {
    text-align: left!important;
}
.icon-part {
    font-size: 20px;
    margin-top: 20px;
  }
  .btn-link {
   margin-left: 100px!important;
  }
  .new-btn {
    width: 100%;
  }
    
  }


</style>

<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Doctor Login Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="font-weight:bold; color:black; text-decoration:underline">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<main class="login-form">
    <div class="container">
        <div class="row d-flex justify-content-evenly align-items-center">
        <div class="col-md-6">
        <div class="img-wrapper">
                    <img src="../image/new.png" alt="" class="img-fluid">
                </div>
        </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Doctor Login</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-7">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-7">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    <i class="fas fa-eye" id="togglePassword"></i>
                                   
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Login" name="login" class="new-btn">
                                <a href="recover_psw.php" class="btn btn-link">
                                    Forgot Your Password?
                                </a>
                                <div class="icon-part text-center">
                                <a href=""><i class="fab fa-facebook"></i></a>
                                <a href=""><i class="fab fa-whatsapp"></i></a>
                                <a href=""><i class="fas fa-envelope"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
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
</script>

</body>
</html>


