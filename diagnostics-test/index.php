<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Service </title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

<style>
body {
  background-image: linear-gradient(180deg, #DBE8FF 78.25%, rgba(219, 232, 255, 0.00) 100%);
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
.card img {
  width: 100px;
  margin: 0 auto;
}

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
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger">0</span></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navbar end -->

  <!-- Displaying Products Start -->
  <div class="container">
    <?php
    
    $dept = 'Diagnostics';
    if (isset($_GET['type'])) {
        if ($_GET['type'] == 'Consultation') {
            $dept = 'Consultation';
        } elseif ($_GET['type'] == 'Diagnostics') {
            $dept = 'Diagnostics';
        } else {
            $dept = 'E-Pharmacy';
        }
    }
     ?>
  <h2 class="text-center m-5"><?php echo $dept;?></h2>
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
      require_once('../dashboard/connect.php');
      
      $stmt = $conn->prepare('SELECT * FROM treatment WHERE `type`=?');
      $stmt->bind_param('s', $dept);
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) :?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-5">
        <div class="card-deck">
          <div class="card p-2">
          <img src="image/flask.jpg" class="card-img-top">
            <div class="card-body p-1">
              <h5 class="card-title text-center"><?= $row['name'] ?></h5>
              <h6 class="card-title text-center"><?= $row['type'] ?></h6>
              <h5 class="card-text text-center text-danger">Price: <?= number_format($row['price'],2) ?> TK</h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <input type="hidden" name="id" class="id" value="<?= $row['id'] ?>">
                <input type="hidden" name="name" class="name" value="<?= $row['name'] ?>">
                <input type="hidden" name="type" class="type" value="<?= $row['type'] ?>">
                <input type="hidden" name="price" class="price" value="<?= $row['price'] ?>">
                <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                  cart</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
  <!-- Displaying Products End -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(document).on('click',".addItemBtn", function(e) {
      e.preventDefault();
      var form = $(this).closest("form");
      let data = form.serialize();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: data,
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