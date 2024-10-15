@extends('front.layouts.app')
@include('front.partials.navbar')
@section('content')
    <section class="bg-white">
        <div class="container mx-auto px-4">
            <form id="orderForm" name="orderForm" action="" method="post">
                <div class="flex flex-col lg:flex-row lg:gap-20">
                    <div class="w-full lg:w-1/2 lg:mb-10">
                        <div class="">
                            <h2 class="text-xl font-bold mb-4">Detail Pembelian dan Pembayaran</h2>
                        </div>
                        <div class="bg-white">
                            <div>
                                <div class="grid grid-cols-1 gap-4">

                                    <div class="w-full">
                                        <div class="">
                                            <input type="text" name="first_name" id="first_name"
                                                class="form-input w-full border-[1px] border-[#3A3845] px-4 py-3"
                                                placeholder="Nama Depan"
                                                value="{{ !empty($customerAddress) ? $customerAddress->first_name : '' }}">
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <div class="">
                                            <input type="text" name="last_name" id="last_name"
                                                class="form-input w-full border-[1px] border-[#3A3845] px-4 py-3"
                                                placeholder="Nama Belakang"
                                                value="{{ !empty($customerAddress) ? $customerAddress->last_name : '' }}">
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <div class="">
                                            <input type="email" name="email" id="email"
                                                class="form-input w-full border-[1px] border-[#3A3845] px-4 py-3"
                                                placeholder="Email"
                                                value="{{ !empty($customerAddress) ? $customerAddress->email : '' }}">
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <div class="border-[1px] border-[#3A3845]">
                                            <select name="country" id="country" class="form-select w-full px-4 py-3">
                                                <option value="">Pilih Negara</option>
                                                @if ($countries->isNotEmpty())
                                                    @foreach ($countries as $country)
                                                        <option
                                                            {{ !empty($customerAddress) && $customerAddress->country_id == $country->id ? 'selected' : '' }}
                                                            value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <div class="">
                                            <textarea name="address" id="address" cols="30" rows="3" placeholder="Alamat"
                                                class="form-textarea w-full border-[1px] border-[#3A3845] px-4 py-4">{{ !empty($customerAddress) ? $customerAddress->address : '' }}</textarea>
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <div class="">
                                            <input type="text" name="apartment" id="apartment"
                                                class="form-input w-full border-[1px] border-[#3A3845] px-4 py-3"
                                                placeholder="Apartemen, unit, dll. (opsional)"
                                                value="{{ !empty($customerAddress) ? $customerAddress->apartment : '' }}">
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <div class="">
                                            <input type="text" name="city" id="city"
                                                class="form-input w-full border-[1px] border-[#3A3845] px-4 py-3"
                                                placeholder="Kota"
                                                value="{{ !empty($customerAddress) ? $customerAddress->city : '' }}">
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <div class="">
                                            <input type="text" name="state" id="state"
                                                class="form-input w-full border-[1px] border-[#3A3845] px-4 py-3"
                                                placeholder="Provinsi"
                                                value="{{ !empty($customerAddress) ? $customerAddress->state : '' }}">
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <div class="">
                                            <input type="text" name="zip" id="zip"
                                                class="form-input w-full border-[1px] border-[#3A3845] px-4 py-3"
                                                placeholder="Kode Pos"
                                                value="{{ !empty($customerAddress) ? $customerAddress->zip : '' }}">
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <div class="">
                                            <input type="text" name="mobile" id="mobile"
                                                class="form-input w-full border-[1px] border-[#3A3845] px-4 py-3"
                                                placeholder="Nomor Telepon"
                                                value="{{ !empty($customerAddress) ? $customerAddress->mobile : '' }}">
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <div class="">
                                            <textarea name="order_notes" id="order_notes" cols="30" rows="2" placeholder="Catatan (opsional)"
                                                class="form-textarea w-full border-[1px] border-[#3A3845] px-4 py-4"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-4 lg:w-1/2">
                        <div class="my-4 flex justify-between border-b border-black">
                            <h2 class="text-xl font-bold mb-2">Produk</h2>
                            <h2 class="text-xl font-bold mb-2">Subtotal</h2>
                        </div>
                        <div class="">
                            @foreach (Cart::content() as $item)
                                <div class="flex justify-between pb-2">
                                    <div class="text-lg">{{ $item->name }} X {{ $item->qty }}</div>
                                    <div class="text-lg">Rp {{ number_format($item->price * $item->qty, 2) }}</div>
                                </div>
                            @endforeach

                            <div class="flex justify-between pt-4">
                                <div class="text-lg font-bold">Subtotal</div>
                                <div class="text-lg font-bold">Rp {{ Cart::subtotal() }}</div>
                            </div>
                            <div class="flex justify-between border-b border-black pt-2">
                                <div class="text-lg font-bold mb-3">Ongkos Kirim</div>
                                <div class="text-lg font-bold" id="shippingAmount">Rp
                                    {{ number_format($totalShippingCharge, 2) }}</div>
                            </div>
                            <div class="flex justify-between pt-3">
                                <div class="text-lg font-bold">Total</div>
                                <div class="text-lg font-bold" id="grandTotal">Rp {{ number_format($grandTotal, 2) }}
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center border-[1px] border-black">
                            <a class=" text-[#3A3845] w-full py-3" href="/cart" type="button">KEMBALI KE KERANJANG</a>
                        </div>

                        <div class="my-3 text-white">
                            <input hidden checked type="radio" name="payment_method" value="cod"
                                id="payment_method_one">
                            <button type="submit" class="bg-[#9FB39A] py-3 w-full">LANJUTKAN PEMBAYARAN</button>
                        </div>
                    </div>
            </form>
        </div>
        </div>
    </section>
    @include('front.partials.footer')
