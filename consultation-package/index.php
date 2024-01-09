<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Video Consultation Packages</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

<style>
body {
  background-image: linear-gradient(180deg, #DBE8FF 78.25%, rgba(219, 232, 255, 0.00) 100%);
  /* background-color: #e8eeff; */
  /* background-repeat: no-repeat; */
}

.navbar{
    background: #EAF0FF!important;
    box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .1);
}
.navbar-brand, .nav-item a {
  color: black;
}
.card {
      border: 2px solid #5e8af8!important;
      border-radius: 4px;
      padding: 20px;
      margin-bottom: 20px;
    }
    .card:hover{
      box-shadow: 5px 6px 0 rgba(0, 97, 187, 0.2);
    }
    /* .text-info {
    color: black!important;
} */
.btn {
  color: white;
  background-color: #5e8af8;
  font-size: 18px;
  font-weight: 500;
}
.btn:hover {
  background: none;
  color: #5e8af8;
  border: 2px solid #5e8af8;
}
footer {
  background: #EAF0FF!important;
    text-align: center;
    /* position: fixed;
    bottom: 0;
    right: 0;
    left: 0; */
    margin-top: 210px;
}

footer .credit{
    padding: 1rem;
    padding-top: 2rem;
    margin-top: 2rem;
    text-align: center;
    font-size: 1.5rem;
    color: #111;
    /* border-top: .1rem solid rgba(0, 0, 0, .1); */
}

footer .credit span{
    color: #5e8af8;
    font-weight: bold;
}

footer .last-part a {
    font-size: 12px;
    margin-left: 20px;
    color: #444;
    display: inline-block;
    margin-bottom: 10px;
}
</style>
</head>
<body>
  <!-- Navbar start -->
  <nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="../index.php" class="logo"> <i class="fas fa-heartbeat"></i> <strong>HealthCare</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php"><i class="fas fa-capsules"></i>Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-th-list mr-2"></i>Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger">3</span></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navbar end -->

  <!-- Displaying Products Start -->
  <div class="container">
  <h2 class="text-center m-5">Video Consultation Packages</h2>
    <div id="message"></div>
    <div class="row mt-2 pb-3 d-flex justify-content-evenly">
      <?php
  			include 'config.php';
  			$stmt = $conn->prepare('SELECT * FROM product');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="<?= $row['product_image'] ?>" class="card-img-top" height="200">
            <!-- height="250" -->
            <div class="card-body p-1">
              <h5 class="card-title text-center"><?= $row['product_name'] ?></h5>
              <h5 class="card-text text-center text-primary">TK: <?= number_format($row['product_price'],2) ?>/-</h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="<?= $row['product_qty'] ?>">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button class="btn btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                  cart</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
  <div class="container mt-5">
    <h2 class="mb-2">Frequently Asked Questions</h2>
    <h5 class="mb-4">Take a look at the most commonly asked questions. We are here to help.</h5>

    <div class="accordion" id="faqAccordion">

        <!-- FAQ 1 -->
        <div class="card">
            <div class="card-header" id="faqHeading1">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                        What is a Health Check?
                    </button>
                </h5>
            </div>

            <div id="faqCollapse1" class="collapse show" aria-labelledby="faqHeading1" data-parent="#faqAccordion">
                <div class="card-body">
                    A Health Check is a thorough check-up of your health, recommended once a year. Health checks can identify health problems you may not know you have, such as the development of chronic conditions or if you are at risk of developing a chronic condition...
                </div>
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="card">
            <div class="card-header" id="faqHeading2">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                        How does a health check help me?
                    </button>
                </h5>
            </div>

            <div id="faqCollapse2" class="collapse" aria-labelledby="faqHeading2" data-parent="#faqAccordion">
                <div class="card-body">
                    <ul>
                      <li>Early detection of health problems: A health check can help identify potential issues when they are most treatable. Early detection and treatment can prevent the development of severe health conditions and improve your overall health and well-being.</li>
                      <li>Peace of mind: By having a health check, you can get a comprehensive assessment of your health, which can give you peace of mind and help you to feel more confident about your overall health and well-being.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Add more FAQs as needed -->

    </div>
</div>
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

  <!-- Displaying Products End -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>