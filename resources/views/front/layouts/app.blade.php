<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Krayu</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />

	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />
	@vite('resources/css/app.css')
	<meta property="og:locale" content="en_AU" />
	<meta property="og:type" content="website" />
	<meta property="fb:admins" content="" />
	<meta property="fb:app_id" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="" />
	<meta property="og:image:height" content="" />
	<meta property="og:image:alt" content="" />

	<meta name="twitter:title" content="" />
	<meta name="twitter:site" content="" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:image:alt" content="" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">


	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick-theme.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/ion.rangeSlider.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/style.css') }} " />

	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">

	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img\logo2.png') }}" />

	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body data-instant-intensity="mousedown">





<main>
    @yield('content')
</main>



<!-- Wishlist Modal -->
<div class="modal fade" id="wishlistModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Success</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">

		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		</div>
	  </div>
	</div>
  </div>

<script src="{{ asset('front-assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('front-assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/slick.min.js') }}"></script>
<script src="{{ asset('front-assets/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('front-assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('admin-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

$.ajaxSetup({
	headers:{
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
});

	function addToCart(id){
		$.ajax({
			url: '{{ route("front.addToCart") }}',
			type: 'post',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				console.log(response);
				if (response.status == true) {
					// window.location.reload();
					// window.location.href = '{{ route("front.cart") }}';
					updateCartItemCount();
				} else {
					alert(response.message);
				}
			}
		});
	}

	function addToWishlist(id) {
		$.ajax({
				url: '{{ route("front.addToWishlist") }}',
				type: 'post',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					console.log(response);
					if (response.status == true) {

						$("#wishlistModal .modal-body").html(response.message)
						$("#wishlistModal").modal('show');

					} else {
						window.location.href = '{{ route("account.login") }}';
						//alert(response.message);
					}
				}
			});
		}
<style>
    .bg-olive {
        background-color: #9FB39A;
    }
    .navbar .dropdown-menu {
        background-color: #9FB39A;
    }
    .navbar .nav-link, .navbar .btn, .navbar .btn-outline-dark {
        color: #1F1F1F;
    }
    .navbar .btn-outline-dark:hover {
        background-color: #7A946E;
        color: white;
    }
    .navbar .btn-outline-dark {
        border-color: #1F1F1F;
    }
	.text-krayu{
		color: #FFF6E0
	}
</style>
// Function to update the cart item count
function updateCartItemCount() {
    $.ajax({
        url: '{{ route("front.getCartItemCount") }}',
        type: 'get',
        dataType: 'json',
        success: function(response) {
            if (response.status == true) {
                $('#cart-item-count').text(response.itemCount);
            } else {
                console.error('Failed to update cart item count');
            }
        }
    });
}

// Call the function to update the cart item count initially
updateCartItemCount();

</script>

@yield('customJs')
</body>
</html>
