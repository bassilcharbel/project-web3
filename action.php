<?php
session_start();
require 'config.php';

// Add products into the cart table
if (isset($_POST['pid'])) {
    // Retrieve the product details from the POST request
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcode = $_POST['pcode'];
    $pqty = $_POST['pqty'] ?? 1; // Default quantity if not set
    $total_price = $pprice * $pqty;

    // Check if the product already exists in the cart
    $stmt = $conn->prepare('SELECT product_code FROM cart WHERE product_code=?');
    $stmt->bind_param('s', $pcode);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $code = $r['product_code'] ?? '';

    // If the product is not in the cart, insert it
    if (!$code) {
        $query = $conn->prepare('INSERT INTO cart (product_name, product_price, product_image, qty, total_price, product_code) VALUES (?,?,?,?,?,?)');
        $query->bind_param('sssiss', $pname, $pprice, $pimage, $pqty, $total_price, $pcode);
        $query->execute();

        // Success alert
        echo '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Item added to your cart!</strong>
          </div>';
    } else {
        // Item already in cart alert
        echo '<div class="alert alert-danger alert-dismissible mt-2" role="alert">
            <strong>Item already added to your cart!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
}

// Checkout and save customer info in the orders table
if (isset($_POST['action']) && $_POST['action'] == 'order') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];
    $address = $_POST['address'];
    $pmode = $_POST['pmode'];

    $conn->begin_transaction(); // Start transaction

    try {
        // Insert order into the orders table
        $stmt = $conn->prepare("INSERT INTO orders (name, email, phone, addres, pmode, products, amount_paid) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param('sssssss', $name, $email, $phone, $address, $pmode, $products, $grand_total);
        $stmt->execute();

        // Fetch all items from the cart
        $cart_stmt = $conn->prepare('SELECT product_code, qty FROM cart');
        $cart_stmt->execute();
        $cart_result = $cart_stmt->get_result();

        while ($cart_row = $cart_result->fetch_assoc()) {
            $product_code = $cart_row['product_code'];
            $purchased_qty = $cart_row['qty'];

            // Retrieve the current quantity of the product from the database
            $product_stmt = $conn->prepare('SELECT product_qty FROM product WHERE product_code = ?');
            $product_stmt->bind_param('i', $product_code);
            $product_stmt->execute();
            $product_result = $product_stmt->get_result();
            $product_row = $product_result->fetch_assoc();

            if ($product_row) {
                $current_qty = $product_row['product_qty'];
                $new_qty = max($current_qty - $purchased_qty, 0); // Ensure quantity does not go below 0

                echo "Product ID: $product_code, Current Qty: $current_qty, Purchased Qty: $purchased_qty, New Qty: $new_qty<br>";

                // Update the product quantity in the database
                $update_stmt = $conn->prepare('UPDATE product SET product_qty = ? WHERE product_code = ?');
                $update_stmt->bind_param('ii', $new_qty, $product_code);
                $update_stmt->execute();

                if ($update_stmt->affected_rows > 0) {
                    echo "Product code $product_code updated successfully.<br>";
                } else {
                    echo "Failed to update Product CODE $product_code.<br>";
                }
            } else {
                echo "Product CODE $product_code not found.<br>";
            }
        }

        // Clear the cart after order is placed
        $stmt2 = $conn->prepare('DELETE FROM cart');
        $stmt2->execute();

        $conn->commit(); // Commit transaction

        // Return order confirmation to the user
        echo '<div class="text-center">
                <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
                <h2 class="text-success">Your Order Placed Successfully!</h2>
                <h4 class="bg-danger text-light rounded p-2">Items Purchased: ' . htmlspecialchars($products) . '</h4>
                <h4>Your Name: ' . htmlspecialchars($name) . '</h4>
                <h4>Your E-mail: ' . htmlspecialchars($email) . '</h4>
                <h4>Your Phone: ' . htmlspecialchars($phone) . '</h4>
                <h4>Total Amount Paid: ' . number_format($grand_total, 2) . '</h4>
                <h4>Payment Mode: ' . htmlspecialchars($pmode) . '</h4>
              </div>';
    } catch (Exception $e) {
        $conn->rollback(); // Rollback transaction if something goes wrong
        echo "Order processing failed: " . $e->getMessage();
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
  // Remove all items at once from cart
	if (isset($_GET['clear'])) {
		$stmt = $conn->prepare('DELETE FROM cart');
		$stmt->execute();
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'All Item removed from the cart!';
		header('location:cart.php');
	  }
	  // Remove single items from cart
	if (isset($_GET['remove'])) {
		$id = $_GET['remove'];
  
		$stmt = $conn->prepare('DELETE  FROM cart WHERE id=?');
		$stmt->bind_param('i',$id);
		$stmt->execute();
  
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'Item removed from the cart!';
		header('location:cart.php');
	  }
?>
