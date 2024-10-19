@extends('front.layouts.app')

@section('content')
    <main>
        <section class="flex items-center justify-center min-h-screen bg-cover bg-center text-[#3A3845]"
            style="background-image: url('{{ asset('img/bg.png') }}');">
            <div class="container px-4">
                @if (Session::has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <div class="flex justify-center md:justify-end">
                    <div
                        class="w-full sm:w-2/3 md:w-3/5 lg:w-1/3 bg-transparent bg-blur-lg p-8 rounded-3xl shadow-lg">
                        <p class="text-lg mb-4 text-start">Selamat Datang di <span class="text-[#779341]">KRAYU</span></p>
                        <h2 class="text-3xl font-semibold mb-4 text-start">Masuk</h2>
                        <form action="{{ route('account.authenticate') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <input type="text" name="email" placeholder="Email"
                                    class="w-full px-4 py-2 border rounded-lg @error('email') border-red-500 @enderror"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password" placeholder="Password"
                                    class="w-full px-4 py-2 border rounded-lg @error('password') border-red-500 @enderror">
                                @error('password')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4 text-right">
                                <a href="{{ route('front.forgotPassword') }}" class="text-sm text-[#3A3845]">Lupa
                                    Password?</a>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="bg-[#779341] text-white px-10 py-2 rounded-lg hover:bg-gray-900">Masuk</button>
                            </div>
                        </form>

                        <div class="mt-6 text-center text-sm text-gray-500">Belum punya akun? <a
                                href="{{ route('account.register') }}" class="text-[#779341]">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
