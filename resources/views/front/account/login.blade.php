@extends('front.layouts.app')

@section('content')
<main>


    <section class="py-10 items-center flex bg-cover bg-center h-screen" style="background-image: url('{{ asset('img/bg.png') }}');">

        <div class="container  px-4">
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
            <div class="flex justify-end border h-[60vh] ">
    <div class="w-1/3 bg- bg-opacity-10 border border-white p-8  rounded-lg shadow-lg">
        <form action="{{ route('account.authenticate') }}" method="post">
            @csrf
            <h4 class="text-7xl font-medium mb-6 text-left">Login </h4>
            <div class="mb-4">
                <input type="text" class="w-full px-4 py-2 border rounded-lg @error('email') border-red-500 @enderror" placeholder="Email" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <input type="password" class="w-full px-4 py-2 border rounded-lg @error('password') border-red-500 @enderror" placeholder="Password" name="password">
                @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 text-right">
                <a href="{{ route('front.forgotPassword') }}" class="text-blue-500 text-sm">Forgot Password?</a>
            </div>
            <div class="flex justify-end"> 
            <button type="submit" class=" bg-[#779341] flex px-10 justify-end text-white py-2 rounded-lg hover:bg-gray-900">Login</button>

            </div>
        </form>
        <div class="text-center mt-4 text-sm text-gray-600">Don't have an account? <a href="{{ route('account.register') }}" class="text-blue-500">Sign up</a></div>
    </div>
</div>

        </div>
    </section>
</main>
@endsection