@endsection

@section('customJs')
    <script>
        $("#payment_method_one").click(function() {
            if ($(this).is(":checked") == true) {
                $("#card-payment-form").addClass('d-none');
            }
        });

        $("#payment_method_two").click(function() {
            if ($(this).is(":checked") == true) {
                $("#card-payment-form").removeClass('d-none');
            }
        });

        $('#orderForm').submit(function(event) {
            event.preventDefault();

            Swal.fire({
                icon: 'question',
                title: 'Konfirmasi Pesanan',
                text: 'Apakah anda yakin untuk melanjutkan pesanan?',
                showCancelButton: true,
                confirmButtonText: 'Lanjut',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, proceed with the order submission
                    $('button[type="submit"]').prop('disabled', true);

                    $.ajax({
                        url: '{{ route('front.processCheckout') }}',
                        type: 'post',
                        data: $(this).serializeArray(),
                        dataType: 'json',
                        success: function(response) {
                            var errors = response.errors;
                            $('button[type="submit"]').prop('disabled', false);

                            if (response.status == false) {
                                if (errors.first_name) {
                                    $("#first_name").addClass('is-invalid')
                                        .siblings("p")
                                        .addClass('invalid-feedback')
                                        .html(errors.first_name);
                                } else {
                                    $("#first_name").removeClass('is-invalid')
                                        .siblings("p")
                                        .removeClass('invalid-feedback')
                                        .html('');
                                }

                                if (errors.last_name) {
                                    $("#last_name").addClass('is-invalid')
                                        .siblings("p")
                                        .addClass('invalid-feedback')
                                        .html(errors.last_name);
                                } else {
                                    $("#last_name").removeClass('is-invalid')
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

                                if (errors.country) {
                                    $("#country").addClass('is-invalid')
                                        .siblings("p")
                                        .addClass('invalid-feedback')
                                        .html(errors.country);
                                } else {
                                    $("#country").removeClass('is-invalid')
                                        .siblings("p")
                                        .removeClass('invalid-feedback')
                                        .html('');
                                }

                                if (errors.address) {
                                    $("#address").addClass('is-invalid')
                                        .siblings("p")
                                        .addClass('invalid-feedback')
                                        .html(errors.address);
                                } else {
                                    $("#address").removeClass('is-invalid')
                                        .siblings("p")
                                        .removeClass('invalid-feedback')
                                        .html('');
                                }

                                if (errors.state) {
                                    $("#state").addClass('is-invalid')
                                        .siblings("p")
                                        .addClass('invalid-feedback')
                                        .html(errors.state);
                                } else {
                                    $("#state").removeClass('is-invalid')
                                        .siblings("p")
                                        .removeClass('invalid-feedback')
                                        .html('');
                                }

                                if (errors.city) {
                                    $("#city").addClass('is-invalid')
                                        .siblings("p")
                                        .addClass('invalid-feedback')
                                        .html(errors.city);
                                } else {
                                    $("#city").removeClass('is-invalid')
                                        .siblings("p")
                                        .removeClass('invalid-feedback')
                                        .html('');
                                }

                                if (errors.zip) {
                                    $("#zip").addClass('is-invalid')
                                        .siblings("p")
                                        .addClass('invalid-feedback')
                                        .html(errors.zip);
                                } else {
                                    $("#zip").removeClass('is-invalid')
                                        .siblings("p")
                                        .removeClass('invalid-feedback')
                                        .html('');
                                }
                                if (errors.mobile) {
                                    $("#mobile").addClass('is-invalid')
                                        .siblings("p")
                                        .addClass('invalid-feedback')
                                        .html(errors.mobile);
                                } else {
                                    $("#mobile").removeClass('is-invalid')
                                        .siblings("p")
                                        .removeClass('invalid-feedback')
                                        .html('');
                                }
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Pesanan Telah Dibuat!',
                                    text: 'Pesanan anda berhasil dibuat. Silakan selesaikan pembayaran!',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    window.location.href = "{{ url('/thanks/') }}/" +
                                        response.orderId;
                                });
                            }
                        }
                    });
                }
            });
        })

        $("#country").change(function() {
            $.ajax({
                url: '{{ route('front.getOrderSummary') }}',
                type: 'post',
                data: {
                    country_id: $(this).val()
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        $("#shippingAmount").html('Rp ' + response.shippingCharge);
                        $("#grandTotal").html('Rp ' + response.grandTotal);
                    }
                }
            });
        });


        $("#apply-discount").click(function() {
            $.ajax({
                url: '{{ route('front.applyDiscount') }}',
                type: 'post',
                data: {
                    code: $("#discount_code").val(),
                    country_id: $("#country").val()
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        $("#shippingAmount").html('Rp ' + response.shippingCharge);
                        $("#grandTotal").html('Rp ' + response.grandTotal);
                        $("#discount_value").html('Rp ' + response.discount);
                        $("#discount-response-wrapper").html(response.discountString)
                    } else {
                        $("#discount-response-wrapper").html("<span class ='text-danger'>" + response
                            .message + "</span>")
                    }
                }
            });
        });

        // $('body').on('click', "#remove-discount", function() {
        //     Swal.fire({
        //         icon: 'question',
        //         title: 'Confirm Remove Discount',
        //         text: 'Are you sure you want to remove the discount?',
        //         showCancelButton: true,
        //         confirmButtonText: 'Yes',
        //         cancelButtonText: 'No'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $.ajax({
        //                 url: '{{ route('front.removeCoupon') }}',
        //                 type: 'post',
        //                 data: {
        //                     country_id: $("#country").val()
        //                 },
        //                 dataType: 'json',
        //                 success: function(response) {
        //                     if (response.status == true) {
        //                         $("#shippingAmount").html('Rp ' + response.shippingCharge);
        //                         $("#grandTotal").html('Rp ' + response.grandTotal);
        //                         $("#discount_value").html('Rp ' + response.discount);
        //                         $("#discount-response-wrapper").html(
        //                             ''); // Remove the coupon code response
        //                         $("#discount_code").val(
        //                             ''); // Clear the coupon code input field
        //                     }
        //                 }
        //             });
        //         }
        //     });
        // });

        // $("#remove-discount").click(function(){
        // });
    </script>
@endsection
