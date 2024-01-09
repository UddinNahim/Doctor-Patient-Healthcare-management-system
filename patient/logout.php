<?php

session_start();

session_destroy();

header("Location: http://localhost/final-project/patient/index.php");
exit;




//<?php 
//session_start();
//if (isset($_SESSION['email'])) {
   // unset($_SESSION['email']);
   // header("Location: http://localhost/final-project/main-page.php");
//}
