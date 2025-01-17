@extends('front.layouts.app')
@include('front.partials.navbar')
@section('content')
    <section class="bg-white">
        <div class="w-11/12 mx-auto">
            <div class="row ">
                <div class="col-md-5">
                    <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($product->product_image)
                                @php
                                    $productImages = is_array($product->product_image)
                                        ? $product->product_image
                                        : explode(',', $product->product_image);
                                @endphp
                                @foreach ($productImages as $key => $image)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img class="w-72 lg:w-80 mx-auto" src="{{ $image }}" alt="">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>
                        <a class="carousel-control-next" href="#product-carousel" data-bs-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="mt-5 mt-md-0 text-[#3A3845]">
                        <h1>{{ $product->title }}</h1>
                        <div class="d-flex mt-2 mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star-half-alt"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(99 Reviews)</small>
                        </div>
                        @if ($product->compare_price > 0)
                            <h2 class="price text-secondary"><del>Rp {{ number_format($product->compare_price, 2) }}</del>
                            </h2>
                        @endif

                        <h2 class="price mb-3">Rp {{ number_format($product->price, 2) }}</h2>

                        <div class="text-[#807F86]">
                            {!! $product->short_description !!}
                        </div>

                        <br>
                        @if ($product->track_qty == 'Yes')
                            @if ($product->qty > 0)
                                <a class="border-[1px] border-[#3A3845] text-[#3A3845] py-2 px-2 text-center"
                                    href="javascript:void(0);" onclick="addToCart({{ $product->id }});">
                                    &nbsp;MASUKKAN KERANJANG
                                </a>
                            @else
                                <a class="border-[1px] border-[#3A3845] text-[#3A3845] py-2 px-2 text-center"
                                    href="javascript:void(0);" onclick="showOutOfStockAlert();">
                                    STOK HABIS
                                </a>
                            @endif
                        @else
                            <a class="border-[1px] border-[#3A3845] text-[#3A3845] py-2 px-2 text-center"
                                href="javascript:void(0);" onclick="addToCart({{ $product->id }});">
                                <i class="fa fa-shopping-cart"></i> &nbsp;MASUKKAN KERANJANG
                            </a>
                        @endif
                    </div>
                </div>

                <div class="col-md-12 mt-5">
                    <div class="bg-white">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active text-lg font-bold" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                    aria-selected="true">Deskripsi</button>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping"
                                    type="button" role="tab" aria-controls="shipping" aria-selected="false">Shipping &
                                    Returns</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                    type="button" role="tab" aria-controls="reviews"
                                    aria-selected="false">Reviews</button>
                            </li> --}}
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active px-3 py-2 border-x border-b text-[#807F86]" id="description"
                                role="tabpanel" aria-labelledby="description-tab">
                                {!! $product->description !!}
                            </div>
                            <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                                {!! $product->shipping_returns !!}
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="col-md-8">
                                    <div class="row">

                                        <form action="" name="productRatingForm" id="productRatingForm" method="post">
                                            <h3 class="h4 pb-3">Write a Review</h3>
                                            <div class="form-group col-md-6 mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="username"
                                                    id="username" placeholder="Name">
                                                <p></p>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    placeholder="Email">
                                                <p></p>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="rating">Rating</label>
                                                <br>
                                                <div class="rating" style="width: 10rem">
                                                    <input id="rating-5" type="radio" name="rating"
                                                        value="5" /><label for="rating-5"><i
                                                            class="fas fa-3x fa-star"></i></label>
                                                    <input id="rating-4" type="radio" name="rating"
                                                        value="4" /><label for="rating-4"><i
                                                            class="fas fa-3x fa-star"></i></label>
                                                    <input id="rating-3" type="radio" name="rating"
                                                        value="3" /><label for="rating-3"><i
                                                            class="fas fa-3x fa-star"></i></label>
                                                    <input id="rating-2" type="radio" name="rating"
                                                        value="2" /><label for="rating-2"><i
                                                            class="fas fa-3x fa-star"></i></label>
                                                    <input id="rating-1" type="radio" name="rating"
                                                        value="1" /><label for="rating-1"><i
                                                            class="fas fa-3x fa-star"></i></label>
                                                </div>
                                                <p class="product-rating-error text-danger"></p>
                                            </div>
                                            <p></p>
                                            <div class="form-group mb-3">
                                                <label for="">How was your overall experience?</label>
                                                <textarea name="comment" id="comment" class="form-control" cols="30" rows="10"
                                                    placeholder="How was your overall experience?"></textarea>
                                                <p></p>
                                            </div>
                                            <div>
                                                <button class="btn btn-dark">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5">
                                    <div class="overall-rating mb-3">
                                        <div class="d-flex">
                                            <h1 class="h3 pe-3">4.0</h1>
                                            <div class="star-rating mt-2" title="70%">
                                                <div class="back-stars">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <div class="front-stars" style="width: 70%">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-2 ps-2">(03 Reviews)</div>
                                        </div>

                                    </div>
                                    <div class="rating-group mb-4">
                                        <span> <strong>Mohit Singh </strong></span>
                                        <div class="star-rating mt-2" title="70%">
                                            <div class="back-stars">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>

                                                <div class="front-stars" style="width: 70%">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-3">
                                            <p>I went with the blue model for my new apartment and an very pleased with the
                                                purchase. I'm definitely someone not used to paying this much for furniture,
                                                and I am also anxious about buying online, but I am very happy with the
                                                quality of this couch. For me, it is the perfect mix of cushy firmness, and
                                                it arrived defect free. It really is well made and hopefully will be my main
                                                couch for a long time. I paid for the extra delivery & box removal, and had
                                                an excellent experience as well. I do tend move my own furniture, but with
                                                an online purchase this expensive, that helped relieved my anxiety about
                                                having a item this big open up in my space without issues. If you need a
                                                functional sectional couch and like the feel of leather, this really is a
                                                great choice.

                                            </p>
                                        </div>
                                    </div>

                                    <div class="rating-group mb-4">
                                        <span class="author"><strong>Mohit Singh </strong></span>
                                        <div class="star-rating mt-2">
                                            <div class="back-stars">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>

                                                <div class="front-stars" style="width: 100%">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-3">
                                            <p>I went with the blue model for my new apartment and an very pleased with the
                                                purchase. I'm definitely someone not used to paying this much for furniture,
                                                and I am also anxious about buying online, but I am very happy with the
                                                quality of this couch. For me, it is the perfect mix of cushy firmness, and
                                                it arrived defect free. It really is well made and hopefully will be my main
                                                couch for a long time. I paid for the extra delivery & box removal, and had
                                                an excellent experience as well. I do tend move my own furniture, but with
                                                an online purchase this expensive, that helped relieved my anxiety about
                                                having a item this big open up in my space without issues. If you need a
                                                functional sectional couch and like the feel of leather, this really is a
                                                great choice.

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (!empty($relatedProducts))
        <section class="pt-5 section-8">
            <div class="container">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
                <div class="col-md-12">
                    <div id="related-products" class="carousel">

                        @foreach ($relatedProducts as $relProduct)
                            @php
                                $productImage = $relProduct->product_images->first();
                            @endphp
                            <div class="card product-card">
                                <div class="product-image position-relative">



                                    <a href="{{ route('front.product', $relProduct->slug) }}" class="product-img">
                                        {{-- <img class="card-img-top" src="images/product-1.jpg" alt=""> --}}
                                        @if (!empty($productImage->image))
                                            <img class="card-img-top"
                                                src="{{ asset('uploads/product/small/' . $productImage->image) }}" />
                                        @else
                                            <img src="{{ asset('admin-assets/img/default-150x150.png') }}" />
                                        @endif
                                    </a>


                                    <a onclick="addToWishlist({{ $product->id }})" class="whishlist"
                                        href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                    <div class="product-action">
                                        {{-- <a class="btn btn-dark" href="javascript:void(0);" onclick="addToCart({{ $product->id }});">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </a> --}}

                                        <div class="product-action">
                                            @if ($relProduct->track_qty == 'Yes')
                                                @if ($relProduct->qty > 0)
                                                    <a class="btn btn-dark" href="javascript:void(0);"
                                                        onclick="addToCart({{ $relProduct->id }});">
                                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                                    </a>
                                                @else
                                                    <a class="btn btn-dark" href="javascript:void(0);"
                                                        onclick="showOutOfStockAlert();">
                                                        Kehabisan Stock
                                                    </a>
                                                @endif
                                            @else
                                                <a class="btn btn-dark" href="javascript:void(0);"
                                                    onclick="addToCart({{ $relProduct->id }});">
                                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center mt-3">
                                    <a class="h6 link"
                                        href="{{ route('front.product', $relProduct->slug) }}">{{ $relProduct->title }}</a>
                                    <div class="price mt-2">
                                        <span class="h5"><strong>Rp{{ $relProduct->price }}</strong></span>
                                        @if ($relProduct->compare_price > 0)
                                            <span
                                                class="h6 text-underline"><del>Rp{{ $relProduct->compare_price }}</del></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    @endif
    @include('front.partials.footer')
@endsection

@section('customJs')
    <script>
        function showOutOfStockAlert() {
            Swal.fire({
                icon: 'error',
                title: 'Out of Stock',
                text: 'Sorry, this product is currently out of stock.',
                confirmButtonText: 'OK'
            });
        }

        function addToCart(id) {
            $.ajax({
                url: '{{ route('front.addToCart') }}',
                type: 'post',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.status == true) {
                        // Product added to the cart successfully, show a SweetAlert2 success popup
                        Swal.fire({
                            icon: 'success',
                            title: 'Added to Cart ',
                            html: response.message,
                            showConfirmButton: false, // Remove the "OK" button
                            timer: 1500 // Auto close after 1.5 seconds
                        });
                        // You can also redirect to the cart page if needed
                        // window.location.href = '{{ route('front.cart') }}';
                    } else {
                        // Product is already added to the cart, show a SweetAlert2 info popup
                        Swal.fire({
                            icon: 'info',
                            title: 'Product Already in Cart',
                            html: response.message,
                            confirmButtonText: 'OK',
                            footer: '<a href="{{ route('front.cart') }}">Go to Cart</a>'
                        });
                    }
                }
            });
        }

        function addToWishlist(id) {
            $.ajax({
                url: '{{ route('front.addToWishlist') }}',
                type: 'post',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.status == true) {
                        // Product added to the wishlist successfully, show a SweetAlert2 success popup
                        Swal.fire({
                            icon: 'success',
                            title: 'Added to Wishlist',
                            html: response.message,
                            showConfirmButton: false, // Remove the "OK" button
                            timer: 1500 // Auto close after 1.5 seconds
                        });
                    } else {
                        // Product is already in the wishlist, show a SweetAlert2 info popup
                        Swal.fire({
                            icon: 'info',
                            title: 'Product Already in Wishlist',
                            html: response.message,
                            confirmButtonText: 'OK',
                            footer: '<a href="{{ route('account.wishlist') }}">Go to Wishlist</a>'
                        });
                    }
                }
            });
        }
    </script>

    <script type="text/javascript">
        $("#productRatingForm").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route('front.saveRating', $product->id) }}',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                    var errors = response.errors;

                    if (response.status == false) {
                        // Handle validation errors with SweetAlert
                        if (errors.username) {
                            $("#username").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.username);
                        } else {
                            $("#username").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html('');
                        }

                        if (errors.email) {
                            $("#email").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.email);
                        } else {
                            $("#email").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html('');
                        }

                        if (errors.comment) {
                            $("#comment").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.comment);
                        } else {
                            $("#comment").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html('');
                        }

                        if (errors.rating) {
                            $(".product-rating-error").html(errors.rating);
                        } else {
                            $(".product-rating-error").html('');
                        }
                    } else {
                        if (response.alreadyRated) {
                            // Display SweetAlert for already rated
                            Swal.fire({
                                icon: 'warning',
                                title: 'Already Rated!',
                                text: 'You have already rated this product.',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            // Display SweetAlert for success with redirection after a short delay
                            Swal.fire({
                                icon: 'success',
                                title: 'Rating Submitted!',
                                text: 'Thanks for your rating.',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                window.location.href =
                                    "{{ route('front.product', $product->slug) }}";
                            });
                        }
                    }
                }
            });
        });
    </script>
@endsection
