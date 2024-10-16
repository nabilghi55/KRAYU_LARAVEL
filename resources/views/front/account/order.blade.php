@extends('front.layouts.app')
@include('front.partials.navbar')
@section('content')
<section class=" bg-white">
    <div class="w-11/12 mx-auto">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                @include('front.account.common.sidebar')
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="bg-white text-[#3A3845] shadow mb-5 mt-5 mt-md-0">
                    <div class="px-6 py-3 border-b">
                        <h2 class="text-lg font-semibold">Pesanan Saya</h2>
                    </div>
                    <div class="p-6">
                        <div class="overflow-auto">
                            <table class="min-w-full table-auto">
                                <thead>
                                    <tr class="text-center text-gray-600 uppercase tracking-wider text-sm">
                                        <th class="px-4 py-2">ID Pesanan</th>
                                        <th class="px-4 py-2">Tanggal Pesanan</th>
                                        <th class="px-4 py-2">Status Pembayaran</th>
                                        <th class="px-4 py-2">Status Pesanan</th>
                                        <th class="px-4 py-2">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($orders->isNotEmpty())
                                    @foreach ($orders as $order)
                                    <tr class="border-b text-center">
                                        <td class="px-4 py-2">
                                            <a class="text-[#3A3845]" href="{{ route('account.orderDetail',$order->id) }}">{{ $order->id }}</a>
                                        </td>
                                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</td>
                                        <td class="px-4 py-2">
                                            @if ($order->payment_status == '1')
                                                <span class="inline-block px-2 py-1 bg-red-500 text-white rounded">Belum Bayar</span>
                                            @else
                                                <span class="inline-block px-2 py-1 bg-green-500 text-white rounded">Sudah Bayar</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">
                                            @if ($order->status == 'pending')
                                                <span class="inline-block px-2 py-1 bg-red-500 text-white rounded">Menunggu</span>
                                            @elseif ($order->status == 'shipped')
                                                <span class="inline-block px-2 py-1 bg-blue-500 text-white rounded">Dikirim</span>
                                            @elseif ($order->status == 'delivered')
                                                <span class="inline-block px-2 py-1 bg-green-500 text-white rounded">Selesai</span>
                                            @else
                                                <span class="inline-block px-2 py-1 bg-black text-white rounded">Dibatalkan</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">Rp {{ number_format($order->grand_total,2) }}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" class="px-4 py-2 text-center text-gray-500">Pesanan Tidak Ditemukan</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('front.partials.footer')
@endsection
