<!-- resources/views/front/partials/header.blade.php -->
<header class="bg-olive">
	<div class="container">
		<nav class="navbar navbar-expand-xl" id="navbar">
			<a href="{{ route('front.home') }}" class="text-decoration-none mobile-logo">
				<span class="h2 text-uppercase text-primary bg-dark">Krayu</span>
			</a>
			<button class="navbar-toggler menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="navbar-toggler-icon fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					@php $categoryCount = 0; @endphp
					@if(getCategories()->isNotEmpty())
					@foreach (getCategories() as $category)
						@if ($categoryCount < 6)
							<li class="nav-item dropdown">
								<button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
									{{ $category->name }}
								</button>
								@if($category->sub_category->isNotEmpty())
								<ul class="dropdown-menu dropdown-menu-dark">
									@foreach ($category->sub_category as $subCategory)
									<li><a class="dropdown-item nav-link" href="{{ route('front.shop', [$category->slug,$subCategory->slug]) }}">{{ $subCategory->name }}</a></li>
									@endforeach
								</ul>
								@endif
							</li>
							@php $categoryCount++; @endphp
						@endif
					@endforeach
					@endif
				</ul>
			</div>
			<div class="right-nav py-0">
				<a href="{{ route('front.cart') }}" class="ml-3 d-flex pt-2">
					<i class="fas fa-shopping-cart text-primary"></i>
					<span id="cart-item-count" class="badge badge-danger">0</span>
				</a>
			</div>
		</nav>
	</div>
</header>
