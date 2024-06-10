<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Alpha supplement</title>
  
  <!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="./css1/lateststyle.css">

<!-- Bootstrap 5 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script></head>

<body style="background-color:white;">
  
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#DC5F00!important;">
  <a class="navbar-brand" href="index.php">alpha supplements</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.html">about us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.html">contact us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rating.php">feedback</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">check out</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge bg-danger"></span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-circle"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="login.html">log in</a></li>
          <li><a class="dropdown-item" href="register.html">sign up</a></li>
          <li><a class="dropdown-item" href="logout.php">log out</a></li>
          <li><hr class="dropdown-divider"></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <!--alert-->
      <?php if (isset($_SESSION['showAlert']) && $_SESSION['showAlert'] == 'block' && isset($_SESSION['message'])): ?>
        <div class="alert alert-success alert-dismissible mt-3" style="display: <?php echo $_SESSION['showAlert']; ?>;">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <strong><?php echo $_SESSION['message']; ?></strong>
        </div>
        <?php unset($_SESSION['showAlert']); unset($_SESSION['message']); ?>
      <?php endif; ?>

      <div class="table-responsive mt-2">
        <table class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <td colspan="7">
                <h4 class="text-center text-info m-0" style="color:#DC5F00 !important;">Products in your cart!</h4>
              </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>
                <a href="action.php?clear=all" class="badge bg-danger p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'config.php';
                $stmt = $conn->prepare('SELECT * FROM cart');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><img src="<?= $row['product_image'] ?>" width="50"></td>
                <td><?= $row['product_name'] ?></td>
                <td>
                  <i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2); ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;">
                </td>
                <td><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['total_price'],2); ?></td>
                <td>
                  <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['total_price']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="3">
                  <a href="index.php" class="btn btn-success"style="background-color:#DC5F00;border-color:#DC5F00;"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                <td>
                  <a href="checkout.php" style="background-color:#DC5F00;border-color:#DC5F00;"class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      //location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          qty:qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
         console.log(response);
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