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
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'>
  
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <!-- Custom CSS -->
  <link rel='stylesheet' href='./css1/lateststyle.css'>

  <!-- Bootstrap 5 JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  <!-- jQuery (Bootstrap dependency) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
</head>
<body style="background-color: black">
<nav style="background-color:#DC5F00!important;"class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">alpha supplements</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.html">about us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.html">contact us </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rating.php">feedback</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">check out</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="bi bi-person-circle"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="log in here">
          <a class="dropdown-item" href="login.html">log in </a>
          <a class="dropdown-item" href="register.html">sign up</a>
          <a class="dropdown-item" href="logout.php">log out</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </div>
</nav>
<div id="carouselExampleCaptions" class="carousel slide"style="padding:20px 0px!important;">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://i0.wp.com/superiorsupps.com/wp-content/uploads/2023/08/whey-fusion-1-scaled.jpg?resize=1536%2C480&ssl=1" alt="idk">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://i0.wp.com/superiorsupps.com/wp-content/uploads/2023/08/METABOLIC-CREATINE-1-scaled.jpg?resize=1536%2C480&ssl=1" alt="idk">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://i0.wp.com/superiorsupps.com/wp-content/uploads/2023/08/Combination-Render-Left-2.png?resize=1536%2C480&ssl=1" alt="idk">
      <div class="carousel-caption">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



  <!-- Displaying Products Start -->
  <div class="container" style="padding:40px;">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
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
            <img src="<?= $row['product_image'] ?>" class="card-img-top" height="250">
            <div class="card-body p-1">
              <h4 style="color:#DC5F00 !important;" class="card-title text-center text-info"><?= $row['product_name'] ?></h4>
              <h5 class="card-text text-center text-danger"><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?>/-</h5>

            </div>
            <div class="card-footer p-1">
              <form action=""  class="form-submit">
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
                <button style="background-color:#DC5F00;border-color:#DC5F00;" class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
</div>
  <!-- Displaying Products End -->

        
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
  <!--latest blog-->
 <div class="co--ntainers">
            <h2 class="title">
                latest blog
            </h2>
        </div>
        <div class="im-age">
            <img class="image__img" src="./photos/spump.jpg">
            <div class="image__overlay ">
                <p class="image__description">
                    Seeking longer pumps:the role of arginase inhibitors in pre-workouts<br>
                </p>
            </div>
        </div>
        <div class="im-age">
            <img class="image__img" src="./photos/orgsupp.jpg">
            <div class="image__overlay ">
                <p class="image__description">
                    The importance of organ support<br>
                </p>
            </div>
        </div>
        <div class="im-age">
            <img class="image__img" src="./photos/creatine1.jpg">
            <div class="image__overlay">
                <p class="image__description ">
                    The role of cratine in high-intensity intermittent activities<br>
                    </p>
            </div>
        </div>
        <div class="im-age">
            <img class="image__img" src="./photos/recovery1.jpg">
            <div class="image__overlay">
                <p class="image__description">
                  Maximize your recovery following intense strength training<br></p>
            </div>
        </div>
        <!-- latest blog-->
      <!--<div class="containers">
        <h2 class="title">
            latest blog
        </h2>
    </div>
    <div id="card-area">
        <div class="wrapper">
            <div class="boxs-area">
                <div class="boxs">
                    <img src="prom019.jpg">
                    <div class="overlay">
                        <h3> The importance of organ support</h3>
                        <p> </p>
                        <a href="#">read more</a>

                    </div>
                </div>
                <div class="boxs">
                    <img src="prom019.jpg">
                    <div class="overlay">
                        <h3> Maximize your recovery following intense strength training</h3>
                        <p> </p>
                        <a href="#">read more</a>
                        </div>
                        </div>
                        <div class="boxs">
                            <img src="prom2019.jpg">
                            <div class="overlay">
                                <h3> Seeking longer pumps:the role of arginase inhibitors in pre-workouts</h3>
                                <p> </p>
                                <a href="#">read more</a>
                        </div>
                </div>

            </div>
        </div>
    </div>
-->

        <!--testimonial-->
        <section id='about-us'>
            <div class='con--tainer'>
                    <div class='col-12 text-center'>
                        <h2>Testimonials</h2>
                        <p class="title-p">HEAR WHAT OUR CLIENTS HAVE TO SAY ABOUT US.</p>
                    </div>
             <div class="row text-center mt-5">
                <div class="col-lg-4">
                    <div class="box my-5">
                    <img src="./photos/avatar1.jpg">
                    <h4 class="mb-4 mt-2">Jhon Medow</h4>
                    <h5>I have  recently placed an order with Alpha Supps for a Protein powder, and I was blown away by their first-rate customer support and product quality. My order arrived promptly, safely packaged.</h5>
                </div>
                </div>
                <div class="col-lg-4">
                    <div class="box my-5">
                    <img src="./photos/avatar2.jpg">
                    <h4 class="mb-4 mt-2">Mia piana</h4>
                    <h5> I've tried many supplement stores in the past, but none have compared to the level of service and quality that I've experienced with ALpha supps. Their knowledgeable staff guided me through selecting the right supplements for my goals, and I've seen incredible improvements in my energy levels and overall well-being. </h5>
                </div>
                </div>
                <div class="col-lg-4">
                    <div class="box my-5">
                    <img src="./photos/avatar4.jpg">
                    <h4 class="mb-4 mt-2">Maria Ruhl</h4>
                    <h5>  my experience with Alpha Supps has exceeded all of my expectations. I heartily endorse them to anyone looking for premium supplements and outstanding customer support. </h5>
                </div>
                </div>
              </div>
            </div>
        </section>
        <!--social media-->
        <div class="social"> Connect with us <br> Follow us on our social media platform</div>
          <table>
            <tr>
              <td width="25%">
              </td>
              <td>
            <div class="sicons"><a href="#" ><i class="bi bi-facebook"></i></a>
              <a href="#" ><i class="bi bi-instagram"></i></a>
              <a href="#" ><i class="bi bi-tiktok"></i></a>
              <a href="#" ><i class="bi bi-twitter-x"></i></a> 
              <a href="#" ><i class="bi bi-youtube"></i></i></a>
        </div>
              </td>
      </tr>
        </table>
        <!--external links-->
        <nav class=footer>
        <a href="#">Privacy policy</a>
        <a href="#"> Terms & Condition</a> 
        <a href="#">Delivery Policy</a>
        <a href="#">Refund & Cancelation</a>
        </nav>


    </body>
</html>
</body>

</html>