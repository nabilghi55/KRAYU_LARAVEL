@extends('front.layouts.app')
@include('front.partials.navbar')
@section('content')
    <section class="bg-white">
        <div class="w-11/12 mx-auto">
            <div class="row">
                <div class="col-12">
                    @include('front.account.common.message')
                </div>
                <div class="col-md-4 col-lg-3">
                    @include('front.account.common.sidebar')
                </div>
                <div class="col-md-8 col-lg-9">
                    <div class="bg-white text-[#3A3845] shadow mt-4 mt-md-0">
                        <div class="bg-gray-100 p-3">
                            <h2 class="text-xl font-semibold">Ganti Password</h2>
                        </div>
                        <form action="" method="post" id="changePasswordForm" name="changePasswordForm">
                            <div class="p-6">
                                <div class="space-y-4">
                                    <div>
                                        <label for="old_password" class="block text-sm font-medium text-gray-700">Password Lama</label>
                                        <input type="password" name="old_password" id="old_password"
                                            placeholder="Masukkan Password Lama"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 mt-1 text-sm"></p>
                                    </div>
                                    <div>
                                        <label for="new_password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                                        <input type="password" name="new_password" id="new_password"
                                            placeholder="Masukkan Password Baru"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 mt-1 text-sm"></p>
                                    </div>
                                    <div>
                                        <label for="confirm_password"
                                            class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password"
                                            placeholder="Konfirmasi Password Baru"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 mt-1 text-sm"></p>
                                    </div>
                                    <div class="flex">
                                        <button id="submit" name="submit" type="submit"
                                            class="bg-[#9FB39A] text-white py-2 px-4">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script type="text/javascript">
        $("#changePasswordForm").submit(function(e) {
            e.preventDefault();
            $("#submit").prop('disabled', true);

            $.ajax({
                url: '{{ route('account.processChangePassword') }}',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $("#submit").prop('disabled', false);
                    if (response.status == true) {
                        window.location.href = "{{ route('account.changePassword') }}";
                    } else {
                        var errors = response.errors;

                        if (errors.old_password) {
                            $("#old_password").addClass('border-red-500').siblings('p').addClass(
                                'text-red-500').html(errors.old_password);
                        } else {
                            $("#old_password").removeClass('border-red-500').siblings('p').removeClass(
                                'text-red-500').html("");
                        }

                        if (errors.new_password) {
                            $("#new_password").addClass('border-red-500').siblings('p').addClass(
                                'text-red-500').html(errors.new_password);
                        } else {
                            $("#new_password").removeClass('border-red-500').siblings('p').removeClass(
                                'text-red-500').html("");
                        }

                        if (errors.confirm_password) {
                            $("#confirm_password").addClass('border-red-500').siblings('p').addClass(
                                'text-red-500').html(errors.confirm_password);
                        } else {
                            $("#confirm_password").removeClass('border-red-500').siblings('p')
                                .removeClass('text-red-500').html("");
                        }
                    }
                }
            });
        });
    </script>
@endsection
