<?php
session_start();
require_once('../dashboard/connect.php');

// Add products into the cart table
if (isset($_POST['id'])) {
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $price = $_POST['price'];
    $type  = $_POST['type'];

    $stmt = $conn->prepare('SELECT name FROM cart WHERE name=?');
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $chkItem = $r['name'] ?? '';

    if (!$chkItem) {
        $query = $conn->prepare('INSERT INTO cart (`name`,`price`,`type`) VALUES (?,?,?)');
        $query->bind_param('sss', $name, $price, $type);
        $query->execute();

        echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item added to your cart!</strong>
						</div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item already added to your cart!</strong>
						</div>';
    }
}

// Get no.of items available in the cart table
if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
    $stmt = $conn->prepare('SELECT * FROM cart');
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    echo $rows;
}

// Remove ALL items from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];

    $stmt = $conn->prepare('DELETE FROM cart WHERE id=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed from the cart!';
    header('location:cart.php');
}

// Add single items from cart
if (isset($_GET['add'])) {
    $id = $_GET['add'];

    $stmt = $conn->prepare('UPDATE cart set quantity=(select max(quantity) from cart where id=?)+1 WHERE id=?');
    $stmt->bind_param('ii', $id,$id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item added from the cart!';
    header('location:cart.php');
}

// Minus single items from cart
if (isset($_GET['minus'])) {
    $id = $_GET['minus'];

    $stmt = $conn->prepare('UPDATE cart set quantity=(select max(quantity) from cart where id=?)-1 WHERE id=?');
    $stmt->bind_param('ii', $id,$id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item Delete from the cart!';
    header('location:cart.php');
}

// Remove all items at once from cart
if (isset($_GET['clear'])) {
    $stmt = $conn->prepare('DELETE FROM cart');
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'All Item removed from the cart!';
    header('location:cart.php');
}


// Checkout and save customer info in the orders table
if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
    $name           = $_POST['name'];
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];
    $products       = $_POST['products'];
    $price          = $_POST['price'];
    $address        = $_POST['address'];
    $payment_method = $_POST['payment_method'];

    $data = '';

    $stmt = $conn->prepare('INSERT INTO orders (name,email,phone,address,payment_method,products,price)VALUES(?,?,?,?,?,?,?)');
    $stmt->bind_param('sssssss', $name, $email, $phone, $address, $payment_method, $products, $price);
    $stmt->execute();
    $stmt2 = $conn->prepare('DELETE FROM cart');
    $stmt2->execute();
    $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
								<h4>Your Name : ' . $name . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
								<h4>Total Amount Paid : TK  ' . number_format($price, 2) . '/-</h4>
								<h4>Payment Mode : ' . $payment_method . '</h4>
						  </div>';
    echo $data;
}
