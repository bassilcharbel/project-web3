<!DOCTYPE HTML>
<html>
<head>
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
</head>
<body>
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

    <div class="container">
    	<h1 class="mt-5 mb-5"></h1>
    	<div class="card">
    		<div class="card-header">Sample Product</div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
    				</div>
    				<div class="col-sm-4 text-center">
    					<h3 class="mt-4 mb-3">Write Review Here</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>
<script>
var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });


load_rating_data();

function load_rating_data()
{
    $.ajax({
        url:"submit_rating.php",
        method:"POST",
        data:{action:'load_data'},
        dataType:"JSON",
        success:function(data)
        {
            $('#average_rating').text(data.average_rating);
            $('#total_review').text(data.total_review);

            var count_star = 0;

            $('.main_star').each(function(){
                count_star++;
                if(Math.ceil(data.average_rating) >= count_star)
                {
                    $(this).addClass('text-warning');
                    $(this).addClass('star-light');
                }
            });

            $('#total_five_star_review').text(data.five_star_review);

            $('#total_four_star_review').text(data.four_star_review);

            $('#total_three_star_review').text(data.three_star_review);

            $('#total_two_star_review').text(data.two_star_review);

            $('#total_one_star_review').text(data.one_star_review);

            $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

            $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

            $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

            $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

            $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

            if(data.review_data.length > 0)
            {
                var html = '';

                for(var count = 0; count < data.review_data.length; count++)
                {
                    html += '<div class="row mb-3">';

                    html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                    html += '<div class="col-sm-11">';

                    html += '<div class="card">';

                    html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                    html += '<div class="card-body">';

                    for(var star = 1; star <= 5; star++)
                    {
                        var class_name = '';

                        if(data.review_data[count].rating >= star)
                        {
                            class_name = 'text-warning';
                        }
                        else
                        {
                            class_name = 'star-light';
                        }

                        html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                    }

                    html += '<br />';

                    html += data.review_data[count].user_review;

                    html += '</div>';

                    html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                    html += '</div>';

                    html += '</div>';

                    html += '</div>';
                }

                $('#review_content').html(html);
            }
        }
    })
}
$(document).ready(function() {
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