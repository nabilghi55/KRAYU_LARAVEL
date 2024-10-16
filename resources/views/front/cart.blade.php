@extends('front.layouts.app')
@include('front.partials.navbar')
@section('content')
    <section class="pt-4 bg-white">
        <div class="container mx-auto">
            <div class="row">
                @if (Session::has('success'))
                    <div class="col-md-12">
                        <div class="alert bg-green-100 text-green-600 border border-green-400 p-4 rounded relative"
                            role="alert">
                            {!! Session::get('success') !!}
                            <button type="button" class="absolute top-0 right-0 p-2 text-green-600 hover:text-green-800"
                                data-bs-dismiss="alert">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="col-md-12">
                        <div class="alert bg-red-100 text-red-600 border border-red-400 p-4 rounded relative"
                            role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="absolute top-0 right-0 p-2 text-red-600 hover:text-red-800"
                                data-bs-dismiss="alert">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                @endif

                @if (Cart::count() > 0)
                    <div class="col-lg-8">
                        <div class="overflow-x-auto">
                            <table id="cart" class="table-auto w-full text-center">
                                <thead class="text-light">
                                    <tr class="bg-[#3A3845]">
                                        <th class="font-normal p-2">Produk</th>
                                        <th class="font-normal p-2">Jumlah</th>
                                        <th class="font-normal p-2">Harga</th>
                                        <th class="font-normal p-2">Total</th>
                                        <th class="font-normal p-2">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $item)
                                        <tr class="border-b" data-row-id="{{ $item->rowId }}">
                                            <td class="flex items-center space-x-4 p-2">
                                                <img src="{{ $item->options->image }}" class="w-16" />
                                                <h6>{{ $item->name }}</h6>
                                            </td>
                                            <td class="align-middle">
                                                <div class="flex justify-center items-center gap-2">
                                                    <button class="p-2 bg-gray-200 rounded sub"
                                                        data-id="{{ $item->rowId }}">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                    <input readonly type="text"
                                                        class="w-12 text-center rounded qty-input"
                                                        value="{{ $item->qty }}" data-price="{{ $item->price }}">
                                                    <button class="p-2 bg-gray-200 rounded add"
                                                        data-id="{{ $item->rowId }}">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="align-middle">Rp {{ number_format($item->price, 2) }}</td>
                                            <td class="total-price align-middle">Rp
                                                {{ number_format($item->price * $item->qty, 2) }}
                                            </td>
                                            <td class="align-middle">
                                                <button class="bg-red-500 text-white rounded p-2"
                                                    onclick="deleteItem('{{ $item->rowId }}');">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-white my-4 mt-lg-0 col-lg-4">
                        <div class="bg-[#9FB39A] p-6">
                            <div class="flex justify-between">
                                <div class="">
                                    <span>Subtotal</span>
                                </div>
                                <div class="">
                                    <span id="cart-subtotal">Rp {{ Cart::subtotal() }}</span>
                                </div>
                            </div>
                            <div class="pt-3">
                                <a href="{{ route('front.checkout') }}"
                                    class="btn bg-dark text-white py-2 px-4 w-full text-center">Proceed to
                                    Checkout</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="card">
                            <div class="flex justify-center items-center p-6">
                                <h4>Keranjang masih kosong</h4>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @include('front.partials.footer')
    </section>
@endsection

@section('customJs')
    <script>
        function formatCurrency(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(value);
        }

        $('.add').click(function() {
            var qtyElement = $(this).prev();
            var qtyValue = parseInt(qtyElement.val());
            var price = parseFloat(qtyElement.data('price'));
            var rowId = $(this).data('id');
            if (qtyValue < 10) {
                qtyElement.val(qtyValue + 1);
                var newQty = qtyElement.val();
                updateCart(rowId, newQty, price);
            }
        });

        $('.sub').click(function() {
            var qtyElement = $(this).next();
            var qtyValue = parseInt(qtyElement.val());
            var price = parseFloat(qtyElement.data('price'));
            var rowId = $(this).data('id');
            if (qtyValue > 1) {
                qtyElement.val(qtyValue - 1);
                var newQty = qtyElement.val();
                updateCart(rowId, newQty, price);
            }
        });

        function updateCart(rowId, qty, price) {
            $.ajax({
                url: '{{ route('front.updateCart') }}',
                type: 'post',
                data: {
                    rowId: rowId,
                    qty: qty
                },
                dataType: 'json',
                success: function(response) {
                    var totalPriceElement = $('tr[data-row-id="' + rowId + '"] .total-price');
                    var newTotal = qty * price;
                    totalPriceElement.text(formatCurrency(newTotal));

                    updateSubtotal();
                }
            });
        }

        function updateSubtotal() {
            var subtotal = 0;
            $('.qty-input').each(function() {
                var qty = parseInt($(this).val());
                var price = parseFloat($(this).data('price'));
                subtotal += qty * price;
            });

            $('#cart-subtotal').text(formatCurrency(subtotal));
        }

        function deleteItem(rowId) {
            Swal.fire({
                icon: 'question',
                title: 'Konfirmasi Penghapusan',
                text: 'Apakah anda yakin ingin menghapus produk ini?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('front.deleteItem.cart') }}',
                        type: 'post',
                        data: {
                            rowId: rowId
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == true) {
                                $('tr[data-row-id="' + rowId + '"]').remove();

                                updateSubtotal();

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Produk dihapus',
                                    text: 'Produk berhasil dihapus dari keranjang.',
                                    timer: 1500,
                                    showConfirmButton: false
                                });

                                if ($('tbody tr').length === 0) {
                                    $('.overflow-x-auto').html(
                                        '<div class="flex justify-center items-center p-6"><h4>Keranjang masih kosong</h4></div>'
                                    );
                                }
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
