@extends('front.layouts.app')

@section('content')
    <main>
        <section class="flex items-center justify-center min-h-screen bg-cover bg-center text-[#3A3845]"
            style="background-image: url('{{ asset('img/bg.png') }}');">
            <div class="container px-4">
                <div class="flex justify-center md:justify-end">
                    <div class="w-full sm:w-2/3 md:w-3/5 lg:w-1/3 bg-transparent bg-blur-lg p-8 rounded-3xl shadow-lg">
                        <p class="text-lg mb-4 text-start">Selamat Datang di <span class="text-[#779341]">KRAYU</span></p>
                        <h2 class="text-3xl font-semibold mb-4 text-start">Daftar</h2>
                        <form action="{{ route('account.processRegister') }}" method="post" id="registrationForm">
                            @csrf
                            <div class="mb-4">
                                <input type="text" name="email" placeholder="Username atau alamat email"
                                    class="w-full px-4 py-2 border rounded-lg @error('email') border-red-500 @enderror"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <input type="text" name="username" placeholder="Username"
                                        class="w-full px-4 py-2 border rounded-lg @error('username') border-red-500 @enderror"
                                        value="{{ old('username') }}">
                                    @error('username')
                                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <input type="text" name="phone" placeholder="No. HP"
                                        class="w-full px-4 py-2 border rounded-lg @error('phone') border-red-500 @enderror"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password" placeholder="Password"
                                    class="w-full px-4 py-2 border rounded-lg @error('password') border-red-500 @enderror">
                                @error('password')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password_confirmation" placeholder="Ketik ulang Password anda"
                                    class="w-full px-4 py-2 border rounded-lg @error('password_confirmation') border-red-500 @enderror">
                                @error('password_confirmation')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex justify-center mb-4">
                                <button type="submit"
                                    class="bg-[#779341] text-white px-10 py-2 rounded-lg hover:bg-gray-900">Daftar</button>
                            </div>
                        </form>

                        <div class="text-center text-sm text-gray-500 mb-6">Sudah punya akun? <a
                                href="{{ route('account.login') }}" class="text-[#779341]">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('customJs')
    <script type="text/javascript">
        $("#registrationForm").submit(function(event) {
            event.preventDefault();

            $("button[type='submit']").prop('disabled', true);

            $.ajax({
                url: '{{ route('account.processRegister') }}',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $("button[type='submit']").prop('disabled', false);

                    var errors = response.errors;

                    if (response.status == false) {

                        if (errors.email) {
                            $("#email").siblings("p").addClass('invalid-feedback').html(errors.email);
                            $("#email").addClass('is-invalid');
                        } else {
                            $("#email").siblings("p").removeClass('invalid-feedback').html('');
                            $("#email").removeClass('is-invalid');
                        }

                        if (errors.username) {
                            $("#username").siblings("p").addClass('invalid-feedback').html(errors
                                .username);
                            $("#username").addClass('is-invalid');
                        } else {
                            $("#username").siblings("p").removeClass('invalid-feedback').html('');
                            $("#username").removeClass('is-invalid');
                        }

                        if (errors.phone) {
                            $("#phone").siblings("p").addClass('invalid-feedback').html(errors.phone);
                            $("#phone").addClass('is-invalid');
                        } else {
                            $("#phone").siblings("p").removeClass('invalid-feedback').html('');
                            $("#phone").removeClass('is-invalid');
                        }

                        if (errors.password) {
                            $("#password").siblings("p").addClass('invalid-feedback').html(errors
                                .password);
                            $("#password").addClass('is-invalid');
                        } else {
                            $("#password").siblings("p").removeClass('invalid-feedback').html('');
                            $("#password").removeClass('is-invalid');
                        }

                    } else {
                        window.location.href = "{{ route('account.login') }}";
                    }

                },
                error: function(jQXHR, execption) {
                    console.log("Something went wrong");
                }
            });
        });
    </script>
@endsection
