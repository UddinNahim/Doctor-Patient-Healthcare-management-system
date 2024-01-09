<?php session_start() ;
require_once "../dashboard/connect.php";
?>


<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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

    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Patient Reset Password</title>
</head>


<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    html, body {
    background-image: url("../image/teleme-bg-1.jpg");
    background-repeat: no-repeat;
    background-position: left;
    background-size: cover;
    font-family: 'Poppins', sans-serif;
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

        .login-form {
            margin-top: 150px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-size: 20px;
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            font-weight: bold;
        }

        input.form-control {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

    .new-btn {
    /* height: 40px; */
    width: 40%;
    background: linear-gradient(to right, #4b84ff, #54dce6);
    border: none;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
  }

  input[type=submit] {
    padding: 8px 5px!important;
  }
 
  ::selection {
  background: #fa4299;
  color: #fff;
}

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        @media (max-width: 576px) {
            .navbar-toggler-icon {
                background-color: #ffffff;
            }
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

</style>

<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Patient Password Reset Form</a>
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Reset Your Password</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required autofocus>
                                    <i class="fas fa-eye" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input class="new-btn" type="submit" value="Reset" name="reset">
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

<?php
    if(isset($_POST["reset"])){
        require_once "../dashboard/connect.php";
        $psw = $_POST["password"];

        $token = $_SESSION['token'];
        $Email = $_SESSION['email'];

        // $hash = password_hash( $psw , PASSWORD_DEFAULT );
        $passw = hash('sha256', $_POST['password']);
        $password_hash = hash('sha256', '2123293dsj2hu2nikhiljdsd' . $passw);
    

        $sql = mysqli_query($conn, "SELECT * FROM patient WHERE loginid='$Email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($Email){
            $new_pass = $password_hash;
            mysqli_query($conn, "UPDATE patient SET password='$new_pass' WHERE loginid='$Email'");
            ?>
            <script>
                window.location.replace("index.php");
                alert("<?php echo "your password has been successfully reset"?>");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }

?>

