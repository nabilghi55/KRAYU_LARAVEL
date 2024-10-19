@extends('front.layouts.app')
@include('front.partials.navbar')
@section('content')
    <section class="hidden lg:block h-2/3 object-cover"
        style="background-image: url('{{ asset('img/shop_banner.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
        <div class="bg-[#826F66] ml-48 px-5 text-center h-full w-fit flex items-center">
            <div class="text-white text-center">
                <img src="{{ asset('img/shop_icon.png') }}" class="w-20 mx-auto" alt="Shop Logo">
                <p class="mt-4">UMKM SEDJAK 1960</p>
                <h3 class="mt-2">KRAYU RUMAH</br>UNTUK UMKM</h3>
                <div class="mt-4">
                    <a href="#shop" class="bg-white px-4 py-2 text-[#826F66]">BELANJA SEKARANG</a>
                </div>
            </div>
        </div>
    </section>

    <section class="lg:hidden">
        <img src="{{ asset('img/shop_banner.png') }}" class="h-1/3 w-full object-cover" alt="Shop Banner">
        <div class="bg-[#826F66] h-fit py-5 text-white text-center">
            <img src="{{ asset('img/shop_icon.png') }}" class="w-20 mx-auto" alt="Shop Logo">
            <p class="mt-4">UMKM SEDJAK 1960</p>
            <h3 class="mt-2">KRAYU RUMAH</br>UNTUK UMKM</h3>
            <div class="mt-4">
                <a href="#shop" class="bg-white px-4 py-2 text-[#826F66]">BELANJA SEKARANG</a>
            </div>
        </div>
    </section>

    <section id="shop" class="bg-white pt-5">
        <div class="w-11/12 mx-auto">
            <div class="flex flex-wrap">
                @if ($products->isNotEmpty())
                    <div class="mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($products as $product)
                            <div class="border border-gray-300 rounded-lg shadow-md overflow-hidden">
                                <div class="relative h-64">
                                    <a href="{{ route('front.product', $product->slug) }}" class="block h-full">
                                        @if (!empty($product->product_image))
                                            <img class="object-cover h-full w-full" src="{{ $product->product_image }}" />
                                        @else
                                            <img class="object-cover h-full w-full"
                                                src="{{ asset('admin-assets/img/default-150x150.png') }}" />
                                        @endif
                                    </a>

                                    <a onclick="addToWishlist({{ $product->id }})"
                                        class="absolute top-2 right-2 bg-white p-2 rounded-full shadow-md cursor-pointer">
                                        <i class="far fa-heart text-red-500"></i>
                                    </a>
                                </div>

                                <div class="p-4 text-center">
                                    <a class="text-xl text-[#3A3845] font-bold block"
                                        href="{{ route('front.product', $product->slug) }}">{{ $product->title }}</a>
                                    <div class="price mt-2">
                                        <span class="text-lg text-[#3A3845] font-semibold">Rp {{ number_format($product->price, 2) }}</span>
                                        @if ($product->compare_price > 0)
                                            <span class="text-gray-500 line-through">Rp
                                                {{ number_format($product->compare_price, 2) }}</span>
                                        @endif
                                    </div>

                                    <div class="mt-3">
                                        @if ($product->track_qty == 'Yes')
                                            @if ($product->qty > 0)
                                                <a class="block w-full border-[1px] border-black text-black py-2 px-2 text-center"
                                                    href="javascript:void(0);" onclick="addToCart({{ $product->id }});">
                                                    MASUKKAN KERANJANG
                                                </a>
                                            @else
                                                <a class="block w-full border-[1px] border-black text-black py-2 px-2 text-center"
                                                    href="javascript:void(0);" onclick="showOutOfStockAlert();">
                                                    STOK HABIS
                                                </a>
                                            @endif
                                        @else
                                            <a class="block w-full border-[1px] border-black text-black py-2 px-2 text-center"
                                                href="javascript:void(0);" onclick="addToCart({{ $product->id }});">
                                                MASUKKAN KERANJANG
                                            </a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="pt-5">
                    {{ $products->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </section>

    @include('front.partials.footer')
@endsection

@section('customJs')
    <script>
        rangeSlider = $(".js-range-slider").ionRangeSlider({
            type: "double",
            min: 0,
            max: 1000000,
            from: {{ $priceMin }},
            step: 100000,
            to: {{ $priceMax }},
            skin: "round",
            max_postfix: "+",
            prefix: "Rp ",
            onFinish: function() {
                apply_filters()
            }
        });

        var slider = $(".js-range-slider").data("ionRangeSlider");

        $("#sort").change(function() {
            apply_filters();
        });

        function apply_filters() {
            var url = '{{ url()->current() }}?';

            //Price Slider
            url += '&price_min=' + slider.result.from + '&price_max=' + slider.result.to;

            // Search
            var keyword = $("#search").val();
            if (keyword.length > 0) {
                url += '&search=' + keyword;
            }

            //Sorting Product
            url += '&sort=' + $("#sort").val()

            window.location.href = url;
        }
    </script>

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
                    if (response.status == true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Added to Cart ',
                            html: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
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
                    if (response.status == true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Added to Wishlist',
                            html: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
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
@endsection
