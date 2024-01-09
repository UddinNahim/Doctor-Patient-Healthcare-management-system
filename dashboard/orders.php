<!-- Author Name: Nikhil Bhalerao +919423979339. 
PHP, Laravel and Codeignitor Developer
-->
<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php'); ?>

<div class="pcoded-content">
  <div class="pcoded-inner-content">

    <div class="main-body">
      <div class="page-wrapper">

        <div class="page-header">
          <div class="row align-items-end">
            <div class="col-lg-8">
              <div class="page-header-title">
                <div class="d-inline">
                  <h4>Orders</h4>

                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                    <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item"><a>Orders</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Orders</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="page-body">

          <div class="card">
            <div class="card-header">
              <div class="col-sm-10">
              </div>
              <!-- <h5>DOM/Jquery</h5>
<span>Events assigned to the table can be exceptionally useful for user interaction, however you must be aware that DataTables will add and remove rows from the DOM as they are needed (i.e. when paging only the visible elements are actually available in the DOM). As such, this can lead to the odd hiccup when working with events.</span> -->
            </div>
            <div class="card-block">
              <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Payment Method</th>
                      <th>Price</th>
                      <th>Products</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
    $sql ="SELECT * FROM orders";
$qsql = mysqli_query($conn, $sql);
while($rs = mysqli_fetch_array($qsql)) {
    echo "<tr>
          <td>&nbsp;$rs[name]</td>
          <td>&nbsp;$rs[email]</td>
          <td>&nbsp;$rs[phone]</td>
          <td>&nbsp;$rs[address]</td>
          <td>&nbsp;$rs[payment_method]</td>
          <td>&nbsp;Tk.$rs[price]</td>
          <td>&nbsp;$rs[products]</td>'";
    echo "</tr>";
}
?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>




        </div>

      </div>
    </div>

    <div id="#">
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<?php include('footer.php');?>
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success
      </h1>
      <p><?php echo $_SESSION['success']; ?></p>
      <p>
        <?php echo "<script>setTimeout(\"location.href = 'view_user.php';\",1500);</script>"; ?>
        <!-- <button class="button button--success" data-for="js_success-popup">Close</button> -->
      </p>
  </div>
</div>
<?php unset($_SESSION["success"]);
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error
      </h1>
      <p><?php echo $_SESSION['error']; ?></p>
      <p>
        <?php echo "<script>setTimeout(\"location.href = 'view_user.php';\",1500);</script>"; ?>
        <!--  <button class="button button--error" data-for="js_error-popup">Close</button> -->
      </p>
  </div>
</div>
<?php unset($_SESSION["error"]);
} ?>
<script>
  var addButtonTrigger = function addButtonTrigger(el) {
    el.addEventListener('click', function() {
      var popupEl = document.querySelector('.' + el.dataset.for);
      popupEl.classList.toggle('popup--visible');
    });
  };

  Array.from(document.querySelectorAll('button[data-for]')).
  forEach(addButtonTrigger);
</script>