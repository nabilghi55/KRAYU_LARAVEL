@extends('front.layouts.app')
@include('front.partials.navbar')
@section('content')
    <section class="bg-white">
        <div class="col-md-12 text-center pt-5 h-screen">

            <img src="{{ asset('img/logo_krayu.png') }}" class="w-44 mx-auto mb-5" alt="Logo Krayu">

            <h1 class="mb-4">Terima kasih!</h1>
            <p class="mb-2">ID Pesanan anda adalah : {{ $id }} </p>
            <p class="mb-4">Silahkan selesaikan pembayarn anda!</p>
            <button id="viewOrderButton" class="bg-[#9FB39A] text-white py-3 px-10">
                View Order Details
            </button>
        </div>
    </section>
    @include('front.partials.footer')
@endsection

@section('customJs')
    <script>
        // JavaScript to handle the button click and redirect
        document.getElementById('viewOrderButton').addEventListener('click', function() {
            window.location.href = "{{ route('account.orderDetail', $data['order']->id) }}";
        });
    </script>
@endsection
