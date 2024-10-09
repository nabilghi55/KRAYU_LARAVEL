<!-- resources/views/front/partials/navbar.blade.php -->
<div class="bg-[#9FB39A] top-header">
	<div class="container">
		<div class="row align-items-center py-3 d-none d-lg-flex justify-content-between">
			<div class="col-lg-4 logo">
				<a href="{{ route('front.home') }}" class="text-decoration-none">
					<span class="h1 text-uppercase text-[#FFF6E0] px-2 text-ol">Krayu</span>
				</a>
			</div>
			<div class="col-lg-6 col-6 text-left d-flex justify-content-end align-items-center">
				@if (Auth::check())
				<a href="{{ route('account.profile') }}" class="nav-link text-dark">My Account</a>
				@else
				<a href="{{ route('account.login') }}" class="nav-link text-dark">Login/Register</a>
				@endif
				<form action="{{ route('front.shop') }}" method="get">
					<div class="input-group">
						<input value="{{ Request::get('search') }}" placeholder="Search For Products" class="form-control" name="search" id="search">
						<button type="submit" class="input-group-text">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
