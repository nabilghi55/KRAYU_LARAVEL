@extends('front.layouts.app')
@include('front.partials.navbar')
@section('content')
    <section class="bg-white">
        <div class="w-11/12 mx-auto">
            <div class="row">
                <div class="col-md-12">
                    @include('front.account.common.message')
                </div>

                <div class="col-md-4 col-lg-3">
                    @include('front.account.common.sidebar')
                </div>
                <div class="col-md-8 col-lg-9">
                    <div class="bg-white text-[#3A3845] shadow mt-4 mt-md-0">
                        <div class="bg-gray-100 p-3">
                            <h2 class="text-xl font-bold">Wishlist Saya</h2>
                        </div>
                        <div class="p-4">
                            @if ($wishlists->isNotEmpty())
                                @foreach ($wishlists as $wishlist)
                                    <div
                                        class="flex flex-col sm:flex-row justify-between items-center border-b border-gray-200 py-4">
                                        <div class="flex items-center gap-4">
                                            <a class="block mx-auto sm:mx-0 sm:mr-4"
                                                href="{{ route('front.product', $wishlist->product->slug) }}"
                                                style="width: 10rem;">
                                                @if (!empty($wishlist->product))
                                                    <img src="{{ $wishlist->product->product_image }}"
                                                        class="w-full h-auto" />
                                                @else
                                                    <img src="{{ asset('admin-assets/img/default-150x150.png') }}"
                                                        class="w-full h-auto" />
                                                @endif
                                            </a>

                                            <div class="mt-2 sm:mt-0">
                                                <h3 class="text-lg font-semibold mb-2 text-[#3A3845]">
                                                    <a
                                                        href="{{ route('front.product', $wishlist->product->slug) }}" class="text-[#3A3845]">{{ $wishlist->product->title }}</a>
                                                </h3>
                                                <div class="text-lg">
                                                    <span class="font-bold">Rp {{ $wishlist->product->price }}</span>
                                                    @if ($wishlist->product->compare_price > 0)
                                                        <span class="text-sm text-gray-500 line-through">Rp
                                                            {{ $wishlist->product->compare_price }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 sm:mt-0 md:hidden lg:block">
                                            <button onclick="removeProduct({{ $wishlist->product_id }});"
                                                class="bg-white text-red-500 border-[1px] border-red-500 py-2 px-4 rounded hover:scale-105 duration-300"
                                                type="button">
                                                <i class="fas fa-trash-alt mr-2"></i>Hapus
                                            </button>
                                        </div>
                                        <div class="mt-4 hidden md:block lg:hidden">
                                            <button onclick="removeProduct({{ $wishlist->product_id }});"
                                                class="bg-white text-red-500 border-[1px] border-red-500 py-2 px-4 rounded hover:scale-105 duration-300"
                                                type="button">
                                                <i class="fas fa-trash-alt py-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div>
                                    <h4 class="text-lg font-semibold">Wishlist anda kosong.</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('front.partials.footer')
@endsection

@section('customJs')
    <script>
        function removeProduct(id) {
            Swal.fire({
                title: 'Hapus dari whishlist',
                text: 'Anda yakin ingin menghapus produk dari whishlist?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('account.removeProductFromWishList') }}',
                        type: 'post',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil menghapus produk dari whishlist',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1000,
                                    timerProgressBar: true
                                }).then(() => {
                                    window.location.href = '{{ route('account.wishlist') }}';
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Gagal menghapus produk dari whishlist. Coba lagi',
                                    confirmButtonText: 'Oke'
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
